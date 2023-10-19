<?php
require __DIR__ . '/../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};

class SelectDownloadsGraphic{

  public $connection;

  public function __construct()
  {
      $this -> connection = new Conexion();
  }

  /*
  * Realiza el select de las descargas registradas en la BD que estan habilitados
  */
  public function getDownloadsGraphicAll(){
    try {
      $connect = $this->connection->conectar();
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "SELECT 
      m.MaterialNombre AS NombreMaterial, 
      s.SedeNombre AS SedeNombre, 
      u.UsuarioNombre AS NombreUsuario, 
      u.UsuarioApaterno AS ApellidoPUsuario, 
      u.UsuarioAMaterno AS ApellidoMUsuario,
      d.Descarga_Id AS Descarga_Id, 
      d.DescargaFecha AS DescargaFecha, 
      d.DescargaCantidad AS DescargaCantidad
      FROM descargas d
      INNER JOIN material m ON d.Material_Id = m.Material_Id
      INNER JOIN sedes s ON d.Sede_Id = s.Sede_Id
      INNER JOIN usuario u ON d.Usuario_Id = u.Usuario_Id;";
      $queryP = $connect->prepare($query);
      $queryP->execute();
      $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);

      // Crear un nuevo objeto de hoja de cálculo
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setTitle("Reporte");

      $sheet->setCellValue('A1', 'Numero de Descarga');
      $sheet->setCellValue('B1', 'Sede');
      $sheet->setCellValue('C1', 'Nombre Usuario');
      $sheet->setCellValue('D1', 'Nombre Material');
      $sheet->setCellValue('E1', 'Fecha de Descarga ');
      $sheet->setCellValue('F1', 'Cantidad de Descarga');

      // Escribir datos en el archivo Excel
      $row = 2;
      foreach ($resultado as $data) {
        $concatenatedValue = $data['NombreUsuario'] . ' ' . $data['ApellidoPUsuario'] . ' ' . $data['ApellidoMUsuario'];
        $sheet->setCellValue('A' . $row, $data['Descarga_Id']);
        $sheet->setCellValue('B' . $row, $data['SedeNombre']);
        $sheet->setCellValue('C' . $row, $concatenatedValue);
        $sheet->setCellValue('D' . $row, $data['NombreMaterial']);
        $sheet->setCellValue('E' . $row, $data['DescargaFecha']);
        $sheet->setCellValue('F' . $row, $data['DescargaCantidad']);
        $row++;
    }

    // Crear el objeto Writer
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

    // Generar un nombre de archivo único basado en la fecha y la hora actual
    $nombreArchivo = 'Reporte_General' . date('Ymd') . '.xlsx';

    // Guardar el archivo en el servidor
    $rutaCarpeta  = realpath(__DIR__ . '\..\..\..\exceltemp');
    $rutaArchivo = $rutaCarpeta . '\\' . $nombreArchivo;
    $writer->save($rutaArchivo);

    // Codificar el archivo en base64
    $base64Data = base64_encode(file_get_contents($rutaArchivo));

    // Eliminar el archivo temporal
    unlink($rutaArchivo);

    // Generar el enlace de descarga
    $downloadLink = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,' . $base64Data;

    // Devolver el enlace de descarga
    return $downloadLink;
      
  } catch (PDOException $ex) {
      echo '<script language="javascript">
      alert("Error al generar reporte. Consulte a un administrador");
      </script>';
      echo 'Error: ' . $ex->getMessage();
      die();
  }
}

}
?>
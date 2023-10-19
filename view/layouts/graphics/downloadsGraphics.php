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

      $query = "SELECT * FROM descargas";
      $queryP = $connect->prepare($query);
      $queryP->execute();
      $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);

      // Crear un nuevo objeto de hoja de cálculo
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setTitle("Reporte");

      $sheet->setCellValue('A1', 'Descarga_Id');
      $sheet->setCellValue('B1', 'Sede_Id');
      $sheet->setCellValue('C1', 'Usuario_Id');
      $sheet->setCellValue('D1', 'Material_Id');
      $sheet->setCellValue('E1', 'DescargaFecha');
      $sheet->setCellValue('F1', 'DescargaCantidad');

      // Escribir datos en el archivo Excel
      $row = 2;
      foreach ($resultado as $data) {
        $sheet->setCellValue('A' . $row, $data['Descarga_Id']);
        $sheet->setCellValue('B' . $row, $data['Sede_Id']);
        $sheet->setCellValue('C' . $row, $data['Usuario_Id']);
        $sheet->setCellValue('D' . $row, $data['Material_Id']);
        $sheet->setCellValue('E' . $row, $data['DescargaFecha']);
        $sheet->setCellValue('F' . $row, $data['DescargaCantidad']);
        $row++;
    }

    // Crear el objeto Writer
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

    // Generar un nombre de archivo único basado en la fecha y la hora actual
    $nombreArchivo = 'Reporte_' . date('Ymd_His') . '.xlsx';

    // Guardar el archivo en el servidor
    $rutaCarpeta  = realpath(__DIR__ . '\..\..\..\exceltemp');
    $rutaArchivo = $rutaCarpeta . '\\' . $nombreArchivo;
    $writer->save($rutaArchivo);

    // Configurar las cabeceras para la descarga del archivo
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
    header('Cache-Control: max-age=0');

    // Enviar el archivo al navegador
    readfile($rutaArchivo);

    // Borrar el archivo del servidor después de enviarlo
    // unlink($rutaArchivo);

    exit;
      
  } catch (PDOException $ex) {
      echo 'Error: ' . $ex->getMessage();
      die();
  }
}

}
?>
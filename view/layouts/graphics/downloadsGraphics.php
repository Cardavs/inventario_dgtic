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
    public function getAllReport(){
    try {
      $connect = $this->connection->conectar();
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "SELECT 
        m.MaterialNombre AS NombreMaterial,
        m.MaterialEstado AS MaterialEstado,
        m.MaterialISBN AS MaterialISBN,
        m.MaterialTiraje AS MaterialTiraje,
        m.MaterialAutor AS MaterialAutor,
        m.MaterialVersion AS MaterialVersion,
        m.MaterialEdicion AS MaterialEdicion,
        m.MaterialPaginas AS MaterialPaginas,
        a.AreaNombre AS AreaNombre,
        s.SedeNombre AS SedeNombre, 
        u.UsuarioNombre AS NombreUsuario, 
        u.UsuarioApaterno AS ApellidoPUsuario, 
        u.UsuarioAMaterno AS ApellidoMUsuario,
        d.Descarga_Id AS Descarga_Id, 
        d.DescargaFecha AS DescargaFecha, 
        d.DescargaCantidad AS DescargaCantidad
      FROM descargas d
      INNER JOIN material m ON d.Material_Id = m.Material_Id
      INNER JOIN area a ON m.Area_Id = a.Area_Id
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
      $sheet->setCellValue('C1', 'Nombre Usuario Descarga');
      $sheet->setCellValue('D1', 'Nombre Material');
      $sheet->setCellValue('E1', 'Estado Material');
      $sheet->setCellValue('F1', 'ISBN Material');
      $sheet->setCellValue('G1', 'Tiraje Material');
      $sheet->setCellValue('H1', 'Autor Material');
      $sheet->setCellValue('I1', 'Version Material');
      $sheet->setCellValue('J1', 'Edición Material');
      $sheet->setCellValue('K1', 'Paginas Material');
      $sheet->setCellValue('L1', 'Area Material');
      $sheet->setCellValue('M1', 'Fecha de Descarga ');
      $sheet->setCellValue('N1', 'Copias');

      // Escribir datos en el archivo Excel
      $row = 2;
      foreach ($resultado as $data) {
        $concatenatedValue = $data['NombreUsuario'] . ' ' . $data['ApellidoPUsuario'] . ' ' . $data['ApellidoMUsuario'];

        if($data['MaterialEstado']=='1'){
          $estadoMaterial = 'Activo';
        }else{
          $estadoMaterial = 'Inactivo';
        }

        $sheet->setCellValue('A' . $row, $data['Descarga_Id']);
        $sheet->setCellValue('B' . $row, $data['SedeNombre']);
        $sheet->setCellValue('C' . $row, $concatenatedValue);
        $sheet->setCellValue('D' . $row, $data['NombreMaterial']);
        $sheet->setCellValue('E' . $row, $estadoMaterial);
        $sheet->setCellValue('F' . $row, $data['MaterialISBN']);
        $sheet->setCellValue('G' . $row, $data['MaterialTiraje']);
        $sheet->setCellValue('H' . $row, $data['MaterialAutor']);
        $sheet->setCellValue('I' . $row, $data['MaterialVersion']);
        $sheet->setCellValue('J' . $row, $data['MaterialEdicion']);
        $sheet->setCellValue('K' . $row, $data['MaterialPaginas']);
        $sheet->setCellValue('L' . $row, $data['AreaNombre']);
        $sheet->setCellValue('M' . $row, $data['DescargaFecha']);
        $sheet->setCellValue('N' . $row, $data['DescargaCantidad']);
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

    /*
    * Realiza el select de las descargas registradas en la BD que estan habilitados
    */
    public function getAllReportDates($fecha_inicio, $fecha_fin){
      try {
        $connect = $this->connection->conectar();
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
        $query = "SELECT 
          m.MaterialNombre AS NombreMaterial,
          m.MaterialEstado AS MaterialEstado,
          m.MaterialISBN AS MaterialISBN,
          m.MaterialTiraje AS MaterialTiraje,
          m.MaterialAutor AS MaterialAutor,
          m.MaterialVersion AS MaterialVersion,
          m.MaterialEdicion AS MaterialEdicion,
          m.MaterialPaginas AS MaterialPaginas,
          a.AreaNombre AS AreaNombre,  
          s.SedeNombre AS SedeNombre, 
          u.UsuarioNombre AS NombreUsuario, 
          u.UsuarioApaterno AS ApellidoPUsuario, 
          u.UsuarioAMaterno AS ApellidoMUsuario,
          d.Descarga_Id AS Descarga_Id, 
          d.DescargaFecha AS DescargaFecha, 
          d.DescargaCantidad AS DescargaCantidad
        FROM descargas d
        INNER JOIN material m ON d.Material_Id = m.Material_Id
        INNER JOIN area a ON m.Area_Id = a.Area_Id
        INNER JOIN sedes s ON d.Sede_Id = s.Sede_Id
        INNER JOIN usuario u ON d.Usuario_Id = u.Usuario_Id
        WHERE d.DescargaFecha BETWEEN :fecha_inicio AND :fecha_fin;
        ORDER BY d.DescargaFecha";

        $queryP = $connect->prepare($query);    
        $queryP->bindValue(":fecha_inicio", $fecha_inicio);
        $queryP->bindValue(":fecha_fin", $fecha_fin);
        $queryP->execute();
        $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
  
        // Crear un nuevo objeto de hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Reporte");
  
        $sheet->setCellValue('A1', 'Numero de Descarga');
        $sheet->setCellValue('B1', 'Sede');
        $sheet->setCellValue('C1', 'Nombre Usuario Descarga');
        $sheet->setCellValue('D1', 'Nombre Material');
        $sheet->setCellValue('E1', 'Estado Material');
        $sheet->setCellValue('F1', 'ISBN Material');
        $sheet->setCellValue('G1', 'Tiraje Material');
        $sheet->setCellValue('H1', 'Autor Material');
        $sheet->setCellValue('I1', 'Version Material');
        $sheet->setCellValue('J1', 'Edición Material');
        $sheet->setCellValue('K1', 'Paginas Material');
        $sheet->setCellValue('L1', 'Area Material');
        $sheet->setCellValue('M1', 'Fecha de Descarga ');
        $sheet->setCellValue('N1', 'Copias');

        // Escribir datos en el archivo Excel
        $row = 2;
        foreach ($resultado as $data) {
          $concatenatedValue = $data['NombreUsuario'] . ' ' . $data['ApellidoPUsuario'] . ' ' . $data['ApellidoMUsuario'];

          if($data['MaterialEstado']=='1'){
            $estadoMaterial = 'Activo';
          }else{
            $estadoMaterial = 'Inactivo';
          }

          $sheet->setCellValue('A' . $row, $data['Descarga_Id']);
          $sheet->setCellValue('B' . $row, $data['SedeNombre']);
          $sheet->setCellValue('C' . $row, $concatenatedValue);
          $sheet->setCellValue('D' . $row, $data['NombreMaterial']);
          $sheet->setCellValue('E' . $row, $estadoMaterial);
          $sheet->setCellValue('F' . $row, $data['MaterialISBN']);
          $sheet->setCellValue('G' . $row, $data['MaterialTiraje']);
          $sheet->setCellValue('H' . $row, $data['MaterialAutor']);
          $sheet->setCellValue('I' . $row, $data['MaterialVersion']);
          $sheet->setCellValue('J' . $row, $data['MaterialEdicion']);
          $sheet->setCellValue('K' . $row, $data['MaterialPaginas']);
          $sheet->setCellValue('L' . $row, $data['AreaNombre']);
          $sheet->setCellValue('M' . $row, $data['DescargaFecha']);
          $sheet->setCellValue('N' . $row, $data['DescargaCantidad']);
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

  /*
  * Realiza el select de las descargas registradas en la BD que estan habilitados
  */
  public function getReportSede($sede){
    try {
      $connect = $this->connection->conectar();
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "SELECT
        m.MaterialNombre AS NombreMaterial,
        m.MaterialEstado AS MaterialEstado,
        m.MaterialISBN AS MaterialISBN,
        m.MaterialTiraje AS MaterialTiraje,
        m.MaterialAutor AS MaterialAutor,
        m.MaterialVersion AS MaterialVersion,
        m.MaterialEdicion AS MaterialEdicion,
        m.MaterialPaginas AS MaterialPaginas,
        a.AreaNombre AS AreaNombre,
        s.SedeNombre AS SedeNombre,
        u.UsuarioNombre AS NombreUsuario,
        u.UsuarioApaterno AS ApellidoPUsuario,
        u.UsuarioAMaterno AS ApellidoMUsuario,
        d.Descarga_Id AS Descarga_Id,
        d.DescargaFecha AS DescargaFecha,
        d.DescargaCantidad AS DescargaCantidad
      FROM descargas d
      INNER JOIN material m ON d.Material_Id = m.Material_Id
      INNER JOIN area a ON m.Area_Id = a.Area_Id
      INNER JOIN sedes s ON d.Sede_Id = s.Sede_Id
      INNER JOIN usuario u ON d.Usuario_Id = u.Usuario_Id
      WHERE d.Sede_Id = :Sede_Id
      ORDER BY d.DescargaFecha DESC;";

      $queryP = $connect->prepare($query);    
      $queryP->bindValue(":Sede_Id", $sede);
      $queryP->execute();
      $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);

      // Crear un nuevo objeto de hoja de cálculo
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setTitle("Reporte");

      $sheet->setCellValue('A1', 'Numero de Descarga');
      $sheet->setCellValue('B1', 'Sede');
      $sheet->setCellValue('C1', 'Nombre Usuario Descarga');
      $sheet->setCellValue('D1', 'Nombre Material');
      $sheet->setCellValue('E1', 'Estado Material');
      $sheet->setCellValue('F1', 'ISBN Material');
      $sheet->setCellValue('G1', 'Tiraje Material');
      $sheet->setCellValue('H1', 'Autor Material');
      $sheet->setCellValue('I1', 'Version Material');
      $sheet->setCellValue('J1', 'Edición Material');
      $sheet->setCellValue('K1', 'Paginas Material');
      $sheet->setCellValue('L1', 'Area Material');
      $sheet->setCellValue('M1', 'Fecha de Descarga ');
      $sheet->setCellValue('N1', 'Copias');

      // Escribir datos en el archivo Excel
      $row = 2;
      foreach ($resultado as $data) {
        $concatenatedValue = $data['NombreUsuario'] . ' ' . $data['ApellidoPUsuario'] . ' ' . $data['ApellidoMUsuario'];

        if($data['MaterialEstado']=='1'){
          $estadoMaterial = 'Activo';
        }else{
          $estadoMaterial = 'Inactivo';
        }

        $sheet->setCellValue('A' . $row, $data['Descarga_Id']);
        $sheet->setCellValue('B' . $row, $data['SedeNombre']);
        $sheet->setCellValue('C' . $row, $concatenatedValue);
        $sheet->setCellValue('D' . $row, $data['NombreMaterial']);
        $sheet->setCellValue('E' . $row, $estadoMaterial);
        $sheet->setCellValue('F' . $row, $data['MaterialISBN']);
        $sheet->setCellValue('G' . $row, $data['MaterialTiraje']);
        $sheet->setCellValue('H' . $row, $data['MaterialAutor']);
        $sheet->setCellValue('I' . $row, $data['MaterialVersion']);
        $sheet->setCellValue('J' . $row, $data['MaterialEdicion']);
        $sheet->setCellValue('K' . $row, $data['MaterialPaginas']);
        $sheet->setCellValue('L' . $row, $data['AreaNombre']);
        $sheet->setCellValue('M' . $row, $data['DescargaFecha']);
        $sheet->setCellValue('N' . $row, $data['DescargaCantidad']);
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

/*
    * Realiza el select de las descargas registradas en la BD que estan habilitados
    */
    public function getSedeReportDates($fecha_inicio, $fecha_fin, $sede){
      try {
        $connect = $this->connection->conectar();
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
        $query = "SELECT 
          m.MaterialNombre AS NombreMaterial,
          m.MaterialEstado AS MaterialEstado,
          m.MaterialISBN AS MaterialISBN,
          m.MaterialTiraje AS MaterialTiraje,
          m.MaterialAutor AS MaterialAutor,
          m.MaterialVersion AS MaterialVersion,
          m.MaterialEdicion AS MaterialEdicion,
          m.MaterialPaginas AS MaterialPaginas,
          a.AreaNombre AS AreaNombre,  
          s.SedeNombre AS SedeNombre, 
          u.UsuarioNombre AS NombreUsuario, 
          u.UsuarioApaterno AS ApellidoPUsuario, 
          u.UsuarioAMaterno AS ApellidoMUsuario,
          d.Descarga_Id AS Descarga_Id, 
          d.DescargaFecha AS DescargaFecha, 
          d.DescargaCantidad AS DescargaCantidad
        FROM descargas d
        INNER JOIN material m ON d.Material_Id = m.Material_Id
        INNER JOIN area a ON m.Area_Id = a.Area_Id
        INNER JOIN sedes s ON d.Sede_Id = s.Sede_Id
        INNER JOIN usuario u ON d.Usuario_Id = u.Usuario_Id
        WHERE d.DescargaFecha BETWEEN :fecha_inicio AND :fecha_fin
        AND d.Sede_Id = :Sede_Id;
        ORDER BY d.DescargaFecha";

        $queryP = $connect->prepare($query);    
        $queryP->bindValue(":fecha_inicio", $fecha_inicio);
        $queryP->bindValue(":fecha_fin", $fecha_fin);
        $queryP->bindValue(":Sede_Id", $sede);
        $queryP->execute();
        $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);
  
        // Crear un nuevo objeto de hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Reporte");
  
        $sheet->setCellValue('A1', 'Numero de Descarga');
        $sheet->setCellValue('B1', 'Sede');
        $sheet->setCellValue('C1', 'Nombre Usuario Descarga');
        $sheet->setCellValue('D1', 'Nombre Material');
        $sheet->setCellValue('E1', 'Estado Material');
        $sheet->setCellValue('F1', 'ISBN Material');
        $sheet->setCellValue('G1', 'Tiraje Material');
        $sheet->setCellValue('H1', 'Autor Material');
        $sheet->setCellValue('I1', 'Version Material');
        $sheet->setCellValue('J1', 'Edición Material');
        $sheet->setCellValue('K1', 'Paginas Material');
        $sheet->setCellValue('L1', 'Area Material');
        $sheet->setCellValue('M1', 'Fecha de Descarga ');
        $sheet->setCellValue('N1', 'Copias');

        // Escribir datos en el archivo Excel
        $row = 2;
        foreach ($resultado as $data) {
          $concatenatedValue = $data['NombreUsuario'] . ' ' . $data['ApellidoPUsuario'] . ' ' . $data['ApellidoMUsuario'];

          if($data['MaterialEstado']=='1'){
            $estadoMaterial = 'Activo';
          }else{
            $estadoMaterial = 'Inactivo';
          }

          $sheet->setCellValue('A' . $row, $data['Descarga_Id']);
          $sheet->setCellValue('B' . $row, $data['SedeNombre']);
          $sheet->setCellValue('C' . $row, $concatenatedValue);
          $sheet->setCellValue('D' . $row, $data['NombreMaterial']);
          $sheet->setCellValue('E' . $row, $estadoMaterial);
          $sheet->setCellValue('F' . $row, $data['MaterialISBN']);
          $sheet->setCellValue('G' . $row, $data['MaterialTiraje']);
          $sheet->setCellValue('H' . $row, $data['MaterialAutor']);
          $sheet->setCellValue('I' . $row, $data['MaterialVersion']);
          $sheet->setCellValue('J' . $row, $data['MaterialEdicion']);
          $sheet->setCellValue('K' . $row, $data['MaterialPaginas']);
          $sheet->setCellValue('L' . $row, $data['AreaNombre']);
          $sheet->setCellValue('M' . $row, $data['DescargaFecha']);
          $sheet->setCellValue('N' . $row, $data['DescargaCantidad']);
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


    /*
    * Realiza el select de un grupo de descargas de acuerdo a una busqueda.
    */
    public function getDownloadsReport($fecha_inicio, $fecha_fin, $sede){
      try {
          $connect = $this->connection->conectar();
          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $connect->beginTransaction();

              $query = "SELECT 
                m.MaterialNombre AS NombreMaterial,
                s.SedeNombre AS SedeNombre, 
                COUNT(*) AS Descargas
              FROM descargas d
              INNER JOIN material m ON d.Material_Id = m.Material_Id
              INNER JOIN sedes s ON d.Sede_Id = s.Sede_Id
              WHERE d.Sede_Id = :Sede_Id
              AND d.DescargaFecha BETWEEN :fecha_inicio AND :fecha_fin
              GROUP BY m.MaterialNombre;";

          $queryP = $connect->prepare($query);    
          $queryP->bindValue(":Sede_Id", $sede);
          $queryP->bindValue(":fecha_inicio", $fecha_inicio);
          $queryP->bindValue(":fecha_fin", $fecha_fin);
          $queryP->execute();
          $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);

          if(count($resultado) > 0){

            $NombreMaterial = [];
            $descargas = [];
            $SedeNombre = [];

            foreach ($resultado as $data) {
            $NombreMaterial[] = $data['NombreMaterial'];
            $descargas[] = $data['Descargas'];
            $SedeNombre = $data['SedeNombre'];
            }

            // Crear un nuevo objeto de hoja de cálculo
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle("Reporte");
      
            $sheet->setCellValue('A1', 'Sede');
            $sheet->setCellValue('B1', 'NombreMaterial');
            $sheet->setCellValue('C1', 'Descargas');
      
            // Escribir datos en el archivo Excel
            $row = 2;
            foreach ($resultado as $data) {
              $sheet->setCellValue('A' . $row, $data['SedeNombre']);
              $sheet->setCellValue('B' . $row, $data['NombreMaterial']);
              $sheet->setCellValue('C' . $row, $data['Descargas']);
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
            return ['NombreMaterial' => $NombreMaterial, 'descargas' => $descargas, 'SedeNombre' => $SedeNombre, 'downloadLink' => $downloadLink];

          }else if(sizeof($resultado) == 0){
            echo '<script language="javascript">
                    alert("No hay datos que coincidan con su busqueda");
                    window.location.href = "/inventario_dgtic/view/admin/manage-downloads.php";
                    </script>';
        }
          
        } catch (PDOException $ex) {
          echo '<script language="javascript">
          alert("Error al generar reporte dedescargas. Consulte a un administrador");
          </script>';
          echo 'Error: ' . $ex->getMessage();
          die();
        }
  }

    /*
    * Realiza el select de un grupo de descargas de acuerdo a una busqueda.
    */
    public function getCopiesReport($fecha_inicio, $fecha_fin, $sede){
      try {
          $connect = $this->connection->conectar();
          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $connect->beginTransaction();

            $query = "SELECT 
            m.MaterialNombre AS NombreMaterial, 
            s.SedeNombre AS SedeNombre, 
            SUM(d.DescargaCantidad) AS Descargas
            FROM descargas d
            INNER JOIN material m ON d.Material_Id = m.Material_Id
            INNER JOIN sedes s ON d.Sede_Id = s.Sede_Id
            WHERE d.Sede_Id = :Sede_Id
            AND d.DescargaFecha BETWEEN :fecha_inicio AND :fecha_fin
            GROUP BY m.MaterialNombre;";

          $queryP = $connect->prepare($query);    
          $queryP->bindValue(":Sede_Id", $sede);
          $queryP->bindValue(":fecha_inicio", $fecha_inicio);
          $queryP->bindValue(":fecha_fin", $fecha_fin);
          $queryP->execute();
          $resultado = $queryP->fetchAll(PDO::FETCH_ASSOC);

          if(count($resultado) > 0){

            $NombreMaterial = [];
            $descargas = [];
            $SedeNombre = [];

            foreach ($resultado as $data) {
            $NombreMaterial[] = $data['NombreMaterial'];
            $descargas[] = $data['Descargas'];
            $SedeNombre = $data['SedeNombre'];
            }

            // Crear un nuevo objeto de hoja de cálculo
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle("Reporte");
      
            $sheet->setCellValue('A1', 'Sede');
            $sheet->setCellValue('B1', 'NombreMaterial');
            $sheet->setCellValue('C1', 'Copias');
      
            // Escribir datos en el archivo Excel
            $row = 2;
            foreach ($resultado as $data) {
              $sheet->setCellValue('A' . $row, $data['SedeNombre']);
              $sheet->setCellValue('B' . $row, $data['NombreMaterial']);
              $sheet->setCellValue('C' . $row, $data['Descargas']);
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
            return ['NombreMaterial' => $NombreMaterial, 'descargas' => $descargas, 'SedeNombre' => $SedeNombre, 'downloadLink' => $downloadLink];

          }else if(sizeof($resultado) == 0){
            echo '<script language="javascript">
                    alert("No hay datos que coincidan con su busqueda");
                    window.location.href = "/inventario_dgtic/view/admin/manage-downloads.php";
                    </script>';
        }
          
        } catch (PDOException $ex) {
          echo '<script language="javascript">
          alert("Error al generar reporte dedescargas. Consulte a un administrador");
          </script>';
          echo 'Error: ' . $ex->getMessage();
          die();
        }
  }

}
?>
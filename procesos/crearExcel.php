<?php
require('../enlaces.php');
include_once '../utils/api.php';

/**
 * Este archi levanta de la bbd las encuestas y luego genera un excel
 */


require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();



$encuestaController = new EncuestaController();
$listaEncuesta = $encuestaController->getEncuestas($_POST['id']);
$i=2;

$sheet->setCellValue("A1",'Pregunta');
$sheet->setCellValue("B1",'Respuesta');
$sheet->setCellValue("C1",'Nombre');
$sheet->setCellValue("D1",'Apellido' );
$sheet->setCellValue("E1",'Email' );

if($listaEncuesta != null)
{
    foreach($listaEncuesta as $encuesta)
    {
       
        $sheet->setCellValue("A$i",$encuesta["descripcion_pregunta"]);
        $sheet->setCellValue("B$i",$encuesta["descripcion_respuesta"]);
        $sheet->setCellValue("C$i",$encuesta["nombre"]);
        $sheet->setCellValue("D$i",$encuesta["apellido"]);
        $sheet->setCellValue("E$i",$encuesta["alias"]);
        $i++;
    }
}

/**
 * Almacenamos en una variable un contador 
 * para agregarle al 
 * archivo la version del mismo
 */
$versionArchivo = 0;
if(is_dir('../reportes'))
{
    $carpeta = opendir('../reportes');
    while($archivo = readdir($carpeta))
    {
        if($archivo != '.' && $archivo != '..')
        {
            $versionArchivo ++;
        }
    }
    closedir($carpeta);
}

try
{
    $writer = new Xlsx($spreadsheet);

    $writer->save('../reportes/reporte'.$versionArchivo.'.xlsx');
}
catch(Exception $e)
{
    /**
     * EL sistema redirije al usuario a la pagina de lista de reportes 
     * y muestra el estado de la operacion
     */
    header("Location:../index.php?pagina=reporte&operacion=error&id=".$_POST['id']);
    die();

}
/**
 * EL sistema redirije al usuario a la pagina de lista de reportes 
 * y muestra el estado de la operacion
 */
header("Location:../index.php?pagina=reporte&operacion=exito&id=".$_POST['id']);
die();
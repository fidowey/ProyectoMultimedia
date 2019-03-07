<?php 
	require_once '../excel/Classes/PHPExcel.php';
	require_once'../model/bd.php';

	$consulta1=selecttodosvisitantes();
	$fila =2;
	$excel= new PHPExcel();
	$excel -> getProperties() ->setCreator("voy al baño")
	->setDescription("Reporte de visitantes");

	$excel->setActiveSheetIndex(0);
	$excel->getActiveSheet() ->setTitle("Visitantes");
	$excel->getActiveSheet() ->setCellValue('A1','Codigo de visitante');
	$excel->getActiveSheet() ->setCellValue('B1','Rut');
	$excel->getActiveSheet() ->setCellValue('C1','Digito verificador');
	$excel->getActiveSheet() ->setCellValue('D1','Nombre');
	$excel->getActiveSheet() ->setCellValue('E1','Apeliido paterno');
	$excel->getActiveSheet() ->setCellValue('F1','Apellido materno');
	$excel->getActiveSheet() ->setCellValue('G1','Telefono');
	$excel->getActiveSheet() ->setCellValue('H1','Sexo');
	$excel->getActiveSheet() ->setCellValue('I1','Edad');
	$excel->getActiveSheet() ->setCellValue('J1','Fecha de nacimiento');
	$excel->getActiveSheet() ->setCellValue('K1','Email');

	while ($row = $consulta1->fetch_assoc()) {
		$excel->getActiveSheet() ->setCellValue('A'.$fila, $row['cod_vis']);
		$excel->getActiveSheet() ->setCellValue('B'.$fila, $row['rut_vis']);
		$excel->getActiveSheet() ->setCellValue('C'.$fila,$row['dv_vis']);
		$excel->getActiveSheet() ->setCellValue('D'.$fila,$row['nombre_vis']);
		$excel->getActiveSheet() ->setCellValue('E'.$fila,$row['appat_vis']);
		$excel->getActiveSheet() ->setCellValue('F'.$fila,$row['apmat_vis']);
		$excel->getActiveSheet() ->setCellValue('G'.$fila,$row['telefono_vis']);
		$excel->getActiveSheet() ->setCellValue('H'.$fila,$row['sexo_vis']);
		$excel->getActiveSheet() ->setCellValue('I'.$fila,$row['edad_vis']);
		$excel->getActiveSheet() ->setCellValue('J'.$fila,$row['fechnacvis']);
		$excel->getActiveSheet() ->setCellValue('K'.$fila,$row['dir_vis']);

		$fila++;
	}
	header("Content-type:application/vnd.openxmlformats-officedocument.spreadshhetml.sheet");
	header('Content-Disposition: attachment;filename="Visitantes.xlsx"');
	header('Cache-Control: max-age=0');
	$excelWriter= new PHPExcel_Writer_Excel2007($excel);
	$excelWriter->save('php://output');	
?>
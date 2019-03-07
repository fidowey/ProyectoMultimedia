<?php 
	require_once '../excel/Classes/PHPExcel.php';
	require_once'../model/bd.php';

	$consulta1=selecttodostrabajadores();
	$fila =2;
	$excel= new PHPExcel();
	$excel -> getProperties() ->setCreator("voy al baño") ->setDescription("Reporte de funcionarios");

	$excel->setActiveSheetIndex(0);
	$excel->getActiveSheet() ->setTitle("funcionarios");
	$excel->getActiveSheet() ->setCellValue('A1','Rut');
	$excel->getActiveSheet() ->setCellValue('B1','Digito verificador');
	$excel->getActiveSheet() ->setCellValue('C1','Nombre');
	$excel->getActiveSheet() ->setCellValue('D1','Apeliido paterno');
	$excel->getActiveSheet() ->setCellValue('E1','Apellido materno');
	$excel->getActiveSheet() ->setCellValue('F1','Privilegio');
	$excel->getActiveSheet() ->setCellValue('G1','Telefono');
	$excel->getActiveSheet() ->setCellValue('H1','Estado');
	$excel->getActiveSheet() ->setCellValue('I1','Cargo');
	$excel->getActiveSheet() ->setCellValue('J1','Email');

	while ($row = $consulta1->fetch_assoc()) {
		$excel->getActiveSheet() ->setCellValue('A'.$fila, $row['rut_func']);
		$excel->getActiveSheet() ->setCellValue('B'.$fila, $row['dv_func']);
		$excel->getActiveSheet() ->setCellValue('C'.$fila,$row['nombre_func']);
		$excel->getActiveSheet() ->setCellValue('D'.$fila,$row['appat_func']);
		$excel->getActiveSheet() ->setCellValue('E'.$fila,$row['apmat_func']);
		$excel->getActiveSheet() ->setCellValue('F'.$fila,$row['privilegio']);
		$excel->getActiveSheet() ->setCellValue('G'.$fila,$row['telefono_func']);
		$excel->getActiveSheet() ->setCellValue('H'.$fila,$row['estado_func']);
		$excel->getActiveSheet() ->setCellValue('I'.$fila,$row['id_cargo']);
		$excel->getActiveSheet() ->setCellValue('J'.$fila,$row['email_func']);

		$fila++;
	}
	header("Content-type:application/vnd.openxmlformats-officedocument.spreadshhetml.sheet");
	header('Content-Disposition: attachment;filename="Funcionarios.xlsx"');
	header('Cache-Control: max-age=0');
	$excelWriter= new PHPExcel_Writer_Excel2007($excel);
	$excelWriter->save('php://output');	
?>
<?php 
require_once "../modelos/Asistencia.php";
if (strlen(session_id())<1) 
	session_start();

$asistencia=new Asistencia();

$codigo_persona=isset($_POST["codigo_persona"])? limpiarCadena($_POST["codigo_persona"]):"";
$iddepartamento=isset($_POST["iddepartamento"])? limpiarCadena($_POST["iddepartamento"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		$result = $asistencia->verificarcodigo_persona($codigo_persona);

      	if($result > 0) {
			date_default_timezone_set('America/La_Paz');
      		$fecha = date("Y-m-d");
			//$hora = date("H:i:s");
			$tipousuario = $result['idtipousuario'];
			$result2 = $asistencia->seleccionarcodigo_persona($codigo_persona);
			
     		$par = abs($result2%2);

          if ($par == 0){ 
                              
        		$rspta=$asistencia->registrar_entrada($codigo_persona,$tipousuario);
    			//$movimiento = 0;
    			echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].' '.$result['apellidos'].'</h3><div class="alert alert-success"> Ingreso registrado '.$hora.'</div>' : 'No se pudo registrar el ingreso';
   		  }else{ 
             
         		$rspta=$asistencia->registrar_salida($codigo_persona);
     			//$movimiento = 1;
     			echo $rspta ? '<h3><strong>Nombres: </strong> '. $result['nombre'].' '.$result['apellidos'].'</h3><div class="alert alert-danger"> Salida registrada '.$hora.'</div>' : 'No se pudo registrar la salida';             
        } 
        }else{
		         echo '<div class="alert alert-danger">
                       <i class="icon fa fa-warning"></i> No hay empleado registrado con esa código...!
                         </div>';
        }
	break;

	case 'mostrar':
		$rspta=$asistencia->mostrar($idasistencia);
		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta = $asistencia->listar();
		//declaramos un array
		$data = Array();

		while ($reg = $rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>',
				"1"=>$reg->codigo_persona,
				"2"=>$reg->fecha,
				"3"=>$reg->nombre,
				"4"=>$reg->apellidos,
				"5"=>$reg->deudas,
				"6"=>$reg->observaciones
			);
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
	break;

	case 'listaru':
    	$idusuario=$_SESSION["idusuario"];
		$rspta = $asistencia->listaru($idusuario);
		//declaramos un array
		$data=Array();
		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>',
				"1" => $reg->codigo_persona,
				"2" => $reg->fecha,
				"3" => $reg->hora_ingreso,
				"4" => $reg->hora_salida,
				"5" => $reg->deudas,
				"6" => $reg->observaciones
				);
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
	break;

	case 'listar_asistencia':
    $fecha_inicio = $_REQUEST["fecha_inicio"];
    $fecha_fin = $_REQUEST["fecha_fin"];
    $codigo_persona=$_REQUEST["idcliente"]; 
		$rspta=$asistencia->listar_asistencia($fecha_inicio,$fecha_fin,$codigo_persona);
		//declaramos un array
		$data=Array();


		while ($reg = $rspta->fetch_object()) {
			$data[]=array(
				
				"0"=>$reg->nombre,
				"1"=>$reg->fecha,
				"2"=>$reg->hora_ingreso,
				"3"=>$reg->hora_salida,
				"4"=>$reg->codigo_persona
				);
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

	break;
	case 'listar_asistenciau':
    $fecha_inicio=$_REQUEST["fecha_inicio"];
    $fecha_fin=$_REQUEST["fecha_fin"];
    $codigo_persona=$_SESSION["codigo_persona"]; 
		$rspta=$asistencia->listar_asistencia($fecha_inicio,$fecha_fin,$codigo_persona);
		//declaramos un array
		$data=Array();


		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				//"0"=>$reg->fecha,
				"0"=>$reg->nombre,
				"1"=>$reg->fecha,
				"2"=>$reg->hora_ingreso,
				"3"=>$reg->hora_salida,
				"4"=>$reg->codigo_persona,
				"5"=>$reg->turno,
				"6"=>$reg->deuda
				);
		}

		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

	break;

		case 'selectPersona':
			require_once "../modelos/Usuario.php";
			$usuario=new Usuario();
			
			$rspta=$usuario->listar();
			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->codigo_persona.'>'.$reg->nombre.' '.$reg->apellidos.'</option>';
			}
			break;
}
?>
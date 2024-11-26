<?php 
//incluir la conexion de base de datos
require "../admin/config/Conexion.php";
class Asistencia{
//implementamos nuestro constructor
public function __construct(){

}

public function verificarcodigo_persona($codigo_persona){
	$sql = "SELECT * FROM usuarios WHERE codigo_persona = '$codigo_persona'";
	return ejecutarConsultaSimpleFila($sql);
}

public function seleccionarcodigo_persona($codigo_persona){
	date_default_timezone_set('America/La_Paz');
	$fecha = date("Y-m-d");
    $sql = "SELECT * FROM asistencia WHERE codigo_persona = '$codigo_persona' and fecha = '$fecha'";
	return ejecutarConsulta($sql);
}

public function registrar_entrada($codigo_persona, $tipousuario){
	date_default_timezone_set('America/La_Paz');
	$fecha = date("Y-m-d");
	$hora1 = "07:00:00";
	 
	//$hora1 = date("H:i:s");
	//vendedor 1
	//vendedor 2
	//pasante 13 3

	if ($tipousuario == 1) {
		if ($hora1 >= "06:00:00" and $hora1 <= "13:00:00") {
			$turno = "Mañana";
			if ($hora1 >= "06:00:00" && $hora1 <= "08:00:59") {
				$observaciones = 'Venta';
				$deuda = 0;
			}
			if ($hora1 <= "09:00:00") {
				$observaciones = "";
				$hora1 = "09:00:00";
				$deuda = 0;
			}
			if ($hora1 <= "09:10:59") {
				$observaciones = "";
				$deuda = 0;
			}
			if ($hora1 >= "09:11:00" and $hora1 <= "09:15:59") {
				$observaciones = "";
				$deuda = 1;
			}
			if ($hora1 >= "09:16:00" and $hora1 <= "09:30:59") {
				$observaciones = "";
				$deuda = 2;
			}
			if ($hora1 >= "09:31:00" and $hora1 <= "10:00:59") {
				$observaciones = "";
				$deuda = 3;
			}
			if ($hora1 >= "10:01:00" and $hora1 <= "13:00:59") {
				$observaciones = "";
				$deuda = 5;
			}
		}else{
			if ($hora1 >= "13:01:00" and $hora1 <= "18:00:59") {
				$turno = "Tarde";
				if ($hora1 <= "14:00:00") {
					$hora1 = "14:00:00";
					$deuda = 0;
				}
				if ($hora1 <= "14:10:59") {
					$deuda = 0;
				}
				if ($hora1 >= "14:11:00" and $hora1 <= "14:15:59") {
					$deuda = 1;
				}
				if ($hora1 >= "14:16:00" and $hora1 <= "14:30:59") {
					$deuda = 2;
				}
				if ($hora1 >= "14:31:00" and $hora1 <= "15:00:59") {
					$deuda = 3;
				}
				if ($hora1 >= "15:01:00" and $hora1 <= "18:00:59") {
					$deuda = 5;
				}
			}
		}
	}

	if ($tipousuario == 2) {
		if ($hora1 >= "06:00:00" and $hora1 <= "12:00:00") {
			$turno = "Mañana";
			if ($hora1 <= "07:40:00") {
				$deuda = 0;
			}
			if ($hora1 >= "07:40:01" and $hora1 <= "07:45:59") {
				$deuda = 3;
			}
			if ($hora1 >= "07:46:00" and $hora1 <= "07:50:59") {
				$deuda = 5;
			}
			if ($hora1 >= "07:51:00" and $hora1 <= "07:55:59") {
				$deuda = 10;
			}
		}else{
			if ($hora1 >= "14:30:00" and $hora1 <= "20:00:00") {
				$tipo = "Tarde";
				if ($hora1 <= "15:40:00") {
					$deuda = 0;
				}
				if ($hora1 >= "15:40:01" and $hora1 <= "15:45:59") {
					$deuda = 3;
				}
				if ($hora1 >= "15:46:00" and $hora1 <= "15:50:59") {
					$deuda = 5;
				}
				if ($hora1 >= "15:51:00" and $hora1 <= "15:55:59") {
					$deuda = 10;
				}
			}
		}
	}
	//pasante 13 3
	//pasante 13 4
	if ($tipousuario == 3 || $tipousuario == 4) {
		if ($hora1 >= "06:00:00" and $hora1 <= "13:00:00") {
			$turno = "Mañana";
			if ($hora1 >= "06:00:00" && $hora1 <= "08:00:59") {
				$observaciones = "Ventas";
				$deuda = 0;
			}
			if ($hora1 >= "08:01:00" && $hora1 <= "09:00:00") {
				$hora1 = "09:00:00";
				$deuda = 0;
			}
			if ($hora1 <= "09:10:59") {
				$deuda = 0;
			}
			if ($hora1 >= "09:11:00" and $hora1 <= "09:15:59") {
				$deuda = 1;
			}
			if ($hora1 >= "09:16:00" and $hora1 <= "09:30:59") {
				$deuda = 2;
			}
			if ($hora1 >= "09:31:00" and $hora1 <= "10:00:59") {
				$deuda = 3;
			}
			if ($hora1 >= "10:01:00" and $hora1 <= "13:00:59") {
				$deuda = 5;
			}
		}else{
			if ($hora1 >= "13:01:00" and $hora1 <= "18:00:59") {
				$turno = "Tarde";
				if ($hora1 <= "14:00:00") {
					$hora1 = "14:00:00";
					$deuda = 0;
				}
				if ($hora1 <= "14:10:59") {
					$deuda = 0;
				}
				if ($hora1 >= "14:11:00" and $hora1 <= "14:15:59") {
					$deuda = 1;
				}
				if ($hora1 >= "14:16:00" and $hora1 <= "14:30:59") {
					$deuda = 2;
				}
				if ($hora1 >= "14:31:00" and $hora1 <= "15:00:59") {
					$deuda = 3;
				}
				if ($hora1 >= "15:01:00" and $hora1 <= "18:00:59") {
					$deuda = 5;
				}
			}
		}
	}
	$sql = "INSERT INTO asistencia (codigo_persona, fecha, hora_ingreso, turno, tipousuario ,deudas ,observaciones) VALUES ('$codigo_persona', '$fecha','$hora1', '$turno','$tipousuario','$deuda','$observaciones')";
	return ejecutarConsulta($sql);
}

public function registrar_salida($codigo_persona){
	date_default_timezone_set('America/La_Paz');
	$fecha = date("Y-m-d");
	$hora2 = date("H:i:s");
 	$sql = "UPDATE asistencia SET hora_salida = '$hora2' WHERE codigo_persona = '$codigo_persona' and fecha = '$fecha'";
    return ejecutarConsulta($sql);
}

//listar registros
	public function listar(){
		$sql = "SELECT * FROM asistencia";
		return ejecutarConsulta($sql);
	}
}
 ?>

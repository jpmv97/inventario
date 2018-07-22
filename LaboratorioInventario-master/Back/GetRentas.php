<?php

$db = new mysqli("localhost", "root", "", "laboratorios");
$db->set_charset("utf8");
$datos = array();
$sql = "SELECT fechaRenta, r.cantidad, p.nombre, u.nombre usuario from renta r, producto p, usuario u where r.fkProducto = p.idProducto and r.fkUsuario = u.idUsuario";
	if(!$result = $db->query($sql)){
		die('{"err":' . $db->error . '}');
	}else{
		while($row = $result->fetch_assoc()){
		    $datos[] = $row;
		}
		$result->free();
}
echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
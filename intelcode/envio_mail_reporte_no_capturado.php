<?php 
include "fnEnviarCorreo.php";
if(!$link=mysql_connect("148.208.225.15","root","danae")){
	echo "Error al conectar con la base de datos";
}
$sql="show databases";
$dtaBases=mysql_query($sql,$link);
while($dtaBase=mysql_fetch_row($dtaBases)) {
	$dtaBase_connect=mysql_select_db($dtaBase[0]);
	$sql="show tables like 'usuarios'";
	$tables=mysql_query($sql,$link);
	while($row=mysql_fetch_array($tables)){
		echo $dtaBase[0]."<br>";
		select_contrato($link);
   	}
 }
mysql_close; 
function select_contrato($link){
	$sql="SELECT contratos.sContrato, usuarios.sIdUsuario, usuarios.sNombre, usuarios.sMail, ordenesdetrabajo.sNumeroOrden FROM (contratosxusuario INNER JOIN usuarios ON usuarios.sIdUsuario=contratosxusuario.sIdUsuario) INNER JOIN (contratos INNER JOIN ordenesdetrabajo on contratos.sContrato=ordenesdetrabajo.sContrato) ON contratosxusuario.sContrato=contratos.sContrato";
	$query=mysql_query($sql,$link);
	while($rows=mysql_fetch_array($query)){
		$msj="<br><b>Contrato:</b> ".$rows['sContrato']."<br>
			<b>Usuario:</b> ".$rows['sIdUsuario']."<br>
			<b>Numero de Orden</b>: ".$rows['sNumeroOrden']."<br><br>
			Por favor no responda a este correo...<br>
			Este e-mail fue generado atomaticamente por el sistema de intel-code, para informarle lo siguiente:<br><br>
			los reportes diarios listados a continuacion aun no han sido creados:<br><br>";
		if($rows['sMail']){
			for($i=2;$i<=4;$i++){
				$dia=mktime(0, 0, 0, date("m"), date("d")-$i, date("Y"));
				$fecha=date("Y-m-d",$dia);
			   $sql="SELECT sContrato, dIdFecha, sNumeroOrden, sIdTurno, sIdConvenio FROM reportediario WHERE sContrato='".$rows['sContrato']."' AND dIdFecha='".$fecha."'";
				$query2=mysql_query($sql,$link);
				if(!$rows2=mysql_fetch_array($query2)){
					$li="Reporte Diario de la fecha: ".$fecha."<br>";
					$lista=$lista.$li;
				}
			}
			$msj=$msj.$lista."<br>Lo exortamos a ralizar los reportes diarios faltantes, ya que si los reportes diarios exceden el numero maximo de faltantes, el sistema podria bloquear la creacion de nuevos reportes<br>";
			$lista="";
			$li="";
			$subject=$rows['sContrato'].", Reporte Diario";
			enviarCorreo($rows["sMail"],$msj,$subject,$mail = new phpmailer() );
		}
	}
}
?>
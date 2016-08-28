<?php
require("../../../../include/mysql.inc.php");
require("../jornadas/functions.php");
//echo "<br>".SumarHoras("02:00","01:00");
//echo "<br>".RestarHoras("04:10","04:51");
#parametros
#Total de Personal, Total del Frente, Personal Afectado, Fecha, Hora Inicio, Hora Final, Tiemp Comida
//echo "<br> 1: ".sTiempoMuerto( 12, 3, 2,"2007-06-13","09:00","12:00","00:00","428236843","428236843" );
echo "<br> 1: ". sTiempoMuertoIri("07:00",12,3,1 );
//echo "<br> 2: ".sTiempoMuerto( 12, 3, 1,"2007-06-13","09:00","13:00","00:00","428236843","428236843" );

//echo "<br> 3: ".sTiempoInactivo( 12, 3, 1,"09:00","10:00","00:00" );
?>
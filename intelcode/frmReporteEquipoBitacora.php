<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("mysql.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class frmReporteEquipoBitacora extends Page
        {
               public $cboEquipo = null;
               public $Label5 = null;
               public $sFormato = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Button1 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $DateTimePicker2 = null;
               public $DateTimePicker1 = null;
               public $Panel1 = null;
               function cboEquipoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               
               <?php

               }

               function cboEquipoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
               
               <?php

               }

               function cboEquipoJSBlur($sender, $params)
               {
               
               ?>
               //Add your javascript code here
               
               <?php

               }

               function frmReporteEquipoBitacoraBeforeShow($sender, $params)
               {
                  $this->DateTimePicker1->setText(date("d/m/Y"));
                  $this->DateTimePicker2->setText(date("d/m/Y"));
                  $sql = "select sIdPozo,sDescripcion from pozos order by sDescripcion";
                  $rs = mysql_query($sql);

                  while($row = mysql_fetch_array($rs))
                  {
                       $Equipos[$row['sIdPozo']] = $row['sDescripcion'];
                  }
                  $this->cboEquipo->setItems($Equipos);

               }

               function Button1JSClick($sender, $params)
               {
               global $sContrato;
               ?>

                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&dFechaInicio=" + document.getElementById("f-calendar-field-1").value;
                  ruta = ruta + "&dFechaFin=" + document.getElementById("f-calendar-field-2").value;
                  ruta = ruta + "&sFormato=" + document.getElementById("sFormato").value;
                  ruta = ruta + "&cboEquipo=" + document.getElementById("cboEquipo").value;
                  ruta = ruta + "&nombreReporte=rptEquipoxOrden";
                  ruta = ruta + "&reportesPath=equipoxorden";
                  var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                  return false;
               
               <?php

               }

               function dumpJavascript()
               {      echo 'function ResaltarBotones()
                      {
                          document.getElementById("cboEquipo").style.backgroundColor = "";
                          document.getElementById("f-calendar-field-2").style.backgroundColor = "";
                          document.getElementById("f-calendar-field-2").style.backgroundColor = "";
                          document.getElementById("sFormato").style.backgroundColor = "";
                          document.getElementById("Button1").style.backgroundColor = "";
                          return false;
                      }';
               }

        }

        global $application;

        global $frmReporteEquipoBitacora;

        //Creates the form
        $frmReporteEquipoBitacora=new frmReporteEquipoBitacora($application);

        //Read from resource file
        $frmReporteEquipoBitacora->loadResource(__FILE__);

        //Shows the form
        $frmReporteEquipoBitacora->show();

?>
<script>
ResaltarBotones();
</script>

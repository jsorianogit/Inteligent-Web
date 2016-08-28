<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require("mysql.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("db.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class frmRelacionPersonalEquipo extends Page
        {
               public $Button1 = null;
               public $mObservacion = null;
               public $dFinHorometraje = null;
               public $GridRelacion = null;
               public $Label7 = null;
               public $Label6 = null;
               public $dInicioHorometraje = null;
               public $Label5 = null;
               public $GroupBox1 = null;
               public $Label2 = null;
               public $sNombrePersonal = null;
               public $sIdPersonal = null;
               public $sIdEquipo = null;
               public $hsIdPersonal = null;
               public $hsIdEquipo = null;
               public $hsNumeroReporte = null;
               public $hdIdFecha = null;
               public $hsIdTurno = null;
               public $hsIdConvenio = null;
               public $hsNumeroOrden = null;
               public $hsContrato = null;
               public $db = null;
               public $Query1 = null;
               public $Datasource1 = null;
               public $Memo1 = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $Label1 = null;
               public $HiOpcion = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Panel1 = null;
               function Button1JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                   //document.location.href="Modulos/preciounitario/actividadesdiarias/reportediario/index.php";
                   document.location.href="frmReporteDiario.php";
                   return false;               
               <?php

               }

               function cmdEliminarClick($sender, $params)
               {

                $sIdEquipo = $this->hsIdEquipo->Value;
                $sIdPersonal = $this->hsIdPersonal->Value;
                $sql = "delete from a_relacionpersonalequipo where
                                sContrato='".$this->hsContrato->Value."' and
                                dIdFecha='".$this->hdIdFecha->Value."' and
                                sNumeroOrden='".$this->hsNumeroOrden->Value."' and
                                sIdTurno='".$this->hsIdTurno->Value."' and
                                sIdConvenio='".$this->hsIdConvenio->Value."' and
                                sNumeroReporte='".$this->hsNumeroReporte->Value."' and
                                sIdEquipo='$sIdEquipo' and
                                sIdPersonal='$sIdPersonal'";
                mysql_query($sql);
                if(mysql_error()){
                        $this->Memo1->Text = mysql_error();
                }else{
                        $this->Memo1->Text = "";
                }
                $this->Query1->setActive(false);
                $this->Query1->setFilter(
                          " sContrato='".$this->hsContrato->Value."'
                          and sNumeroOrden='".$this->hsNumeroOrden->Value."'
                          and sIdConvenio='".$this->hsIdConvenio->Value."'
                          and dIdFecha='".$this->hdIdFecha->Value."'
                          and sNumeroReporte='".$this->hsNumeroReporte->Value."'
                          and sIdTurno='".$this->hsIdTurno->Value."'"
                );
                $this->Query1->setActive(true);


               }

               function cmdAceptarClick($sender, $params)
               {
                $sIdEquipo = $this->sIdEquipo->ItemIndex;
                $sIdPersonal = $this->sIdPersonal->ItemIndex;
                $osIdEquipo = $this->hsIdEquipo->Value;
                $osIdPersonal = $this->hsIdPersonal->Value;
                $sNombrePersonal = strtoupper($this->sNombrePersonal->getText());
                $dInicioHorometraje = $this->dInicioHorometraje->getText();
                $dFinHorometraje = $this->dFinHorometraje->getText();
                $mObservacion = strtoupper($this->mObservacion->Text);
                if($this->HiOpcion->Value=="agregar"){
                        $sql= "insert into a_relacionpersonalequipo set
                                sContrato='".$this->hsContrato->Value."',
                                dIdFecha='".$this->hdIdFecha->Value."',
                                sNumeroOrden='".$this->hsNumeroOrden->Value."',
                                sIdTurno='".$this->hsIdTurno->Value."',
                                sIdConvenio='".$this->hsIdConvenio->Value."',
                                sNumeroReporte='".$this->hsNumeroReporte->Value."',
                                sIdEquipo='$sIdEquipo',
                                sIdPersonal='$sIdPersonal',
                                sNombrePersonal='$sNombrePersonal',
                                dInicioHorometraje='$dInicioHorometraje',
                                dFinHorometraje='$dFinHorometraje',
                                mObservacion='$mObservacion'";
                }else{
                        $sql= "update a_relacionpersonalequipo set
                                sIdEquipo='$sIdEquipo',
                                sIdPersonal='$sIdPersonal',
                                sNombrePersonal='$sNombrePersonal',
                                dInicioHorometraje='$dInicioHorometraje',
                                dFinHorometraje='$dFinHorometraje',
                                mObservacion='$mObservacion' where
                                sContrato='".$this->hsContrato->Value."' and
                                dIdFecha='".$this->hdIdFecha->Value."' and
                                sNumeroOrden='".$this->hsNumeroOrden->Value."' and
                                sIdTurno='".$this->hsIdTurno->Value."' and
                                sIdConvenio='".$this->hsIdConvenio->Value."' and
                                sNumeroReporte='".$this->hsNumeroReporte->Value."' and
                                sIdEquipo='$osIdEquipo' and
                                sIdPersonal='$osIdPersonal'";
                }
                mysql_query($sql);
                if(mysql_error()){
                        $this->Memo1->Text = mysql_error();
                }else{
                        $this->Memo1->Text = "";
                }

                $this->Query1->setActive(false);
                $this->Query1->setFilter(
                          " sContrato='".$this->hsContrato->Value."'
                          and sNumeroOrden='".$this->hsNumeroOrden->Value."'
                          and sIdConvenio='".$this->hsIdConvenio->Value."'
                          and dIdFecha='".$this->hdIdFecha->Value."'
                          and sNumeroReporte='".$this->hsNumeroReporte->Value."'
                          and sIdTurno='".$this->hsIdTurno->Value."'"
                );
                $this->Query1->setActive(true);
                }

               function frmRelacionPersonalEquipoBeforeShow($sender, $params)
               {
                  global $sContrato,$_REQUEST;
                  global $_SESSION,$Usuario,$Clave,$Servidor;


                        $this->db->setConnected(false);
                        $this->db->setDatabaseName($_SESSION['database']);
                        $this->db->setUserName($Usuario);
                        $this->db->setUserPassword($Clave);
                        $this->db->setHost($Servidor);
                        $this->db->setConnected(true);

                        if(isset($_REQUEST["sContrato"]) and $_REQUEST["sContrato"]!="")
                                $this->hsContrato->Value = $_REQUEST["sContrato"] ;/*'425027849';*/
                        if(isset($_REQUEST["sNumeroOrden"]) and $_REQUEST["sNumeroOrden"]!="")
                                $this->hsNumeroOrden->Value=$_REQUEST["sNumeroOrden"];/*'JAGUARIN';*/
                        if(isset($_REQUEST["sIdTurno"]) and $_REQUEST["sIdTurno"]!="")
                                $this->hsIdTurno->Value=$_REQUEST["sIdTurno"];/*'A';*/
                        if(isset($_REQUEST["sNumeroReporte"]) and $_REQUEST["sNumeroReporte"]!="")
                                $this->hsNumeroReporte->Value=$_REQUEST["sNumeroReporte"];/*'JAGUARIN-052';*/
                        if(isset($_REQUEST["dIdFecha"]) and $_REQUEST["dIdFecha"]!="")
                                $this->hdIdFecha->Value=$_REQUEST["dIdFecha"];/*'2008-04-30';*/
                        if(isset($_REQUEST["sIdConvenio"]) and $_REQUEST["sIdConvenio"]!="")
                                $this->hsIdConvenio->Value=$_REQUEST["sIdConvenio"];/*'AC-01';*/



                        $this->Query1->setActive(false);
                        $this->Query1->setFilter(
                                " sContrato='".$this->hsContrato->Value."'
                                and sNumeroOrden='".$this->hsNumeroOrden->Value."'
                                and sIdConvenio='".$this->hsIdConvenio->Value."'
                                and dIdFecha='".$this->hdIdFecha->Value."'
                                and sNumeroReporte='".$this->hsNumeroReporte->Value."'
                                and sIdTurno='".$this->hsIdTurno->Value."'"
                        );
                        $this->Query1->setActive(true);

                        #llenar combo de equipos
                        $sql="select sIdEquipo,sDescripcion from equipos where sContrato='".$this->hsContrato->Value."'";
                        $rs=mysql_query($sql);
                        unset($it);
                        while($row = mysql_fetch_array($rs)){
                             $it[$row["sIdEquipo"]]=$row["sDescripcion"];
                        }
                        $this->sIdEquipo->setItems($it);

                        #llenar combo de personal
                        $sql="select sIdPersonal,sDescripcion from personal where sContrato='".$this->hsContrato->Value."'";
                        $rs=mysql_query($sql);
                        unset($it);
                        while($row = mysql_fetch_array($rs)){
                             $it[$row["sIdPersonal"]]=$row["sDescripcion"];
                        }
                        $this->sIdPersonal->setItems($it);

               }

               function GridRelacionJSClick($sender, $params)
               {

               ?>
                    GridRelacion.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                              var Tabla      = GridRelacion.getTableModel();
                              document.getElementById("sIdEquipo").value = Tabla.getValue(0, index);
                              document.getElementById("sIdPersonal").value =Tabla.getValue(1, index);
                              document.getElementById("hsIdEquipo").value = Tabla.getValue(0, index);
                              document.getElementById("hsIdPersonal").value =Tabla.getValue(1, index);
                              document.getElementById("sNombrePersonal").value = Tabla.getValue(2, index);
                              document.getElementById("dInicioHorometraje").value = Tabla.getValue(3, index);
                              document.getElementById("dFinHorometraje").value = Tabla.getValue(4, index);
                              document.getElementById("mObservacion").value = Tabla.getValue(5, index);
                         }
                    );
                    deshabilitar(true);
                    return false;

               <?php

               }

               function cmdImprimirJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
               
               <?php

               }

               function cmdCancelarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
               deshabilitar(true);
               return false;
               <?php

               }



               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
               if(confirm("Realmente desea eliminar ese registro ??!")){
                        return true;
               }else{
                        return false;
               }
               <?php

               }

               function cmdModificarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    deshabilitar(false);
                    document.getElementById("HiOpcion").value="modificar";
                    return false;
               <?php

               }

               function cmdAgregarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    deshabilitar(false);
                    document.getElementById("HiOpcion").value="agregar";
                    return false;
               <?php

               }
               function dumpJavascript(){
                echo "
                        function deshabilitar(si){
                          document.getElementById('cmdAgregar').disabled=!si;
                          document.getElementById('cmdModificar').disabled=!si;
                          document.getElementById('cmdEliminar').disabled=!si;
                          document.getElementById('cmdAceptar').disabled=si;
                          document.getElementById('cmdCancelar').disabled=si;
                          document.getElementById('cmdImprimir').disabled=!si;

                          document.getElementById('sIdEquipo').disabled=si;
                          document.getElementById('sIdPersonal').disabled=si;
                          document.getElementById('sNombrePersonal').disabled=si;
                          document.getElementById('dInicioHorometraje').disabled=si;
                          document.getElementById('dFinHorometraje').disabled=si;
                          document.getElementById('mObservacion').disabled=si;
                        }
                ";
               }
        }

        global $application;

        global $frmRelacionPersonalEquipo;

        //Creates the form
        $frmRelacionPersonalEquipo=new frmRelacionPersonalEquipo($application);

        //Read from resource file
        $frmRelacionPersonalEquipo->loadResource(__FILE__);

        //Shows the form
        $frmRelacionPersonalEquipo->show();

?>
<script>
deshabilitar(true);
</script>

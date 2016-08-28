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
        class frmMedidasxviaje extends Page
        {
               public $Memo1 = null;
               public $txtMedida = null;
               public $GridMedidas = null;
               public $db = null;
               public $Query1 = null;
               public $Datasource1 = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $Label1 = null;
               public $HiOpcion = null;
               public $HiConsecutivo = null;
               public $txtDescripcion = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Panel1 = null;
               function frmMedidasxviajeBeforeShow($sender, $params)
               {
                  global $sContrato,$_REQUEST;
                  global $_SESSION,$Usuario,$Clave,$Servidor;


                        $this->db->setConnected(false);
                        $this->db->setDatabaseName($_SESSION['database']);
                        $this->db->setUserName($Usuario);
                        $this->db->setUserPassword($Clave);
                        $this->db->setHost($Servidor);
                        $this->db->setConnected(true);

                        $this->Query1->setActive(false);
                        $this->Query1->setActive(true);


               }

               function txtMedidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMedidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMedidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtDescripcionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminarClick($sender, $params)
               {
                $iIdMedida=$this->HiConsecutivo->Value;
                $sql = "delete from a_medidasxviaje where iIdMedida  ='$iIdMedida'";
                mysql_query($sql);
                if(mysql_error()){
                        $this->Memo1->Text = mysql_error();
                }else{
                        $this->Memo1->Text="";
                }
                $this->Query1->setActive(false);
                $this->Query1->setActive(true);
               }

               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
               deshabilitar(true);
               if(!confirm("Desea eliminar el registro " + document.getElementById("HiConsecutivo").value)){
                   return false;
               }else{
                   return true;
               }

               <?php

               }

               function cmdImprimirJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
               deshabilitar(true);
               return false;
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

               function cmdAceptarClick($sender, $params)
               {
                        $iIdMedida = 1;
                        $sqli = "select max(iIdMedida)as iIdMedida from a_medidasxviaje";
                        $rs = mysql_query($sqli);
                        if($row = mysql_fetch_array($rs)){
                                $iIdMedida = $row['iIdMedida'] + 1;
                        }
                        $dUnidad = $this->txtMedida->getText();
                        $mDescripcion = strtoupper($this->txtDescripcion->getText());
                        if($this->HiOpcion->Value=="agregar"){
                              $sql = "insert into a_medidasxviaje set
                                      iIdMedida='$iIdMedida',
                                      dUnidad='$dUnidad',
                                      mDescripcion='$mDescripcion'";
                        }else if($this->HiOpcion->Value=="modificar"){
                              $iIdMedida=$this->HiConsecutivo->Value;
                              $sql = "insert into a_medidasxviaje set
                                      iIdMedida='$iIdMedida',
                                      dUnidad='$dUnidad',
                                      mDescripcion='$mDescripcion'
                                      on duplicate key update
                                      dUnidad='$dUnidad',
                                      mDescripcion='$mDescripcion'";
                        }
                        mysql_query($sql);
                        if(mysql_error()){
                               $this->Memo1->Text=mysql_error();
                        }else{
                               $this->Memo1->Text="";
                        }
                        $this->Query1->setActive(false);
                        $this->Query1->setActive(true);

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

               function GridMedidasJSClick($sender, $params)
               {

               ?>
                    GridMedidas.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                              var Tabla      = GridMedidas.getTableModel();
                              sPozo          = Tabla.getValue(0, index);
                              sDescripcion   = Tabla.getValue(2, index);
                              sMedida        = Tabla.getValue(1, index);

                              document.getElementById("HiConsecutivo").value = sPozo;
                              document.getElementById("txtDescripcion").value = sDescripcion;
                              document.getElementById("txtMedida").value = sMedida;
                         }
                    );
                    deshabilitar(true);
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

                          document.getElementById('txtDescripcion').disabled=si;
                          document.getElementById('txtMedida').disabled=si;
                        }
                ";
               }

        }

        global $application;

        global $frmMedidasxviaje;

        //Creates the form
        $frmMedidasxviaje=new frmMedidasxviaje($application);

        //Read from resource file
        $frmMedidasxviaje->loadResource(__FILE__);

        //Shows the form
        $frmMedidasxviaje->show();


?>
<script>
deshabilitar(true);
</script>


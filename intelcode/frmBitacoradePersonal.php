<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("jsval/formvalidator.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        require("fnUtilerias.php");
        //Class definition
        class frmBitacoradePersonal extends Page
        {
               public $memStatus = null;
               public $Label6 = null;
               public $txtOperacion = null;
               public $txtsIdPersonal = null;
               public $txtsIdPernocta = null;
               public $txtsIdPlataforma = null;
               public $cboPersonal = null;
               public $txtiIdDiario = null;
               public $txtdIdFecha = null;
               public $txtCantidad = null;
               public $cboPernocta = null;
               public $cboPlataforma = null;
               public $Label5 = null;
               public $Label4 = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato;
                  $sIdPersonal      = trim($this->cboPersonal->readItemIndex());
                  $sIdPersonalOld   = trim($this->txtsIdPersonal->Value);
                  $sIdPlataforma    = trim($this->cboPlataforma->readItemIndex());
                  $sIdPlataformaOld = trim($this->txtsIdPlataforma->Value);
                  $sIdPernocta      = trim($this->cboPernocta->readItemIndex());
                  $sIdPernoctaOld   = trim($this->txtsIdPernocta->Value);
                  $dCantidad        = trim($this->txtCantidad->Text);
                  $dCostoMN         = "0.0";
                  $dCostoDLL        = "0.0";
                  $sDescripcion     = "";
                  $iIdDiario        = trim($this->txtiIdDiario->Value);
                  $dIdFecha         = formatoFechaPer($this->txtdIdFecha->Value,"Y-m-d");


                  $sqlPersonal = "select * from personal where sContrato='$sContrato' and sIdPersonal='$sIdPersonal'";
                  $rs = mysql_query($sqlPersonal);
                  if($row = mysql_fetch_array($rs)){
                     $sDescripcion = $row['sDescripcion'];
                     $dCostoMN = $row['dCostoMN'];
                     $dCostoDLL = $row['dCostoMN'];
                  }
                  /*insertar nuevo*/
                  if($this->txtOperacion->Value == "insertar"){
                     $sql = "INSERT INTO bitacoradepersonal (
                                 sContrato,
                                 dIdFecha,
                                 iIdDiario,
                                 sIdPersonal,
                                 sDescripcion,
                                 sIdPernocta,
                                 sIdPlataforma,
                                 sHoraInicio,
                                 sHoraFinal,
                                 dCantidad,
                                 sFactor,
                                 dCostoMN,
                                 dCostoDLL
                            )VALUES (
                                 '$sContrato',
                                 '$dIdFecha',
                                 '$iIdDiario',
                                 '$sIdPersonal',
                                 '$sDescripcion',
                                 '$sIdPernocta',
                                 '$sIdPlataforma',
                                 '00:00',
                                 '00:00',
                                 '$dCantidad',
                                 '',
                                 '".($dCantidad*$dCostoMN)."',
                                 '".($dCantidad*$dCostoDLL)."' )";
                     mysql_query($sql);
                     if(!mysql_error()){
                         $this->memStatus->Text  = "Se inserto Correctamente: $sDescripcion";
                         $this->memStatus->Color = "#FFFFFF";
                     }
                     else{
                        $this->memStatus->Text  = "Ocurrio un error al insertar: $sDescripcion \nError:".mysql_error();
                        $this->memStatus->Color = "#FF0000";
                     }

                  }   /*actualizar el registro*/
                  else if($this->txtOperacion->Value == "modificar"){
                     $sql = "update bitacoradepersonal set
                                 sIdPersonal='$sIdPersonal',
                                 sDescripcion='$sDescripcion',
                                 sIdPernocta='$sIdPernocta',
                                 sIdPlataforma='$sIdPlataforma',
                                 dCantidad='$dCantidad',
                                 dCostoMN='".($dCantidad*$dCostoMN)."',
                                 dCostoDLL='".($dCantidad*$dCostoDLL)."'
                              where sContrato='$sContrato'
                                 and dIdFecha='$dIdFecha'
                                 and iIdDiario='$iIdDiario'
                                 and sIdPersonal='$sIdPersonalOld'
                                 and sIdPernocta='$sIdPernoctaOld'
                                 and sIdPlataforma='$sIdPlataformaOld'";
                     mysql_query($sql);
                     if(!mysql_error()){
                         $this->memStatus->Text  = "Se modificado Correctamente: $sDescripcion";
                         $this->memStatus->Color = "#FFFFFF";
                     }
                     else{
                        $this->memStatus->Text  = "Ocurrio un error al modificar: $sDescripcion \nError:".mysql_error();
                        $this->memStatus->Color = "#FF0000";
                     }
                  }



               }

               function frmBitacoradePersonalBeforeShow($sender, $params)
               {
                  global $sContrato;
                  global $_REQUEST;
                  #cargar personal
                  $sql = "select sIdPersonal,sDescripcion from personal where sContrato='$sContrato' order by sDescripcion";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[0]]=$row[1];
                  $this->cboPersonal->setItems($it);

                  #cargar pernoctan
                  unset($it);
                  $sql = "select sIdPernocta,sDescripcion from pernoctan order by sDescripcion";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[0]]=$row[1];
                  $this->cboPernocta->setItems($it);

                  #cargar plataformas
                  unset($it);
                  $sql = "select sIdPlataforma,sDescripcion from plataformas order by sDescripcion";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[0]]=$row[1];
                  $this->cboPlataforma->setItems($it);

                  #cargar datos para el formulario
                  /*requeridos para insertar registro*/
                  if($_REQUEST['dIdFecha']!="")
                     $this->txtdIdFecha->Value=$_REQUEST['dIdFecha'];
                  if($_REQUEST['iIdDiario']!="")
                     $this->txtiIdDiario->Value=$_REQUEST['iIdDiario'];
                  if($_REQUEST['operacion']!="")
                     $this->txtOperacion->Value=$_REQUEST['operacion'];
                  /*requeridos para modificar registros*/
                  if($_REQUEST['dCantidad']!="")
                     $this->txtCantidad->Text=$_REQUEST['dCantidad'];
                  if($_REQUEST['sIdPersonal']!=""){
                     $this->txtsIdPersonal->Value=$_REQUEST['sIdPersonal'];
                     $this->cboPersonal->setItemIndex($_REQUEST['sIdPersonal']);
                  }
                  if($_REQUEST['sIdPernocta']!=""){
                     $this->txtsIdPernocta->Value=$_REQUEST['sIdPernocta'];
                     $this->cboPernocta->setItemIndex($_REQUEST['sIdPernocta']);
                  }
                  if($_REQUEST['sIdPlataforma']!=""){
                     $this->txtsIdPlataforma->Value=$_REQUEST['sIdPlataforma'];
                     $this->cboPlataforma->setItemIndex($_REQUEST['sIdPlataforma']);
                  }


               }

               function cmdCancelarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    document.location.href='frmPersonalEquipo.php';
                    return false;
               <?php

               }

        }

        global $application;

        global $frmBitacoradePersonal;

        //Creates the form
        $frmBitacoradePersonal=new frmBitacoradePersonal($application);

        //Read from resource file
        $frmBitacoradePersonal->loadResource(__FILE__);

        //Shows the form
        $frmBitacoradePersonal->show();

?>

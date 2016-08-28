<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        require("fnUtilerias.php");
        //Class definition
        class frmBitacoradeEquipos extends Page
        {
               public $cboPernocta = null;
               public $sIdPernocta = null;
               public $sIdEquipo = null;
               public $operacion = null;
               public $dIdFecha = null;
               public $iIdDiario = null;
               public $txtCantidad = null;
               public $cboEquipo = null;
               public $cmdAceptar = null;
               public $cmdCancelar = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               function txtCantidadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCantidadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCantidadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cboPernoctaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cboPernoctaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cboPernoctaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

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

               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato;
                  $sIdEquipo        = trim($this->cboEquipo->readItemIndex());
                  $sIdEquipoOld     = trim($this->sIdEquipo->Value);
                  $sIdPernocta      = trim($this->cboPernocta->readItemIndex());
                  $sIdPernoctaOld   = trim($this->sIdPernocta->Value);
                  $dCantidad        = trim($this->txtCantidad->Text);
                  $dCostoMN         = "0.0";
                  $dCostoDLL        = "0.0";
                  $sDescripcion     = "";
                  $iIdDiario        = trim($this->iIdDiario->Value);
                  $dIdFecha         = formatoFechaPer($this->dIdFecha->Value,"Y-m-d");


                  $sqlEquipo = "select * from equipos where sContrato='$sContrato' and sIdEquipo='$sIdEquipo'";
                  $rs = mysql_query($sqlEquipo);
                  if($row = mysql_fetch_array($rs)){
                     $sDescripcion = $row['sDescripcion'];
                     $dCostoMN = $row['dCostoMN'];
                     $dCostoDLL = $row['dCostoMN'];
                  }
                  /*insertar nuevo*/
                  if($this->operacion->Value == "insertar"){
                     $sql = "INSERT INTO bitacoradeequipos (
                                 sContrato,
                                 dIdFecha,
                                 iIdDiario,
                                 sIdEquipo,
                                 sDescripcion,
                                 sIdPernocta,
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
                                 '$sIdEquipo',
                                 '$sDescripcion',
                                 '$sIdPernocta',
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
                  else if($this->operacion->Value == "modificar"){
                     //for($i=0;$i<10;$i++)$enter.="<br>";
                    $sql = "update bitacoradeequipos set
                                 sIdEquipo='$sIdEquipo',
                                 sDescripcion='$sDescripcion',
                                 sIdPernocta='$sIdPernocta',
                                 dCantidad='$dCantidad',
                                 dCostoMN='".($dCantidad*$dCostoMN)."',
                                 dCostoDLL='".($dCantidad*$dCostoDLL)."'
                              where sContrato='$sContrato'
                                 and dIdFecha='$dIdFecha'
                                 and iIdDiario='$iIdDiario'
                                 and sIdEquipo='$sIdEquipoOld'
                                 and sIdPernocta='$sIdPernoctaOld'";
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

               function frmBitacoradeEquiposShow($sender, $params)
               {
                  global $_REQUEST,$sContrato;
                  $this->dIdFecha->Value   =$_REQUEST['dIdFecha'];
                  $this->iIdDiario->Value  =$_REQUEST['iIdDiario'];
                  $this->operacion->Value  =$_REQUEST['operacion'];
                  $this->sIdEquipo->Value  =$_REQUEST['sIdEquipo'];
                  $this->sIdPernocta->Value=$_REQUEST['sIdPernocta'];
                  $this->txtCantidad->Text =$_REQUEST['dCantidad'];
                  #cargar equipo
                  $sql = "select sIdEquipo,sDescripcion from equipos where sContrato='$sContrato' order by sDescripcion";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[0]]=$row[1];
                  $this->cboEquipo->setItems($it);
                  if(isset($_REQUEST['sIdEquipo'])){
                     $this->cboEquipo->setItemIndex($_REQUEST['sIdEquipo']);
                  }


                  #cargar pernoctan
                  unset($it);
                  $sql = "select sIdPernocta,sDescripcion from pernoctan order by sDescripcion";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[0]]=$row[1];
                  $this->cboPernocta->setItems($it);
                  if(isset($_REQUEST['sIdPernocta'])){
                     $this->cboPernocta->setItemIndex($_REQUEST['sIdPernocta']);
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

        global $frmBitacoradeEquipos;

        //Creates the form
        $frmBitacoradeEquipos=new frmBitacoradeEquipos($application);

        //Read from resource file
        $frmBitacoradeEquipos->loadResource(__FILE__);

        //Shows the form
        $frmBitacoradeEquipos->show();

?>

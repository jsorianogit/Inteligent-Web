<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("checklst.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("Modulos/include/mysql.inc.php");
        //Class definition
        class FrmSelContrato extends Page
        {
               public $Label5 = null;
               public $cmdSelContrato = null;
               public $cmbTurno = null;
               public $txtFechaFinal = null;
               public $txtFechaInicio = null;
               public $memoDescripcion = null;
               public $tvContratos = null;
               public $GroupBox1 = null;
               public $Label4 = null;
               public $GroupBox3 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $Panel1 = null;



               function FrmSelContratoJSLoad($sender, $params)
               {

               ?>
               //Add your javascript code here
                  //se necesita ajustar la posicion del Panel1
                  var hz=window.screen.height;
                  var wz=window.screen.width;
                  switch(wz){
                        case(800):
                           wz=100;
                           break;
                        case(1024):
                           wz=200;
                           break;
                        case(1280):
                           wz=350;
                           break;
                        default:
                           wz=250;
                           break;
                  }
                  document.getElementById("Panel1_outer").style.pixelLeft= wz;
               <?php

               }

               function tvContratosChangeSelected($sender, $params)
               {
                 $contrato = $params["treenode"]->Caption;
                 $_SESSION['ssContrato'] = $contrato;
                 $sql = " select c.mDescripcion,co.dFechaInicio,co.dFechaFinal,co.sIdConvenio
                           from contratos c
                           inner join configuracion conf
                              on(conf.sContrato=c.sContrato)
                           inner join convenios co
                              on (c.sContrato=co.sContrato and co.sIdConvenio=conf.sIdConvenio)
                           where c.sContrato='$contrato'; ";
                  $rs = mysql_query($sql);
                  if ($row = mysql_fetch_array($rs)){
                     $this->memoDescripcion->setLines($row[0]);
                     $this->txtFechaInicio->setText($row[1]);
                     $this->txtFechaFinal->setText($row[2]);
                     $_SESSION['ssIdConvenio']=$convenio = $row[3];

                  }

                  $sql = "select sIdTurno,sDescripcion from turnos
                           where sContrato='$contrato'; ";
                  $rs = mysql_query($sql);

                  while($row = mysql_fetch_array($rs)){
                     //$this->cmbTurno->addItem($row[0]);
                     $it[$row[0]]=$row[1];
                     $this->cmbTurno->setItems($it);
                  }
               }


              function FrmSelContratoShow($sender, $params)
               {
                 //for( $i=0; $i<count($this->tvContratos->Items) ; $i++)
                  //   unset($this->tvContratos->Items[$i]);
                 if(count($this->tvContratos->Items)<=0)  {
                     $sql = "select sContrato from contratosxusuario  ";
                     $sql .= "where sIdUsuario='".$_SESSION['ssUsuario']."' order by sContrato ;";
                     $rs = mysql_query($sql);
                     $tag = 0;
                     while($row = mysql_fetch_array($rs)){
                       $this->tvContratos->addNodeToItems($row['sContrato'],$tag++,1,1);
                     }
                  }


               }



         }

        global $application;

        global $FrmSelContrato;

        //Creates the form
        $FrmSelContrato=new FrmSelContrato($application);

        //Read from resource file
        $FrmSelContrato->loadResource(__FILE__);


        if(isset($_POST['cmbTurno']) and isset($_POST['cmdSelContrato'])){
            $_SESSION['ssIdTurno']= $_POST['cmbTurno'];
            $rw = false;
            foreach(apache_get_modules() as $key => $value)
            {
               if($value=="mod_rewrite"){
                  $rw = true;
                  break;
               }
            }
            if(!$rw){   header("Location:./"); }
            else{header("Location:./");/*header("Location:PanelAdministracion.html");*/}
        }
        else  //Shows the form
         $FrmSelContrato->show();


?>

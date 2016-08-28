<?php
session_start();
require("Modulos/include/mysql.inc.php");
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("imglist.inc.php");
        use_unit("menus.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class FrmMenu extends Page
        {
               public $Image1 = null;
               public $Label7 = null;
               public $Button1 = null;
               public $Label6 = null;
               public $wAcerca = null;
               public $imagenesMenu = null;
               public $imagenesToolbar = null;
               public $txtBaseDatos = null;
               public $txtUsuario = null;
               public $txtTurno = null;
               public $txtConvenio = null;
               public $txtContrato = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $ToolBar1 = null;
               public $MainMenu1 = null;
               public $Panel1 = null;
               function Button1JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  wAcerca.close();
                  return false;
               <?php

               }


               function  dumpJavascript(){
                  echo "
                   \nfunction toolbarSend(tag){
                     var j = document.createElement(\"script\");
                     j.type = \"text/javascript\";
                     j.src = \"recursos/js/menu.js\";
                     document.body.appendChild(j);
                       //alert(menu[tag]+'?pag=1');
                     if(tag==46 || tag==81 || tag==83 || tag==49 || tag==40 || tag==41){ ";
                     if($_SESSION['database']=="inteligent"){
                           echo "
                           menu[46]=menu[47];
                           menu[49]=menu[48];
                           menu[81]='recursos/auxiliares/construct.php';
                           menu[40]=menu[81];
                           menu[41]=menu[81];
                           menu[83]=menu[81];
                                 ";

                        }
                   echo "}";
                   $rs = mysql_query("select sIdGrupo from usuarios where sIdUsuario='".$_SESSION['sIdUsuario']."'");
                   if($row = mysql_fetch_array($rs)){
                           $grupo = $row['sIdGrupo'];
                   }
                   if($grupo != 'INTEL-CODE')
                     echo "
                        if(tag==91 || tag==40 || tag==41){
                           menu[91]='recursos/auxiliares/construct.php';
                           //menu[106]='recursos/auxiliares/construct.php';
                           //menu[105]='recursos/auxiliares/construct.php';
                        }";
                    echo "

                     if(tag == 86 || tag==85 ){
                        window.location.href=menu[tag]+'?pag=1';
                     }
                     else if(menu[tag]!=\"_\") {

                        window.mainFrame.location.href=menu[tag]+'?pag=1';
                        }
                  }\n
                  //var navegador = navigator.appName
                  //if (navegador != \"Microsoft Internet Explorer\")
                  //   alert(\"Nos damos cuenta que esta usando un navegador diferente a Internet Explorer\\n\\nDe doble clic en el menu o en el toolbar para activarlos la primera vez que los use...\");
                  \n";
               }
               function ToolBar1JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    var tag=event.getTarget().tag;
                    setTimeout("toolbarSend(" + tag + ")",10);
               <?php

               }

               function FrmMenuBeforeShow($sender, $params)
               {
                  global $sContrato;
                  global $_SESSION;
                  $sql = "SELECT sDescripcion FROM turnos WHERE sContrato='$sContrato' and sIdTurno='".$_SESSION['ssIdTurno']."'";

                  $result = mysql_query($sql);
                  if($row=mysql_fetch_array($result)){
                     $turnoDes = $row[0];
                  }

                  $this->txtBaseDatos->Text = $_SESSION['database'];
                  $this->txtUsuario->Text=$_SESSION['sNombreUsuario'];
                  $this->txtTurno->Text=$turnoDes;
                  $this->txtConvenio->Text = $_SESSION['ssIdConvenio'];
                  $this->txtContrato->Text = $sContrato;

               }

               function MainMenu1JSClick($sender, $params)
               {
                  ?>
                  //Cargar el archivo menu.js

                  var j = document.createElement("script");
                  j.type = "text/javascript";
                  j.src = "recursos/js/menu.js";

                  document.body.appendChild(j);
                  menu[90] = "frmKardex.php";
                  tag=event.getTarget().tag;
                  if (tag == -1)
                  {   return false;
                  } else
                    {
                        //  alert(menu[tag]);
                        if(tag==46 || tag==81 || tag==83 || tag==49 || tag==40 || tag==41)
                        {
                          <?php
                            if($_SESSION['database']=="inteligent")
                            {
                              ?>
                                 menu[46]=menu[47];
                                 menu[49]=menu[48];
                                 menu[81]="recursos/auxiliares/construct.php";
                                 menu[40]=menu[81];
                                 menu[41]=menu[81];
                                 menu[83]=menu[81];
                               <?php
                            }
                          ?>
                          window.mainFrame.location.href=menu[tag]+'?pag=1';
                        }else
                            if(tag==60 || tag==61 || tag==62 || tag==63 || tag==64 || tag==65 || tag==66 || tag==90 || tag==91 || tag==108 || tag==106 || tag==105){
                        //tags only for Admin's
                        <?php
                           $rs = mysql_query("select sIdGrupo from usuarios where sIdUsuario='".$_SESSION['sIdUsuario']."'");
                           if($row = mysql_fetch_array($rs))
                           {
                             $grupo = $row['sIdGrupo'];
                           }
                           if($grupo == 'INTEL-CODE')
                           {
                             ?>
                               window.mainFrame.location.href=menu[tag]+'?pag=1';
                             <?php
                           }
                           else
                              {
                                ?>
                                   menu[tag]="recursos/auxiliares/construct.php";
                                   window.mainFrame.location.href=menu[tag]+'?pag=1';
                                <?php
                              }
                        ?>

                      }else if(tag == 86 || tag==85 || tag==88)
                          {   //tags for all document's
                              window.location.href=menu[tag]+'?pag=1';
                          } else if(tag==300)
                                    wAcerca.show();
                                 else if(menu[tag]!="_")
                                 {
                                       //tags for mainFrame
                                       window.mainFrame.location.href=menu[tag]+'?pag=1';

                                       }

                     <?php
                        //echo $this->MainMenu1->ajaxCall("menu",array(),array("Label1","MainMenu1"));
                     ?>
                     return false;
                  }
                  <?php
               }

               function menu($sender,$params)
               {
                  $this->Label1->setCaption($params);
               }

        }

        global $application;

        global $FrmMenu;

        //Creates the form
        $FrmMenu=new FrmMenu($application);

        //Read from resource file
        $FrmMenu->loadResource(__FILE__);

         //Shows the form
        $FrmMenu->show();

?>
<script>
 var hz=window.screen.height;
var wz=window.screen.width;
var FontSize=6;
   switch(wz){
      case(800):
         wz=760;
         FontSize=6;
         break;
      default:
         wz=wz-40;//35;//1250;
         FontSize=9;
         break
   }
   switch(hz){
      case(600):
         hz=310;
         FontSize=6;
         break;
      default:
         hz=hz/2+45;
         FontSize=9;
         break;
   }
//   wz=840;
var navegador = navigator.appName
if (navegador == "Microsoft Internet Explorer")
   hz = hz + 50
else
   hz = hz + 130
ToolBar1.setWidth(wz);
MainMenu1.setWidth(wz);

document.write('<iframe src="frmMisPendientes.php" boder="3" name="mainFrame" scrolling="yes" id="mainFrame" title="mainFrame" style="position:absolute;color:blue; left:10px;top:95px;width:'+ wz +'px;height:' + (hz) + 'px;"></iframe>');
//h 430
var j = document.createElement("script");
j.type = "text/javascript";
j.src = "recursos/js/menu.js";
document.body.appendChild(j);
</script>
<?php
#leer contratos bloqueados
 $fileName = "1contratosBloqueados.dat";
 if(file_exists($fileName)){
    $file = fopen($fileName ,"r+");
    while (!feof($file)) {
       $contents = fgets($file,4096);
       if(strpos($contents,$sContrato)!==false){
         $mensaje = explode("-",$contents);
         $caracterEliminar   = array("\r\n", "\n", "\r");
         $msg = str_replace($caracterEliminar,". ",$mensaje[1]);
         $data = str_replace($caracterEliminar,"",$mensaje[2]);
         if(trim($data) != "" and trim($data)==$_SESSION['database']){
            echo "\n<script>alert(\"$msg\")</script>";
            location("frmSelContrato.php");
         }
       }
    }
    fclose($file);
 }
#leer mensajes para usuarios de contratos
 $fileName = "1mensajesUsuarios.dat";
 if(file_exists($fileName)){
    $file = fopen($fileName ,"r+");
    while (!feof($file)) {
       $contents = fgets($file,4096);
       if(strpos($contents,$sContrato)!==false or strpos($contents,"*")!==false){
         $mensaje = explode("-",$contents);
         $caracterEliminar   = array("\r\n", "\n", "\r");
         $msg = str_replace($caracterEliminar,". ",$mensaje[1]);
         echo "\n<script>alert(\"$msg\")</script>";
       }
    }
    fclose($file);
 }
 ?>

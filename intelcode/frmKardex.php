<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("Modulos/include/mysql.inc.php");
        require_once("fnUtilerias.php");
        //Class definition
        class Unit1 extends Page
        {
               public $cmdGuardarBloqueads = null;
               public $cmdRecargarBloqueados = null;
               public $memoBloqueados = null;
               public $Label12 = null;
               public $cmbUsuarios = null;
               public $Label11 = null;
               public $Label10 = null;
               public $Label9 = null;
               public $cmdRecargarMensajes = null;
               public $cmdGuardarMensajes = null;
               public $cmdImprimirKardex = null;
               public $txtFechaInicio = null;
               public $txtFechaFinal = null;
               public $memoMensajes = null;
               public $Label8 = null;
               public $Label7 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               function cmdGuardarBloqueadsClick($sender, $params)
               {
                 $fileName = "contratosBloqueados.dat";
                  if(file_exists($fileName)){
                     unlink($fileName);
                  }
                  $file = fopen($fileName,"a+");
                  fwrite($file,$this->memoBloqueados->Text);
                  fclose($file);
               

               }

               function cmdImprimirKardexJSClick($sender, $params)
               {
               global $sContrato;
               global $_SESSION;
               ?>
               //Add your javascript code here
                var url ="";
                 ur = "../reporte.php";
                 ur = ur + "?dFechaInicio=" + finicio();
                 ur = ur + "&dFechaFinal=" + ffinal();
                 ur = ur + "&reportesPath=bitacoradeusuarios&nombreReporte=kardexSistema";
                 ur = ur + "&sContrato=" + "<?php echo $sContrato; ?>";
                 ur = ur + "&sIdUsuario="+usuario();
                 var status = window.open(ur,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no,scroolbar=yes");
                 return false;
                 <?php
               }

              function dumpJavascript(){
                  echo "
                     function navegador(){
                        var navegador = navigator.appName
                        if (navegador == \"Microsoft Internet Explorer\")
                           return 'e';
                        else
                           return 'f';
                     }

                     \rfunction finicio(){
                        if(navegador()=='f') {
                           var fInicio = document.getElementsByName(\"txtFechaInicio\")[0].value;
                        }
                        else
                           var fInicio = document.getElementById(\"txtFechaInicio\").value;
                        return fInicio;
                     }
                     \rfunction ffinal(){
                        if(navegador()=='f')
                           var fFinal = document.getElementsByName(\"txtFechaFinal\")[0].value;
                        else
                           var fFinal = document.getElementById(\"txtFechaFinal\").value;
                        return fFinal;
                     }
                     \rfunction usuario(){
                        var sIdUsuario = document.getElementById(\"cmbUsuarios\").value;
                        return sIdUsuario;
                     }
                     "  ;
               }
               function cmdRecargarMensajesClick($sender, $params)
               {

               $this->cargarMensajes();

               }

               function cargarMensajes(){
                  $this->memoMensajes->Text="";
                  $fileName = "mensajesUsuarios.dat";
                  if(file_exists($fileName)){
                     if(filesize($fileName)>0){
                        $file = fopen($fileName,"r");
                        $this->memoMensajes->Text=fread($file,filesize($fileName));
                        fclose($file);
                     }
                  }

               }
               function cargarBloqueados(){
                  $this->memoBloqueados->Text="";
                  $fileName = "contratosBloqueados.dat";
                  if(file_exists($fileName)){
                     if(filesize($fileName)>0){
                        $file = fopen($fileName,"r");
                        $this->memoBloqueados->Text=fread($file,filesize($fileName));
                        fclose($file);
                     }
                  }
               }
               function Unit1Show($sender, $params)
               {
                  global $sContrato;
                  $this->cargarMensajes();
                  $this->cargarBloqueados();
                  $sql = "select
                              u.sIdUsuario,u.sNombre
                          from usuarios  u inner join
                              contratosxusuario cu on (
                                 u.sIdUsuario=cu.sIdUsuario
                                 and cu.sContrato='$sContrato'
                              )
                           where cu.sContrato='$sContrato'
                           order by u.sNombre";
                  $rs = mysql_query($sql);
                  $i = 0;
                  $it['%%']="Todos los Usuarios";
                  $this->cmbUsuarios->setItems($it);
                  while($row = mysql_fetch_array($rs)){
                     $it[$row['sIdUsuario']]=$row['sNombre'];
                     $this->cmbUsuarios->setItems($it);
                     $i++;
                  }
                  $this->txtFechaInicio->Text = date("d/m/Y");
                  $this->txtFechaFinal->Text = date("d/m/Y");
               }

               function cmdGuardarMensajesClick($sender, $params)
               {
                  $fileName = "mensajesUsuarios.dat";
                  if(file_exists($fileName)){
                     unlink($fileName);
                  }
                  $file = fopen($fileName,"a+");
                  fwrite($file,$this->memoMensajes->Text);
                  fclose($file);
               }



        }

        global $application;

        global $Unit1;

        //Creates the form
        $Unit1=new Unit1($application);

        //Read from resource file
        $Unit1->loadResource(__FILE__);

        //Shows the form
        $Unit1->show();

?>

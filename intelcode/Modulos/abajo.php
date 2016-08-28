<?php
        //Includes
        require_once("../vcl/vcl.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class Unit1 extends Page
        {
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
<center>
<p>
Sistema Inteligente para la Administracion de Contratos
<br>
<br>
Seleccione en la parte Superior una Opcion
</p>
<p>
</center>
<ul>
<font color="#FFAA00"><b><BLINK>Recomendaciones</BLINK></b></font>
   <li>
      Para mayor rapidez al imprimir los reportes diarios, y otros reportes, mantenga abierto o en ejecución el acrobat reader.
   </li>
</ul>
</p>


<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("buttons.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("auth.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        require("fnContrato.php");
        require("fnUtilerias.php");
        //Class definition
        class FrmDiarioBarco extends Page
        {
               public $Label6 = null;
               public $BitBtn6 = null;
               public $Label5 = null;
               public $BitBtn5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $BitBtn4 = null;
               public $BitBtn3 = null;
               public $Label2 = null;
               public $BitBtn2 = null;
               public $Label1 = null;
               public $BitBtn1 = null;
               public $Window1 = null;

               function BitBtn1JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                document.location.href="frmGeneradorBarco.php";
                //eturn false;

               <?php

               }

        }
        global $application;

        global $FrmDiarioBarco;

        //Creates the form
        $FrmDiarioBarco=new FrmDiarioBarco($application);

        //Read from resource file
        $FrmDiarioBarco->loadResource(__FILE__);

        //Shows the form
        $FrmDiarioBarco->show();

?>
<script>
//poner el grid como solo lectura
//function Edit(dbgGeneradores_tableModel){
//   var valor = dbgGeneradores_tableModel.getValue(0, 0);
//   if(valor != null)
//   {
//      for(var i = 0; i<=9; i++)
//         dbgGeneradores_tableModel.setColumnEditable(i, false);
//      dbgGeneradores.setColumnWidth(0,0);
//   }
//}
//setInterval ("Edit(dbgGeneradores_tableModel)",10);
//Edit(DBGrid1_tableModel);
</script>

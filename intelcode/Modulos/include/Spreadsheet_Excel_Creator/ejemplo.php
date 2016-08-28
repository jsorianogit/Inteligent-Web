<?php
      require_once("excel.php");
      require_once("excel_ext.php");
      // Consultamos los datos desde MySQL
      $conEmp = mysql_connect("localhost", "root", "danae");
      mysql_select_db("intelcode", $conEmp);
      $queEmp = "SELECT * FROM usuarios";
      $resEmp = mysql_query($queEmp, $conEmp) or die(mysql_error());
      $totEmp = mysql_num_rows($resEmp);
      // Creamos el array con los datos
      while($datatmp = mysql_fetch_assoc($resEmp)) {
           $data[] = $datatmp;
      }
      // Generamos el Excel
      createExcel("excel-mysql.xls", $data);
?>

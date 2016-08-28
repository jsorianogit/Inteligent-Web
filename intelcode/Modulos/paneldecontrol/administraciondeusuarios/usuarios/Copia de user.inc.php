<?php
require ("../../../include/formulario.inc.php");

class usuario extends formulario{
      var $UsuarioMy;
      var $_UsuarioMy;
      var $PassMy;
   #devuelve true si el usuario existe
   function user_exists($idUsuario){
      global $BaseDatos;
      $exist_intelcode=false;
      $exist_inteligent=false;
      
      mysql_select_db("intelcode");
      $sql = "select sIdUsuario from usuarios where sIdUsuario='$idUsuario'";
      $result = mysql_query($sql);
      if($row=mysql_fetch_array($result))
         $exist_intelcode = true;
         
      mysql_select_db("inteligent");
      $result = mysql_query($sql);
      if($row=mysql_fetch_array($result))
         $exist_inteligent=true;
      
      mysql_select_db($BaseDatos);
      
      if($exist_inteligent or $exist_intelcode){
         return true;
      }  
      else{
         return false;
      }  
   }
   #Obtiene la informacion de los campos  usuario y contraseña del a variable POST    
   function OptieneUserMy($_POST){
         foreach($_POST as $Campo => $Valor){
            if($Campo == "sIdUsuario"){
                  $this->UsuarioMy = trim($Valor);       
            }
            else if($Campo == "sPassword"){
                  $this->PassMy = trim($Valor);       
            }     
         }
   }
   #Obtiene el valor del nombre de usuario del elnace
   function OptieneUserLink($condicion){
         $VecCond = explode("=",$condicion);
         $this->_UsuarioMy  = trim(str_replace("'","",$VecCond[1]));
   }  
      //crea la consulta INSERT INTO a partir de la variable $_POST
    function crearInsertUser($_POST,$HTTP_POST_FILES)
    {
      global $BaseDatos, $link;
      #Insertar el usuario en la base de datos MySQL
      $this->OptieneUserMy($_POST);
      if($this->user_exists($this->UsuarioMy)){
         mensaje("El usuario ya existe");
         location("?operacion=a");
         exit();
      }
      mysql_select_db("mysql");
      $sql = "INSERT INTO user (Host,User,Password,Select_priv,Insert_priv,Update_priv,Delete_priv,Create_priv,Drop_priv,Reload_priv,Shutdown_priv,Process_priv,File_priv,Grant_priv,References_priv,Index_priv,Alter_priv,Show_db_priv,Super_priv,Create_tmp_table_priv,Lock_tables_priv,Execute_priv,Repl_slave_priv,Repl_client_priv,Create_view_priv,Show_view_priv,Create_routine_priv,Alter_routine_priv,Create_user_priv,ssl_type,ssl_cipher,x509_issuer,x509_subject,max_questions,max_updates,max_connections,max_user_connections)
                  VALUES ('%', '$this->UsuarioMy' , PASSWORD('$this->PassMy') , 'N' , 'N' , 'N' , 'N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','','','','','','','','') ON DUPLICATE KEY UPDATE Select_priv='N',Insert_priv='N',Update_priv='N',Delete_priv='N'; ";
      mysql_query($sql);
      mysql_query("FLUSH PRIVILEGES;");
      $sql = "GRANT SELECT , INSERT , UPDATE , DELETE ON `intelcode` . * TO '$this->UsuarioMy'@'%' IDENTIFIED BY '$this->PassMy' ;" ; //IDENTIFIED BY '$this->PassMy' 
      mysql_query($sql);   
      mysql_query("FLUSH PRIVILEGES;");
      $sql = "GRANT SELECT , INSERT , UPDATE , DELETE ON `inteligent` . * TO '$this->UsuarioMy'@'%'  IDENTIFIED BY '$this->PassMy' ;" ;//IDENTIFIED BY '$this->PassMy'
      mysql_query($sql);
      mysql_query("FLUSH PRIVILEGES;");
      if($_POST['sIdGrupo']=='INTEL-CODE'){
         $sql = "GRANT SELECT , INSERT , UPDATE , DELETE ON `mysql` . * TO '$this->UsuarioMy'@'%'  IDENTIFIED BY '$this->PassMy' ;" ;//IDENTIFIED BY '$this->PassMy'
         mysql_query($sql);
         mysql_query("FLUSH PRIVILEGES;");
      }

      ##LLamar a la funcion de la clase base
      
      #Insertar el usuario en la base de datos intelcode
      mysql_select_db("intelcode",$link);         
      $this->crearInsert($_POST,$HTTP_POST_FILES);
      #Insertar el usuario en la base de datos inteligent
      mysql_select_db("inteligent",$link);           
      $this->crearInsert($_POST,$HTTP_POST_FILES);  
      #seleccionar la base de datos de inicio   
      mysql_select_db($BaseDatos,$link);

    }
    
    
    //crea la consulta UPDATE a partir de la variable $_POST
    function crearUpdateUser($condicion, $_POST , $HTTP_POST_FILES )
    {
      global $BaseDatos, $link;
      #Insertar el usuario en la base de datos MySQL
      $this->OptieneUserLink($condicion);
      $this->OptieneUserMy($_POST);
      if($this->user_exists($this->UsuarioMy) and $this->UsuarioMy!=$this->_UsuarioMy){
         mensaje("El usuario ya existe");
         location("?0=0");
         exit();
      }
      mysql_select_db("mysql");
//    $sqlUser = "   UPDATE user SET Host='%',User='$this->UsuarioMy',Select_priv='N',Insert_priv='N',Update_priv='N',Delete_priv='N',Password=PASSWORD('$this->PassMy') WHERE Host='%' AND User='$this->_UsuarioMy' ";
      $sqlUser = "INSERT INTO user (Host,User,Password,Select_priv,Insert_priv,Update_priv,Delete_priv,Create_priv,Drop_priv,Reload_priv,Shutdown_priv,Process_priv,File_priv,Grant_priv,References_priv,Index_priv,Alter_priv,Show_db_priv,Super_priv,Create_tmp_table_priv,Lock_tables_priv,Execute_priv,Repl_slave_priv,Repl_client_priv,Create_view_priv,Show_view_priv,Create_routine_priv,Alter_routine_priv,Create_user_priv,ssl_type,ssl_cipher,x509_issuer,x509_subject,max_questions,max_updates,max_connections,max_user_connections)
                  VALUES ('%', '$this->UsuarioMy' , PASSWORD('$this->PassMy') , 'N' , 'N' , 'N' , 'N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','N','','','','','','','','') ON DUPLICATE KEY UPDATE User='$this->_UsuarioMy' ,Password=PASSWORD('$this->PassMy')  ";
 
      mysql_query($sqlUser);
      mysql_query("FLUSH PRIVILEGES;");
      $sqlGrant = "GRANT SELECT , INSERT , UPDATE , DELETE ON `intelcode` . * TO '$this->UsuarioMy'@'%' IDENTIFIED BY '$this->PassMy' " ;
      mysql_query($sqlGrant);
      mysql_query("FLUSH PRIVILEGES;");
      $sqlGrant = "GRANT SELECT , INSERT , UPDATE , DELETE ON `inteligent` . * TO '$this->UsuarioMy'@'%' IDENTIFIED BY '$this->PassMy' " ;
      mysql_query($sqlGrant);
      mysql_query("FLUSH PRIVILEGES;");
      if($_POST['sIdGrupo']=='INTEL-CODE'){
         $sql = "GRANT SELECT , INSERT , UPDATE , DELETE ON `mysql` . * TO '$this->UsuarioMy'@'%'  IDENTIFIED BY '$this->PassMy' ;" ;//IDENTIFIED BY '$this->PassMy'
         mysql_query($sql);
         mysql_query("FLUSH PRIVILEGES;");
      }
      ##LLamar a la funcion de la clase base
      
      mysql_select_db("intelcode");
      $this->crearUpdate($condicion, $_POST , $HTTP_POST_FILES );
      
      mysql_select_db("inteligent");
      $this->crearUpdate($condicion, $_POST , $HTTP_POST_FILES );
      
      mysql_select_db($BaseDatos,$link);
    }
    
    //crea la consulta DELETE a partir de la variable $_POST
    function crearDeleteUser($condicion)
    {
      global $BaseDatos, $link;
      #Borrar el usuario en la base de datos MySQL
      $this->OptieneUserLink($condicion);
      #Verificar que no existan relaciones en otras tablas
      $contenido = $this->extraervalor($condicion);
      //buscar Tablas relaciones   
       /*
       if (!$this->tablasrelaciones and $this->tablasrelaciones!="none")
            $tablas = $this->relaciones($tabla);
        else
            $tablas = $this->tablasrelaciones;
            */
      //buscar concurrencias de registro en tablas relacionadas    
      $relacionadoCode=$relacionadoLigent=false;
      if($this->tablasrelaciones[0]!="none"){
           mysql_select_db("intelcode");
           $tablas = $this->relaciones("usuarios");
           $relacionadoCode = $this->busRelaciones("usuarios",$tablas,$contenido);
           
           mysql_select_db("inteligent");
           $tablas = $this->relaciones("usuarios");
           $relacionadoLigent = $this->busRelaciones("usuarios",$tablas,$contenido);
           
           mysql_select_db($BaseDatos,$link);
      }
       if(!$relacionadoCode and !$relacionadoLigent)
      {   
         mysql_select_db("mysql");
         $sqlPrivilegios = "REVOKE ALL PRIVILEGES ON `intelcode` . * FROM '$this->_UsuarioMy'";
         mysql_query($sqlPrivilegios);

         $sqlPrivilegios = "REVOKE ALL PRIVILEGES ON `mysql` . * FROM '$this->_UsuarioMy'";
         mysql_query($sqlPrivilegios);
         mysql_query("FLUSH PRIVILEGES;");

         $sqlPrivilegios = "REVOKE ALL PRIVILEGES ON `intelcode` . * FROM '$this->_UsuarioMy'";
         mysql_query($sqlPrivilegios);
         mysql_query("FLUSH PRIVILEGES;");

         $sqlPrivilegios = "REVOKE ALL PRIVILEGES ON `inteligent` . * FROM '$this->_UsuarioMy'";
         mysql_query($sqlPrivilegios);
         mysql_query("FLUSH PRIVILEGES;");

         $sqlUsuario = "   DELETE FROM user WHERE  User='$this->_UsuarioMy' ";
         mysql_query($sqlUsuario);
         mysql_query("FLUSH PRIVILEGES;");
   
         ##LLamar a la funcion de la clase base 
         mysql_select_db("intelcode"); 
         $this->crearDelete($condicion);
         mysql_select_db("inteligent");   
         $this->crearDelete($condicion);
         
         mysql_select_db($BaseDatos,$link);
      }
      mysql_select_db($BaseDatos,$link);
    }
}
?>

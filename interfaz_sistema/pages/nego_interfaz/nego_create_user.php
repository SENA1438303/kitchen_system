<?php
  class Registro_empleados
  {   
    public function registrar_emple($Nombre_usuario,$Apellido_usuario,$fk_idGenero,$fk_idTipo_documento,$Numero_document,$Telefono_usuario,$Direccion_usuario,$Correo_usuario,$Contrasena_ingreso,$fk_idRol,$fk_idEstado)
      {
        
        include('../../../conexion_db.php');

        $contexistencia=0;
                
        //Consultar si existe un usuario
                
        $sql = "SELECT * FROM usuario WHERE Numero_documento='$Numero_document'";
        
        if(!$result = $db->query($sql))
        {
          die('Datos no encontrados!!! [' . $db->error . ']');
        }
     
        while($row = $result->fetch_assoc())
        {
          $ddocumento=stripslashes($row["Numero_documento"]);
          $contexistencia=$contexistencia+1;
        }
        //Final de consulta de un ususario

        if ($contexistencia=='0')
        {       
            
        $sql2 = "INSERT INTO usuario (idUsuario, Nombre_usuario, Apellido_usuario, fk_idGenero, fk_idTipo_documento, Numero_documento, Telefono_usuario, Direccion_usuario, Correo_usuario, Contrasena_ingreso, fk_idRol, fk_idEstado) VALUES (NULL, '$Nombre_usuario', '$Apellido_usuario', '$fk_idGenero', '$fk_idTipo_documento', '$Numero_document', '$Telefono_usuario', '$Direccion_usuario', '$Correo_usuario', '$Contrasena_ingreso', '$fk_idRol', '$fk_idEstado')";
          
          if(!$result2 = $db->query($sql2))
          {
            die('Datos no encontrados!!! [' . $db->error . ']');
          }
          echo "Usuario Registrado!!!!!!";
        }                
          if ($contexistencia!='0')
          {
            echo "El usuario ya se encuentra registrado.";
          }
      }
  }
  $nuevo=new Registro_empleados();
  $nuevo->registrar_emple($_POST["Nombre_usuario"],$_POST["Apellido_usuario"],$_POST["fk_idGenero"],$_POST["fk_idTipo_documento"],$_POST["Numero_document"],$_POST["Telefono_usuario"],$_POST["Direccion_usuario"],$_POST["Correo_usuario"],$_POST["Contrasena_ingreso"],$_POST["fk_idRol"],$_POST["fk_idEstado"])     
?>
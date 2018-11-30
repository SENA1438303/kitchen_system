<?php
  class Registro_proveedor
  {   
    public function registrar_provee($Nombre_empresa,$NIT_empres,$Direccion_empresa,$Telefono_empresa)
      {
        
        include('../../../conexion_db.php');

        $contexistencia=0;
                
        //Consultar si existe un usuario
                
        $sql = "SELECT * FROM usuario WHERE NIT_empresa='$NIT_empres'";
        
        if(!$result = $db->query($sql))
        {
          die('Datos no encontrados!!! [' . $db->error . ']');
        }
     
        while($row = $result->fetch_assoc())
        {
          $ddocumento=stripslashes($row["NIT_empresa"]);
          $contexistencia=$contexistencia+1;
        }
        //Final de consulta de un ususario

        if ($contexistencia=='0')
        {       
            
        $sql2 = "INSERT INTO proveedor (idProveedor, Nombre_empresa, NIT_empresa, Direccion_empresa, Telefono_empresa) VALUES (NULL, '$Nombre_empresa', '$NIT_empres', '$Direccion_empresa', '$Telefono_empresa')";
          
          if(!$result2 = $db->query($sql2))
          {
            die('Datos no encontrados!!! [' . $db->error . ']');
          }
          echo "Proveedor Registrado!!!!!!";
        }                
          if ($contexistencia!='0')
          {
            echo "El proveedor ya se encuentra registrado.";
          }
      }
  }
  $nuevo=new Registro_proveedor();
  $nuevo->registrar_provee($_POST["Nombre_empresa"],$_POST["NIT_empres"],$_POST["Direccion_empresa"],$_POST["Telefono_empresa"])     
?>
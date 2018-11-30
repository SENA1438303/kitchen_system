<?php
  class Registro_categoria
  {   
    public function registrar_catego($Descripcion_categori)
      {
        
        include('../../../conexion_db.php');

        $contexistencia=0;
                
        //Consultar si existe un usuario
                
        $sql = "SELECT * FROM categoria WHERE Descripcion_categoria='$Descripcion_categori'";
        
        if(!$result = $db->query($sql))
        {
          die('Datos no encontrados!!! [' . $db->error . ']');
        }
     
        while($row = $result->fetch_assoc())
        {
          $ddocumento=stripslashes($row["Descripcion_categoria"]);
          $contexistencia=$contexistencia+1;
        }
        //Final de consulta de un ususario

        if ($contexistencia=='0')
        {       
            
        $sql2 = "INSERT INTO categoria (idCatgoria, Descripcion_categoria) VALUES (NULL, '$Descripcion_categori')";
          
          if(!$result2 = $db->query($sql2))
          {
            die('Datos no encontrados!!! [' . $db->error . ']');
          }
          echo "Categoria Registrada!!!!!!";
        }                
          if ($contexistencia!='0')
          {
            echo "La categoria ya se encuentra registrada.";
          }
      }
  }
  $nuevo=new Registro_categoria();
  $nuevo->registrar_catego($_POST["Descripcion_categoria"])     
?>
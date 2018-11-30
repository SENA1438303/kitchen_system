<?php
class Tipo_documentoModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=db_kitchen_system', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tipo_documento");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Tipo_Documento();

				$alm->__SET('idTipo_documento', $r->idTipo_documento);
				$alm->__SET('Descripcion_documento', $r->Descripcion_documento);


				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idTipo_documento)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tipo_documento WHERE idTipo_documento = ?");
			          

			$stm->execute(array($idTipo_documento));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Tipo_Documento();

				$alm->__SET('idTipo_documento', $r->idTipo_documento);
				$alm->__SET('Descripcion_documento', $r->Descripcion_documento);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idTipo_documento)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM tipo_documento WHERE idTipo_documento = ?");			          

			$stm->execute(array($idTipo_documento));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Tipo_Documento $data)
	{
		try 
		{
			$sql = "UPDATE tipo_documento SET Descripcion_documento	 =?
				    WHERE idTipo_documento = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Descripcion_documento'), 
					$data->__GET('idTipo_documento')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Tipo_Documento $data)
	{
		try 
		{
		$sql = "INSERT INTO tipo_documento (Descripcion_documento) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Descripcion_documento')
				
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
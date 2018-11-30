<?php
class CategoriaModel
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

			$stm = $this->pdo->prepare("SELECT * FROM categoria");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Categoria();

				$alm->__SET('idCategoria', $r->idCategoria);
				$alm->__SET('Descripcion_categoria', $r->Descripcion_categoria);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idCategoria)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM categoria WHERE idCategoria = ?");
			          

			$stm->execute(array($idCategoria));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Categoria();

				$alm->__SET('idCategoria', $r->idCategoria);
				$alm->__SET('Descripcion_categoria', $r->Descripcion_categoria);				

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idCategoria)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM categoria WHERE idCategoria = ?");			          

			$stm->execute(array($idCategoria));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Categoria $data)
	{
		try 
		{
			$sql = "UPDATE categoria SET 
						Descripcion_categoria      = ?
				    WHERE idCategoria = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Descripcion_categoria'),
					$data->__GET('idCategoria')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	/*
	public function Registrar(Categoria $data)
	{
		try 
		{
		$sql = "INSERT INTO categoria(idCategoria, Descripcion_categoria) VALUES (NULL, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Descripcion_categoria'),
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}*/
}

?>
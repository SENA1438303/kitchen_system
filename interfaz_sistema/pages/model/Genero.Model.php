<?php
class GeneroModel
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

			$stm = $this->pdo->prepare("SELECT * FROM genero");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Genero();

				$alm->__SET('idGenero', $r->idGenero);
				$alm->__SET('Descripcion_genero', $r->Descripcion_genero);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idGenero)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM genero WHERE idGenero = ?");
			          

			$stm->execute(array($idGenero));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Genero();

			$alm->__SET('idGenero', $r->idGenero);
			$alm->__SET('Descripcion_genero', $r->Descripcion_genero);				

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idGenero)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM genero WHERE idGenero = ?");			          

			$stm->execute(array($idGenero));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Genero $data)
	{
		try 
		{
			$sql = "UPDATE genero SET 
						Descripcion_genero      = ?
				    WHERE idGenero = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Descripcion_genero'),
					$data->__GET('idGenero')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Genero $data)
	{
		try 
		{
		$sql = "INSERT INTO genero (Descripcion_genero) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
		     	array(
				$data->__GET('Descripcion_genero')

				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}

?>
<?php
class FormapagoModel
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

			$stm = $this->pdo->prepare("SELECT * FROM forma_pago");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Formapago();

				$alm->__SET('idForma_pago', $r->idForma_pago);
				$alm->__SET('Descripcion_forma_pago', $r->Descripcion_forma_pago);


				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idForma_pago)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM forma_pago WHERE idForma_pago = ?");
			          

			$stm->execute(array($idForma_pago));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Formapago();

				$alm->__SET('idForma_pago', $r->idForma_pago);
				$alm->__SET('Descripcion_forma_pago', $r->Descripcion_forma_pago);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idForma_pago)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM forma_pago WHERE idForma_pago = ?");			          

			$stm->execute(array($idForma_pago));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Formapago $data)
	{
		try 
		{
			$sql = "UPDATE forma_pago SET 
						
						Descripcion_forma_pago		 =?
				    WHERE idForma_pago = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Descripcion_forma_pago'), 
					$data->__GET('idForma_pago')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Formapago $data)
	{
		try 
		{
		$sql = "INSERT INTO forma_pago (Descripcion_forma_pago) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Descripcion_forma_pago')
				
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
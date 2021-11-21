<?php
class BienesGenerales
{
	private $pdo;

    public $id;
    public $direccion;
    public $ciudad;
    public $telefono;
    public $codigo_postal;
    public $tipo;
    public $precio;

    public function __CONSTRUCT(){
		try{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    //? Listar Mis Bienes en la Base de datos
	public function Index(){
		try{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM bienes_generales");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    //? Registrar Mis Bienes en la Base de datos
    public function Registrar(BienesGenerales $data){
		try {
		$sql = "INSERT INTO bienes_generales (id,direccion,ciudad,telefono,codigo_postal,tipo,precio) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
            ->execute(
				array(
                    $data->id,
                    $data->direccion,
                    $data->ciudad, 
                    $data->telefono, 
                    $data->codigo_postal,
                    $data->tipo,
                    $data->precio
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    //? Eliminar mi bien en la Base de datos
	public function Eliminar($id){
		try {
			$stm = $this->pdo
                    ->prepare("DELETE FROM bienes_generales WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	//? Para verificar que sea único
	public function Unico($id)
	{
		try 
		{
			$stm = $this->pdo
					->prepare("SELECT * FROM bienes_generales WHERE id = ?");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}

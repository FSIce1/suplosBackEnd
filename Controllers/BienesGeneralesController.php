<?php
require_once 'Models/BienesGenerales.php';

class BienesGeneralesController{

    private $model;
    private $mensaje;

    function __construct(){
        $this->model = new BienesGenerales();
        $this->mensaje=array("nada", "nada"); //? Inicializamos el mensaje
    }

    public function index(){
        $data = $this->model->Index();
        $json = $this->list();
        $ciudades = $this->unique($json, 'Ciudad');
        $tipos = $this->unique($json, 'Tipo');

        $Tipo = "";
        $Ciudad = "";

        require_once 'views/index.php';
    }

    public function inicia(){
        $data = [];
        $json = [];
        $ciudades = [];//$this->unique($json, 'Ciudad');
        $tipos = [];//$this->unique($json, 'Tipo');

        $Tipo = "";
        $Ciudad = "";

        $this->mensaje=array("nada", "nada");

        require_once 'views/index.php';
    }

    // TODO: Para el JSON
    //? Recibo la data-1-json de bienes disponibles
    public function list_json(){
        $this->index();
    }

    //? Filtro los bienes disponibles con la ciudad y tipo
    public function filter_json(){

        $Ciudad = $_REQUEST['ciudad'];
        $Tipo = $_REQUEST['tipo'];

        $data = $this->model->Index();
        $json2 = $this->list();
        $ciudades = $this->unique($json2, 'Ciudad');
        $tipos = $this->unique($json2, 'Tipo');

        $json = $this->searchCiudadTipo($Ciudad, $Tipo, $json2);

        require_once 'views/index.php';
    }

    // TODO: Para la base de datos

    //? Lista de Mis Bienes
    public function list_bienes(){
        $this->index();
    }

    //? Llamo los datos y los manda a registrar
    public function store(){
        $json = $this->list();
        $bg = new BienesGenerales();

        $bg->id = $_REQUEST['id'];

        //? Busco mi elemento con el id y traigo sus datos
        $bien = $this->searchBienGeneral($bg->id, $json);

        $bg->direccion = $bien['Direccion'];
        $bg->ciudad = $bien['Ciudad'];
        $bg->telefono = $bien['Telefono'];
        $bg->codigo_postal = $bien['Codigo_Postal'];
        $bg->tipo = $bien['Tipo'];

        //* Damos formato al precio 
        $precio = $bien['Precio'];

        $precio = str_replace(",",".",$precio);
        $precio = str_replace("$","",$precio);

        $bg->precio = $precio;

        if($this->model->Unico($bg->id)){
            $this->mensaje=array("Advertencia", "Ya fue registrado");
        } else {
            $this->model->Registrar($bg);
            $this->mensaje=array("Guardado", "Registrado Correctamente");
        }

        $this->index();
    }

    //? Manda a eliminar el dato
    public function destroy(){
        $this->model->Eliminar($_REQUEST['id']);
        $this->mensaje=array("Eliminado", "Eliminado Correctamente");

        $this->index();
    }

    //? Exportar los datos a un excel
    public function excel(){

        $Ciudad = $_REQUEST['ciudadMisBienes'];
        $Tipo = $_REQUEST['tipoMisBienes'];

        $data = $this->model->Index();
        $json2 = $this->list();
        $ciudades = $this->unique($json2, 'Ciudad');
        $tipos = $this->unique($json2, 'Tipo');

        $json = $this->searchCiudadTipo($Ciudad, $Tipo, $json2);

        /*
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename= productos.xls");
        */
        
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=data_filtro.xls"); 
        header("Pragma: no-cache");
        header("Expires: 0");
        
        //header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        //header("Cache-Control: private",false);

        $salida = "";
        $salida .= "<table border=1>";
        $salida .= "<thead><th>ID</th><th>DIRECCION</th><th>CIUDAD</th><th>TELEFONO</th><th>CODIGO POSTAL</th><th>TIPO</th><th>PRECIO</th></thead>";

        foreach($json as $item){

            $salida .= "<tr><td>".$item['Id']."</td> <td>".$item['Direccion']."</td> <td>".$item['Ciudad']."</td> <td>".$item['Telefono']."</td> <td>".$item['Codigo_Postal']."</td> <td>".$item['Tipo']."</td> <td>".$item['Precio']."</td></tr>";
        }

        $salida .= "</table>";
        echo $salida;

            // Recuperamos los filtros
        /*
            $filtroCiudad = ($_REQUEST['ciudad'])?$_REQUEST['ciudad']:'';
            $filtroTipo = ($_REQUEST['tipo'])?$_REQUEST['tipo']:'';
    
            if($filtroCiudad != '' || $filtroTipo != ''){
                // Buscamos los registros
                $this->listado = $this->model->filtro($filtroCiudad,$filtroTipo);
        */
                // Enviamos data a exportar
                
                //require_once 'excel/excel.php';
            /*
            }else{
                $this->mensaje=array("I", "Selecionar filtros");
                $this->Index();
            }
            */
            

    }
    

    //! Helpers
    function unique($array, $key){

        $temp_array = array();

        foreach ($array as &$v) {

        if (!isset($temp_array[$v[$key]]))
            $temp_array[$v[$key]] =& $v;
        }
        //? Nueva data
        $array = array_values($temp_array);

        return $array;
    }

    public function list(){
        $data = file_get_contents("data-1.json");

        return json_decode($data, true);
    }

    function searchBienGeneral($id, $array) {
        foreach ($array as $key) {
            if ($key['Id'] == $id) {
                return $key;
            }
        }
        return null;
    }

    //? FIltrado de la Ciudad y Tipo
    function searchCiudadTipo($ciudad, $tipo, $array) {
        $filtrado = [];
        foreach ($array as $key) {
            if($ciudad == "" && $tipo == ""){ //? Si ambos están vacíos que me busque todos
                array_push($filtrado, $key);
            } if($ciudad == "") {   //? Si la ciudad está vacía que me busque por tipo solamente
                if ($key['Tipo'] == $tipo) { 
                    array_push($filtrado, $key);
                }
            } else if($tipo == ""){ //? Si el tipo está vacía que me busque por ciudad solamente
                if ($key['Ciudad'] == $ciudad) {
                    array_push($filtrado, $key);
                }
            }else if($ciudad != "" && $tipo != "") { //? Si la ciudad y el tipo no están vacíos que me busque por ambos
                if ($key['Ciudad'] == $ciudad && $key['Tipo'] == $tipo) {
                    array_push($filtrado, $key);
                }
            }
        }
        return $filtrado;
    }

}
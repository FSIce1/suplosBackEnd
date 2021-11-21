<?php
//? Este controlador es el general
require_once 'Models/Database.php';
require_once 'Controllers/BienesGeneralesController.php';

$BienesGeneralesController = new BienesGeneralesController();

if(!isset($_REQUEST['accion'])){
    //? No hay acción

    $BienesGeneralesController->inicia();
} else {

    switch($_REQUEST['accion']){

        /*Para el Json*/
        case 'listarjson';
            $BienesGeneralesController->list_json(); 
        break;

        case 'filtrajson';
            $BienesGeneralesController->filter_json(); 
        break;

        /*Para la base de datos*/
        case 'listar';
            $BienesGeneralesController->index(); 
        break;

        case 'agregar';
            $BienesGeneralesController->store(); 
            //call_user_func( array( $BienesGeneralesController, 'store' ) );
        break;

        case 'eliminar';
            $BienesGeneralesController->destroy(); 
        break;

        /* Para exportar a un excel */
        case 'excel';
            $BienesGeneralesController->excel(); 
        break;

    }

}
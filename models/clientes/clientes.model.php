<?php
require_once("libs/dao.php");

function obtenerClientes(){
    $clientes = Array();
    $sqlstr = sprintf("SELECT cliente_id, cliente_nombre,
    cliente_telefono, cliente_direccion, cliente_edad
    from crm_clientes");
    $clientes = obtenerRegistros($sqlstr);
    return $clientes;
}

function insertCliente($nombre, $telefono, $dire, $edad){
    $strsql = "INSERT INTO [dbo].[crm_clientes]([cliente_nombre],[cliente_telefono],[cliente_direccion],[cliente_edad])
                VALUES('%s', '%s', '%s', %d )";
    $strsql = sprintf($strsql, $nombre  , $telefono, $dire, $edad);
    if(ejecutarQuery($strsql)){
        return true;
    }
    return 0;
}

function updateCliente($nombre, $telefono, $dire, $edad, $id){
    $strsql = "UPDATE [dbo].[crm_clientes] SET	[cliente_nombre] = '%s' ,[cliente_telefono] ='%s' , [cliente_direccion] = '%s' , [cliente_edad] = %d
                WHERE cliente_id = %d";
    $strsql = sprintf($strsql, $nombre, $telefono, $dire, $edad, $id);
    if(ejecutarQuery($strsql)){
        return true;
    }
    return 0;
}

function obtenerClientePorCodigo($codigo){
    $cliente = array();
    $sqlstr = sprintf("SELECT * FROM crm_clientes where cliente_id = %d",$codigo);
    $cliente = obtenerUnRegistro($sqlstr);
    return $cliente;
}
 ?>

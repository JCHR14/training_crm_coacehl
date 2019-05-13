<?php
   //data access object
  
 
  function conn(){
    require_once("libs/parameters.php");
    try {
      $conexion = new PDO($server, $user, $pwd);
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conexion;
    } catch (Exception $e) {
      die(print_r( $e->getMessage() ) );
    }

  }

   function obtenerRegistros($sqlstr){
    $myconn = conn();
    $getData = $myconn->prepare($sqlstr);
    $getData->execute();
    $results = $getData->fetchAll(PDO::FETCH_BOTH);
    $resultArray = array();
    foreach ($results as $row) {
        $resultArray[] = $row;
    }
    return $resultArray;
   }

   function obtenerUnRegistro($sqlstr){
    $results = Array();
    $myconn = conn();
    $getData = $myconn->prepare($sqlstr);
    $getData->execute();
    $results = $getData->fetchAll(PDO::FETCH_BOTH);
    return $results;
   }

   function ejecutarQuery($sqlstr){
    $myconn = conn();
    $getData = $myconn->prepare($sqlstr);
    $results = $getData->execute();
    return $results;
   }

  /*
   function obtenerUnRegistro($sqlstr, &$conexion = null){
        if(!$conexion) global $conexion;
        $result = $conexion->query($sqlstr);
        $resultArray = array();
        $resultArray = $result->fetch_assoc();
        $result->free();
        return $resultArray;

   }
   */
   /*
   function iniciarTransaccion(&$conexion = null){
     if(!$conexion) global $conexion;
     $conexion->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
   }

   function terminarTransaccion($commit=true,&$conexion = null){
     if(!$conexion) global $conexion;
     if($commit && true){
       $conexion->commit();
     }else{
       $conexion->rollback();
     }
   }
   */

   function ejecutarNonQuery($sqlstr, &$conexion = null){
        if(!$conexion) global $conexion;
        $result = $conexion->query($sqlstr);
        return $conexion->affected_rows;
   }

   function valstr($str, &$conexion = null){
      if(!$conexion) global $conexion;
      return $conexion->escape_string($str);
   }

   function getLastInserId(&$conexion = null){
     if(!$conexion) global $conexion;
     return $conexion->insert_id;
   }
?>

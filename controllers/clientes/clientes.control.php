<?php

  /* Users Controller
   * 2017-06-14
   * Created By OJBA
   * Bitacora de Cambios:
   * -----------------------------------------------------------------------
   *| Fecha   | Usuario | Descripción                                      |
   * -----------------------------------------------------------------------
   */
   require_once('models/clientes/clientes.model.php');
  function run(){
      $data = array();
      $data["fltNombre"] = "";
      $filter = '';
      if(isset($_SESSION["clientes_context"])){
        $filter = $_SESSION["clientes_context"]["filter"];
      }
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $filter = $_POST["fltNombre"];
        $_SESSION["clientes_context"] = array("filter"=>$filter);
      }
      $data["fltNombre"] = $filter;
      $data["clientes"] = obtenerClientes();
      renderizar("clientes/clientes", $data );
  }

  run();
;
?>

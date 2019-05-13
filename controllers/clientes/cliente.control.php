<?php
  require_once('models/clientes/clientes.model.php');
  require_once("libs/validadores.php");
  function run(){
    $viewData =array();
    $viewData["mode"] = "";
    $viewData["modeDesc"] = "";
    $viewData["tocken"] = "";
    $viewData["errores"] = array();
    $viewData["haserrores"] = false;
    $viewData["readonly"] = false;

    if($_SERVER["REQUEST_METHOD"] == "GET"){
      if(isset($_GET["mode"])){
        $viewData["mode"] = $_GET["mode"];
        $viewData["clicod"] =$_GET["clicod"];
        switch ($viewData["mode"]) {
          case 'INS':
            $viewData["modeDesc"] = "Nuevo Cliente";
            break;
          case 'UPD':
            $viewData["modeDesc"] = "Editar ";
            break;
          case 'DEL':
            $viewData["modeDesc"] = "Eliminar ";
            break;
          case 'DSP':
            $viewData["modeDesc"] = "Detalle de ";
            $viewData["readonly"] = 'readonly="readonly"';
            break;
          default:
            redirectWithMessage("Accion Solicitada no disponible.", "index.php?page=clientes");
            die();
        }
      }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST["mode"])){
        $viewData["mode"] = $_POST["mode"];
        $viewData["clicod"] = $_POST["clicod"];
        $viewData["txt_cliente_nombre"] = $_POST["txt_cliente_nombre"];
        $viewData["txt_cliente_telefono"] =  $_POST["txt_cliente_telefono"];
        $viewData["txt_cliente_edad"] =  $_POST["txt_cliente_edad"];
        $viewData["txt_cliente_direccion"] =  $_POST["txt_cliente_direccion"];

        if(isEmpty($viewData["txt_cliente_nombre"])){
            $viewData["errores"][] = "Nombrede cliente en formato Incorrecto";
        }
        $viewData["haserrores"] = count($viewData["errores"]) && true;

        switch ($viewData["mode"]) {
          case 'INS':
            $lastId = insertCliente($viewData["txt_cliente_nombre"], $viewData["txt_cliente_telefono"],
                 $viewData["txt_cliente_direccion"], $viewData["txt_cliente_edad"]
              );

              if($lastId){
                redirectWithMessage("Cliente Creado Satisfactoriamente.", "index.php?page=clientes");
                die();
              }else{
                $viewData["errores"][] = "Error al crear el departamento";
                $viewData["haserrores"] = true;
              }

            $viewData["modeDesc"] = "Nuevo Departamento";
            break;

          case 'UPD':
            if(!$viewData["haserrores"] && !empty($viewData["clicod"])){
              $affected = updateCliente($viewData["txt_cliente_nombre"], $viewData["txt_cliente_telefono"],
                $viewData["txt_cliente_direccion"], $viewData["txt_cliente_edad"],  $viewData["clicod"] 
              );

              if($affected){
                redirectWithMessage("Cliente Actualizado Satisfactoriamente.", "index.php?page=clientes");
                die();
              }else{
              // Se muestra un error sobre la edicion del departamento
                $viewData["errores"][] = "Error al editar el departamento";
                $viewData["haserrores"] = true;
              }
            }
            $viewData["modeDesc"] = "Editar ";
            break;
          case 'DEL':
            $viewData["modeDesc"] = "Eliminar ";
            //No se implementará
            break;
          case 'DSP':
            $viewData["modeDesc"] = "Detalle de ";
            $viewData["readonly"] = 'readonly="readonly"';
            break;
          default:
            redirectWithMessage("Acción Solicitada no disponible.", "index.php?page=clientes");
            die();
        }
      }else{
          //Cambia la seguridad del formulario
          //$viewData["tocken"] = md5(time()+"usertr");
          //$_SESSION["user_tocken"] = $viewData["tocken"];
          $viewData["errores"][] = "Error para validar información.";
        }
    }
    if($viewData["clicod"]>0){
      $cliente = Array();
      $cliente = obtenerClientePorCodigo($viewData["clicod"]);
      mergeFullArrayTo($cliente[0],$viewData);
      $viewData["modeDesc"] .= $viewData["cliente_nombre"];
    }
    renderizar("clientes/cliente", $viewData);
  }
run();
 ?>

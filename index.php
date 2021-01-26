<?php

header('Access-Control-Allow-Origin: *');

//Incluyo la clase Usuario
require_once "model/usuario.php";

//Incluyo la clase Categoría
require_once "model/categoria.php";

//Variable de respuesta
$oRespuesta = new stdClass();
$oRespuesta->exito = false;
$oRespuesta->mensaje = '';

//Valido si envío parámetro "action" por URL
if(isset($_REQUEST["action"])){
    //Defino las acciones que se realizarán
    switch ($_REQUEST["action"]) {
        //Listado de usuarios
        case 'listarUsuarios':
            //Creo la variable usuario
            $oUsuario = new Usuario();

            //Asigno los coches a una variable que estará esperando la vista
            $aUsuarios = $oUsuario->getAll();

            $oRespuesta->exito = true;
            $oRespuesta->mensaje = $oUsuario->getMensaje();
            $oRespuesta->usuarios = $aUsuarios;

            //Devuelvo la respuesta
            echo json_encode($oRespuesta);
            header("HTTP/1.1 200 OK");
            exit();

            break;

        //Crear usuario
        case 'crearUsuario':
            //Creo la variable usuario
            $oUsuario = new Usuario();

            //Valido existencia de datos
            $sIdentificacion = isset($_POST['identificacion']) ? $_POST['identificacion'] : null;
            $sNombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
            $sCorreo = isset($_POST['correo']) ? $_POST['correo'] : null;
            $sContrasena = isset($_POST['contrasena']) ? md5($_POST['contrasena']) : null;
            $sNumeroMovil = isset($_POST['numeromovil']) ? $_POST['numeromovil'] : null;
            $iIdTipoUsuario = isset($_POST['idtipousuario']) ? $_POST['idtipousuario'] : null;
            $dFechaCreacion = isset($_POST['fechacreacion']) ? $_POST['fechacreacion'] : date('Y-m-d H:i:s');

            //Seteo los datos en el modelo
            $oUsuario->setIdentificacion($sIdentificacion);
            $oUsuario->setNombre($sNombre);
            $oUsuario->setCorreo($sCorreo);
            $oUsuario->setContrasena($sContrasena);
            $oUsuario->setNumeroMovil($sNumeroMovil);
            $oUsuario->setIdTipoUsuario($iIdTipoUsuario);
            $oUsuario->setFechaCreacion($dFechaCreacion);
            

            //Guardo y manejo los mensajes
            if(!$oUsuario->save()){
                $oRespuesta->exito = false;
                $oRespuesta->mensaje = $oUsuario->getMensaje();

                //Devuelvo la respuesta
                echo json_encode($oRespuesta);
                header("HTTP/1.1 400 Bad Request");
                exit();
            }

            $oRespuesta->exito = true;
            $oRespuesta->mensaje = $oUsuario->getMensaje();

             //Devuelvo la respuesta
             echo json_encode($oRespuesta);
             header("HTTP/1.1 200 OK");
             exit();
            

            break;
        case 'editarUsuario':
            //Creo la variable usuario
            $oUsuario = new Usuario();

            //Valido existencia de datos
            $iId = isset($_POST['id']) ? $_POST['id'] : null;
            $sIdentificacion = isset($_POST['identificacion']) ? $_POST['identificacion'] : null;
            $sNombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
            $sCorreo = isset($_POST['correo']) ? $_POST['correo'] : null;
            $sContrasena = isset($_POST['contrasena']) ? md5($_POST['contrasena']) : null;
            $sNumeroMovil = isset($_POST['numeromovil']) ? $_POST['numeromovil'] : null;
            $iIdTipoUsuario = isset($_POST['idtipousuario']) ? $_POST['idtipousuario'] : null;
            $dFechaActualizacion = isset($_POST['fechaactualizacion']) ? $_POST['fechaactualizacion'] : date('Y-m-d H:i:s');

            //Seteo los datos en el modelo
            $oUsuario->setId($iId);
            $oUsuario->setIdentificacion($sIdentificacion);
            $oUsuario->setNombre($sNombre);
            $oUsuario->setCorreo($sCorreo);
            $oUsuario->setContrasena($sContrasena);
            $oUsuario->setNumeroMovil($sNumeroMovil);
            $oUsuario->setIdTipoUsuario($iIdTipoUsuario);
            $oUsuario->setFechaActualizacion($dFechaActualizacion);

            if(!isset($iId)){
                $oRespuesta->exito = false;
                $oRespuesta->mensaje = "No se envió el identificador del usuario";

                //Devuelvo la respuesta
                echo json_encode($oRespuesta);
                header("HTTP/1.1 400 Bad Request");
                exit();
            }
            

            //Guardo y manejo los mensajes
            if(!$oUsuario->save()){
                $oRespuesta->exito = false;
                $oRespuesta->mensaje = $oUsuario->getMensaje();

                //Devuelvo la respuesta
                echo json_encode($oRespuesta);
                header("HTTP/1.1 400 Bad Request");
                exit();
            }

            $oRespuesta->exito = true;
            $oRespuesta->mensaje = $oUsuario->getMensaje();

             //Devuelvo la respuesta
             echo json_encode($oRespuesta);
             header("HTTP/1.1 200 OK");
             exit();
            

            break;

        case 'eliminarUsuario':
           //Creo la variable usuario
           $oUsuario = new Usuario();

           //Valido existencia de datos
           $iId = isset($_POST['id']) ? $_POST['id'] : null;
           
           //Seteo los datos en el modelo
           $oUsuario->setId($iId);

           if(!isset($iId)){
               $oRespuesta->exito = false;
               $oRespuesta->mensaje = "No se envió el identificador del usuario";

               //Devuelvo la respuesta
               echo json_encode($oRespuesta);
               header("HTTP/1.1 400 Bad Request");
               exit();
           }
           

           //Guardo y manejo los mensajes
           if(!$oUsuario->delete()){
               $oRespuesta->exito = false;
               $oRespuesta->mensaje = $oUsuario->getMensaje();

               //Devuelvo la respuesta
               echo json_encode($oRespuesta);
               header("HTTP/1.1 400 Bad Request");
               exit();
           }

           $oRespuesta->exito = true;
           $oRespuesta->mensaje = $oUsuario->getMensaje();

            //Devuelvo la respuesta
            echo json_encode($oRespuesta);
            header("HTTP/1.1 200 OK");
            exit();
           

           break;

        default:
            //Creo la variable usuario
            $oUsuario = new Usuario();

            //Asigno los coches a una variable que estará esperando la vista
            $aUsuarios = $oUsuario->getAll();

            $oRespuesta->exito = true;
            $oRespuesta->mensaje = $oUsuario->getMensaje();
            $oRespuesta->usuarios = $aUsuarios;

            //Devuelvo el listado de usuarios
            echo json_encode($oRespuesta);
            header("HTTP/1.1 200 OK");
            exit();

            break;
    }
} else {
    //Creo la variable usuario
    $oUsuario = new Usuario();

    //Asigno los coches a una variable que estará esperando la vista
    $aUsuarios = $oUsuario->getAll();

    $oRespuesta->exito = true;
    $oRespuesta->mensaje = $oUsuario->getMensaje();
    $oRespuesta->usuarios = $aUsuarios;

    //Devuelvo el listado de usuarios
    echo json_encode($oRespuesta);
    header("HTTP/1.1 200 OK");
    exit();
}

?>
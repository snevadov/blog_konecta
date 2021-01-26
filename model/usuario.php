<?php

//Importo conexión a base de datos
require_once "lib/pdo.php";

/***
 * Creo una clase para usuario
 * @by: snevadov
 * @date: 2021/01/25
 ***/
class Usuario {

    //Variable para la conexión a la base de datos
    private $dbConection;

    //Atributos de la clase usuario
    
    /**
     * @Name: iId
     * @Type: integer
     */
    private $iId;

    /**
     * @Name: sIdentificacion
     * @Type: string
     */
    private $sIdentificacion;

    /**
     * @Name: sNombre
     * @Type: string
     */
    private $sNombre;

    /**
     * @Name: sCorreo
     * @Type: string
     */
    private $sCorreo;

    /**
     * @Name: sContrasena
     * @Type: string
     */
    private $sContrasena;

    /**
     * @Name: sNumeroMovil
     * @Type: string
     */
    private $sNumeroMovil;

    /**
     * @Name: iIdTipoUsuario
     * @Type: integer
     */
    private $iIdTipoUsuario;

    /**
     * @Name: dFechaCreacion
     * @Type: datetime
     */
    private $dFechaCreacion;

    /**
     * @Name: dFechaActualizacion
     * @Type: datetime
     */
    private $dFechaActualizacion;

    /**
     * @Name: sMensaje
     * @Type: date
     */
    private $sMensaje;

    /**
     * Constructor de la clase
     */
    public function __construct(){

        //Conexión a la base de datos
        $oConexion = new DbConection();
        $this->dbConection = $oConexion->crearConexionBD();

        //Valores por defecto
        $this->iId = null;
        $this->sIdentificacion = null;
        $this->sNombre = null;
        $this->sCorreo = null;
        $this->sContrasena = null;
        $this->sNumeroMovil = null;
        $this->iIdTipoUsuario = null;
        $this->dFechaCreacion = null;
        $this->dFechaActualizacion = null;
        $this->sMensaje = null;
    }

    /**
     * Funcion para obtener el id
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getId(){
        return $this->iId;
    }

    /**
     * Funcion para setear el id
     * @by: snevadov
     * @date: 2021/01/25
     * @params: iId
     */
    public function setId($iId){
        $this->iId = $iId;
    }

    /**
     * Funcion para setear la identficicacion
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sIdentificacion
     */
    public function setIdentificacion($sIdentificacion){
        $this->sIdentificacion = $sIdentificacion;
    }

    /**
     * Funcion para obtener la identficicacion
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getIdentificacion(){
        return $this->sIdentificacion;
    }

    /**
     * Funcion para obtener el Nombre
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getNombre(){
        return $this->sNombre;
    }

    /**
     * Funcion para setear el Nombre
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sNombre
     */
    public function setNombre($sNombre){
        $this->sNombre = $sNombre;
    }

    /**
     * Funcion para obtener el Correo
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getCorreo(){
        return $this->sCorreo;
    }

    /**
     * Funcion para setear el Correo
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sCorreo
     */
    public function setCorreo($sCorreo){
        $this->sCorreo = $sCorreo;
    }

    /**
     * Funcion para obtener la Contrasena
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getContrasena(){
        return $this->sContrasena;
    }

    /**
     * Funcion para setear la Contrasena
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sContrasena
     */
    public function setContrasena($sContrasena){
        $this->sContrasena = $sContrasena;
    }

    /**
     * Funcion para obtener el NumeroMovil
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getNumeroMovil(){
        return $this->sNumeroMovil;
    }

    /**
     * Funcion para setear el NumeroMovil
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sNumeroMovil
     */
    public function setNumeroMovil($sNumeroMovil){
        $this->sNumeroMovil = $sNumeroMovil;
    }

    /**
     * Funcion para obtener el IdTipoUsuario
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getIdTipoUsuario(){
        return $this->iIdTipoUsuario;
    }

    /**
     * Funcion para setear el IdTipoUsuario
     * @by: snevadov
     * @date: 2021/01/25
     * @params: iIdTipoUsuario
     */
    public function setIdTipoUsuario($iIdTipoUsuario){
        $this->iIdTipoUsuario = $iIdTipoUsuario;
    }

    /**
     * Funcion para obtener la Fecha Creación
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getFechaCreacion(){
        return $this->dFechaCreacion;
    }

    /**
     * Funcion para setear la Fecha Creación
     * @by: snevadov
     * @date: 2021/01/25
     * @params: dFechaCreacion
     */
    public function setFechaCreacion($dFechaCreacion){
        $this->dFechaCreacion = $dFechaCreacion;
    }

    /**
     * Funcion para obtener la Fecha Actualización
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getFechaActualizacion(){
        return $this->dFechaActualizacion;
    }

    /**
     * Funcion para setear la Fecha Actualización
     * @by: snevadov
     * @date: 2021/01/25
     * @params: dFechaActualizacion
     */
    public function setFechaActualizacion($dFechaActualizacion){
        $this->dFechaActualizacion = $dFechaActualizacion;
    }

    /**
     * Funcion para obtener el mensaje
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getMensaje(){
        return $this->sMensaje;
    }

    /**
     * Funcion para setear el mensaje
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sMensaje
     */
    public function setMensaje($sMensaje){
        $this->sMensaje = $sMensaje;
    }

    /**
     * Funcion para verificar integridad del usuario antes de guardar
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function verificarIntegridad(){

        if(!isset($this->sIdentificacion) || is_null($this->sIdentificacion)  || strlen($this->sIdentificacion)<1){
            $this->sMensaje = 'El campo "Identificación" es obligatorio';
            return false;
        }

        $aUsuarioByIdentificacion = $this->getUsuariosByIdentificacion();
        if(count($aUsuarioByIdentificacion) > 0){
            $this->sMensaje = 'La identificación '. $this->sIdentificacion .' ya se encuentra registrada';
            return false;
        }


        if(!isset($this->sNombre) || is_null($this->sNombre)  || strlen($this->sNombre)<1){
            $this->sMensaje = 'El campo "Nombre" es obligatorio';
            return false;
        }

        if(!isset($this->sCorreo) || is_null($this->sCorreo)  || strlen($this->sCorreo)<1){
            $this->sMensaje = 'El campo "Correo" es obligatorio';
            return false;
        }

        if(strpos($this->sCorreo, '@') === false){
            $this->sMensaje = 'El campo "Correo" debe contener @';
            return false;
        }

        if(!isset($this->sContrasena) || is_null($this->sContrasena)  || strlen($this->sContrasena)<1){
            $this->sMensaje = 'El campo "Contraseña" es obligatorio';
            return false;
        }

        if(!isset($this->sNumeroMovil) || is_null($this->sNumeroMovil)  || strlen($this->sNumeroMovil)<1){
            $this->sMensaje = 'El campo "Número Móvil" es obligatorio';
            return false;
        }

        if(!isset($this->iIdTipoUsuario) || is_null($this->iIdTipoUsuario)  || strlen($this->iIdTipoUsuario)<1){
            $this->sMensaje = 'El campo "Tipo Usuario" es obligatorio';
            return false;
        }
        
        return true;
        
    }

    /**
     * Funcion para guardar usuario en la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function save(){
        
        //Verifico la integridad        
        if(!$this->verificarIntegridad()){
            return false;
        }

        //Si tiene el id seteado, es update
        if(isset($this->iId)){
            //Inserto en base de datos
            $stmt = $this->dbConection->prepare('UPDATE usuario
            SET identificacion=:identificacion, nombre=:nombre, correo=:correo, contrasena=:contrasena, numeromovil=:numeromovil, 
                idtipousuario=:idtipousuario, fechaactualizacion=:fechaactualizacion
            WHERE id=:id');
            $stmt->execute(
                array(
                    ':identificacion' => $this->sIdentificacion,
                    ':nombre' => $this->sNombre,
                    ':correo' => $this->sCorreo,
                    ':contrasena' => $this->sContrasena,
                    ':numeromovil' => $this->sNumeroMovil,
                    ':idtipousuario' => $this->iIdTipoUsuario,
                    ':fechaactualizacion' => $this->dFechaActualizacion,
                    ':id' => $this->iId
                )
            );

            $this->sMensaje = 'Usuario actualizado satisfactoriamente';

            return true;
        } else {
            //Inserto en base de datos
            $stmt = $this->dbConection->prepare('INSERT INTO usuario
            (identificacion, nombre, correo, contrasena, numeromovil, idtipousuario, fechacreacion) 
            VALUES (:identificacion, :nombre, :correo, :contrasena, :numeromovil, :idtipousuario, :fechacreacion)');
            $stmt->execute(
                array(
                    ':identificacion' => $this->sIdentificacion,
                    ':nombre' => $this->sNombre,
                    ':correo' => $this->sCorreo,
                    ':contrasena' => $this->sContrasena,
                    ':numeromovil' => $this->sNumeroMovil,
                    ':idtipousuario' => $this->iIdTipoUsuario,
                    ':fechacreacion' => $this->dFechaCreacion
                )
            );

            $this->iId = $this->dbConection->lastInsertId();

            $this->sMensaje = 'Usuario insertado satisfactoriamente';

            return true;
        }
    }

    /**
     * Funcion para cargar el usuario de la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function load(){

        //Valido que tenga el id seteado
        if(isset($this->iId)){
            //Cargo de base de datos
            $stmt = $this->dbConection->prepare('SELECT 
            identificacion, nombre, correo, contrasena, numeromovil, idtipousuario, fechacreacion, fechaactualizacion FROM usuario
            WHERE id=:id');
            $stmt->execute(
                array(
                    ':id' => $this->iId
                )
            );

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->sIdentificacion = htmlentities($row['identificacion']);
            $this->sNombre = htmlentities($row['nombre']);
            $this->sCorreo = htmlentities($row['correo']);
            $this->sNumeroMovil = htmlentities($row['numeromovil']);
            $this->iIdTipoUsuario = htmlentities($row['idtipousuario']);
            $this->dFechaCreacion = htmlentities($row['fechacreacion']);
            $this->dFechaActualizacion = htmlentities($row['fechaactualizacion']);


            $this->sMensaje = 'Usuario cargado satisfactoriamente';

            return true;
        } else {
            
            $this->sMensaje = 'No se envió el identificador del usuario';

            return false;
        }
    }

    /**
     * Funcion para cargar listado de usuarios de la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: array
     */
    public function getAll(){
        //Cargo de base de datos
        $stmt = $this->dbConection->query('SELECT u.id, u.identificacion, u.nombre, u.correo, u.idtipousuario, tu.nombre AS tipousuario,
             u.fechacreacion, u.fechaactualizacion 
        FROM usuario AS u
        INNER JOIN tipousuario AS tu ON (u.idtipousuario = tu.id)');
        $aUsuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->sMensaje = 'Todos los usuarios cargados satisfactoriamente';

        return $aUsuarios;
    }

    /**
     * Funcion para eliminar usuario en la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function delete(){
        
        //Valido que tenga id seteado
        if(isset($this->iId)){

            //Elimino en base de datos
            $sql = "DELETE FROM usuario WHERE id = :id";
            $stmt = $this->dbConection->prepare($sql);
            $stmt->execute(array(':id' => $_POST['id']));

            $this->sMensaje = 'Usuario eliminado satisfactoriamente';

            return true;

        } else {

            $this->sMensaje = 'No se envió el identificador del usuario';

            return false;
        }
    }

    /**
     * Funcion para obtener usuarios por identificacion
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function getUsuariosByIdentificacion($sIdentificacion = null){
        
        //Cargo de base de datos
        $sIdentificacion = isset($sIdentificacion) ? $sIdentificacion :  $this->sIdentificacion;
        $stmt = $this->dbConection->prepare('SELECT 
        identificacion, nombre, correo, contrasena, numeromovil, idtipousuario, fechacreacion, fechaactualizacion FROM usuario
        WHERE identificacion=:identificacion');
        $stmt->execute(
            array(
                ':identificacion' => $sIdentificacion
            )
        );
        $aUsuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->sMensaje = 'Todos los usuarios por identificación cargados satisfactoriamente';

        return $aUsuarios;
    }

}

?>
<?php

//Importo conexión a base de datos
require_once "lib/pdo.php";

/***
 * Creo una clase para categoria
 * @by: snevadov
 * @date: 2021/01/25
 ***/
class Categoria {

    //Variable para la conexión a la base de datos
    private $dbConection;

    //Atributos de la clase categoria
    
    /**
     * @Name: iId
     * @Type: integer
     */
    private $iId;

    /**
     * @Name: sNombre
     * @Type: string
     */
    private $sNombre;

    /**
     * @Name: sDescripcion
     * @Type: string
     */
    private $sDescripcion;

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
        $this->sNombre = null;
        $this->sDescripcion = null;
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
     * Funcion para obtener la descripción
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getDescripcion(){
        return $this->sDescripcion;
    }

    /**
     * Funcion para setear la Descripción
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sDescripcion
     */
    public function setDescripcion($sDescripcion){
        $this->sDescripcion = $sDescripcion;
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
     * Funcion para verificar integridad de la categoría antes de guardar
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function verificarIntegridad(){

        if(!isset($this->sNombre) || is_null($this->sNombre)  || strlen($this->sNombre)<1){
            $this->sMensaje = 'El campo "Nombre" es obligatorio';
            return false;
        }

        $aCategoriaByNombre = $this->getCategoriasByNombre();
        if(count($aCategoriaByNombre) > 0){
            $this->sMensaje = 'La categoría '. $this->sNombre .' ya se encuentra registrada.';
            return false;
        }

        return true;
        
    }

    /**
     * Funcion para guardar categoría en la base de datos
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
            $stmt = $this->dbConection->prepare('UPDATE categoria
            SET nombre=:nombre, descripcion=:descripcion, fechaactualizacion=:fechaactualizacion
            WHERE id=:id');
            $stmt->execute(
                array(
                    ':nombre' => $this->sNombre,
                    ':descripcion' => $this->sDescripcion,
                    ':fechaactualizacion' => $this->dFechaActualizacion,
                    ':id' => $this->iId
                )
            );

            $this->sMensaje = 'Categoría actualizada satisfactoriamente';

            return true;
        } else {
            //Inserto en base de datos
            $stmt = $this->dbConection->prepare('INSERT INTO categoria
            (nombre, descripcion, fechacreacion) 
            VALUES (:nombre, :descripcion, :fechacreacion)');
            $stmt->execute(
                array(
                    ':nombre' => $this->sNombre,
                    ':descripcion' => $this->sDescripcion,
                    ':fechacreacion' => $this->dFechaCreacion
                )
            );

            $this->iId = $this->dbConection->lastInsertId();

            $this->sMensaje = 'Categoría insertada satisfactoriamente';

            return true;
        }
    }

    /**
     * Funcion para cargar la categoría de la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function load(){

        //Valido que tenga el id seteado
        if(isset($this->iId)){
            //Cargo de base de datos
            $stmt = $this->dbConection->prepare('SELECT 
            nombre, descripcion, fechacreacion, fechaactualizacion FROM categoria
            WHERE id=:id');
            $stmt->execute(
                array(
                    ':id' => $this->iId
                )
            );

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->sNombre = htmlentities($row['nombre']);
            $this->sDescripcion = htmlentities($row['descripcion']);
            $this->dFechaCreacion = htmlentities($row['fechacreacion']);
            $this->dFechaActualizacion = htmlentities($row['fechaactualizacion']);


            $this->sMensaje = 'Categoría cargada satisfactoriamente';

            return true;
        } else {
            
            $this->sMensaje = 'No se envió el identificador de la categoría';

            return false;
        }
    }

    /**
     * Funcion para cargar listado de categorías de la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: array
     */
    public function getAll(){
        //Cargo de base de datos
        $stmt = $this->dbConection->query('SELECT id, nombre, descripcion, fechacreacion, fechaactualizacion 
        FROM categoria');
        $aCategorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->sMensaje = 'Todas las categorías cargadas satisfactoriamente';

        return $aCategorias;
    }

    /**
     * Funcion para eliminar categoría en la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function delete(){

        if($this->verificarIntegridadEliminar()){
            //Valido que tenga id seteado
            if(isset($this->iId)){

                //Elimino en base de datos
                $sql = "DELETE FROM categoria WHERE id = :id";
                $stmt = $this->dbConection->prepare($sql);
                $stmt->execute(array(':id' => $_POST['id']));

                $this->sMensaje = 'Categoría eliminada satisfactoriamente';

                return true;

            } else {

                $this->sMensaje = 'No se envió el identificador de la categoría';

                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Funcion para obtener categorías por nombre
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function getCategoriasByNombre($sNombre = null){
        
        //Cargo de base de datos
        $sNombre = isset($sNombre) ? $sNombre :  $this->sNombre;
        $iId = isset($this->iId) ? $this->iId :  null;
        
        //Valido si tengo id (es edición) para buscar diferentes a dicho ID
        if(isset($this->iId)){
            $stmt = $this->dbConection->prepare('SELECT id FROM categoria WHERE nombre=:nombre AND id<>:id');
            $stmt->execute(
                array(
                    ':nombre' => $sNombre,
                    ':id' => $iId
                )
            );
        } else {
            $stmt = $this->dbConection->prepare('SELECT id FROM categoria WHERE nombre=:nombre');
            $stmt->execute(
                array(
                    ':nombre' => $sNombre
                )
            );
        }

        //Ejecuto la consulta
        $aCategorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->sMensaje = 'Todas las categorías por nombre cargadas satisfactoriamente';

        return $aCategorias;
    }

    /**
     * Funcion para verificar integridad de la categoría antes de eliminarla
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function verificarIntegridadEliminar(){

        $aCategoriaByNombre = $this->getBlogsByIdCategoria();
        if(count($aCategoriaByNombre) > 0){
            $this->sMensaje = 'La categoría '. $this->sNombre .' no se puede eliminar porque tiene blogs asociados.';
            return false;
        }

        return true;
        
    }

    /**
     * Funcion para obtener blogs asociados por categoria
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function getBlogsByIdCategoria($iId = null){
        
        //Cargo de base de datos
        $iId = isset($iId) ? $iId :  $this->iId;
        
        $stmt = $this->dbConection->prepare('SELECT idblog FROM categoriaxblog WHERE idcategoria=:id');
        $stmt->execute(
            array(
                ':id' => $iId
            )
        );
        
        //Ejecuto la consulta
        $aIdsCategorias = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $this->sMensaje .= 'Todas las categorías por Blog cargadas satisfactoriamente';

        return $aIdsCategorias;
    }

}

?>
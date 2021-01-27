<?php

//Importo conexión a base de datos
require_once "lib/pdo.php";

/***
 * Creo una clase para Blog
 * @by: snevadov
 * @date: 2021/01/25
 ***/
class Blog {

    //Variable para la conexión a la base de datos
    private $dbConection;

    //Atributos de la clase blog
    
    /**
     * @Name: iId
     * @Type: integer
     */
    private $iId;

    /**
     * @Name: sTitulo
     * @Type: string
     */
    private $sTitulo;

    /**
     * @Name: sSlug
     * @Type: string
     */
    private $sSlug;

    /**
     * @Name: sTextoCorto
     * @Type: string
     */
    private $sTextoCorto;

    /**
     * @Name: sTextoLargo
     * @Type: string
     */
    private $sTextoLargo;

    /**
     * @Name: aIdsCategorias
     * @Type: array
     */
    private $aIdsCategorias;

    /**
     * @Name: sRutaImagen
     * @Type: string
     */
    private $sRutaImagen;

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
        $this->sTitulo = null;
        $this->sSlug = null;
        $this->sTextoCorto = null;
        $this->sTextoLargo = null;
        $this->aIdsCategorias = array();
        $this->sRutaImagen = null;
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
     * Funcion para setear la Ruta de Imagen
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sRutaImagen
     */
    public function setRutaImagen($sRutaImagen){
        $this->sRutaImagen = $sRutaImagen;
    }

    /**
     * Funcion para obtener la Ruta de Imagen
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getRutaImagen(){
        return $this->sRutaImagen;
    }

    /**
     * Funcion para obtener el Título
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getTitulo(){
        return $this->sTitulo;
    }

    /**
     * Funcion para setear el Título
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sTitulo
     */
    public function setTitulo($sTitulo){
        $this->sTitulo = $sTitulo;
    }

    /**
     * Funcion para obtener el Slug
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getSlug(){
        return $this->sSlug;
    }

    /**
     * Funcion para setear el Slug
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sSlug
     */
    public function setSlug($sSlug){
        $this->sSlug = $sSlug;
    }

    /**
     * Funcion para obtener la TextoCorto
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getTextoCorto(){
        return $this->sTextoCorto;
    }

    /**
     * Funcion para setear la TextoCorto
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sTextoCorto
     */
    public function setTextoCorto($sTextoCorto){
        $this->sTextoCorto = $sTextoCorto;
    }

    /**
     * Funcion para obtener el TextoLargo
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getTextoLargo(){
        return $this->sTextoLargo;
    }

    /**
     * Funcion para setear el TextoLargo
     * @by: snevadov
     * @date: 2021/01/25
     * @params: sTextoLargo
     */
    public function setTextoLargo($sTextoLargo){
        $this->sTextoLargo = $sTextoLargo;
    }

    /**
     * Funcion para obtener el IdsCategorias
     * @by: snevadov
     * @date: 2021/01/25
     */
    public function getIdsCategorias(){
        return $this->aIdsCategorias;
    }

    /**
     * Funcion para setear el IdsCategorias
     * @by: snevadov
     * @date: 2021/01/25
     * @params: aIdsCategorias
     */
    public function setIdsCategorias($aIdsCategorias){
        $this->aIdsCategorias = $aIdsCategorias;
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
     * Funcion para verificar integridad del blog antes de guardar
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function verificarIntegridad(){

        if(!isset($this->sTitulo) || is_null($this->sTitulo)  || strlen($this->sTitulo)<1){
            $this->sMensaje = 'El campo "Título" es obligatorio';
            return false;
        }

        if(!isset($this->sSlug) || is_null($this->sSlug)  || strlen($this->sSlug)<1){
            $this->sMensaje = 'El campo "Slug" es obligatorio';
            return false;
        }

        if(!isset($this->sTextoCorto) || is_null($this->sTextoCorto)  || strlen($this->sTextoCorto)<1){
            $this->sMensaje = 'El campo "Texto Corto" es obligatorio';
            return false;
        }

        if(!isset($this->sTextoLargo) || is_null($this->sTextoLargo)  || strlen($this->sTextoLargo)<1){
            $this->sMensaje = 'El campo "Texto Largo" es obligatorio';
            return false;
        }

        if(count($this->aIdsCategorias)<1){
            $this->sMensaje = 'El blog debe tener al menos una categoría';
            return false;
        }
        
        return true;
        
    }

    /**
     * Funcion para guardar blog en la base de datos
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
            $stmt = $this->dbConection->prepare('UPDATE blog
            SET titulo=:titulo, slug=:slug, textocorto=:textocorto, textolargo=:textolargo, 
                rutaimagen=:rutaimagen, fechaactualizacion=:fechaactualizacion
            WHERE id=:id');
            $stmt->execute(
                array(
                    ':titulo' => $this->sTitulo,
                    ':slug' => $this->sSlug,
                    ':textocorto' => $this->sTextoCorto,
                    ':textolargo' => $this->sTextoLargo,
                    ':rutaimagen' => $this->sRutaImagen,
                    ':fechaactualizacion' => $this->dFechaActualizacion,
                    ':id' => $this->iId
                )
            );

            $this->sMensaje = 'Blog actualizado satisfactoriamente.';

            //Actualizo las categorías
            $this->saveBlogXCategoria();

            return true;
        } else {
            //Inserto en base de datos
            $stmt = $this->dbConection->prepare('INSERT INTO blog
            (titulo, slug, textocorto, textolargo, rutaimagen, fechacreacion) 
            VALUES (:titulo, :slug, :textocorto, :textolargo, :rutaimagen, :fechacreacion)');
            $stmt->execute(
                array(
                    ':titulo' => $this->sTitulo,
                    ':slug' => $this->sSlug,
                    ':textocorto' => $this->sTextoCorto,
                    ':textolargo' => $this->sTextoLargo,
                    ':rutaimagen' => $this->sRutaImagen,
                    ':fechacreacion' => $this->dFechaCreacion
                )
            );

            $this->iId = $this->dbConection->lastInsertId();

            $this->sMensaje = 'Blog insertado satisfactoriamente.';

            //Actualizo las categorías
            $this->saveBlogXCategoria();

            return true;
        }
    }

    /**
     * Funcion para cargar el blog de la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function load(){

        //Valido que tenga el id seteado
        if(isset($this->iId)){
            //Cargo de base de datos
            $stmt = $this->dbConection->prepare('SELECT 
            titulo, slug, textocorto, textolargo, rutaimagen, fechacreacion, fechaactualizacion FROM blog
            WHERE id=:id');
            $stmt->execute(
                array(
                    ':id' => $this->iId
                )
            );

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->sTitulo = htmlentities($row['titulo']);
            $this->sSlug = htmlentities($row['slug']);
            $this->sTextoCorto = htmlentities($row['textocorto']);
            $this->sTextoLargo = htmlentities($row['textolargo']);
            $this->sRutaImagen = htmlentities($row['rutaimagen']);
            $this->dFechaCreacion = htmlentities($row['fechacreacion']);
            $this->dFechaActualizacion = htmlentities($row['fechaactualizacion']);
            $this->aIdsCategorias = $this->getIdsCategorias();


            $this->sMensaje = 'Blog cargado satisfactoriamente';

            return true;
        } else {
            
            $this->sMensaje = 'No se envió el identificador del blog';

            return false;
        }
    }

    /**
     * Funcion para cargar listado de blogs de la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: array
     */
    public function getAll(){

        //Cargo de base de datos
        $stmt = $this->dbConection->query('SELECT b.id, MAX(b.titulo) AS titulo, MAX(b.slug) AS slug, 
            MAX(b.textocorto) AS textocorto, MAX(b.textolargo) AS textolargo, MAX(b.rutaimagen) AS rutaimagen, GROUP_CONCAT(c.nombre) AS categorias, GROUP_CONCAT(c.id) AS idcategorias,
            MAX(b.fechacreacion) as fechacreacion, MAX(b.fechaactualizacion) AS fechaactualizacion
        FROM blog AS b
        LEFT JOIN categoriaxblog AS cxb ON (b.id = cxb.idblog)
        LEFT JOIN categoria AS c ON (c.id = cxb.idcategoria)
        GROUP BY b.id');
        $aBlogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->sMensaje = 'Todos los blogs cargados satisfactoriamente';

        return $aBlogs;
    }

    /**
     * Funcion para eliminar blog en la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function delete(){
        
        //Valido que tenga id seteado
        if(isset($this->iId)){

            //Elimino primero las categorías
            if($this->deleteCategoriasxBlog()){
                //Elimino en base de datos
                $sql = "DELETE FROM blog WHERE id = :id";
                $stmt = $this->dbConection->prepare($sql);
                $stmt->execute(array(':id' => $_POST['id']));

                $this->sMensaje = 'Blog eliminado satisfactoriamente';

                return true;
            } else {
                $this->sMensaje = 'Error eliminando cateogrías de un Blog';

                return false;
            }

        } else {

            $this->sMensaje = 'No se envió el identificador del blog';

            return false;
        }
    }

    /**
     * Funcion para guardar blogxcategoria en la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function saveBlogXCategoria(){
        
        //Defino variables para agregar nuevas categorías y eliminar las que se quitaron
        $aIdsCategoriaEliminar = array();
        $aIdsCategoriaNuevas = array();
        $aIdsCategoriaAnteriores = $this->getCategoriasxBlog();

        //Busco las categorías nuevas
        foreach ($this->aIdsCategorias as $indice => $iIdCategoria) {

            if(!in_array($iIdCategoria, $aIdsCategoriaAnteriores)){
                $aIdsCategoriaNuevas[] = $iIdCategoria;
            }
        }

        //Busco las categorías eliminadas
        foreach ($aIdsCategoriaAnteriores as $indice => $iIdCategoriaAnterior) {

            if(!in_array($iIdCategoriaAnterior, $this->aIdsCategorias)){
                $aIdsCategoriaEliminar[] = $iIdCategoriaAnterior;
            }
        }

        //Inserto en base de datos las categorías nuevas
        foreach ($aIdsCategoriaNuevas as $iIdCategoriaNueva) {
            $stmt = $this->dbConection->prepare('INSERT INTO categoriaxblog
            (idblog, idcategoria) 
            VALUES (:idblog, :idcategoria)');
            $stmt->execute(
                array(
                    ':idblog' => $this->iId,
                    ':idcategoria' => $iIdCategoriaNueva
                )
            );

            $this->sMensaje .= ' Categoría '.$iIdCategoriaNueva.' asociada al blog satisfactoriamente.';
        }

        //Elimino en base de datos las categorías borradas
        foreach ($aIdsCategoriaEliminar as $iIdCategoriaEliminar) {
            $stmt = $this->dbConection->prepare('DELETE FROM categoriaxblog WHERE idblog=:idblog AND idcategoria=:idcategoria');
            $stmt->execute(
                array(
                    ':idblog' => $this->iId,
                    ':idcategoria' => $iIdCategoriaEliminar
                )
            );

            $this->sMensaje .= ' Categoría '.$iIdCategoriaEliminar.' desasociada al blog satisfactoriamente.';
        }

        return true;
    }

    /**
     * Funcion para cargar listado de categorias de un blog de la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: array
     */
    public function getCategoriasxBlog($iId = null){
        
        //Cargo de base de datos
        $iId = isset($iId) ? $iId :  $this->iId;
        
        $stmt = $this->dbConection->prepare('SELECT idcategoria FROM categoriaxblog WHERE idblog=:id');
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

    /**
     * Funcion para eliminar categorias de un blog de la base de datos
     * @by: snevadov
     * @date: 2021/01/25
     * @return: Boolean
     */
    public function deleteCategoriasxBlog($iId = null){
        
        //Cargo de base de datos
        $iId = isset($iId) ? $iId :  $this->iId;
        
        $stmt = $this->dbConection->prepare('DELETE FROM categoriaxblog WHERE idblog=:id');
        $stmt->execute(
            array(
                ':id' => $iId
            )
        );

        $this->sMensaje .= 'Todas las categorías por Blog eliminadas satisfactoriamente';

        return true;
    }
}

?>
<?php
    class DbConection{

        /**
         * @Name: dbConexion
         * @Type: PDO
         */
        private $pdo;

        /**
         * Constructor de la clase
         */
        public function _construct(){
            //Valores por defecto
            $this->pdo = null;
        }

        /**
         * Funcion para crear la conexión a la bd
         * @by: snevadov
         * @date: 2021/01/25
         */
        public function crearConexionBD(){
            //Conexión a la base de datos
            $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=blog_konecta', 'konectaAdmin', 'AdministradorBlogKonecta2021*');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            return $this->pdo;
        }
    }
?>
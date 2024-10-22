<?php
    class imagenGaleria{

        const RUTA_IMAGENES_PORTFOLIO='images/index/portfolio/';
        const RUTA_IMAGENES_GALLERY='images/index/gallery/';

        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDownload;


        public function __construct($nombre, $descripcion, $numVisualizaciones = 0, $numLikes = 0, $numDownload = 0)
        {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->numVisualizaciones = $numVisualizaciones;
            $this->numLikes = $numLikes;
            $this->numDownload = $numDownload;
        }


        public function getUrlPortfolio():string
        {
            return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
        }

        public function getUrlGallery():string
        {
            return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
        }

        
        /**
         * Get the value of nombre
         */ 
        public function getNombre():string
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre):void
        {
                $this->nombre = $nombre;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion():string
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion):void
        {
                $this->descripcion = $descripcion;

        }

        /**
         * Get the value of numVisualizaciones
         */ 
        public function getNumVisualizaciones():int
        {
                return $this->numVisualizaciones;
        }

        /**
         * Set the value of numVisualizaciones
         *
         * @return  self
         */ 
        public function setNumVisualizaciones($numVisualizaciones):void
        {
                $this->numVisualizaciones = $numVisualizaciones;
        }

        /**
         * Get the value of numLikes
         */ 
        public function getNumLikes():int
        {
                return $this->numLikes;
        }

        /**
         * Set the value of numLikes
         *
         * @return  self
         */ 
        public function setNumLikes($numLikes):void
        {
                $this->numLikes = $numLikes;
        }

        /**
         * Get the value of numDownload
         */ 
        public function getNumDownload():int
        {
                return $this->numDownload;
        }

        /**
         * Set the value of numDownload
         *
         * @return  self
         */ 
        public function setNumDownload($numDownload):void
        {
                $this->numDownload = $numDownload;
        }

    }


?>
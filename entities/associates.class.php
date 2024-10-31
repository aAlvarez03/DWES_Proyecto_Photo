<?php
    class Associate
    {
        private $nombre;
        private $logo;
        private $descripcion;

        public function __construct($nombre, $logo, $descripcion)
        {
            $this->nombre = $nombre;
            $this->logo = $logo;
            $this->descripcion = $descripcion;
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
         * Get the value of logo
         */ 
        public function getLogo():string
        {
                return $this->logo;
        }

        /**
         * Set the value of logo
         *
         * @return  self
         */ 
        public function setLogo($logo):void
        {
                $this->logo = $logo;
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
    }
?>
<?php
    require __DIR__.'/../exceptions/FileException.class.php';
    class File
    {
        private $file;
        private $fileName;

        /**
         * File constructor.
         * @param string $fileName
         * @param array $arrTypes
         * @throws FileException
         */


        public function __construct(string $fileName, array $arrTypes)
        {
            //Con $fileName obtendremos el fichero mediante el array $_FILES que contiene todos los ficheros que se suben al servidor mediante un formulario
            $this->file = $_FILES[$fileName];
            $this->fileName = '';

            //Comprobamos que el array contiene el fichero
            if(!isset($this->file)){
                throw new FileException('Debes seleccionar un fichero');
            }

            //Verificamos si ha habido algún error durante la subida del fichero
            if($this->file['error'] !== UPLOAD_ERR_OK){
                //Dentro del if verificamos de que tipo ha sido el error
                switch ($this->file['error']){
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:{
                        throw new FileException('El fichero es demasiado grande');
                        break;
                    }
                    case UPLOAD_ERR_PARTIAL:{
                        throw new FileException('No se ha podido subir el fichero completo');
                        break;
                    }
                    default:{
                        throw new FileException('No se ha podido subir el fichero');
                        break;
                    }
                }
            }

            //Comprovamos si el fichero subido es de un tipo de los que tenemos sorportados
            if(in_array($this->file['type'], $arrTypes) === false){
                throw new FileException('Tipo de fichero no soportado');
            }
        }

        public function getFileName()
        {
            return $this->fileName;
        }


        
        public function saveUploadFile(string $rutaDestino){
            //Compruebo que el fichero temporal con el que vamos a trabajar se haya subido previamente por peticion POST
            if(is_uploaded_file($this->file['tmp_name']) === false){
                throw new FileException('El archivo no se ha subido mediante el formulario');
            }
            //Cargamos el nombre del fichero
            $this->fileName = $this->file['name']; //nombre original del fichero cuando se subió
            $ruta = $rutaDestino.$this->fileName; //concateno la rutaDestino con el nombre del fichero

            //Comprobamos que la ruta no se corresponda con un fichero ya exista
            if(is_file($ruta) == true){
                //No sobreescribo, sino que genero una nueva añadiendo la fecha y hora actual
                $fechaActual = date('dmYHis');
                $this->fileName = $this->fileName.'_'.$fechaActual;
                $ruta = $rutaDestino.$this->fileName; //actualizo la variable de ruta con el nuevo nombre
            }
            // Muevo el fichero subido del directorio temporal (viene definido en el php.ini)
            if(move_uploaded_file($this->file['tmp_name'], $ruta) === false){
                //Devuelve false si no se ha podido mover
                throw new FileException('No se puede mover el fichero a su destino');
            }
        }


        /**
         * @param string $rutaOrigen
         * @param string $rutaDestino
         * @throws FileException
         */
        public function copyFile(string $rutaOrigen, string $rutaDestino){
            $origen = $rutaOrigen.$this->fileName;
            $destino = $rutaDestino.$this->fileName;

            if(is_file($origen) === false){
                throw new FileException("No existe el fichero $origen que intentas copiar");
            }

            if(is_file($destino) === true){
                throw new FileException("El fichero $destino ya existe y no se puede sobreescribir");
            }

            if(copy($origen, $destino) === false){
                throw new FileException("No se ha podido copiar el fichero $origen a $destino");
            }
        }
    }
    
?>
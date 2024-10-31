<?php
    require __DIR__.'/../exceptions/FileException.class.php';
    require __DIR__.'/../utils/strings.php';
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
                $excepcion = ERROR_STRINGS[$this->file['error']] ?? 'No se ha podido subir el fichero';

                throw new FileException($excepcion);
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
            $this->fileName = pathinfo($this->file['name'], PATHINFO_FILENAME); // Nombre sin extensión
            $extension = pathinfo($this->file['name'], PATHINFO_EXTENSION); // Solo la extensión
            $ruta = $rutaDestino . $this->fileName . '.' . $extension;

            // Generar un número secuencial si el archivo ya existe
            $contador = 1;
            while (is_file($ruta)) {
                // Si existe, no sobreescribo, creo uno nuevo con un numero dependiendo la cantidad de veces que se repite
                $ruta = $rutaDestino . $this->fileName . '(' . $contador . ')' . '.' . $extension;
                $contador++;
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
            // Cargamos el nombre del fichero tanto en la ruta de origen como destino
            $this->fileName = pathinfo($this->file['name'], PATHINFO_FILENAME);
            $extension = pathinfo($this->file['name'], PATHINFO_EXTENSION);
            $origen = $rutaOrigen.$this->fileName.'.'.$extension;
            $destino = $rutaDestino.$this->fileName.'.'.$extension;

            // Compruebo si el archivo ya existe en el directorio destino y no sobreescribo, creo uno nuevo con un numero dependiendo la cantidad de veces que se repite.
            $contador = 1;
            while (is_file($destino)) {
                $destino = $rutaDestino . $this->fileName . '(' . $contador . ')' . '.' . $extension;
                $contador++;
            }

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
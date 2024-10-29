<?php
	require 'utils/utils.php';
	require 'utils/File.class.php';
    require 'entities/imagenGaleria.class.php';

    // Array para guardar los mensajes de errores
    $errores = [];
    $descripcion = '';
    $mensaje = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados);
            //el parametro fileName es 'imagen' porque asi lo indicamos en el formulario (type='file' name='imagen')

            // Guardamos la imagen en la galeria
            $imagen -> saveUploadFile(imagenGaleria::RUTA_IMAGENES_GALLERY);
            // Copiamos la imagen desde galeria a portfolio
            $imagen ->copyFile(imagenGaleria::RUTA_IMAGENES_GALLERY, imagenGaleria::RUTA_IMAGENES_PORTFOLIO);

            $mensaje = 'Datos enviados.';
        }
        catch(FileException $exception)
        {
            $errores[] = $exception->getMessage();
        }
        
    }

    require 'views/galery.view.php';
?>
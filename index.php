<?php
    require 'entities/imagenGaleria.class.php';
    require 'utils/utils.php';

    $imagenes = [];

    for ($i=1; $i <= 12; $i++) { 
        $imagen = new imagenGaleria($i.'.jpg','Descripcion imagen '.$i, rand(800, 1500), rand(200, 800), rand(10, 100));
        array_push($imagenes, $imagen);
    }


    require 'views/index.view.php';
?>
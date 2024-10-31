<?php
    require 'entities/imagenGaleria.class.php';
    require 'entities/associates.class.php';
    require 'utils/utils.php';

    $imagenes = [];
    $asociados = [];

    for ($i=1; $i <= 12; $i++) { 
        $imagen = new imagenGaleria($i.'.jpg','Descripcion imagen '.$i, rand(800, 1500), rand(200, 800), rand(10, 100));
        array_push($imagenes, $imagen);
    }

    for($i=1; $i <= rand(3, 12); $i++){
        $asociado = new Associate("Partner número ".$i,'log'.rand(1,3).'.jpg','imagen'.$i);
        array_push($asociados, $asociado);
    }    

    require 'views/index.view.php';
?>
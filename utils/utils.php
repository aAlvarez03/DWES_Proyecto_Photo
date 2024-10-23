<?php
    function esOpcionMenuActiva(string $opcionMenu): bool
    {
        if(str_contains($_SERVER['REQUEST_URI'], $opcionMenu)){
            return true;
        }else{
            return false;
        }
    }

    function existeOpcionMenuActivaEnArray(array $opciones): bool
    {
        foreach ($opciones as $opcion) {
            if(esOpcionMenuActiva($opcion)){
                return true;
            }
        }
        return false;
    }
?>
<?php
  foreach(extraerAleatorios($asociados) as $asociado):
?>

  <div class="text-muted text-left">
    <ul class="list-inline">
      <li><img src="images/index/<?=$asociado->getLogo()?>" alt="<?=$asociado->getDescripcion()?>"></li>
      <li><?=$asociado->getNombre()?></li>
    </ul>
  </div>

<?php endforeach ?>
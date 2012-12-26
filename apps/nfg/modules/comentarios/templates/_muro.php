<div id="wall">
  <ul id="message">
    <?php foreach($comentarios as $comentario): ?>
    <li><span id="date"><?php echo $comentario->getNfgUsuario();?></span><span><?php echo $comentario->getTexto();?></span><span id="date"><?php echo $comentario->getFecha();?></span></li>
    <?php endforeach ?>
  </ul>
</div>
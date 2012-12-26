<div id="form">
   <form action="<?php echo url_for('comentarios/create');?>" method="post" id="form_wall">
      <input type="hidden" name="idconv" value="<?php echo $idconvocatoria;?>" />
      <label for="msg">Escribe un comentario...</label>
      <br />
      <input type="text" name="texto" id="texto" maxlength="200" size="50" />
      <input type="submit" name="submit" id="submit" value="Comentar" />
   </form>
</div>
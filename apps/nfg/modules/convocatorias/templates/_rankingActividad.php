  <div style="font-size:10px;">
    <div style="float:left;">
      <ul>
        <?php foreach($actividades as $actividad): ?>
        <li><?php echo $actividad['nombre']." (".$actividad['num'].")";?></li>
        <?php endforeach;?>
      </ul>
    </div>
    
  </div>

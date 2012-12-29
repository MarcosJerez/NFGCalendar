<?php if(!isset($convocatoria)) $convocatoria = new NfgConvocatoria(); ?>
<?php include_component('calendar', 'new', array('convocatoria'=>$convocatoria)) ?>
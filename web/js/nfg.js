$(document).ready(function(){
  $("#autocomplete_nfg_convocatoria_id_actividad").focusout(function(){
    if($("#nfg_convocatoria_id_actividad").val()=="")
      $("#alta_actividad").show();
    else
      $("#alta_actividad").hide();
  });
  $("#autocomplete_nfg_convocatoria_id_lugar_ini").focusout(function(){
    if($("#nfg_convocatoria_id_lugar_ini").val()=="")
      $("#alta_lugar_ini").show();
    else
      $("#alta_lugar_ini").hide();
  });

  $('#nfg_convocatoria_participantes_min').numeric();
  $('#nfg_convocatoria_participantes_max').numeric();
  
  $('#nfg_convocatoria_participantes_max').focusout(function(){
    if(parseInt($('#nfg_convocatoria_participantes_max').val()) < parseInt($('#nfg_convocatoria_participantes_min').val()))
       $('#nfg_convocatoria_participantes_min').focus();
  });
  $('#nfg_convocatoria_participantes_min').focusout(function(){
    if(parseInt($('#nfg_convocatoria_participantes_max').val()) <= parseInt($('#nfg_convocatoria_participantes_min').val()))
        $('#nfg_convocatoria_participantes_max').focus();
  });
});
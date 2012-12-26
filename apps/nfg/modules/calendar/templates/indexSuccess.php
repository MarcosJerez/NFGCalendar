
    <div id="fb-root"></div>
    <?php if ($isAuthenticated):  
      $userInfo = $facebook->api('/' + $fb_userId); 
      echo "Hola ". $userInfo['name'];
    else : ?>
    <fb:login-button scope="read_stream,publish_stream"></fb:login-button>
    <?php endif ?>
    <!--<a onclick="FB.login()">Publicar</a>-->


        <div id="fb-root"></div>
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '38871837476', // App ID
              channelUrl : '//http://nosfaltagente.com/channel.html', // Channel File
              status     : true, // check login status
              cookie     : true, // enable cookies to allow the server to access the session
              xfbml      : true  // parse XFBML
            });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
          };
          
          // Load the SDK Asynchronously
          (function(d){
             var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement('script'); js.id = id; js.async = true;
             js.src = "//connect.facebook.net/en_US/all.js";
             ref.parentNode.insertBefore(js, ref);
           }(document));
           
            FB.login(function(response) {}, {scope: 'email,user_likes'});
        </script>

  















<?php use_stylesheet('../js/fullcalendar-1.5.4/fullcalendar/fullcalendar.css'); ?> 
<?php use_javascript('fullcalendar-1.5.4/jquery/jquery-1.8.1.min.js'); ?>
<?php use_javascript('fullcalendar-1.5.4/jquery/jquery-ui-1.8.23.custom.min.js'); ?>
<?php use_javascript('fullcalendar-1.5.4/fullcalendar/fullcalendar.min.js'); ?>
<?php use_javascript('bootstrap.min.js'); ?>
<?php include_stylesheets() ?>
<?php include_javascripts() ?>

<div id="calendar"></div>

<div class="modal hide" id="nueva">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">✕</button>
        <h3>Nuevo evento</h3>
  </div>
  <div class="modal-body">
  <form method="POST" class="form-horizontal" action="<?php echo url_for('calendar/new');?>">
    <div class="control-group">
      <label class="control-label">¿Qué?</label>
      <div class="controls">
        <?php echo $sf_data->getRaw('widgetActividades')->render('convocatoria[id_actividad]');?>
      </div>  
    </div>
    
    <div class="control-group">
      <label class="control-label">¿Dónde?</label>
      <div class="controls">
        <div class="input-prepend">
          <span class="add-on">Salida</span>
          <?php echo $sf_data->getRaw('widgetLocalidades')->render('convocatoria[lugar_ini]',null, array('class'=>'input-large'));?>
        </div>
        <div class="input-prepend">
          <span class="add-on">Llegada</span>
          <?php echo $sf_data->getRaw('widgetLocalidades')->render('convocatoria[lugar_fin]',null, array('class'=>'input-large'));?>
        </div>
      </div>
      
  
    </div>
    <div class="control-group">
      <label class="control-label">¿Cuándo?</label>
      <div class="controls">
        <input type="text" class="input-small" id="day" name="convocatoria[day]"></input>
        <input type="text" class="input-mini" id="hora" name ="convocatoria[hora]" size="5" data-provide="typeahead" data-items="4" data-source=""></input>
        <p class="help-inline">Hora del evento.</p>  
      </div>
    </div>
    <div class="control-group">
      <label class="control-label">¿Cuántos?</label>
      <div class="controls">
        <div class="input-prepend">
          <span class="add-on">Mínimo</span>
          <input type="text" class="input-mini" name ="convocatoria[participantes_min]" size="2"></input>
        </div>
        <div class="input-prepend">
          <span class="add-on">Máximo</span>
          <input type="text" class="input-mini" name ="convocatoria[participantes_max]" size="2"></input>
        </div>
        <p class="help-inline">Número de participantes incluído tú.</p>
      </div>
    </div>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
  </div>
</div>

<div id="evento" class="modal hide">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">✕</button>
        <h3>Info del evento</h3>
  </div>
  <div id="apuntados" class="modal-body"></div>
  <form id="evento_form" method="POST" action="<?php echo url_for('calendar/apuntarse');?>">
    <input type="hidden" id="id" name="convocatoria[id]"></input>
    <div id="acciones"></div>  
  </form>
</div>



<script type="text/javascript">
$(document).ready(function() {
    var base_url = '<?php echo url_for('calendar/apuntarse');?>';
    
    $('#hora').typeahead({
          source: ["00:00","00:05","00:10","00:15","00:20","00:25","00:30","00:35","00:40","00:45","00:50","00:55",
                   "01:00","01:05","01:10","01:15","01:20","01:25","01:30","01:35","01:40","01:45","01:50","01:55",
                   "02:00","02:05","02:10","02:15","02:20","02:25","02:30","02:35","02:40","02:45","02:50","02:55",
                   "03:00","03:05","03:10","03:15","03:20","03:25","03:30","03:35","03:40","03:45","03:50","03:55",
                   "04:00","04:05","04:10","04:15","04:20","04:25","04:30","04:35","04:40","04:45","04:50","04:55",
                   "05:00","05:05","05:10","05:15","05:20","05:25","05:30","05:35","05:40","05:45","05:50","05:55",
                   "06:00","06:05","06:10","06:15","06:20","06:25","06:30","06:35","06:40","06:45","06:50","06:55",
                   "07:00","07:05","07:10","07:15","07:20","07:25","07:30","07:35","07:40","07:45","07:50","07:55",
                   "08:00","08:05","08:10","08:15","08:20","08:25","08:30","08:35","08:40","08:45","08:50","08:55",
                   "09:00","09:05","09:10","09:15","09:20","09:25","09:30","09:35","09:40","09:45","09:50","09:55",
                   "10:00","10:05","10:10","10:15","10:20","10:25","10:30","10:35","10:40","10:45","10:50","10:55",
                   "11:00","11:05","11:10","11:15","11:20","11:25","11:30","11:35","11:40","11:45","11:50","11:55",
                   "12:00","12:05","12:10","12:15","12:20","12:25","12:30","12:35","12:40","12:45","12:50","12:55",
                   "13:00","13:05","13:10","13:15","13:20","13:25","13:30","13:35","13:40","13:45","13:50","13:55",
                   "14:00","14:05","14:10","14:15","14:20","14:25","14:30","14:35","14:40","14:45","14:50","14:55",
                   "15:00","15:05","15:10","15:15","15:20","15:25","15:30","15:35","15:40","15:45","15:50","15:55",
                   "16:00","16:05","16:10","16:15","16:20","16:25","16:30","16:35","16:40","16:45","16:50","16:55",
                   "17:00","17:05","17:10","17:15","17:20","17:25","17:30","17:35","17:40","17:45","17:50","17:55",
                   "18:00","18:05","18:10","18:15","18:20","18:25","18:30","18:35","18:40","18:45","18:50","18:55",
                   "19:00","19:05","19:10","19:15","19:20","19:25","19:30","19:35","19:40","19:45","19:50","19:55",
                   "20:00","20:05","20:10","20:15","20:20","20:25","20:30","20:35","20:40","20:45","20:50","20:55",
                   "21:00","21:05","21:10","21:15","21:20","21:25","21:30","21:35","21:40","21:45","21:50","21:55",
                   "22:00","22:05","22:10","22:15","22:20","22:25","22:30","22:35","22:40","22:45","22:50","22:55",
                   "23:00","23:05","23:10","23:15","23:20","23:25","23:30","23:35","23:40","23:45","23:50","23:55"
                  ]
    });
  
    $('#calendar').fullCalendar({
        allDayDefault: false,
        firstDay: 1,
        timeFormat: 'H:mm',
        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
        buttonText: {today: 'Hoy'},
        dayClick: function(date, allDay, jsEvent, view) {
          if (allDay) {
            $('#day').val((date.getYear('%Y')+1900) + '-' + (date.getMonth()+1) + '-' + date.getDate());
            //$('#nueva').css('top', jsEvent.pageY).css('left',jsEvent.pageX).show();
            $('#nueva').modal('show');
            $('#evento').hide();
          }else{
              alert('Clicked on the slot: ' + date);
          }
          //jsEvent.pageX
        },
        
        eventClick: function(calEvent, jsEvent, view) {
          $.ajax({
                    type:'POST',
                    dataType:'html',
                    data:{id:calEvent.id},
                    success:function(data, textStatus){$('#evento').html(data);},
                    beforeSend:function(XMLHttpRequest){},
                    complete:function(XMLHttpRequest, textStatus){},
                    url: '<?php echo url_for('calendar/evento'); ?>'
                });
          $('#evento').modal('show');
          $('#nueva').hide();
        },
        eventMouseover: function(calEvent, jsEvent, view) {
          
        },
        eventMouseout: function(calEvent, jsEvent, view) {
          //$('#evento').hide();
        },
        
        events: '<?php echo url_for($urlEventos);?>'
    })
});
</script>
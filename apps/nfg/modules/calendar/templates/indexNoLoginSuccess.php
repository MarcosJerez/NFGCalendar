<?php 
  if(isset($actividad)) include_partial('breadcrumb', array('actividad'=>$actividad));
  elseif(isset($categoria)) include_partial('breadcrumb', array('categoria'=>$categoria));
?>

    <div id="fb-root" style="margin: 20px;"></div>
    <fb:login-button scope="read_stream,publish_stream"></fb:login-button>

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
        </script>

  











<div id="calendar"></div>

<div class="modal hide" id="nueva">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">✕</button>
        <h3>Nuevo evento</h3>
  </div>
  <div class="modal-body" style="text-align:center;">
  Para crear un evento debes logearte primero
  <fb:login-button scope="manage_groups"></fb:login-button>
      </div>  
    </div>
    
<div id="evento" class="modal hide">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">✕</button>
        <h3>Info del evento</h3>
  </div>
  <div id="apuntados" class="modal-body"></div>
  <form id="evento_form" method="POST" action="<?php echo url_for('calendar/apuntarse');?>">
    Para apuntarte debes logearte primero
    <fb:login-button scope="manage_groups"></fb:login-button> 
  </form>
</div>     




<script type="text/javascript">
$(document).ready(function() {
    var base_url = '<?php echo url_for('calendar/apuntarse');?>';
  
    //$(".darDeAlta").colorbox({iframe:true, width:900,height:400});
  
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
          $('#id').val(calEvent.id);
          apuntados_html = '<ul>';
          for(i=0;i<calEvent.apuntados.length;i++) 
          {
            apuntados_html += '<li>';
            apuntados_html += '<a href=https://www.facebook.com/'+calEvent.apuntados[i]['fbId']+'>';
            apuntados_html += calEvent.apuntados[i]['nombre'];
            apuntados_html += '</a>';
            apuntados_html += '</li>';
          }
          apuntados_html += '</ul>'; 
          apuntados_html += '<div>'+calEvent.textoFaltan+'</div>';
          $('#apuntados').html(apuntados_html);
          $('#acciones').html('');
          //$('#evento').css('top', jsEvent.pageY).css('left',jsEvent.pageX).show();
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

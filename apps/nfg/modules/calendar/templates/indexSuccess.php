<?php 
  if(isset($actividad)) include_partial('breadcrumb', array('actividad'=>$actividad));
  elseif(isset($categoria)) include_partial('breadcrumb', array('categoria'=>$categoria));
?>

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

  


<div id="calendar"></div>

<div class="modal hide" id="nueva">
<?php include_component('calendar', 'new', $vars) ?>
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
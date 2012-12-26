<?php
/*
* Copyright 2010 Instituto de Tecnologías Educativas - Ministerio de Educación de España
*
* Licencia con arreglo a la EUPL, Versión 1.1 exclusivamente
* (la «Licencia»);
* Solo podrá usarse esta obra si se respeta la Licencia.
* Puede obtenerse una copia de la Licencia en:
*
* http://ec.europa.eu/idabc/eupl5
*
* y también en:

* http://ec.europa.eu/idabc/en/document/7774.html
*
* Salvo cuando lo exija la legislación aplicable o se acuerde
* por escrito, el programa distribuido con arreglo a la
* Licencia se distribuye «TAL CUAL»,
* SIN GARANTÍAS NI CONDICIONES DE NINGÚN TIPO, ni expresas
* ni implícitas.
* Véase la Licencia en el idioma concreto que rige
* los permisos y limitaciones que establece la Licencia.
*/
?>
<?php if($sf_user -> hasFlash('mensaje')): ?>
<div class="notice"><?php echo __($sf_user -> getFlash('mensaje')) ?></div>
<?php endif; ?>
<?php if($sf_user -> hasFlash('error')): ?>
<div class="error"><?php echo __($sf_user -> getFlash('error')) ?></div>
<?php endif; ?>

<?php if($muestraFormLogin): ?>

    
<form name="reinicioPasswordForm" action="<?php echo url_for('@login') ?> " method="post" >
    <table>
                <?php echo $form->renderGlobalErrors() ?>
        <tr>
            <th><label for="usuario"><?php echo __("Usuario:") ?></label></th>
            <td>
                        <?php echo $form['username']->renderError() ?>
                        <?php echo $form['username'] ?>
            </td>
        </tr>
        <tr>
            <th><label for="password">Clave:</label></th>
            <td>
                        <?php echo $form['password']->renderError() ?>
                        <?php echo $form['password'] ?>
            </td>
        </tr>
        <tr>
            <th><label for="remember">Recuerdame:</label></th>
            <td>
                        <?php echo $form['remember']->renderError() ?>
                        <?php echo $form['remember'] ?>
            </td>
        </tr>
    </table>
            <?php echo $form->renderHiddenFields() ?>

    <input type="submit" value="Continuar" />
    <input type="button" onclick="document.reinicioPasswordForm.action='<?php echo url_for('sftGestorSesion/reinicioPassword')?>';document.reinicioPasswordForm.submit()" value="Recuperar Password" />
</form>
        <div><?php echo __('¿Has olvidado tu password? Pulsa en el botón "Recuperar Password" y sigue las instrucciones') ?></div>
		<div><?php echo __('¿Todavía no eres usuario de NFG?') ?><a href="<?php echo url_for('sftGestorSesion/registro')?>"><?php echo __('Regístrate') ?></a></div>

<?php endif; ?>

    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
      <script>
         FB.init({
            appId:'38871837476', cookie:true,
            status:true, xfbml:true
         });
         FB.Event.subscribe('auth.login', function () {
          window.location = "http://nosfaltagente.com/desarrollo/web/nfg.php/inicio/loginfb";
         });
         FB.getLoginStatus(function(response) {
   if (response.status.toString().indexOf("connected")>-1) {
 initAll(); //User is conected and granded perms Good to go!
 FB.api("/me",
                function (response) {
                   document.getElementbyId("THE_BUTTON").value ="Loged in as"+response.name;
                });

   } else {
     top.location=window.location='http://www.facebook.com/dialog/oauth/?scope=read_stream,publish_stream,friends_photos,friends_activities&client_id="38871837476"&redirect_uri=http://nosfaltagente.com/desarrollo/loginfb';
   }
   });
      </script>
    <fb:login-button>Login with Facebook</fb:login-button>
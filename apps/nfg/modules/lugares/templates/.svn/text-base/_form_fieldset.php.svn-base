<?php use_themes_javascript('jquery/js/jquery-1.6.2.min.js') ?>
<?php use_themes_javascript('colorbox/js/jquery.colorbox.js') ?>
<?php use_javascript('lugares_new.js') ?>
<?php include_javascripts() ?>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA9URsAvkxolyZjo2iyPUTdhSuG3YkcEVJZQlfZ3EvU1uWk4jOKBStDXcgfxxWd3jLYl-hDq9Z4QhmxQ"
      type="text/javascript"></script>

<script type="text/javascript">
  function load() {
    if (GBrowserIsCompatible()) {
      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GSmallMapControl());
      map.addControl(new GMapTypeControl());
      var center = new GLatLng(48.89364,  	2.33739);
      map.setCenter(center, 15);
      geocoder = new GClientGeocoder();
      var marker = new GMarker(center, {draggable: true});
      map.addOverlay(marker);
      document.getElementById("nfg_lugar_latitud").value = center.lat().toFixed(5);
      document.getElementById("nfg_lugar_longitud").value = center.lng().toFixed(5);

      GEvent.addListener(marker, "dragend", function() {
        var point = marker.getPoint();
        map.panTo(point);
        document.getElementById("nfg_lugar_latitud").value = point.lat().toFixed(5);
        document.getElementById("nfg_lugar_longitud").value = point.lng().toFixed(5);

      });


      GEvent.addListener(map, "moveend", function() {
        map.clearOverlays();
        var center = map.getCenter();
        var marker = new GMarker(center, {draggable: true});
        map.addOverlay(marker);
        document.getElementById("nfg_lugar_latitud").value = center.lat().toFixed(5);
        document.getElementById("nfg_lugar_longitud").value = center.lng().toFixed(5);


        GEvent.addListener(marker, "dragend", function() {
          var point =marker.getPoint();
          map.panTo(point);
          document.getElementById("nfg_lugar_latitud").value = point.lat().toFixed(5);
          document.getElementById("nfg_lugar_longitud").value = point.lng().toFixed(5);

        });

      });

    }
  }

  function showAddress(address) {
    var map = new GMap2(document.getElementById("map"));
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());
    if (geocoder) {
      geocoder.getLatLng(
      address,
      function(point) {
        if (!point) {
          alert(address + " not found");
        } else {
          document.getElementById("nfg_lugar_latitud").value = point.lat().toFixed(5);
          document.getElementById("nfg_lugar_longitud").value = point.lng().toFixed(5);
          map.clearOverlays()
          map.setCenter(point, 14);
          var marker = new GMarker(point, {draggable: true});
          map.addOverlay(marker);

          GEvent.addListener(marker, "dragend", function() {
            var pt = marker.getPoint();
            map.panTo(pt);
            document.getElementById("nfg_lugar_latitud").value = pt.lat().toFixed(5);
            document.getElementById("nfg_lugar_longitud").value = pt.lng().toFixed(5);
          });


          GEvent.addListener(map, "moveend", function() {
            map.clearOverlays();
            var center = map.getCenter();
            var marker = new GMarker(center, {draggable: true});
            map.addOverlay(marker);
            document.getElementById("nfg_lugar_latitud").value = center.lat().toFixed(5);
            document.getElementById("nfg_lugar_longitud").value = center.lng().toFixed(5);

            GEvent.addListener(marker, "dragend", function() {
              var pt = marker.getPoint();
              map.panTo(pt);
              document.getElementById("nfg_lugar_latitud").value = pt.lat().toFixed(5);
              document.getElementById("nfg_lugar_longitud").value = pt.lng().toFixed(5);
            });

          });

        }
      }
    );
    }
  }
</script>

<h3><?php echo __('No conocemos este lugar, por favor indícanos en el mapa dónde está:', array(), 'messages') ?></h3>


<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
  <?php if ('NONE' != $fieldset): ?>
    <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
  <?php endif; ?>

  <?php foreach ($fields as $name => $field): ?>
    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
    <?php include_partial('lugares/form_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', array()),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    )) ?>

    <?php if($name=="direccion"): ?>
     <p>
      <input type="button" onclick="showAddress($('#nfg_lugar_direccion').val());" value="Search!" />
      </p>
   


  <p>
  <div align="center" id="map" style="width: 500px; height: 300px"><br/></div>
   </p>

    <?endif?>
  <?php endforeach; ?>
</fieldset>


  


  
    

  <script type="text/javascript">
load();
</script>

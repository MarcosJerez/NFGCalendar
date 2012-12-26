<?php

/**
 * NfgConvocatoria form.
 *
 * @package    nosfaltauno
 * @subpackage form
 * @author     Your name here
 */
class NfgConvocatoriaForm extends BaseNfgConvocatoriaForm
{
  public function configure()
  {
    $this->widgetSchema['id_actividad'] = new sfWidgetFormChoice(array(
                                        'choices' => array(),
                                        'renderer_class' => 'sfWidgetFormPropelJQueryAutocompleter',
                                        'renderer_options' => array(
                                                    'model' => 'NfgActividad',
                                                    'method' => 'getActividad',
                                                    'url' => sfContext::getInstance()->getController()->genUrl('convocatorias/autocompleteActividad'),
                                                   )
                   ));

    $this->widgetSchema['id_lugar_ini'] = new sfWidgetFormChoice(array(
                                                        'choices' => array(),
                                                         'renderer_class' => 'sfWidgetFormPropelJQueryAutocompleter',
                                                         'renderer_options' => array(
                                                         'model' => 'NfgLugar',
                                                         'method' => 'getLugar',
                                                         'url' => sfContext::getInstance()->getController()->genUrl('convocatorias/autocompleteLugar'),
                                                         )
            ));

    $this->widgetSchema['id_lugar_fin'] = new sfWidgetFormChoice(array(
                                                        'choices' => array(),
                                                         'renderer_class' => 'sfWidgetFormPropelJQueryAutocompleter',
                                                         'renderer_options' => array(
                                                         'model' => 'NfgLugar',
                                                         'method' => 'getLugar',
                                                         'url' => sfContext::getInstance()->getController()->genUrl('convocatorias/autocompleteLugar'),
                                                         )
            ));

    // widgwet Calendario del plugins sfFormExtraPlugins
    $cultura = sfContext::getInstance() -> getUser() -> getCulture();
    $idioma = substr($cultura, 0, 2);

    $fecha = new sfWidgetFormDate(array('format' => '%day%%month%%year%'));
    $ano = range(date('Y'), date('Y') + 2);
    $fecha -> setOption('years', array_combine($ano, $ano));

    sfApplicationConfiguration::getActive()->loadHelpers(array('Url'));
    $this -> widgetSchema['fecha_ini'] = new sfWidgetFormJQueryDate(array('config' => '{buttonImage: "'.public_path('ActivosPlugin/images/iconos/16x16/calendar.png').'", buttonImageOnly: true}','date_widget' => $fecha, 'culture' => $idioma));
    $this -> widgetSchema['fecha_fin'] = new sfWidgetFormJQueryDate(array('config' => '{buttonImage: "'.public_path('ActivosPlugin/images/iconos/16x16/calendar.png').'", buttonImageOnly: true}','date_widget' => $fecha, 'culture' => $idioma));
    $this->setDefault('fecha_ini',date('d-m-Y'));
    $this->setDefault('fecha_fin',date('d-m-Y'));
    
    $time = new sfWidgetFormTime();

    $this -> widgetSchema['hora_ini'] = new sfWidgetFormTime(array('minutes'=>array('00','05',10,15,20,25,30,35,40,45,50,55),'can_be_empty'=>false));
    //$this -> widgetSchema['hora_ini'] = new sfWidgetFormJQueryTime(array('image' =>'images/'),array('image' =>'images/'));
    //$this -> widgetSchema['hora_fin'] = new sfWidgetFormJQueryTime();
    $this -> widgetSchema['notas'] = new sfWidgetFormTextArea();
    $this -> widgetSchema['privada'] = new sfWidgetFormInputCheckbox();
//
//    $this -> widgetSchema['invitado'] = new sfWidgetFormInputText();
  }
}

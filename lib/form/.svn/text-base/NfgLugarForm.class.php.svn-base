<?php

/**
 * NfgLugar form.
 *
 * @package    nosfaltauno
 * @subpackage form
 * @author     Your name here
 */
class NfgLugarForm extends BaseNfgLugarForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nombre'       => new sfWidgetFormInputText(),
      'id_localidad' => new sfWidgetFormPropelChoice(array('model' => 'NfgLocalidad', 'add_empty' => false)),  
      'direccion'    => new sfWidgetFormInputText(),
      'latitud'      => new sfWidgetFormInputHidden(),
      'longitud'     => new sfWidgetFormInputHidden(),
      //'pendiente'    => new sfWidgetFormInputCheckbox(),
      'particular'   => new sfWidgetFormInputCheckbox(),
      //'id_usuario'   => new sfWidgetFormPropelChoice(array('model' => 'NfgUsuario', 'add_empty' => false)),
    ));
    
    $this->setValidator('direccion',new sfValidatorString(array('max_length' => 80, 'required'=>false)));
    
    $this->widgetSchema->setNameFormat('nfg_lugar[%s]');
  }
}

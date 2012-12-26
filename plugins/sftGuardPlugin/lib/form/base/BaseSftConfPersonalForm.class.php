<?php

/**
 * SftConfPersonal form base class.
 *
 * @method SftConfPersonal getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftConfPersonalForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'id_usuario'    => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => false)),
      'id_aplicacion' => new sfWidgetFormPropelChoice(array('model' => 'SftAplicacion', 'add_empty' => false)),
      'id_periodo'    => new sfWidgetFormPropelChoice(array('model' => 'SftPeriodo', 'add_empty' => false)),
      'id_perfil'     => new sfWidgetFormPropelChoice(array('model' => 'SftPerfil', 'add_empty' => false)),
      'id_ambito'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_usuario'    => new sfValidatorPropelChoice(array('model' => 'SftUsuario', 'column' => 'id')),
      'id_aplicacion' => new sfValidatorPropelChoice(array('model' => 'SftAplicacion', 'column' => 'id')),
      'id_periodo'    => new sfValidatorPropelChoice(array('model' => 'SftPeriodo', 'column' => 'id')),
      'id_perfil'     => new sfValidatorPropelChoice(array('model' => 'SftPerfil', 'column' => 'id')),
      'id_ambito'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_conf_personal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftConfPersonal';
  }


}

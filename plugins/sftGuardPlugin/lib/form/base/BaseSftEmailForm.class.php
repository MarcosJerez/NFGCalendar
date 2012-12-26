<?php

/**
 * SftEmail form base class.
 *
 * @method SftEmail getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftEmailForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'direccion'      => new sfWidgetFormInputText(),
      'predeterminado' => new sfWidgetFormInputText(),
      'id_usuario'     => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'direccion'      => new sfValidatorString(array('max_length' => 255)),
      'predeterminado' => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'id_usuario'     => new sfValidatorPropelChoice(array('model' => 'SftUsuario', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_email[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftEmail';
  }


}

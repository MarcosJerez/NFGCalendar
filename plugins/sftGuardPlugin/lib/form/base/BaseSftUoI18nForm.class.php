<?php

/**
 * SftUoI18n form base class.
 *
 * @method SftUoI18n getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftUoI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInputText(),
      'abreviatura' => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
      'id_cultura'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'SftUo', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'abreviatura' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_cultura'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdCultura()), 'empty_value' => $this->getObject()->getIdCultura(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_uo_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftUoI18n';
  }


}

<?php

/**
 * SftFidAtributo form base class.
 *
 * @method SftFidAtributo getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftFidAtributoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_provider' => new sfWidgetFormInputText(),
      'atributo'    => new sfWidgetFormInputText(),
      'valor'       => new sfWidgetFormInputText(),
      'mapa'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_provider' => new sfValidatorString(array('max_length' => 255)),
      'atributo'    => new sfValidatorString(array('max_length' => 255)),
      'valor'       => new sfValidatorString(array('max_length' => 255)),
      'mapa'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_fid_atributo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftFidAtributo';
  }


}

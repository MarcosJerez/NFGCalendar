<?php

/**
 * SftTipoOrganismo form base class.
 *
 * @method SftTipoOrganismo getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftTipoOrganismoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'codigo'      => new sfWidgetFormInputText(),
      'descripcion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'codigo'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'SftTipoOrganismo', 'column' => array('codigo')))
    );

    $this->widgetSchema->setNameFormat('sft_tipo_organismo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftTipoOrganismo';
  }

  public function getI18nModelName()
  {
    return 'SftTipoOrganismoI18n';
  }

  public function getI18nFormClass()
  {
    return 'SftTipoOrganismoI18nForm';
  }

}

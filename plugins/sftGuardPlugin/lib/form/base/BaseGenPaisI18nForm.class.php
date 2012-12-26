<?php

/**
 * GenPaisI18n form base class.
 *
 * @method GenPaisI18n getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenPaisI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'id_cultura'   => new sfWidgetFormInputHidden(),
      'nombre'       => new sfWidgetFormInputText(),
      'nombreabrev'  => new sfWidgetFormInputText(),
      'nacionalidad' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'GenPais', 'column' => 'id', 'required' => false)),
      'id_cultura'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdCultura()), 'empty_value' => $this->getObject()->getIdCultura(), 'required' => false)),
      'nombre'       => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'nombreabrev'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'nacionalidad' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gen_pais_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenPaisI18n';
  }


}

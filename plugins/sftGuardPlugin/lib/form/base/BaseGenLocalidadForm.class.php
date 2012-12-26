<?php

/**
 * GenLocalidad form base class.
 *
 * @method GenLocalidad getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenLocalidadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'codigolocal'  => new sfWidgetFormInputText(),
      'id_provincia' => new sfWidgetFormPropelChoice(array('model' => 'GenProvincia', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'codigolocal'  => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'id_provincia' => new sfValidatorPropelChoice(array('model' => 'GenProvincia', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gen_localidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenLocalidad';
  }

  public function getI18nModelName()
  {
    return 'GenLocalidadI18n';
  }

  public function getI18nFormClass()
  {
    return 'GenLocalidadI18nForm';
  }

}

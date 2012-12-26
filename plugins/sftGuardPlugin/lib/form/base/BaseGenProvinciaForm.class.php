<?php

/**
 * GenProvincia form base class.
 *
 * @method GenProvincia getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenProvinciaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'codigoprov'   => new sfWidgetFormInputText(),
      'id_comunidad' => new sfWidgetFormPropelChoice(array('model' => 'GenComunidad', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'codigoprov'   => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'id_comunidad' => new sfValidatorPropelChoice(array('model' => 'GenComunidad', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gen_provincia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenProvincia';
  }

  public function getI18nModelName()
  {
    return 'GenProvinciaI18n';
  }

  public function getI18nFormClass()
  {
    return 'GenProvinciaI18nForm';
  }

}

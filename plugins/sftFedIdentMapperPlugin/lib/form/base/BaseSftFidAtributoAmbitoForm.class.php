<?php

/**
 * SftFidAtributoAmbito form base class.
 *
 * @method SftFidAtributoAmbito getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftFidAtributoAmbitoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_atributo' => new sfWidgetFormInputHidden(),
      'id_ambito'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_atributo' => new sfValidatorPropelChoice(array('model' => 'SftFidAtributo', 'column' => 'id', 'required' => false)),
      'id_ambito'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdAmbito()), 'empty_value' => $this->getObject()->getIdAmbito(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_fid_atributo_ambito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftFidAtributoAmbito';
  }


}

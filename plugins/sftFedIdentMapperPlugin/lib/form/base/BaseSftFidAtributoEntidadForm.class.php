<?php

/**
 * SftFidAtributoEntidad form base class.
 *
 * @method SftFidAtributoEntidad getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftFidAtributoEntidadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_atributo' => new sfWidgetFormInputHidden(),
      'actualiza'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_atributo' => new sfValidatorPropelChoice(array('model' => 'SftFidAtributo', 'column' => 'id', 'required' => false)),
      'actualiza'   => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('sft_fid_atributo_entidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftFidAtributoEntidad';
  }


}

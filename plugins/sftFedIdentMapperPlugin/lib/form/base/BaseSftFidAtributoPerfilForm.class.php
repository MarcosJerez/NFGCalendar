<?php

/**
 * SftFidAtributoPerfil form base class.
 *
 * @method SftFidAtributoPerfil getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftFidAtributoPerfilForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_atributo' => new sfWidgetFormInputHidden(),
      'id_perfil'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_atributo' => new sfValidatorPropelChoice(array('model' => 'SftFidAtributo', 'column' => 'id', 'required' => false)),
      'id_perfil'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdPerfil()), 'empty_value' => $this->getObject()->getIdPerfil(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_fid_atributo_perfil[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftFidAtributoPerfil';
  }


}

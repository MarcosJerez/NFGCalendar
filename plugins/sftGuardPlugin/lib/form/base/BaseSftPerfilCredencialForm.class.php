<?php

/**
 * SftPerfilCredencial form base class.
 *
 * @method SftPerfilCredencial getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftPerfilCredencialForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_perfil'     => new sfWidgetFormInputHidden(),
      'id_credencial' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_perfil'     => new sfValidatorPropelChoice(array('model' => 'SftPerfil', 'column' => 'id', 'required' => false)),
      'id_credencial' => new sfValidatorPropelChoice(array('model' => 'SftCredencial', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_perfil_credencial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftPerfilCredencial';
  }


}

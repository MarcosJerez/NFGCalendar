<?php

/**
 * SftUsuAtributoValor form base class.
 *
 * @method SftUsuAtributoValor getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftUsuAtributoValorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'id_usuario'      => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
      'id_usu_atributo' => new sfWidgetFormPropelChoice(array('model' => 'SftUsuAtributo', 'add_empty' => true)),
      'valor'           => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'expira'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_usuario'      => new sfValidatorPropelChoice(array('model' => 'SftUsuario', 'column' => 'id', 'required' => false)),
      'id_usu_atributo' => new sfValidatorPropelChoice(array('model' => 'SftUsuAtributo', 'column' => 'id', 'required' => false)),
      'valor'           => new sfValidatorString(array('max_length' => 255)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'expira'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_usu_atributo_valor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftUsuAtributoValor';
  }


}

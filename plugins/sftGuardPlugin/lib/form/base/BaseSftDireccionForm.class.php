<?php

/**
 * SftDireccion form base class.
 *
 * @method SftDireccion getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftDireccionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'id_tipodireccion' => new sfWidgetFormPropelChoice(array('model' => 'SftTipoDireccion', 'add_empty' => false)),
      'tipovia'          => new sfWidgetFormInputText(),
      'domicilio'        => new sfWidgetFormInputText(),
      'numero'           => new sfWidgetFormInputText(),
      'escalera'         => new sfWidgetFormInputText(),
      'piso'             => new sfWidgetFormInputText(),
      'letra'            => new sfWidgetFormInputText(),
      'municipio'        => new sfWidgetFormInputText(),
      'provincia'        => new sfWidgetFormInputText(),
      'pais'             => new sfWidgetFormInputText(),
      'cp'               => new sfWidgetFormInputText(),
      'id_usuario'       => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_tipodireccion' => new sfValidatorPropelChoice(array('model' => 'SftTipoDireccion', 'column' => 'id')),
      'tipovia'          => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'domicilio'        => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'numero'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'escalera'         => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'piso'             => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'letra'            => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'municipio'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'provincia'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'pais'             => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'cp'               => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'id_usuario'       => new sfValidatorPropelChoice(array('model' => 'SftUsuario', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_direccion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftDireccion';
  }


}

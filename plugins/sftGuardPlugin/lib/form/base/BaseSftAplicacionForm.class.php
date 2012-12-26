<?php

/**
 * SftAplicacion form base class.
 *
 * @method SftAplicacion getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftAplicacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'codigo'        => new sfWidgetFormInputText(),
      'nombre'        => new sfWidgetFormInputText(),
      'descripcion'   => new sfWidgetFormInputText(),
      'texto_intro'   => new sfWidgetFormTextarea(),
      'es_symfonite'  => new sfWidgetFormInputCheckbox(),
      'tipo_login'    => new sfWidgetFormInputText(),
      'logotipo'      => new sfWidgetFormInputText(),
      'url'           => new sfWidgetFormInputText(),
      'url_svn'       => new sfWidgetFormInputText(),
      'clave'         => new sfWidgetFormInputText(),
      'id_credencial' => new sfWidgetFormPropelChoice(array('model' => 'SftCredencial', 'add_empty' => true)),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'codigo'        => new sfValidatorString(array('max_length' => 255)),
      'nombre'        => new sfValidatorString(array('max_length' => 255)),
      'descripcion'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'texto_intro'   => new sfValidatorString(array('required' => false)),
      'es_symfonite'  => new sfValidatorBoolean(array('required' => false)),
      'tipo_login'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'logotipo'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'           => new sfValidatorString(array('max_length' => 250)),
      'url_svn'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'clave'         => new sfValidatorString(array('max_length' => 20)),
      'id_credencial' => new sfValidatorPropelChoice(array('model' => 'SftCredencial', 'column' => 'id', 'required' => false)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'SftAplicacion', 'column' => array('clave'))),
        new sfValidatorPropelUnique(array('model' => 'SftAplicacion', 'column' => array('nombre'))),
      ))
    );

    $this->widgetSchema->setNameFormat('sft_aplicacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftAplicacion';
  }


}

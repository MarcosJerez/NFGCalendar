<?php

/**
 * SftOrganismo form base class.
 *
 * @method SftOrganismo getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftOrganismoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre'           => new sfWidgetFormInputText(),
      'abreviatura'      => new sfWidgetFormInputText(),
      'id_tipoorganismo' => new sfWidgetFormPropelChoice(array('model' => 'SftTipoOrganismo', 'add_empty' => true)),
      'codigo'           => new sfWidgetFormInputText(),
      'descripcion'      => new sfWidgetFormInputText(),
      'sitioweb'         => new sfWidgetFormInputText(),
      'correo'           => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'id_contacto'      => new sfWidgetFormPropelChoice(array('model' => 'SftPersona', 'add_empty' => true)),
      'cargo'            => new sfWidgetFormInputText(),
      'id_depende'       => new sfWidgetFormPropelChoice(array('model' => 'SftOrganismo', 'add_empty' => true)),
      'id_pais'          => new sfWidgetFormPropelChoice(array('model' => 'GenPais', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'abreviatura'      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'id_tipoorganismo' => new sfValidatorPropelChoice(array('model' => 'SftTipoOrganismo', 'column' => 'id', 'required' => false)),
      'codigo'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'descripcion'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sitioweb'         => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'correo'           => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
      'id_contacto'      => new sfValidatorPropelChoice(array('model' => 'SftPersona', 'column' => 'id', 'required' => false)),
      'cargo'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'id_depende'       => new sfValidatorPropelChoice(array('model' => 'SftOrganismo', 'column' => 'id', 'required' => false)),
      'id_pais'          => new sfValidatorPropelChoice(array('model' => 'GenPais', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_organismo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftOrganismo';
  }


}

<?php

/**
 * SftUsuAtributo form base class.
 *
 * @method SftUsuAtributo getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftUsuAtributoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'nombre'        => new sfWidgetFormInputText(),
      'descripcion'   => new sfWidgetFormInputText(),
      'formato'       => new sfWidgetFormInputText(),
      'relevancia'    => new sfWidgetFormInputText(),
      'origen'        => new sfWidgetFormInputText(),
      'oid'           => new sfWidgetFormInputText(),
      'urn'           => new sfWidgetFormInputText(),
      'sintaxis_ldap' => new sfWidgetFormInputText(),
      'indexado'      => new sfWidgetFormInputText(),
      'multivaluado'  => new sfWidgetFormInputText(),
      'ejemplo'       => new sfWidgetFormInputText(),
      'notas'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre'        => new sfValidatorString(array('max_length' => 255)),
      'descripcion'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'formato'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'relevancia'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'origen'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'oid'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'urn'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sintaxis_ldap' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'indexado'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'multivaluado'  => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'ejemplo'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'notas'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_usu_atributo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftUsuAtributo';
  }


}

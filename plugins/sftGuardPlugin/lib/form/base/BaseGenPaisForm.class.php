<?php

/**
 * GenPais form base class.
 *
 * @method GenPais getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenPaisForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'codigo_iso3166_alfa2' => new sfWidgetFormInputText(),
      'codigo_iso3166_alfa3' => new sfWidgetFormInputText(),
      'codigo_iso3166_num'   => new sfWidgetFormInputText(),
      'paisoterritorio'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'codigo_iso3166_alfa2' => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'codigo_iso3166_alfa3' => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'codigo_iso3166_num'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'paisoterritorio'      => new sfValidatorString(array('max_length' => 1, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'GenPais', 'column' => array('codigo_iso3166_alfa2'))),
        new sfValidatorPropelUnique(array('model' => 'GenPais', 'column' => array('codigo_iso3166_alfa3'))),
        new sfValidatorPropelUnique(array('model' => 'GenPais', 'column' => array('codigo_iso3166_num'))),
      ))
    );

    $this->widgetSchema->setNameFormat('gen_pais[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenPais';
  }

  public function getI18nModelName()
  {
    return 'GenPaisI18n';
  }

  public function getI18nFormClass()
  {
    return 'GenPaisI18nForm';
  }

}

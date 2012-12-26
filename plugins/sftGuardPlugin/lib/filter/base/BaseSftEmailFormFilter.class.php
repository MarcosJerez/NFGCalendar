<?php

/**
 * SftEmail filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftEmailFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'direccion'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'predeterminado' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_usuario'     => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'direccion'      => new sfValidatorPass(array('required' => false)),
      'predeterminado' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_usuario'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftUsuario', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sft_email_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftEmail';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'direccion'      => 'Text',
      'predeterminado' => 'Number',
      'id_usuario'     => 'ForeignKey',
    );
  }
}

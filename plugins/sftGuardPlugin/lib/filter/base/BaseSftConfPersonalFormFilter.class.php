<?php

/**
 * SftConfPersonal filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftConfPersonalFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_usuario'    => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
      'id_aplicacion' => new sfWidgetFormPropelChoice(array('model' => 'SftAplicacion', 'add_empty' => true)),
      'id_periodo'    => new sfWidgetFormPropelChoice(array('model' => 'SftPeriodo', 'add_empty' => true)),
      'id_perfil'     => new sfWidgetFormPropelChoice(array('model' => 'SftPerfil', 'add_empty' => true)),
      'id_ambito'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_usuario'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftUsuario', 'column' => 'id')),
      'id_aplicacion' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftAplicacion', 'column' => 'id')),
      'id_periodo'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftPeriodo', 'column' => 'id')),
      'id_perfil'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftPerfil', 'column' => 'id')),
      'id_ambito'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sft_conf_personal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftConfPersonal';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'id_usuario'    => 'ForeignKey',
      'id_aplicacion' => 'ForeignKey',
      'id_periodo'    => 'ForeignKey',
      'id_perfil'     => 'ForeignKey',
      'id_ambito'     => 'Number',
    );
  }
}

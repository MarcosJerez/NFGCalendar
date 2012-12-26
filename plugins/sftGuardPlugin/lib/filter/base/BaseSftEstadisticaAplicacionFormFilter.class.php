<?php

/**
 * SftEstadisticaAplicacion filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftEstadisticaAplicacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_aplicacion'  => new sfWidgetFormPropelChoice(array('model' => 'SftAplicacion', 'add_empty' => true)),
      'id_usuario'     => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
      'numero_accesos' => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'navegador'      => new sfWidgetFormFilterInput(),
      'ip_cliente'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_aplicacion'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftAplicacion', 'column' => 'id')),
      'id_usuario'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftUsuario', 'column' => 'id')),
      'numero_accesos' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'navegador'      => new sfValidatorPass(array('required' => false)),
      'ip_cliente'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_estadistica_aplicacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftEstadisticaAplicacion';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'id_aplicacion'  => 'ForeignKey',
      'id_usuario'     => 'ForeignKey',
      'numero_accesos' => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'navegador'      => 'Text',
      'ip_cliente'     => 'Text',
    );
  }
}

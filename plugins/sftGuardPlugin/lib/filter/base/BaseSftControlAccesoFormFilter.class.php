<?php

/**
 * SftControlAcceso filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftControlAccesoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'caducidad'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'establoqueada'        => new sfWidgetFormFilterInput(),
      'causabloqueo'         => new sfWidgetFormFilterInput(),
      'preguntaolvidoclave'  => new sfWidgetFormFilterInput(),
      'respuestaolvidoclave' => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'caducidad'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'establoqueada'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'causabloqueo'         => new sfValidatorPass(array('required' => false)),
      'preguntaolvidoclave'  => new sfValidatorPass(array('required' => false)),
      'respuestaolvidoclave' => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sft_control_acceso_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftControlAcceso';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'ForeignKey',
      'caducidad'            => 'Date',
      'establoqueada'        => 'Number',
      'causabloqueo'         => 'Text',
      'preguntaolvidoclave'  => 'Text',
      'respuestaolvidoclave' => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}

<?php

/**
 * SftUsuario filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sfuser'      => new sfWidgetFormFilterInput(),
      'alias'          => new sfWidgetFormFilterInput(),
      'activo'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_alta'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_baja'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_culturapref' => new sfWidgetFormFilterInput(),
      'id_persona'     => new sfWidgetFormPropelChoice(array('model' => 'SftPersona', 'add_empty' => true)),
      'id_organismo'   => new sfWidgetFormPropelChoice(array('model' => 'SftOrganismo', 'add_empty' => true)),
      'idp'            => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_sfuser'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'alias'          => new sfValidatorPass(array('required' => false)),
      'activo'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_alta'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_baja'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_culturapref' => new sfValidatorPass(array('required' => false)),
      'id_persona'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftPersona', 'column' => 'id')),
      'id_organismo'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftOrganismo', 'column' => 'id')),
      'idp'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftUsuario';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'id_sfuser'      => 'Number',
      'alias'          => 'Text',
      'activo'         => 'Number',
      'fecha_alta'     => 'Date',
      'fecha_baja'     => 'Date',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'id_culturapref' => 'Text',
      'id_persona'     => 'ForeignKey',
      'id_organismo'   => 'ForeignKey',
      'idp'            => 'Text',
    );
  }
}

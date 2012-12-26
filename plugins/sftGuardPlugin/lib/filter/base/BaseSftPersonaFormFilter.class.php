<?php

/**
 * SftPersona filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftPersonaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellido1'                => new sfWidgetFormFilterInput(),
      'apellido2'                => new sfWidgetFormFilterInput(),
      'id_tipodocidentificacion' => new sfWidgetFormPropelChoice(array('model' => 'SftTipoDocIdentificacion', 'add_empty' => true)),
      'docidentificacion'        => new sfWidgetFormFilterInput(),
      'id_paisdocidentificacion' => new sfWidgetFormPropelChoice(array('model' => 'GenPais', 'add_empty' => true)),
      'sexo'                     => new sfWidgetFormFilterInput(),
      'fechanacimiento'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'observaciones'            => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'profesion'                => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'                   => new sfValidatorPass(array('required' => false)),
      'apellido1'                => new sfValidatorPass(array('required' => false)),
      'apellido2'                => new sfValidatorPass(array('required' => false)),
      'id_tipodocidentificacion' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftTipoDocIdentificacion', 'column' => 'id')),
      'docidentificacion'        => new sfValidatorPass(array('required' => false)),
      'id_paisdocidentificacion' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'GenPais', 'column' => 'id')),
      'sexo'                     => new sfValidatorPass(array('required' => false)),
      'fechanacimiento'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'observaciones'            => new sfValidatorPass(array('required' => false)),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'profesion'                => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_persona_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftPersona';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'nombre'                   => 'Text',
      'apellido1'                => 'Text',
      'apellido2'                => 'Text',
      'id_tipodocidentificacion' => 'ForeignKey',
      'docidentificacion'        => 'Text',
      'id_paisdocidentificacion' => 'ForeignKey',
      'sexo'                     => 'Text',
      'fechanacimiento'          => 'Date',
      'observaciones'            => 'Text',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'profesion'                => 'Text',
    );
  }
}

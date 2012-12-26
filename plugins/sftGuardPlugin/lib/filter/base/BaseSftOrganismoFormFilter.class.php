<?php

/**
 * SftOrganismo filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftOrganismoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'           => new sfWidgetFormFilterInput(),
      'abreviatura'      => new sfWidgetFormFilterInput(),
      'id_tipoorganismo' => new sfWidgetFormPropelChoice(array('model' => 'SftTipoOrganismo', 'add_empty' => true)),
      'codigo'           => new sfWidgetFormFilterInput(),
      'descripcion'      => new sfWidgetFormFilterInput(),
      'sitioweb'         => new sfWidgetFormFilterInput(),
      'correo'           => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_contacto'      => new sfWidgetFormPropelChoice(array('model' => 'SftPersona', 'add_empty' => true)),
      'cargo'            => new sfWidgetFormFilterInput(),
      'id_depende'       => new sfWidgetFormPropelChoice(array('model' => 'SftOrganismo', 'add_empty' => true)),
      'id_pais'          => new sfWidgetFormPropelChoice(array('model' => 'GenPais', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'abreviatura'      => new sfValidatorPass(array('required' => false)),
      'id_tipoorganismo' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftTipoOrganismo', 'column' => 'id')),
      'codigo'           => new sfValidatorPass(array('required' => false)),
      'descripcion'      => new sfValidatorPass(array('required' => false)),
      'sitioweb'         => new sfValidatorPass(array('required' => false)),
      'correo'           => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_contacto'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftPersona', 'column' => 'id')),
      'cargo'            => new sfValidatorPass(array('required' => false)),
      'id_depende'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftOrganismo', 'column' => 'id')),
      'id_pais'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'GenPais', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sft_organismo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftOrganismo';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre'           => 'Text',
      'abreviatura'      => 'Text',
      'id_tipoorganismo' => 'ForeignKey',
      'codigo'           => 'Text',
      'descripcion'      => 'Text',
      'sitioweb'         => 'Text',
      'correo'           => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'id_contacto'      => 'ForeignKey',
      'cargo'            => 'Text',
      'id_depende'       => 'ForeignKey',
      'id_pais'          => 'ForeignKey',
    );
  }
}

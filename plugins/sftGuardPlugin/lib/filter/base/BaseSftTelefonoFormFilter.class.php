<?php

/**
 * SftTelefono filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftTelefonoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'numerotelefono'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_tipotelefono' => new sfWidgetFormPropelChoice(array('model' => 'SftTipoTelefono', 'add_empty' => true)),
      'id_usuario'      => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'numerotelefono'  => new sfValidatorPass(array('required' => false)),
      'id_tipotelefono' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftTipoTelefono', 'column' => 'id')),
      'id_usuario'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftUsuario', 'column' => 'id')),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sft_telefono_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftTelefono';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'numerotelefono'  => 'Text',
      'id_tipotelefono' => 'ForeignKey',
      'id_usuario'      => 'ForeignKey',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}

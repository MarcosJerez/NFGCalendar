<?php

/**
 * SftUsuAtributoValor filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftUsuAtributoValorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_usuario'      => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
      'id_usu_atributo' => new sfWidgetFormPropelChoice(array('model' => 'SftUsuAtributo', 'add_empty' => true)),
      'valor'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'expira'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'id_usuario'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftUsuario', 'column' => 'id')),
      'id_usu_atributo' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftUsuAtributo', 'column' => 'id')),
      'valor'           => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'expira'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sft_usu_atributo_valor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftUsuAtributoValor';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'id_usuario'      => 'ForeignKey',
      'id_usu_atributo' => 'ForeignKey',
      'valor'           => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'expira'          => 'Date',
    );
  }
}

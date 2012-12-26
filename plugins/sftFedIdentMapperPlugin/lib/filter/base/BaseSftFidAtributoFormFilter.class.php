<?php

/**
 * SftFidAtributo filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftFidAtributoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_provider' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'atributo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'valor'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mapa'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_provider' => new sfValidatorPass(array('required' => false)),
      'atributo'    => new sfValidatorPass(array('required' => false)),
      'valor'       => new sfValidatorPass(array('required' => false)),
      'mapa'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_fid_atributo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftFidAtributo';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_provider' => 'Text',
      'atributo'    => 'Text',
      'valor'       => 'Text',
      'mapa'        => 'Text',
    );
  }
}

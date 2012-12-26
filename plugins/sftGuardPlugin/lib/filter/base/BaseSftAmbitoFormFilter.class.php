<?php

/**
 * SftAmbito filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftAmbitoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ambitotipo'          => new sfWidgetFormPropelChoice(array('model' => 'SftAmbitoTipo', 'add_empty' => true)),
      'id_periodo'             => new sfWidgetFormPropelChoice(array('model' => 'SftPeriodo', 'add_empty' => true)),
      'codigo'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sft_acceso_ambito_list' => new sfWidgetFormPropelChoice(array('model' => 'SftAcceso', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_ambitotipo'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftAmbitoTipo', 'column' => 'id')),
      'id_periodo'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftPeriodo', 'column' => 'id')),
      'codigo'                 => new sfValidatorPass(array('required' => false)),
      'estado'                 => new sfValidatorPass(array('required' => false)),
      'sft_acceso_ambito_list' => new sfValidatorPropelChoice(array('model' => 'SftAcceso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_ambito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addSftAccesoAmbitoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(SftAccesoAmbitoPeer::ID_AMBITO, SftAmbitoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SftAccesoAmbitoPeer::ID_ACCESO, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SftAccesoAmbitoPeer::ID_ACCESO, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'SftAmbito';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'id_ambitotipo'          => 'ForeignKey',
      'id_periodo'             => 'ForeignKey',
      'codigo'                 => 'Text',
      'estado'                 => 'Text',
      'sft_acceso_ambito_list' => 'ManyKey',
    );
  }
}

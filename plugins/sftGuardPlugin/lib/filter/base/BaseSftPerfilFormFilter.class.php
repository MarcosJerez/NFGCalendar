<?php

/**
 * SftPerfil filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftPerfilFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_uo'                      => new sfWidgetFormPropelChoice(array('model' => 'SftUo', 'add_empty' => true)),
      'tema'                       => new sfWidgetFormFilterInput(),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_ambitotipo'              => new sfWidgetFormPropelChoice(array('model' => 'SftAmbitoTipo', 'add_empty' => true)),
      'sft_perfil_credencial_list' => new sfWidgetFormPropelChoice(array('model' => 'SftCredencial', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_uo'                      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftUo', 'column' => 'id')),
      'tema'                       => new sfValidatorPass(array('required' => false)),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_ambitotipo'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftAmbitoTipo', 'column' => 'id')),
      'sft_perfil_credencial_list' => new sfValidatorPropelChoice(array('model' => 'SftCredencial', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_perfil_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addSftPerfilCredencialListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(SftPerfilCredencialPeer::ID_PERFIL, SftPerfilPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SftPerfilCredencialPeer::ID_CREDENCIAL, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SftPerfilCredencialPeer::ID_CREDENCIAL, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'SftPerfil';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'id_uo'                      => 'ForeignKey',
      'tema'                       => 'Text',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'id_ambitotipo'              => 'ForeignKey',
      'sft_perfil_credencial_list' => 'ManyKey',
    );
  }
}

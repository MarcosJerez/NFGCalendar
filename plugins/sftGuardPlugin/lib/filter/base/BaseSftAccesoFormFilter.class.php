<?php

/**
 * SftAcceso filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftAccesoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_usuario'             => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
      'id_perfil'              => new sfWidgetFormPropelChoice(array('model' => 'SftPerfil', 'add_empty' => true)),
      'delega'                 => new sfWidgetFormFilterInput(),
      'id_delega'              => new sfWidgetFormPropelChoice(array('model' => 'SftAcceso', 'add_empty' => true)),
      'esinicial'              => new sfWidgetFormFilterInput(),
      'sft_acceso_ambito_list' => new sfWidgetFormPropelChoice(array('model' => 'SftAmbito', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_usuario'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftUsuario', 'column' => 'id')),
      'id_perfil'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftPerfil', 'column' => 'id')),
      'delega'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_delega'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftAcceso', 'column' => 'id')),
      'esinicial'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sft_acceso_ambito_list' => new sfValidatorPropelChoice(array('model' => 'SftAmbito', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_acceso_filters[%s]');

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

    $criteria->addJoin(SftAccesoAmbitoPeer::ID_ACCESO, SftAccesoPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SftAccesoAmbitoPeer::ID_AMBITO, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SftAccesoAmbitoPeer::ID_AMBITO, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'SftAcceso';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'id_usuario'             => 'ForeignKey',
      'id_perfil'              => 'ForeignKey',
      'delega'                 => 'Number',
      'id_delega'              => 'ForeignKey',
      'esinicial'              => 'Number',
      'sft_acceso_ambito_list' => 'ManyKey',
    );
  }
}

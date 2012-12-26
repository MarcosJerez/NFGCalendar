<?php

/**
 * SftCredencial filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftCredencialFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_aplicacion'              => new sfWidgetFormPropelChoice(array('model' => 'SftAplicacion', 'add_empty' => true)),
      'nombre'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sft_perfil_credencial_list' => new sfWidgetFormPropelChoice(array('model' => 'SftPerfil', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_aplicacion'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftAplicacion', 'column' => 'id')),
      'nombre'                     => new sfValidatorPass(array('required' => false)),
      'descripcion'                => new sfValidatorPass(array('required' => false)),
      'sft_perfil_credencial_list' => new sfValidatorPropelChoice(array('model' => 'SftPerfil', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_credencial_filters[%s]');

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

    $criteria->addJoin(SftPerfilCredencialPeer::ID_CREDENCIAL, SftCredencialPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SftPerfilCredencialPeer::ID_PERFIL, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SftPerfilCredencialPeer::ID_PERFIL, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'SftCredencial';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'id_aplicacion'              => 'ForeignKey',
      'nombre'                     => 'Text',
      'descripcion'                => 'Text',
      'sft_perfil_credencial_list' => 'ManyKey',
    );
  }
}

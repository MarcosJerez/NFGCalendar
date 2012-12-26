<?php

/**
 * GenPaisI18n filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenPaisI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'       => new sfWidgetFormFilterInput(),
      'nombreabrev'  => new sfWidgetFormFilterInput(),
      'nacionalidad' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'       => new sfValidatorPass(array('required' => false)),
      'nombreabrev'  => new sfValidatorPass(array('required' => false)),
      'nacionalidad' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gen_pais_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenPaisI18n';
  }

  public function getFields()
  {
    return array(
      'id'           => 'ForeignKey',
      'id_cultura'   => 'Text',
      'nombre'       => 'Text',
      'nombreabrev'  => 'Text',
      'nacionalidad' => 'Text',
    );
  }
}

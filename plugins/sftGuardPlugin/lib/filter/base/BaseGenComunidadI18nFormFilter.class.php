<?php

/**
 * GenComunidadI18n filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenComunidadI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'      => new sfWidgetFormFilterInput(),
      'nombreabrev' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'      => new sfValidatorPass(array('required' => false)),
      'nombreabrev' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gen_comunidad_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenComunidadI18n';
  }

  public function getFields()
  {
    return array(
      'id'          => 'ForeignKey',
      'id_cultura'  => 'Text',
      'nombre'      => 'Text',
      'nombreabrev' => 'Text',
    );
  }
}

<?php

/**
 * GenComunidad filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenComunidadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigocomunidad' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'codigocomunidad' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gen_comunidad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenComunidad';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'codigocomunidad' => 'Text',
    );
  }
}

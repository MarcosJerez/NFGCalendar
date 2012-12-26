<?php

/**
 * GenLocalidad filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenLocalidadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigolocal'  => new sfWidgetFormFilterInput(),
      'id_provincia' => new sfWidgetFormPropelChoice(array('model' => 'GenProvincia', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'codigolocal'  => new sfValidatorPass(array('required' => false)),
      'id_provincia' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'GenProvincia', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('gen_localidad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenLocalidad';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'codigolocal'  => 'Text',
      'id_provincia' => 'ForeignKey',
    );
  }
}

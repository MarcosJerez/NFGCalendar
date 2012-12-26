<?php

/**
 * GenProvincia filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenProvinciaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigoprov'   => new sfWidgetFormFilterInput(),
      'id_comunidad' => new sfWidgetFormPropelChoice(array('model' => 'GenComunidad', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'codigoprov'   => new sfValidatorPass(array('required' => false)),
      'id_comunidad' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'GenComunidad', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('gen_provincia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenProvincia';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'codigoprov'   => 'Text',
      'id_comunidad' => 'ForeignKey',
    );
  }
}

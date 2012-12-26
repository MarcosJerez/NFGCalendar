<?php

/**
 * GenPais filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseGenPaisFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_iso3166_alfa2' => new sfWidgetFormFilterInput(),
      'codigo_iso3166_alfa3' => new sfWidgetFormFilterInput(),
      'codigo_iso3166_num'   => new sfWidgetFormFilterInput(),
      'paisoterritorio'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'codigo_iso3166_alfa2' => new sfValidatorPass(array('required' => false)),
      'codigo_iso3166_alfa3' => new sfValidatorPass(array('required' => false)),
      'codigo_iso3166_num'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'paisoterritorio'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gen_pais_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'GenPais';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'codigo_iso3166_alfa2' => 'Text',
      'codigo_iso3166_alfa3' => 'Text',
      'codigo_iso3166_num'   => 'Number',
      'paisoterritorio'      => 'Text',
    );
  }
}

<?php

/**
 * SftFidAtributoAmbito filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftFidAtributoAmbitoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('sft_fid_atributo_ambito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftFidAtributoAmbito';
  }

  public function getFields()
  {
    return array(
      'id_atributo' => 'ForeignKey',
      'id_ambito'   => 'Number',
    );
  }
}

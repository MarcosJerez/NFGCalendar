<?php

/**
 * SftTipoDocIdentificacion filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftTipoDocIdentificacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'funciondecontrol' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'funciondecontrol' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_tipo_doc_identificacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftTipoDocIdentificacion';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'funciondecontrol' => 'Text',
    );
  }
}

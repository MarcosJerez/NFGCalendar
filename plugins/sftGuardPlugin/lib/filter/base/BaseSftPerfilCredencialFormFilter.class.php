<?php

/**
 * SftPerfilCredencial filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftPerfilCredencialFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('sft_perfil_credencial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftPerfilCredencial';
  }

  public function getFields()
  {
    return array(
      'id_perfil'     => 'ForeignKey',
      'id_credencial' => 'ForeignKey',
    );
  }
}

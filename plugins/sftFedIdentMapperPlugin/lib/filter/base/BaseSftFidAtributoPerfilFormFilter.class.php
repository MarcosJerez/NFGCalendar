<?php

/**
 * SftFidAtributoPerfil filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftFidAtributoPerfilFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('sft_fid_atributo_perfil_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftFidAtributoPerfil';
  }

  public function getFields()
  {
    return array(
      'id_atributo' => 'ForeignKey',
      'id_perfil'   => 'Number',
    );
  }
}

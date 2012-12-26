<?php

/**
 * SftUsuAtributo filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftUsuAtributoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'   => new sfWidgetFormFilterInput(),
      'formato'       => new sfWidgetFormFilterInput(),
      'relevancia'    => new sfWidgetFormFilterInput(),
      'origen'        => new sfWidgetFormFilterInput(),
      'oid'           => new sfWidgetFormFilterInput(),
      'urn'           => new sfWidgetFormFilterInput(),
      'sintaxis_ldap' => new sfWidgetFormFilterInput(),
      'indexado'      => new sfWidgetFormFilterInput(),
      'multivaluado'  => new sfWidgetFormFilterInput(),
      'ejemplo'       => new sfWidgetFormFilterInput(),
      'notas'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'        => new sfValidatorPass(array('required' => false)),
      'descripcion'   => new sfValidatorPass(array('required' => false)),
      'formato'       => new sfValidatorPass(array('required' => false)),
      'relevancia'    => new sfValidatorPass(array('required' => false)),
      'origen'        => new sfValidatorPass(array('required' => false)),
      'oid'           => new sfValidatorPass(array('required' => false)),
      'urn'           => new sfValidatorPass(array('required' => false)),
      'sintaxis_ldap' => new sfValidatorPass(array('required' => false)),
      'indexado'      => new sfValidatorPass(array('required' => false)),
      'multivaluado'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ejemplo'       => new sfValidatorPass(array('required' => false)),
      'notas'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_usu_atributo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftUsuAtributo';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'nombre'        => 'Text',
      'descripcion'   => 'Text',
      'formato'       => 'Text',
      'relevancia'    => 'Text',
      'origen'        => 'Text',
      'oid'           => 'Text',
      'urn'           => 'Text',
      'sintaxis_ldap' => 'Text',
      'indexado'      => 'Text',
      'multivaluado'  => 'Number',
      'ejemplo'       => 'Text',
      'notas'         => 'Text',
    );
  }
}

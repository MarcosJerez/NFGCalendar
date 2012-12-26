<?php

/**
 * SftDireccion filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftDireccionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tipodireccion' => new sfWidgetFormPropelChoice(array('model' => 'SftTipoDireccion', 'add_empty' => true)),
      'tipovia'          => new sfWidgetFormFilterInput(),
      'domicilio'        => new sfWidgetFormFilterInput(),
      'numero'           => new sfWidgetFormFilterInput(),
      'escalera'         => new sfWidgetFormFilterInput(),
      'piso'             => new sfWidgetFormFilterInput(),
      'letra'            => new sfWidgetFormFilterInput(),
      'municipio'        => new sfWidgetFormFilterInput(),
      'provincia'        => new sfWidgetFormFilterInput(),
      'pais'             => new sfWidgetFormFilterInput(),
      'cp'               => new sfWidgetFormFilterInput(),
      'id_usuario'       => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_tipodireccion' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftTipoDireccion', 'column' => 'id')),
      'tipovia'          => new sfValidatorPass(array('required' => false)),
      'domicilio'        => new sfValidatorPass(array('required' => false)),
      'numero'           => new sfValidatorPass(array('required' => false)),
      'escalera'         => new sfValidatorPass(array('required' => false)),
      'piso'             => new sfValidatorPass(array('required' => false)),
      'letra'            => new sfValidatorPass(array('required' => false)),
      'municipio'        => new sfValidatorPass(array('required' => false)),
      'provincia'        => new sfValidatorPass(array('required' => false)),
      'pais'             => new sfValidatorPass(array('required' => false)),
      'cp'               => new sfValidatorPass(array('required' => false)),
      'id_usuario'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftUsuario', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sft_direccion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftDireccion';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'id_tipodireccion' => 'ForeignKey',
      'tipovia'          => 'Text',
      'domicilio'        => 'Text',
      'numero'           => 'Text',
      'escalera'         => 'Text',
      'piso'             => 'Text',
      'letra'            => 'Text',
      'municipio'        => 'Text',
      'provincia'        => 'Text',
      'pais'             => 'Text',
      'cp'               => 'Text',
      'id_usuario'       => 'ForeignKey',
    );
  }
}

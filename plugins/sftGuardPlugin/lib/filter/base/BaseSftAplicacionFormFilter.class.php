<?php

/**
 * SftAplicacion filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftAplicacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'   => new sfWidgetFormFilterInput(),
      'texto_intro'   => new sfWidgetFormFilterInput(),
      'es_symfonite'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tipo_login'    => new sfWidgetFormFilterInput(),
      'logotipo'      => new sfWidgetFormFilterInput(),
      'url'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url_svn'       => new sfWidgetFormFilterInput(),
      'clave'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_credencial' => new sfWidgetFormPropelChoice(array('model' => 'SftCredencial', 'add_empty' => true)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'codigo'        => new sfValidatorPass(array('required' => false)),
      'nombre'        => new sfValidatorPass(array('required' => false)),
      'descripcion'   => new sfValidatorPass(array('required' => false)),
      'texto_intro'   => new sfValidatorPass(array('required' => false)),
      'es_symfonite'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tipo_login'    => new sfValidatorPass(array('required' => false)),
      'logotipo'      => new sfValidatorPass(array('required' => false)),
      'url'           => new sfValidatorPass(array('required' => false)),
      'url_svn'       => new sfValidatorPass(array('required' => false)),
      'clave'         => new sfValidatorPass(array('required' => false)),
      'id_credencial' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SftCredencial', 'column' => 'id')),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sft_aplicacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftAplicacion';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'codigo'        => 'Text',
      'nombre'        => 'Text',
      'descripcion'   => 'Text',
      'texto_intro'   => 'Text',
      'es_symfonite'  => 'Boolean',
      'tipo_login'    => 'Text',
      'logotipo'      => 'Text',
      'url'           => 'Text',
      'url_svn'       => 'Text',
      'clave'         => 'Text',
      'id_credencial' => 'ForeignKey',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}

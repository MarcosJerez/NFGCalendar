<?php

/**
 * SftAcceso form base class.
 *
 * @method SftAcceso getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftAccesoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'id_usuario'             => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
      'id_perfil'              => new sfWidgetFormPropelChoice(array('model' => 'SftPerfil', 'add_empty' => true)),
      'delega'                 => new sfWidgetFormInputText(),
      'id_delega'              => new sfWidgetFormPropelChoice(array('model' => 'SftAcceso', 'add_empty' => true)),
      'esinicial'              => new sfWidgetFormInputText(),
      'sft_acceso_ambito_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'SftAmbito')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_usuario'             => new sfValidatorPropelChoice(array('model' => 'SftUsuario', 'column' => 'id', 'required' => false)),
      'id_perfil'              => new sfValidatorPropelChoice(array('model' => 'SftPerfil', 'column' => 'id', 'required' => false)),
      'delega'                 => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'id_delega'              => new sfValidatorPropelChoice(array('model' => 'SftAcceso', 'column' => 'id', 'required' => false)),
      'esinicial'              => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'sft_acceso_ambito_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'SftAmbito', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_acceso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftAcceso';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sft_acceso_ambito_list']))
    {
      $values = array();
      foreach ($this->object->getSftAccesoAmbitos() as $obj)
      {
        $values[] = $obj->getIdAmbito();
      }

      $this->setDefault('sft_acceso_ambito_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveSftAccesoAmbitoList($con);
  }

  public function saveSftAccesoAmbitoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sft_acceso_ambito_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(SftAccesoAmbitoPeer::ID_ACCESO, $this->object->getPrimaryKey());
    SftAccesoAmbitoPeer::doDelete($c, $con);

    $values = $this->getValue('sft_acceso_ambito_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SftAccesoAmbito();
        $obj->setIdAcceso($this->object->getPrimaryKey());
        $obj->setIdAmbito($value);
        $obj->save();
      }
    }
  }

}

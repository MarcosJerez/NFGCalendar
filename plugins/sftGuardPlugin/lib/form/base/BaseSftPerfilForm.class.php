<?php

/**
 * SftPerfil form base class.
 *
 * @method SftPerfil getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftPerfilForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'id_uo'                      => new sfWidgetFormPropelChoice(array('model' => 'SftUo', 'add_empty' => true)),
      'tema'                       => new sfWidgetFormInputText(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'id_ambitotipo'              => new sfWidgetFormPropelChoice(array('model' => 'SftAmbitoTipo', 'add_empty' => true)),
      'sft_perfil_credencial_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'SftCredencial')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_uo'                      => new sfValidatorPropelChoice(array('model' => 'SftUo', 'column' => 'id', 'required' => false)),
      'tema'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'                 => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                 => new sfValidatorDateTime(array('required' => false)),
      'id_ambitotipo'              => new sfValidatorPropelChoice(array('model' => 'SftAmbitoTipo', 'column' => 'id', 'required' => false)),
      'sft_perfil_credencial_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'SftCredencial', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_perfil[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftPerfil';
  }

  public function getI18nModelName()
  {
    return 'SftPerfilI18n';
  }

  public function getI18nFormClass()
  {
    return 'SftPerfilI18nForm';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sft_perfil_credencial_list']))
    {
      $values = array();
      foreach ($this->object->getSftPerfilCredencials() as $obj)
      {
        $values[] = $obj->getIdCredencial();
      }

      $this->setDefault('sft_perfil_credencial_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveSftPerfilCredencialList($con);
  }

  public function saveSftPerfilCredencialList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sft_perfil_credencial_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(SftPerfilCredencialPeer::ID_PERFIL, $this->object->getPrimaryKey());
    SftPerfilCredencialPeer::doDelete($c, $con);

    $values = $this->getValue('sft_perfil_credencial_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SftPerfilCredencial();
        $obj->setIdPerfil($this->object->getPrimaryKey());
        $obj->setIdCredencial($value);
        $obj->save();
      }
    }
  }

}

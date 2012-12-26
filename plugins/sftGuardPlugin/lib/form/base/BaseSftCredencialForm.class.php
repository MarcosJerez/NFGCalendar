<?php

/**
 * SftCredencial form base class.
 *
 * @method SftCredencial getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftCredencialForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'id_aplicacion'              => new sfWidgetFormPropelChoice(array('model' => 'SftAplicacion', 'add_empty' => false)),
      'nombre'                     => new sfWidgetFormInputText(),
      'descripcion'                => new sfWidgetFormInputText(),
      'sft_perfil_credencial_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'SftPerfil')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_aplicacion'              => new sfValidatorPropelChoice(array('model' => 'SftAplicacion', 'column' => 'id')),
      'nombre'                     => new sfValidatorString(array('max_length' => 255)),
      'descripcion'                => new sfValidatorString(array('max_length' => 255)),
      'sft_perfil_credencial_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'SftPerfil', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_credencial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftCredencial';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sft_perfil_credencial_list']))
    {
      $values = array();
      foreach ($this->object->getSftPerfilCredencials() as $obj)
      {
        $values[] = $obj->getIdPerfil();
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
    $c->add(SftPerfilCredencialPeer::ID_CREDENCIAL, $this->object->getPrimaryKey());
    SftPerfilCredencialPeer::doDelete($c, $con);

    $values = $this->getValue('sft_perfil_credencial_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SftPerfilCredencial();
        $obj->setIdCredencial($this->object->getPrimaryKey());
        $obj->setIdPerfil($value);
        $obj->save();
      }
    }
  }

}

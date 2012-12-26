<?php

/**
 * SftAmbito form base class.
 *
 * @method SftAmbito getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftAmbitoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'id_ambitotipo'          => new sfWidgetFormPropelChoice(array('model' => 'SftAmbitoTipo', 'add_empty' => true)),
      'id_periodo'             => new sfWidgetFormPropelChoice(array('model' => 'SftPeriodo', 'add_empty' => false)),
      'codigo'                 => new sfWidgetFormInputText(),
      'estado'                 => new sfWidgetFormInputText(),
      'sft_acceso_ambito_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'SftAcceso')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_ambitotipo'          => new sfValidatorPropelChoice(array('model' => 'SftAmbitoTipo', 'column' => 'id', 'required' => false)),
      'id_periodo'             => new sfValidatorPropelChoice(array('model' => 'SftPeriodo', 'column' => 'id')),
      'codigo'                 => new sfValidatorString(array('max_length' => 255)),
      'estado'                 => new sfValidatorString(array('max_length' => 255)),
      'sft_acceso_ambito_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'SftAcceso', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_ambito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftAmbito';
  }

  public function getI18nModelName()
  {
    return 'SftAmbitoI18n';
  }

  public function getI18nFormClass()
  {
    return 'SftAmbitoI18nForm';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sft_acceso_ambito_list']))
    {
      $values = array();
      foreach ($this->object->getSftAccesoAmbitos() as $obj)
      {
        $values[] = $obj->getIdAcceso();
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
    $c->add(SftAccesoAmbitoPeer::ID_AMBITO, $this->object->getPrimaryKey());
    SftAccesoAmbitoPeer::doDelete($c, $con);

    $values = $this->getValue('sft_acceso_ambito_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SftAccesoAmbito();
        $obj->setIdAmbito($this->object->getPrimaryKey());
        $obj->setIdAcceso($value);
        $obj->save();
      }
    }
  }

}

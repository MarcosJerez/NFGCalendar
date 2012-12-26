<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HabilidadForm
 *
 * @author carlos
 */
class HabilidadForm extends sfForm{
  //put your code here
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormChoice(array(
                              'choices' => array(),
                              'renderer_class' => 'sfWidgetFormPropelJQueryAutocompleter',
                              'renderer_options' => array(
                                                    'model' => 'BolHabilidad',
                                                    'method' => 'getNombre',
                                                    'url' => sfContext::getInstance()->getController()->genUrl('miperfil/autocompleteHabilidad'),
                                                   )
                             ))
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorString(array('required'=>true)),
    ));

    $this->widgetSchema->setNameFormat('habilidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

}

?>

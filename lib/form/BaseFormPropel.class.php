<?php

/**
 * Project form base class.
 *
 * @package    basico
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFormPropel extends sfFormPropel
{
  public function setup()
  {
    sfWidgetFormSchema::setDefaultFormFormatterName('list');
  }
}

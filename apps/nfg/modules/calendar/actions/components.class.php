<?php


class calendarComponents extends sfComponents
{
  public function executeMenuActividadesXCategoria()
  {
    $criteria = new Criteria();
    $criteria->addAscendingOrderByColumn(NfgCategoriaPeer::NOMBRE);
    //Deberíamos poder ordenarlas en la administración (mirar el behaviour de propel de ordenar)
    $this->categorias = NfgCategoriaPeer::doSelect($criteria);
  }
  
  public function executeNew()
  {
    
    $criteria = new Criteria();
    $this->widgetActividades = new sfWidgetFormPropelChoice(array('model'=>'NfgActividad','method'=>'getAbrev','criteria'=>$criteria));
    $this->widgetLocalidades = new sfWidgetFormPropelChoice(array('model' => 'NfgLocalidad', 'order_by'=>array('Nombre','asc'),'add_empty' => false));
    
    $this->widgetActividades = new sfWidgetFormChoice(array(
                                        'choices' => array(),
                                        'renderer_class' => 'sfWidgetFormPropelJQueryAutocompleter',
                                        'renderer_options' => array(
                                                    'model' => 'NfgActividad',
                                                    'method' => 'getNombre',
                                                    'url' => sfContext::getInstance()->getController()->genUrl('calendar/autocompleteActividad'),
                                                   )));

    
  }
  
}





?>
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
  
  /**
   * Presenta el formulario de nueva convocatoria
   */
  public function executeNew()
  {
    $this->convocatoria = new NfgConvocatoria();
  }
  
}





?>
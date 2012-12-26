<?php


class calendarComponents extends sfComponents
{
  /**
   * Entrada: nfgConvocatoria
   */
  public function executeMenuActividadesXCategoria()
  {
    $criteria = new Criteria();
    $criteria->addAscendingOrderByColumn(NfgCategoriaPeer::NOMBRE);
    //Deberíamos poder ordenarlas en la administración (mirar el behaviour de propel de ordenar)
    $this->categorias = NfgCategoriaPeer::doSelect($criteria);
  }
  
}





?>
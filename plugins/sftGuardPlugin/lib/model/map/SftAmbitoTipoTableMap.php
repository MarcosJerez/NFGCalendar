<?php


/**
 * This class defines the structure of the 'sft_ambitostipos' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Sep 24 21:13:07 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sftGuardPlugin.lib.model.map
 */
class SftAmbitoTipoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sftGuardPlugin.lib.model.map.SftAmbitoTipoTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('sft_ambitostipos');
		$this->setPhpName('SftAmbitoTipo');
		$this->setClassname('SftAmbitoTipo');
		$this->setPackage('plugins.sftGuardPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 255, null);
		$this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SftAmbito', 'SftAmbito', RelationMap::ONE_TO_MANY, array('id' => 'id_ambitotipo', ), 'CASCADE', 'CASCADE');
    $this->addRelation('SftPerfil', 'SftPerfil', RelationMap::ONE_TO_MANY, array('id' => 'id_ambitotipo', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // SftAmbitoTipoTableMap

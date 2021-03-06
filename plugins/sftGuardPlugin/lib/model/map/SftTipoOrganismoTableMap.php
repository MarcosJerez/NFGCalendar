<?php


/**
 * This class defines the structure of the 'sft_tiposorganismo' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Sep 24 21:13:15 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sftGuardPlugin.lib.model.map
 */
class SftTipoOrganismoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sftGuardPlugin.lib.model.map.SftTipoOrganismoTableMap';

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
		$this->setName('sft_tiposorganismo');
		$this->setPhpName('SftTipoOrganismo');
		$this->setClassname('SftTipoOrganismo');
		$this->setPackage('plugins.sftGuardPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('CODIGO', 'Codigo', 'VARCHAR', false, 20, null);
		$this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SftOrganismo', 'SftOrganismo', RelationMap::ONE_TO_MANY, array('id' => 'id_tipoorganismo', ), 'SET NULL', 'CASCADE');
    $this->addRelation('SftTipoOrganismoI18n', 'SftTipoOrganismoI18n', RelationMap::ONE_TO_MANY, array('id' => 'id', ), 'CASCADE', 'CASCADE');
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
			'symfony_i18n' => array('i18n_table' => 'sft_tiposorganismo_i18n', ),
		);
	} // getBehaviors()

} // SftTipoOrganismoTableMap

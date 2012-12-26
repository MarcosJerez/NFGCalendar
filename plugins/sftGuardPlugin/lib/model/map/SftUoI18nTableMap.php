<?php


/**
 * This class defines the structure of the 'sft_uos_i18n' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Sep 24 21:13:16 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sftGuardPlugin.lib.model.map
 */
class SftUoI18nTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sftGuardPlugin.lib.model.map.SftUoI18nTableMap';

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
		$this->setName('sft_uos_i18n');
		$this->setPhpName('SftUoI18n');
		$this->setClassname('SftUoI18n');
		$this->setPackage('plugins.sftGuardPlugin.lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('ID', 'Id', 'INTEGER' , 'sft_uos', 'ID', true, null, 0);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 255, null);
		$this->addColumn('ABREVIATURA', 'Abreviatura', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255, null);
		$this->addPrimaryKey('ID_CULTURA', 'IdCultura', 'CHAR', true, 5, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SftUo', 'SftUo', RelationMap::MANY_TO_ONE, array('id' => 'id', ), 'CASCADE', 'CASCADE');
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
			'symfony_i18n_translation' => array('culture_column' => 'id_cultura', ),
		);
	} // getBehaviors()

} // SftUoI18nTableMap

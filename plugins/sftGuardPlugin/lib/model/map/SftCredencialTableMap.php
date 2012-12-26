<?php


/**
 * This class defines the structure of the 'sft_credenciales' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Sep 24 21:13:09 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sftGuardPlugin.lib.model.map
 */
class SftCredencialTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sftGuardPlugin.lib.model.map.SftCredencialTableMap';

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
		$this->setName('sft_credenciales');
		$this->setPhpName('SftCredencial');
		$this->setClassname('SftCredencial');
		$this->setPackage('plugins.sftGuardPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addForeignKey('ID_APLICACION', 'IdAplicacion', 'INTEGER', 'sft_aplicaciones', 'ID', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 255, '');
		$this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 255, '');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SftAplicacion', 'SftAplicacion', RelationMap::MANY_TO_ONE, array('id_aplicacion' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('SftAplicacion', 'SftAplicacion', RelationMap::ONE_TO_MANY, array('id' => 'id_credencial', ), 'RESTRICT', 'CASCADE');
    $this->addRelation('SftPerfilCredencial', 'SftPerfilCredencial', RelationMap::ONE_TO_MANY, array('id' => 'id_credencial', ), 'CASCADE', 'CASCADE');
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

} // SftCredencialTableMap

<?php


/**
 * This class defines the structure of the 'sft_emails' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Sep 24 21:13:10 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sftGuardPlugin.lib.model.map
 */
class SftEmailTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sftGuardPlugin.lib.model.map.SftEmailTableMap';

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
		$this->setName('sft_emails');
		$this->setPhpName('SftEmail');
		$this->setClassname('SftEmail');
		$this->setPackage('plugins.sftGuardPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('DIRECCION', 'Direccion', 'VARCHAR', true, 255, null);
		$this->addColumn('PREDETERMINADO', 'Predeterminado', 'TINYINT', true, null, null);
		$this->addForeignKey('ID_USUARIO', 'IdUsuario', 'INTEGER', 'sft_usuarios', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SftUsuario', 'SftUsuario', RelationMap::MANY_TO_ONE, array('id_usuario' => 'id', ), 'RESTRICT', 'CASCADE');
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

} // SftEmailTableMap

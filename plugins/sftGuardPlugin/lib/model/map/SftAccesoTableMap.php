<?php


/**
 * This class defines the structure of the 'sft_accesos' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Sep 24 21:13:06 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sftGuardPlugin.lib.model.map
 */
class SftAccesoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sftGuardPlugin.lib.model.map.SftAccesoTableMap';

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
		$this->setName('sft_accesos');
		$this->setPhpName('SftAcceso');
		$this->setClassname('SftAcceso');
		$this->setPackage('plugins.sftGuardPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addForeignKey('ID_USUARIO', 'IdUsuario', 'INTEGER', 'sft_usuarios', 'ID', false, null, null);
		$this->addForeignKey('ID_PERFIL', 'IdPerfil', 'INTEGER', 'sft_perfiles', 'ID', false, null, null);
		$this->addColumn('DELEGA', 'Delega', 'TINYINT', false, null, 0);
		$this->addForeignKey('ID_DELEGA', 'IdDelega', 'INTEGER', 'sft_accesos', 'ID', false, null, null);
		$this->addColumn('ESINICIAL', 'Esinicial', 'TINYINT', false, null, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SftUsuario', 'SftUsuario', RelationMap::MANY_TO_ONE, array('id_usuario' => 'id', ), 'RESTRICT', 'CASCADE');
    $this->addRelation('SftPerfil', 'SftPerfil', RelationMap::MANY_TO_ONE, array('id_perfil' => 'id', ), 'RESTRICT', 'CASCADE');
    $this->addRelation('SftAccesoRelatedByIdDelega', 'SftAcceso', RelationMap::MANY_TO_ONE, array('id_delega' => 'id', ), 'RESTRICT', 'CASCADE');
    $this->addRelation('SftAccesoRelatedByIdDelega', 'SftAcceso', RelationMap::ONE_TO_MANY, array('id' => 'id_delega', ), 'RESTRICT', 'CASCADE');
    $this->addRelation('SftAccesoAmbito', 'SftAccesoAmbito', RelationMap::ONE_TO_MANY, array('id' => 'id_acceso', ), 'CASCADE', 'CASCADE');
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

} // SftAccesoTableMap

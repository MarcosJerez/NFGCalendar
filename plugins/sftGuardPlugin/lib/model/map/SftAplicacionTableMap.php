<?php


/**
 * This class defines the structure of the 'sft_aplicaciones' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Sep 24 21:13:08 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sftGuardPlugin.lib.model.map
 */
class SftAplicacionTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sftGuardPlugin.lib.model.map.SftAplicacionTableMap';

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
		$this->setName('sft_aplicaciones');
		$this->setPhpName('SftAplicacion');
		$this->setClassname('SftAplicacion');
		$this->setPackage('plugins.sftGuardPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('CODIGO', 'Codigo', 'VARCHAR', true, 255, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 255, null);
		$this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255, null);
		$this->addColumn('TEXTO_INTRO', 'TextoIntro', 'LONGVARCHAR', false, null, null);
		$this->addColumn('ES_SYMFONITE', 'EsSymfonite', 'BOOLEAN', false, null, null);
		$this->addColumn('TIPO_LOGIN', 'TipoLogin', 'VARCHAR', false, 255, null);
		$this->addColumn('LOGOTIPO', 'Logotipo', 'VARCHAR', false, 255, null);
		$this->addColumn('URL', 'Url', 'VARCHAR', true, 250, null);
		$this->addColumn('URL_SVN', 'UrlSvn', 'VARCHAR', false, 255, null);
		$this->addColumn('CLAVE', 'Clave', 'VARCHAR', true, 20, null);
		$this->addForeignKey('ID_CREDENCIAL', 'IdCredencial', 'INTEGER', 'sft_credenciales', 'ID', false, 11, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SftCredencial', 'SftCredencial', RelationMap::MANY_TO_ONE, array('id_credencial' => 'id', ), 'RESTRICT', 'CASCADE');
    $this->addRelation('SftConfPersonal', 'SftConfPersonal', RelationMap::ONE_TO_MANY, array('id' => 'id_aplicacion', ), 'CASCADE', 'CASCADE');
    $this->addRelation('SftCredencial', 'SftCredencial', RelationMap::ONE_TO_MANY, array('id' => 'id_aplicacion', ), 'CASCADE', 'CASCADE');
    $this->addRelation('SftEstadisticaAplicacion', 'SftEstadisticaAplicacion', RelationMap::ONE_TO_MANY, array('id' => 'id_aplicacion', ), 'CASCADE', 'CASCADE');
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
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // SftAplicacionTableMap
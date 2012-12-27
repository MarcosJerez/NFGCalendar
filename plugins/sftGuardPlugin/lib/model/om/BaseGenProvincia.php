<?php

/**
 * Base class that represents a row from the 'gen_provincias' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Sep 24 21:13:18 2012
 *
 * @package    plugins.sftGuardPlugin.lib.model.om
 */
abstract class BaseGenProvincia extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        GenProvinciaPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the codigoprov field.
	 * @var        string
	 */
	protected $codigoprov;

	/**
	 * The value for the id_comunidad field.
	 * @var        int
	 */
	protected $id_comunidad;

	/**
	 * @var        GenComunidad
	 */
	protected $aGenComunidad;

	/**
	 * @var        array GenProvinciaI18n[] Collection to store aggregation of GenProvinciaI18n objects.
	 */
	protected $collGenProvinciaI18ns;

	/**
	 * @var        Criteria The criteria used to select the current contents of collGenProvinciaI18ns.
	 */
	private $lastGenProvinciaI18nCriteria = null;

	/**
	 * @var        array GenLocalidad[] Collection to store aggregation of GenLocalidad objects.
	 */
	protected $collGenLocalidads;

	/**
	 * @var        Criteria The criteria used to select the current contents of collGenLocalidads.
	 */
	private $lastGenLocalidadCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// symfony behavior
	
	const PEER = 'GenProvinciaPeer';

	// symfony_i18n behavior
	
	/**
	 * @var string The value for the culture field
	 */
	protected $culture = null;
	
	/**
	 * @var array Current I18N objects
	 */
	protected $current_i18n = array();

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [codigoprov] column value.
	 * 
	 * @return     string
	 */
	public function getCodigoprov()
	{
		return $this->codigoprov;
	}

	/**
	 * Get the [id_comunidad] column value.
	 * 
	 * @return     int
	 */
	public function getIdComunidad()
	{
		return $this->id_comunidad;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     GenProvincia The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GenProvinciaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [codigoprov] column.
	 * 
	 * @param      string $v new value
	 * @return     GenProvincia The current object (for fluent API support)
	 */
	public function setCodigoprov($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigoprov !== $v) {
			$this->codigoprov = $v;
			$this->modifiedColumns[] = GenProvinciaPeer::CODIGOPROV;
		}

		return $this;
	} // setCodigoprov()

	/**
	 * Set the value of [id_comunidad] column.
	 * 
	 * @param      int $v new value
	 * @return     GenProvincia The current object (for fluent API support)
	 */
	public function setIdComunidad($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_comunidad !== $v) {
			$this->id_comunidad = $v;
			$this->modifiedColumns[] = GenProvinciaPeer::ID_COMUNIDAD;
		}

		if ($this->aGenComunidad !== null && $this->aGenComunidad->getId() !== $v) {
			$this->aGenComunidad = null;
		}

		return $this;
	} // setIdComunidad()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->codigoprov = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->id_comunidad = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 3; // 3 = GenProvinciaPeer::NUM_COLUMNS - GenProvinciaPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating GenProvincia object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aGenComunidad !== null && $this->id_comunidad !== $this->aGenComunidad->getId()) {
			$this->aGenComunidad = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GenProvinciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = GenProvinciaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aGenComunidad = null;
			$this->collGenProvinciaI18ns = null;
			$this->lastGenProvinciaI18nCriteria = null;

			$this->collGenLocalidads = null;
			$this->lastGenLocalidadCriteria = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GenProvinciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseGenProvincia:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				GenProvinciaPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseGenProvincia:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GenProvinciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseGenProvincia:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    $con->commit();
			
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseGenProvincia:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				GenProvinciaPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aGenComunidad !== null) {
				if ($this->aGenComunidad->isModified() || $this->aGenComunidad->isNew()) {
					$affectedRows += $this->aGenComunidad->save($con);
				}
				$this->setGenComunidad($this->aGenComunidad);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = GenProvinciaPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GenProvinciaPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += GenProvinciaPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collGenProvinciaI18ns !== null) {
				foreach ($this->collGenProvinciaI18ns as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGenLocalidads !== null) {
				foreach ($this->collGenLocalidads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aGenComunidad !== null) {
				if (!$this->aGenComunidad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGenComunidad->getValidationFailures());
				}
			}


			if (($retval = GenProvinciaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGenProvinciaI18ns !== null) {
					foreach ($this->collGenProvinciaI18ns as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGenLocalidads !== null) {
					foreach ($this->collGenLocalidads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GenProvinciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCodigoprov();
				break;
			case 2:
				return $this->getIdComunidad();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = GenProvinciaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCodigoprov(),
			$keys[2] => $this->getIdComunidad(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GenProvinciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCodigoprov($value);
				break;
			case 2:
				$this->setIdComunidad($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GenProvinciaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodigoprov($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdComunidad($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(GenProvinciaPeer::DATABASE_NAME);

		if ($this->isColumnModified(GenProvinciaPeer::ID)) $criteria->add(GenProvinciaPeer::ID, $this->id);
		if ($this->isColumnModified(GenProvinciaPeer::CODIGOPROV)) $criteria->add(GenProvinciaPeer::CODIGOPROV, $this->codigoprov);
		if ($this->isColumnModified(GenProvinciaPeer::ID_COMUNIDAD)) $criteria->add(GenProvinciaPeer::ID_COMUNIDAD, $this->id_comunidad);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GenProvinciaPeer::DATABASE_NAME);

		$criteria->add(GenProvinciaPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of GenProvincia (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodigoprov($this->codigoprov);

		$copyObj->setIdComunidad($this->id_comunidad);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getGenProvinciaI18ns() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGenProvinciaI18n($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getGenLocalidads() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGenLocalidad($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     GenProvincia Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     GenProvinciaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new GenProvinciaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a GenComunidad object.
	 *
	 * @param      GenComunidad $v
	 * @return     GenProvincia The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setGenComunidad(GenComunidad $v = null)
	{
		if ($v === null) {
			$this->setIdComunidad(NULL);
		} else {
			$this->setIdComunidad($v->getId());
		}

		$this->aGenComunidad = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the GenComunidad object, it will not be re-added.
		if ($v !== null) {
			$v->addGenProvincia($this);
		}

		return $this;
	}


	/**
	 * Get the associated GenComunidad object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     GenComunidad The associated GenComunidad object.
	 * @throws     PropelException
	 */
	public function getGenComunidad(PropelPDO $con = null)
	{
		if ($this->aGenComunidad === null && ($this->id_comunidad !== null)) {
			$this->aGenComunidad = GenComunidadPeer::retrieveByPk($this->id_comunidad);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aGenComunidad->addGenProvincias($this);
			 */
		}
		return $this->aGenComunidad;
	}

	/**
	 * Clears out the collGenProvinciaI18ns collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGenProvinciaI18ns()
	 */
	public function clearGenProvinciaI18ns()
	{
		$this->collGenProvinciaI18ns = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGenProvinciaI18ns collection (array).
	 *
	 * By default this just sets the collGenProvinciaI18ns collection to an empty array (like clearcollGenProvinciaI18ns());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initGenProvinciaI18ns()
	{
		$this->collGenProvinciaI18ns = array();
	}

	/**
	 * Gets an array of GenProvinciaI18n objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this GenProvincia has previously been saved, it will retrieve
	 * related GenProvinciaI18ns from storage. If this GenProvincia is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array GenProvinciaI18n[]
	 * @throws     PropelException
	 */
	public function getGenProvinciaI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GenProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGenProvinciaI18ns === null) {
			if ($this->isNew()) {
			   $this->collGenProvinciaI18ns = array();
			} else {

				$criteria->add(GenProvinciaI18nPeer::ID, $this->id);

				GenProvinciaI18nPeer::addSelectColumns($criteria);
				$this->collGenProvinciaI18ns = GenProvinciaI18nPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(GenProvinciaI18nPeer::ID, $this->id);

				GenProvinciaI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastGenProvinciaI18nCriteria) || !$this->lastGenProvinciaI18nCriteria->equals($criteria)) {
					$this->collGenProvinciaI18ns = GenProvinciaI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGenProvinciaI18nCriteria = $criteria;
		return $this->collGenProvinciaI18ns;
	}

	/**
	 * Returns the number of related GenProvinciaI18n objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related GenProvinciaI18n objects.
	 * @throws     PropelException
	 */
	public function countGenProvinciaI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GenProvinciaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collGenProvinciaI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(GenProvinciaI18nPeer::ID, $this->id);

				$count = GenProvinciaI18nPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(GenProvinciaI18nPeer::ID, $this->id);

				if (!isset($this->lastGenProvinciaI18nCriteria) || !$this->lastGenProvinciaI18nCriteria->equals($criteria)) {
					$count = GenProvinciaI18nPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collGenProvinciaI18ns);
				}
			} else {
				$count = count($this->collGenProvinciaI18ns);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a GenProvinciaI18n object to this object
	 * through the GenProvinciaI18n foreign key attribute.
	 *
	 * @param      GenProvinciaI18n $l GenProvinciaI18n
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGenProvinciaI18n(GenProvinciaI18n $l)
	{
		if ($this->collGenProvinciaI18ns === null) {
			$this->initGenProvinciaI18ns();
		}
		if (!in_array($l, $this->collGenProvinciaI18ns, true)) { // only add it if the **same** object is not already associated
			array_push($this->collGenProvinciaI18ns, $l);
			$l->setGenProvincia($this);
		}
	}

	/**
	 * Clears out the collGenLocalidads collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGenLocalidads()
	 */
	public function clearGenLocalidads()
	{
		$this->collGenLocalidads = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGenLocalidads collection (array).
	 *
	 * By default this just sets the collGenLocalidads collection to an empty array (like clearcollGenLocalidads());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initGenLocalidads()
	{
		$this->collGenLocalidads = array();
	}

	/**
	 * Gets an array of GenLocalidad objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this GenProvincia has previously been saved, it will retrieve
	 * related GenLocalidads from storage. If this GenProvincia is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array GenLocalidad[]
	 * @throws     PropelException
	 */
	public function getGenLocalidads($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GenProvinciaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGenLocalidads === null) {
			if ($this->isNew()) {
			   $this->collGenLocalidads = array();
			} else {

				$criteria->add(GenLocalidadPeer::ID_PROVINCIA, $this->id);

				GenLocalidadPeer::addSelectColumns($criteria);
				$this->collGenLocalidads = GenLocalidadPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(GenLocalidadPeer::ID_PROVINCIA, $this->id);

				GenLocalidadPeer::addSelectColumns($criteria);
				if (!isset($this->lastGenLocalidadCriteria) || !$this->lastGenLocalidadCriteria->equals($criteria)) {
					$this->collGenLocalidads = GenLocalidadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGenLocalidadCriteria = $criteria;
		return $this->collGenLocalidads;
	}

	/**
	 * Returns the number of related GenLocalidad objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related GenLocalidad objects.
	 * @throws     PropelException
	 */
	public function countGenLocalidads(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GenProvinciaPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collGenLocalidads === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(GenLocalidadPeer::ID_PROVINCIA, $this->id);

				$count = GenLocalidadPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(GenLocalidadPeer::ID_PROVINCIA, $this->id);

				if (!isset($this->lastGenLocalidadCriteria) || !$this->lastGenLocalidadCriteria->equals($criteria)) {
					$count = GenLocalidadPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collGenLocalidads);
				}
			} else {
				$count = count($this->collGenLocalidads);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a GenLocalidad object to this object
	 * through the GenLocalidad foreign key attribute.
	 *
	 * @param      GenLocalidad $l GenLocalidad
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGenLocalidad(GenLocalidad $l)
	{
		if ($this->collGenLocalidads === null) {
			$this->initGenLocalidads();
		}
		if (!in_array($l, $this->collGenLocalidads, true)) { // only add it if the **same** object is not already associated
			array_push($this->collGenLocalidads, $l);
			$l->setGenProvincia($this);
		}
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collGenProvinciaI18ns) {
				foreach ((array) $this->collGenProvinciaI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collGenLocalidads) {
				foreach ((array) $this->collGenLocalidads as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collGenProvinciaI18ns = null;
		$this->collGenLocalidads = null;
			$this->aGenComunidad = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseGenProvincia:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseGenProvincia::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

	// symfony_i18n behavior
	
	/**
	 * Returns the culture.
	 *
	 * @return string The culture
	 */
	public function getCulture()
	{
	  return $this->culture;
	}
	
	/**
	 * Sets the culture.
	 *
	 * @param string  The culture to set
	 *
	 * @return GenProvincia
	 */
	public function setCulture($culture)
	{
	  $this->culture = $culture;
	  return $this;
	}
	
	/**
	 * Returns the "nombre" value from the current {@link GenProvinciaI18n}.
	 */
	public function getNombre($culture = null)
	{
	  return $this->getCurrentGenProvinciaI18n($culture)->getNombre();
	}
	
	/**
	 * Sets the "nombre" value of the current {@link GenProvinciaI18n}.
	 *
	 * @return GenProvincia
	 */
	public function setNombre($value, $culture = null)
	{
	  $this->getCurrentGenProvinciaI18n($culture)->setNombre($value);
	  return $this;
	}
	
	/**
	 * Returns the "nombreabrev" value from the current {@link GenProvinciaI18n}.
	 */
	public function getNombreabrev($culture = null)
	{
	  return $this->getCurrentGenProvinciaI18n($culture)->getNombreabrev();
	}
	
	/**
	 * Sets the "nombreabrev" value of the current {@link GenProvinciaI18n}.
	 *
	 * @return GenProvincia
	 */
	public function setNombreabrev($value, $culture = null)
	{
	  $this->getCurrentGenProvinciaI18n($culture)->setNombreabrev($value);
	  return $this;
	}
	
	/**
	 * Returns the current translation.
	 *
	 * @return GenProvinciaI18n
	 */
	public function getCurrentGenProvinciaI18n($culture = null)
	{
	  if (null === $culture)
	  {
	    $culture = null === $this->culture ? sfPropel::getDefaultCulture() : $this->culture;
	  }
	
	  if (!isset($this->current_i18n[$culture]))
	  {
	    $object = $this->isNew() ? null : GenProvinciaI18nPeer::retrieveByPK($this->getPrimaryKey(), $culture);
	    if ($object)
	    {
	      $this->setGenProvinciaI18nForCulture($object, $culture);
	    }
	    else
	    {
	      $this->setGenProvinciaI18nForCulture(new GenProvinciaI18n(), $culture);
	      $this->current_i18n[$culture]->setIdCultura($culture);
	    }
	  }
	
	  return $this->current_i18n[$culture];
	}
	
	/**
	 * Sets the translation object for a culture.
	 */
	public function setGenProvinciaI18nForCulture(GenProvinciaI18n $object, $culture)
	{
	  $this->current_i18n[$culture] = $object;
	  $this->addGenProvinciaI18n($object);
	}

} // BaseGenProvincia
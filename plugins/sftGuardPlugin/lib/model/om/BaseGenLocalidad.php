<?php

/**
 * Base class that represents a row from the 'gen_localidades' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Mon Sep 24 21:13:19 2012
 *
 * @package    plugins.sftGuardPlugin.lib.model.om
 */
abstract class BaseGenLocalidad extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        GenLocalidadPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the codigolocal field.
	 * @var        string
	 */
	protected $codigolocal;

	/**
	 * The value for the id_provincia field.
	 * @var        int
	 */
	protected $id_provincia;

	/**
	 * @var        GenProvincia
	 */
	protected $aGenProvincia;

	/**
	 * @var        array GenLocalidadI18n[] Collection to store aggregation of GenLocalidadI18n objects.
	 */
	protected $collGenLocalidadI18ns;

	/**
	 * @var        Criteria The criteria used to select the current contents of collGenLocalidadI18ns.
	 */
	private $lastGenLocalidadI18nCriteria = null;

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
	
	const PEER = 'GenLocalidadPeer';

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
	 * Get the [codigolocal] column value.
	 * 
	 * @return     string
	 */
	public function getCodigolocal()
	{
		return $this->codigolocal;
	}

	/**
	 * Get the [id_provincia] column value.
	 * 
	 * @return     int
	 */
	public function getIdProvincia()
	{
		return $this->id_provincia;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     GenLocalidad The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GenLocalidadPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [codigolocal] column.
	 * 
	 * @param      string $v new value
	 * @return     GenLocalidad The current object (for fluent API support)
	 */
	public function setCodigolocal($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigolocal !== $v) {
			$this->codigolocal = $v;
			$this->modifiedColumns[] = GenLocalidadPeer::CODIGOLOCAL;
		}

		return $this;
	} // setCodigolocal()

	/**
	 * Set the value of [id_provincia] column.
	 * 
	 * @param      int $v new value
	 * @return     GenLocalidad The current object (for fluent API support)
	 */
	public function setIdProvincia($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_provincia !== $v) {
			$this->id_provincia = $v;
			$this->modifiedColumns[] = GenLocalidadPeer::ID_PROVINCIA;
		}

		if ($this->aGenProvincia !== null && $this->aGenProvincia->getId() !== $v) {
			$this->aGenProvincia = null;
		}

		return $this;
	} // setIdProvincia()

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
			$this->codigolocal = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->id_provincia = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 3; // 3 = GenLocalidadPeer::NUM_COLUMNS - GenLocalidadPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating GenLocalidad object", $e);
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

		if ($this->aGenProvincia !== null && $this->id_provincia !== $this->aGenProvincia->getId()) {
			$this->aGenProvincia = null;
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
			$con = Propel::getConnection(GenLocalidadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = GenLocalidadPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aGenProvincia = null;
			$this->collGenLocalidadI18ns = null;
			$this->lastGenLocalidadI18nCriteria = null;

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
			$con = Propel::getConnection(GenLocalidadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseGenLocalidad:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				GenLocalidadPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseGenLocalidad:delete:post') as $callable)
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
			$con = Propel::getConnection(GenLocalidadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseGenLocalidad:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseGenLocalidad:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				GenLocalidadPeer::addInstanceToPool($this);
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

			if ($this->aGenProvincia !== null) {
				if ($this->aGenProvincia->isModified() || $this->aGenProvincia->isNew()) {
					$affectedRows += $this->aGenProvincia->save($con);
				}
				$this->setGenProvincia($this->aGenProvincia);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = GenLocalidadPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GenLocalidadPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += GenLocalidadPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collGenLocalidadI18ns !== null) {
				foreach ($this->collGenLocalidadI18ns as $referrerFK) {
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

			if ($this->aGenProvincia !== null) {
				if (!$this->aGenProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGenProvincia->getValidationFailures());
				}
			}


			if (($retval = GenLocalidadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGenLocalidadI18ns !== null) {
					foreach ($this->collGenLocalidadI18ns as $referrerFK) {
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
		$pos = GenLocalidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodigolocal();
				break;
			case 2:
				return $this->getIdProvincia();
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
		$keys = GenLocalidadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCodigolocal(),
			$keys[2] => $this->getIdProvincia(),
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
		$pos = GenLocalidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodigolocal($value);
				break;
			case 2:
				$this->setIdProvincia($value);
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
		$keys = GenLocalidadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodigolocal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdProvincia($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(GenLocalidadPeer::DATABASE_NAME);

		if ($this->isColumnModified(GenLocalidadPeer::ID)) $criteria->add(GenLocalidadPeer::ID, $this->id);
		if ($this->isColumnModified(GenLocalidadPeer::CODIGOLOCAL)) $criteria->add(GenLocalidadPeer::CODIGOLOCAL, $this->codigolocal);
		if ($this->isColumnModified(GenLocalidadPeer::ID_PROVINCIA)) $criteria->add(GenLocalidadPeer::ID_PROVINCIA, $this->id_provincia);

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
		$criteria = new Criteria(GenLocalidadPeer::DATABASE_NAME);

		$criteria->add(GenLocalidadPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of GenLocalidad (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodigolocal($this->codigolocal);

		$copyObj->setIdProvincia($this->id_provincia);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getGenLocalidadI18ns() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGenLocalidadI18n($relObj->copy($deepCopy));
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
	 * @return     GenLocalidad Clone of current object.
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
	 * @return     GenLocalidadPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new GenLocalidadPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a GenProvincia object.
	 *
	 * @param      GenProvincia $v
	 * @return     GenLocalidad The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setGenProvincia(GenProvincia $v = null)
	{
		if ($v === null) {
			$this->setIdProvincia(NULL);
		} else {
			$this->setIdProvincia($v->getId());
		}

		$this->aGenProvincia = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the GenProvincia object, it will not be re-added.
		if ($v !== null) {
			$v->addGenLocalidad($this);
		}

		return $this;
	}


	/**
	 * Get the associated GenProvincia object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     GenProvincia The associated GenProvincia object.
	 * @throws     PropelException
	 */
	public function getGenProvincia(PropelPDO $con = null)
	{
		if ($this->aGenProvincia === null && ($this->id_provincia !== null)) {
			$this->aGenProvincia = GenProvinciaPeer::retrieveByPk($this->id_provincia);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aGenProvincia->addGenLocalidads($this);
			 */
		}
		return $this->aGenProvincia;
	}

	/**
	 * Clears out the collGenLocalidadI18ns collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGenLocalidadI18ns()
	 */
	public function clearGenLocalidadI18ns()
	{
		$this->collGenLocalidadI18ns = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGenLocalidadI18ns collection (array).
	 *
	 * By default this just sets the collGenLocalidadI18ns collection to an empty array (like clearcollGenLocalidadI18ns());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initGenLocalidadI18ns()
	{
		$this->collGenLocalidadI18ns = array();
	}

	/**
	 * Gets an array of GenLocalidadI18n objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this GenLocalidad has previously been saved, it will retrieve
	 * related GenLocalidadI18ns from storage. If this GenLocalidad is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array GenLocalidadI18n[]
	 * @throws     PropelException
	 */
	public function getGenLocalidadI18ns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GenLocalidadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGenLocalidadI18ns === null) {
			if ($this->isNew()) {
			   $this->collGenLocalidadI18ns = array();
			} else {

				$criteria->add(GenLocalidadI18nPeer::ID, $this->id);

				GenLocalidadI18nPeer::addSelectColumns($criteria);
				$this->collGenLocalidadI18ns = GenLocalidadI18nPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(GenLocalidadI18nPeer::ID, $this->id);

				GenLocalidadI18nPeer::addSelectColumns($criteria);
				if (!isset($this->lastGenLocalidadI18nCriteria) || !$this->lastGenLocalidadI18nCriteria->equals($criteria)) {
					$this->collGenLocalidadI18ns = GenLocalidadI18nPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGenLocalidadI18nCriteria = $criteria;
		return $this->collGenLocalidadI18ns;
	}

	/**
	 * Returns the number of related GenLocalidadI18n objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related GenLocalidadI18n objects.
	 * @throws     PropelException
	 */
	public function countGenLocalidadI18ns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(GenLocalidadPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collGenLocalidadI18ns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(GenLocalidadI18nPeer::ID, $this->id);

				$count = GenLocalidadI18nPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(GenLocalidadI18nPeer::ID, $this->id);

				if (!isset($this->lastGenLocalidadI18nCriteria) || !$this->lastGenLocalidadI18nCriteria->equals($criteria)) {
					$count = GenLocalidadI18nPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collGenLocalidadI18ns);
				}
			} else {
				$count = count($this->collGenLocalidadI18ns);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a GenLocalidadI18n object to this object
	 * through the GenLocalidadI18n foreign key attribute.
	 *
	 * @param      GenLocalidadI18n $l GenLocalidadI18n
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGenLocalidadI18n(GenLocalidadI18n $l)
	{
		if ($this->collGenLocalidadI18ns === null) {
			$this->initGenLocalidadI18ns();
		}
		if (!in_array($l, $this->collGenLocalidadI18ns, true)) { // only add it if the **same** object is not already associated
			array_push($this->collGenLocalidadI18ns, $l);
			$l->setGenLocalidad($this);
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
			if ($this->collGenLocalidadI18ns) {
				foreach ((array) $this->collGenLocalidadI18ns as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collGenLocalidadI18ns = null;
			$this->aGenProvincia = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseGenLocalidad:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseGenLocalidad::%s', $method));
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
	 * @return GenLocalidad
	 */
	public function setCulture($culture)
	{
	  $this->culture = $culture;
	  return $this;
	}
	
	/**
	 * Returns the "nombre" value from the current {@link GenLocalidadI18n}.
	 */
	public function getNombre($culture = null)
	{
	  return $this->getCurrentGenLocalidadI18n($culture)->getNombre();
	}
	
	/**
	 * Sets the "nombre" value of the current {@link GenLocalidadI18n}.
	 *
	 * @return GenLocalidad
	 */
	public function setNombre($value, $culture = null)
	{
	  $this->getCurrentGenLocalidadI18n($culture)->setNombre($value);
	  return $this;
	}
	
	/**
	 * Returns the "nombreabrev" value from the current {@link GenLocalidadI18n}.
	 */
	public function getNombreabrev($culture = null)
	{
	  return $this->getCurrentGenLocalidadI18n($culture)->getNombreabrev();
	}
	
	/**
	 * Sets the "nombreabrev" value of the current {@link GenLocalidadI18n}.
	 *
	 * @return GenLocalidad
	 */
	public function setNombreabrev($value, $culture = null)
	{
	  $this->getCurrentGenLocalidadI18n($culture)->setNombreabrev($value);
	  return $this;
	}
	
	/**
	 * Returns the current translation.
	 *
	 * @return GenLocalidadI18n
	 */
	public function getCurrentGenLocalidadI18n($culture = null)
	{
	  if (null === $culture)
	  {
	    $culture = null === $this->culture ? sfPropel::getDefaultCulture() : $this->culture;
	  }
	
	  if (!isset($this->current_i18n[$culture]))
	  {
	    $object = $this->isNew() ? null : GenLocalidadI18nPeer::retrieveByPK($this->getPrimaryKey(), $culture);
	    if ($object)
	    {
	      $this->setGenLocalidadI18nForCulture($object, $culture);
	    }
	    else
	    {
	      $this->setGenLocalidadI18nForCulture(new GenLocalidadI18n(), $culture);
	      $this->current_i18n[$culture]->setIdCultura($culture);
	    }
	  }
	
	  return $this->current_i18n[$culture];
	}
	
	/**
	 * Sets the translation object for a culture.
	 */
	public function setGenLocalidadI18nForCulture(GenLocalidadI18n $object, $culture)
	{
	  $this->current_i18n[$culture] = $object;
	  $this->addGenLocalidadI18n($object);
	}

} // BaseGenLocalidad

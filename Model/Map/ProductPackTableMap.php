<?php

namespace ProductPack\Model\Map;

use ProductPack\Model\ProductPack;
use ProductPack\Model\ProductPackQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'product_pack' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ProductPackTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ProductPack.Model.Map.ProductPackTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'product_pack';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ProductPack\\Model\\ProductPack';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ProductPack.Model.ProductPack';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the ID field
     */
    const ID = 'product_pack.ID';

    /**
     * the column name for the POSITION field
     */
    const POSITION = 'product_pack.POSITION';

    /**
     * the column name for the HOST_PRODUCT_ID field
     */
    const HOST_PRODUCT_ID = 'product_pack.HOST_PRODUCT_ID';

    /**
     * the column name for the PRODUCT_ID field
     */
    const PRODUCT_ID = 'product_pack.PRODUCT_ID';

    /**
     * the column name for the QUANTITY field
     */
    const QUANTITY = 'product_pack.QUANTITY';

    /**
     * the column name for the PRICE field
     */
    const PRICE = 'product_pack.PRICE';

    /**
     * the column name for the CREATED_AT field
     */
    const CREATED_AT = 'product_pack.CREATED_AT';

    /**
     * the column name for the UPDATED_AT field
     */
    const UPDATED_AT = 'product_pack.UPDATED_AT';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Position', 'HostProductId', 'ProductId', 'Quantity', 'Price', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'position', 'hostProductId', 'productId', 'quantity', 'price', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(ProductPackTableMap::ID, ProductPackTableMap::POSITION, ProductPackTableMap::HOST_PRODUCT_ID, ProductPackTableMap::PRODUCT_ID, ProductPackTableMap::QUANTITY, ProductPackTableMap::PRICE, ProductPackTableMap::CREATED_AT, ProductPackTableMap::UPDATED_AT, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'POSITION', 'HOST_PRODUCT_ID', 'PRODUCT_ID', 'QUANTITY', 'PRICE', 'CREATED_AT', 'UPDATED_AT', ),
        self::TYPE_FIELDNAME     => array('id', 'position', 'host_product_id', 'product_id', 'quantity', 'price', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Position' => 1, 'HostProductId' => 2, 'ProductId' => 3, 'Quantity' => 4, 'Price' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'position' => 1, 'hostProductId' => 2, 'productId' => 3, 'quantity' => 4, 'price' => 5, 'createdAt' => 6, 'updatedAt' => 7, ),
        self::TYPE_COLNAME       => array(ProductPackTableMap::ID => 0, ProductPackTableMap::POSITION => 1, ProductPackTableMap::HOST_PRODUCT_ID => 2, ProductPackTableMap::PRODUCT_ID => 3, ProductPackTableMap::QUANTITY => 4, ProductPackTableMap::PRICE => 5, ProductPackTableMap::CREATED_AT => 6, ProductPackTableMap::UPDATED_AT => 7, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'POSITION' => 1, 'HOST_PRODUCT_ID' => 2, 'PRODUCT_ID' => 3, 'QUANTITY' => 4, 'PRICE' => 5, 'CREATED_AT' => 6, 'UPDATED_AT' => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'position' => 1, 'host_product_id' => 2, 'product_id' => 3, 'quantity' => 4, 'price' => 5, 'created_at' => 6, 'updated_at' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('product_pack');
        $this->setPhpName('ProductPack');
        $this->setClassName('\\ProductPack\\Model\\ProductPack');
        $this->setPackage('ProductPack.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('POSITION', 'Position', 'INTEGER', true, null, 1);
        $this->addForeignKey('HOST_PRODUCT_ID', 'HostProductId', 'INTEGER', 'product', 'ID', true, null, null);
        $this->addForeignKey('PRODUCT_ID', 'ProductId', 'INTEGER', 'product', 'ID', true, null, null);
        $this->addColumn('QUANTITY', 'Quantity', 'INTEGER', true, null, 1);
        $this->addColumn('PRICE', 'Price', 'DECIMAL', true, 16, 0);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ProductRelatedByHostProductId', '\\Thelia\\Model\\Product', RelationMap::MANY_TO_ONE, array('host_product_id' => 'id', ), 'CASCADE', 'RESTRICT');
        $this->addRelation('ProductRelatedByProductId', '\\Thelia\\Model\\Product', RelationMap::MANY_TO_ONE, array('product_id' => 'id', ), 'CASCADE', 'RESTRICT');
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
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {

            return (int) $row[
                            $indexType == TableMap::TYPE_NUM
                            ? 0 + $offset
                            : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
                        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ProductPackTableMap::CLASS_DEFAULT : ProductPackTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (ProductPack object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ProductPackTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProductPackTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProductPackTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProductPackTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProductPackTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ProductPackTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProductPackTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProductPackTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ProductPackTableMap::ID);
            $criteria->addSelectColumn(ProductPackTableMap::POSITION);
            $criteria->addSelectColumn(ProductPackTableMap::HOST_PRODUCT_ID);
            $criteria->addSelectColumn(ProductPackTableMap::PRODUCT_ID);
            $criteria->addSelectColumn(ProductPackTableMap::QUANTITY);
            $criteria->addSelectColumn(ProductPackTableMap::PRICE);
            $criteria->addSelectColumn(ProductPackTableMap::CREATED_AT);
            $criteria->addSelectColumn(ProductPackTableMap::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.POSITION');
            $criteria->addSelectColumn($alias . '.HOST_PRODUCT_ID');
            $criteria->addSelectColumn($alias . '.PRODUCT_ID');
            $criteria->addSelectColumn($alias . '.QUANTITY');
            $criteria->addSelectColumn($alias . '.PRICE');
            $criteria->addSelectColumn($alias . '.CREATED_AT');
            $criteria->addSelectColumn($alias . '.UPDATED_AT');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ProductPackTableMap::DATABASE_NAME)->getTable(ProductPackTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(ProductPackTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(ProductPackTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new ProductPackTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a ProductPack or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ProductPack object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductPackTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ProductPack\Model\ProductPack) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProductPackTableMap::DATABASE_NAME);
            $criteria->add(ProductPackTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = ProductPackQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { ProductPackTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { ProductPackTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the product_pack table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ProductPackQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ProductPack or Criteria object.
     *
     * @param mixed               $criteria Criteria or ProductPack object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductPackTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ProductPack object
        }

        if ($criteria->containsKey(ProductPackTableMap::ID) && $criteria->keyContainsValue(ProductPackTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductPackTableMap::ID.')');
        }


        // Set the correct dbName
        $query = ProductPackQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // ProductPackTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ProductPackTableMap::buildTableMap();

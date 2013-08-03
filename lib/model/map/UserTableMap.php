<?php



/**
 * This class defines the structure of the 'user' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Aug  2 22:42:29 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.UserTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('User');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addColumn('USER', 'UserId', 'VARCHAR', true, 50, null);
        $this->addColumn('NAME', 'Name', 'VARCHAR', false, 50, null);
        $this->addColumn('GENDER', 'Gender', 'VARCHAR', false, 10, null);
        $this->addColumn('FOOD', 'Food', 'VARCHAR', false, 50, null);
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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

} // UserTableMap
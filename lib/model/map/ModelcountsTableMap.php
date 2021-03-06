<?php



/**
 * This class defines the structure of the 'modelcounts' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon Oct  7 17:23:16 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ModelcountsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.ModelcountsTableMap';

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
        $this->setName('modelcounts');
        $this->setPhpName('Modelcounts');
        $this->setClassname('Modelcounts');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addPrimaryKey('COUNT_TIME', 'CountTime', 'TIMESTAMP', true, null, null);
        $this->addColumn('JAY', 'Jay', 'INTEGER', false, null, null);
        $this->addColumn('JJP', 'Jjp', 'INTEGER', false, null, null);
        $this->addColumn('FER', 'Fer', 'INTEGER', false, null, null);
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
            'symfony_timestampable' => array('create_column' => 'created_at', ),
        );
    } // getBehaviors()

} // ModelcountsTableMap

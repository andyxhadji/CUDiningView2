<?php



/**
 * This class defines the structure of the 'nutrition' table.
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
class NutritionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.map.NutritionTableMap';

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
        $this->setName('nutrition');
        $this->setPhpName('Nutrition');
        $this->setClassname('Nutrition');
        $this->setPackage('lib.model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('FOOD_ID', 'FoodId', 'SMALLINT', true, null, null);
        $this->addColumn('CURRENT', 'Current', 'INTEGER', false, 1, null);
        $this->addColumn('DISH', 'Dish', 'VARCHAR', false, 50, null);
        $this->addColumn('JAY', 'Jay', 'INTEGER', false, 1, null);
        $this->addColumn('JJP', 'Jjp', 'INTEGER', false, 1, null);
        $this->addColumn('FER', 'Fer', 'INTEGER', false, 1, null);
        $this->addColumn('SERVINGSIZE', 'Servingsize', 'VARCHAR', false, 20, null);
        $this->addColumn('CALORIES', 'Calories', 'INTEGER', false, 5, null);
        $this->addColumn('TOTALFAT', 'Totalfat', 'INTEGER', false, 5, null);
        $this->addColumn('CHOLESTEROL', 'Cholesterol', 'INTEGER', false, 5, null);
        $this->addColumn('SATURATEDFAT', 'Saturatedfat', 'INTEGER', false, 5, null);
        $this->addColumn('PROTEIN', 'Protein', 'INTEGER', false, 5, null);
        $this->addColumn('CARBOHYDRATE', 'Carbohydrate', 'INTEGER', false, 5, null);
        $this->addColumn('FIBER', 'Fiber', 'INTEGER', false, 5, null);
        $this->addColumn('SODIUM', 'Sodium', 'INTEGER', false, 5, null);
        $this->addColumn('SCORE', 'Score', 'INTEGER', false, 5, null);
        $this->addColumn('URL', 'Url', 'VARCHAR', false, 200, null);
        $this->addColumn('V', 'V', 'INTEGER', false, 1, null);
        $this->addColumn('VN', 'Vn', 'INTEGER', false, 1, null);
        $this->addColumn('GF', 'Gf', 'INTEGER', false, 1, null);
        $this->addColumn('L', 'L', 'INTEGER', false, 1, null);
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

} // NutritionTableMap

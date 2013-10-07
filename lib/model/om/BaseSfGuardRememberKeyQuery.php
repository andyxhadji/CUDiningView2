<?php


/**
 * Base class that represents a query for the 'sf_guard_remember_key' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon Oct  7 17:23:17 2013
 *
 * @method SfGuardRememberKeyQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method SfGuardRememberKeyQuery orderByRememberKey($order = Criteria::ASC) Order by the remember_key column
 * @method SfGuardRememberKeyQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method SfGuardRememberKeyQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method SfGuardRememberKeyQuery groupByUserId() Group by the user_id column
 * @method SfGuardRememberKeyQuery groupByRememberKey() Group by the remember_key column
 * @method SfGuardRememberKeyQuery groupByIpAddress() Group by the ip_address column
 * @method SfGuardRememberKeyQuery groupByCreatedAt() Group by the created_at column
 *
 * @method SfGuardRememberKeyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SfGuardRememberKeyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SfGuardRememberKeyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SfGuardRememberKeyQuery leftJoinSfGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the SfGuardUser relation
 * @method SfGuardRememberKeyQuery rightJoinSfGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SfGuardUser relation
 * @method SfGuardRememberKeyQuery innerJoinSfGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the SfGuardUser relation
 *
 * @method SfGuardRememberKey findOne(PropelPDO $con = null) Return the first SfGuardRememberKey matching the query
 * @method SfGuardRememberKey findOneOrCreate(PropelPDO $con = null) Return the first SfGuardRememberKey matching the query, or a new SfGuardRememberKey object populated from the query conditions when no match is found
 *
 * @method SfGuardRememberKey findOneByUserId(int $user_id) Return the first SfGuardRememberKey filtered by the user_id column
 * @method SfGuardRememberKey findOneByRememberKey(string $remember_key) Return the first SfGuardRememberKey filtered by the remember_key column
 * @method SfGuardRememberKey findOneByIpAddress(string $ip_address) Return the first SfGuardRememberKey filtered by the ip_address column
 * @method SfGuardRememberKey findOneByCreatedAt(string $created_at) Return the first SfGuardRememberKey filtered by the created_at column
 *
 * @method array findByUserId(int $user_id) Return SfGuardRememberKey objects filtered by the user_id column
 * @method array findByRememberKey(string $remember_key) Return SfGuardRememberKey objects filtered by the remember_key column
 * @method array findByIpAddress(string $ip_address) Return SfGuardRememberKey objects filtered by the ip_address column
 * @method array findByCreatedAt(string $created_at) Return SfGuardRememberKey objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSfGuardRememberKeyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSfGuardRememberKeyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'SfGuardRememberKey', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SfGuardRememberKeyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     SfGuardRememberKeyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SfGuardRememberKeyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SfGuardRememberKeyQuery) {
            return $criteria;
        }
        $query = new SfGuardRememberKeyQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$user_id, $ip_address]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SfGuardRememberKey|SfGuardRememberKey[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SfGuardRememberKeyPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SfGuardRememberKeyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   SfGuardRememberKey A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `USER_ID`, `REMEMBER_KEY`, `IP_ADDRESS`, `CREATED_AT` FROM `sf_guard_remember_key` WHERE `USER_ID` = :p0 AND `IP_ADDRESS` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SfGuardRememberKey();
            $obj->hydrate($row);
            SfGuardRememberKeyPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return SfGuardRememberKey|SfGuardRememberKey[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SfGuardRememberKey[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return SfGuardRememberKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SfGuardRememberKeyPeer::USER_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SfGuardRememberKeyPeer::IP_ADDRESS, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SfGuardRememberKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SfGuardRememberKeyPeer::USER_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SfGuardRememberKeyPeer::IP_ADDRESS, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterBySfGuardUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SfGuardRememberKeyQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(SfGuardRememberKeyPeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the remember_key column
     *
     * Example usage:
     * <code>
     * $query->filterByRememberKey('fooValue');   // WHERE remember_key = 'fooValue'
     * $query->filterByRememberKey('%fooValue%'); // WHERE remember_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rememberKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SfGuardRememberKeyQuery The current query, for fluid interface
     */
    public function filterByRememberKey($rememberKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rememberKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rememberKey)) {
                $rememberKey = str_replace('*', '%', $rememberKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SfGuardRememberKeyPeer::REMEMBER_KEY, $rememberKey, $comparison);
    }

    /**
     * Filter the query on the ip_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
     * $query->filterByIpAddress('%fooValue%'); // WHERE ip_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SfGuardRememberKeyQuery The current query, for fluid interface
     */
    public function filterByIpAddress($ipAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ipAddress)) {
                $ipAddress = str_replace('*', '%', $ipAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SfGuardRememberKeyPeer::IP_ADDRESS, $ipAddress, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SfGuardRememberKeyQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SfGuardRememberKeyPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SfGuardRememberKeyPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SfGuardRememberKeyPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related SfGuardUser object
     *
     * @param   SfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   SfGuardRememberKeyQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBySfGuardUser($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof SfGuardUser) {
            return $this
                ->addUsingAlias(SfGuardRememberKeyPeer::USER_ID, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SfGuardRememberKeyPeer::USER_ID, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBySfGuardUser() only accepts arguments of type SfGuardUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SfGuardUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SfGuardRememberKeyQuery The current query, for fluid interface
     */
    public function joinSfGuardUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SfGuardUser');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SfGuardUser');
        }

        return $this;
    }

    /**
     * Use the SfGuardUser relation SfGuardUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SfGuardUserQuery A secondary query class using the current class as primary query
     */
    public function useSfGuardUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSfGuardUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SfGuardUser', 'SfGuardUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SfGuardRememberKey $sfGuardRememberKey Object to remove from the list of results
     *
     * @return SfGuardRememberKeyQuery The current query, for fluid interface
     */
    public function prune($sfGuardRememberKey = null)
    {
        if ($sfGuardRememberKey) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SfGuardRememberKeyPeer::USER_ID), $sfGuardRememberKey->getUserId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SfGuardRememberKeyPeer::IP_ADDRESS), $sfGuardRememberKey->getIpAddress(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}

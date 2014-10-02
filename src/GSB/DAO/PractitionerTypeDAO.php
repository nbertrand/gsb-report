<?php

namespace GSB\DAO;

use GSB\Domain\PractitionerType;

class PractitionerTypeDAO extends DAO
{
    /**
     * Returns the list of all types, sorted by name.
     *
     * @return array The list of all types.
     */
    public function findAll() {
        $sql = "select * from practitioner_type order by practitioner_type_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $types = array();
        foreach ($result as $row) {
            $TypeID = $row['practitioner_type_id'];
            $types[$practitionerTypeID] = $this->buildDomainObject($row);
        }
        return $types;
    }

    /**
     * Returns the type matching the given id.
     *
     * @param integer $id The type id.
     *
     * @return \GSB\Domain\practitionertype|throws an exception if no family is found.
     */
    public function find($id) {
        $sql = "select * from practitioner_type where practitioner_type_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No Type found for id " . $id);
    }

    /**
     * Creates a Type instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\PractitionerType
     */
    protected function buildDomainObject($row) {
        $type = new practitioner_type();
        $type->setId($row['practitioner_type_id']);
        $type->setName($row['practitioner_type_name']);
        return $type;
    }
}
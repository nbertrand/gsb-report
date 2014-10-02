<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner;

class PractitionerDAO extends DAO {

    private $typePractitionerDAO;

    public function setTypePractionerDAO($typePractitionerDAO) {
        $this->$typePractitionerDAO = $typePractitionerDAO;
    }

    /**
     * Returns the list of all practitioner, sorted by name.
     *
     * @return array The list of all practitioner.
     */
    public function findAll() {
        $sql = "select * from practitioner order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql);

        // Converts query result to an array of domain objects
        $practitioner = array();
        foreach ($result as $row) {
            $practitionerID = $row['practitioner_id'];
            $practitioner[$practitionerID] = $this->buildDomainObject($row);
        }
        return $practitioner;
    }

    /**
     * Returns the list of all practitioner for a given type, sorted by name.
     *
     * @param integer $typePractitionerDAO The type id.
     *
     * @return array The list of drugs.
     */
    public function findAllByType($typePractitionerDAO) {
        $sql = "select * from practitioner where practitioner_type_id=? order by name";
        $result = $this->getDb()->fetchAll($sql, array($typePractitionerDAO));

        // Convert query result to an array of domain objects
        $practitioner = array();
        foreach ($result as $row) {
            $practitioner_id = $row['practitioner_id'];
            $practitioner[$practitioner_id] = $this->buildDomainObject($row);
        }
        return $practitioner;
    }

    /**
     * Returns the drug matching a given id.
     *
     * @param integer $id The drug id.
     *
     * @return \GSB\Domain\Drug|throws an exception if no drug is found.
     */
    public function find($id) {
        $sql = "select * from practitioner where practitioner_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner found for id " . $id);
    }

    protected function buildDomainObject($row) {
        $typeID = $row['practitioner_type_id'];
        $type = $this->typePractitionerDAO->find($typeID);

        $practitioner = new Practitioner();
        $practitioner->setId($row['practitioner_id']);
        $practitioner->setPractitionerName($row['practitioner_name']);
        $practitioner->setPractitionerFirstName($row['practitioner_first_name']);
        $practitioner->setAddress($row['practitioner_address']);
        $practitioner->setPractitionerZip($row['practitioner_zip_code']);
        $practitioner->setPractitionerCity($row['practitioner_city']);
        $practitioner->setNotoriety($row['notoriety_coefficient']);
        $practitioner->setType($type);
        return $practitioner;
    }

}

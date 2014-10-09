<?php

namespace GSB\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use GSB\Domain\Visitor;

class VisitorDAO extends DAO implements UserProviderInterface {

    /**
     * Returns the list of all visitor, sorted by name.
     *
     * @return array The list of all visitor.
     */
    public function findAll() {
        $sql = "select * from visitor order by visitor_name";
        $result = $this->getDb()->fetchAll($sql);

        // Converts query result to an array of domain objects
        $visitors = array();
        foreach ($result as $row) {
            $visitorId = $row['visitor_id'];
            $visitors[$visitorId] = $this->buildDomainObject($row);
        }
        return $visitors;
    }

    /**
     * Returns the list of all visitor for a given visitor type, sorted by name.
     *
     * @param integer $visitorType The visitor type.
     *
     * @return array The list of visitor.
     */
    public function findAllByType($visitorType) {
        $sql = "select * from visitor where visitor_type=? order by visitor_name";
        $result = $this->getDb()->fetchAll($sql, array($visitorType));

        // Convert query result to an array of domain objects
        $visitors = array();
        foreach ($result as $row) {
            $visitorId = $row['visitor_id'];
            $visitors[$visitorId] = $this->buildDomainObject($row);
        }
        return $visitors;
    }

    /**
     * Returns the visitor matching a given id.
     *
     * @param integer $id The visitor id.
     *
     * @return \GSB\Domain\visitor |throws an exception if no visitor is found.
     */
    public function find($id) {
        $sql = "select * from visitor where visitor_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No visitor found for id " . $id);
    }

    /**
     * Creates a Visitor instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Visitor
     */
    public function loadUserByUsername($username) {
        $sql = "select * from visitor where user_name=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('Utilisateur "%s" non trouvé.', $username));
    }

    public function refreshUser(UserInterface $visitor) {
        $class = get_class($visitor);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('L\'instance de "%s" n\'est pas supportée.', $class));
        }
        return $this->loadUserByUsername($visitor->getUsername());
    }

    public function supportsClass($class) {
        return 'GSB\Domain\Visitor' === $class;
    }

    protected function buildDomainObject($row) {
        $visitor = new Visitor();
        $visitor->setId($row['visitor_id']);
        $visitor->setIdSector($row['sector_id']);
        $visitor->setIdLaboratory($row['laboratory_id']);
        $visitor->setLastName($row['visitor_last_name']);
        $visitor->setFirstName($row['visitor_first_name']);
        $visitor->setAddress($row['visitor_address']);
        $visitor->setZipCode($row['visitor_zip_code']);
        $visitor->setCity($row['visitor_city']);
        $visitor->setHiringDate($row['hiring_date']);
        $visitor->setUsername($row['user_name']);
        $visitor->setPassword($row['password']);
        $visitor->setSalt($row['salt']);
        $visitor->setRole($row['role']);
        $visitor->setVisitorType($row['visitor_type']);
        return $visitor;
    }

}

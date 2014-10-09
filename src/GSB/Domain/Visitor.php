<?php

namespace GSB\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class Visitor implements UserInterface {

    /**
     * Visitor id.
     *
     * @var integer
     */
    private $id;

    /**
     * Sector id.
     *
     * @var integer
     */
    private $idSector;

    /**
     * Laboratory id.
     *
     * @var integer
     */
    private $idLaboratory;

    /**
     * Visitor last name.
     *
     * @var string
     */
    private $lastName;

    /**
     * Visitor first name.
     *
     * @var string
     */
    private $firstName;

    /**
     * Visitor address.
     *
     * @var string
     */
    private $address;

    /**
     * Visitor zip code.
     *
     * @var string
     */
    private $zipCode;

    /**
     * Visitor city.
     *
     * @var string
     */
    private $city;

    /**
     * Visitor hiring date.
     *
     * @var string
     */
    private $hiringDate;

    /**
     * Visitor username.
     *
     * @var string
     */
    private $username;

    /**
     * Visitor password.
     *
     * @var string
     */
    private $password;

    /**
     * salt.
     *
     * @var string
     */
    private $salt;

    /**
     * Visitor role.
     *
     * @var string
     */
    private $role;

    /**
     * Visitor type.
     *
     * @var string
     */
    private $visitorType;

    public function getId() {
        return $this->id;
    }

    public function getIdSector() {
        return $this->idSector;
    }

    public function getIdLaboratory() {
        return $this->idLaboratory;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function getCity() {
        return $this->city;
    }

    public function getHiringDate() {
        return $this->hiringDate;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getRole() {
        return $this->role;
    }
    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }


    public function getVisitorType() {
        return $this->visitorType;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdSector($idSector) {
        $this->idSector = $idSector;
    }

    public function setIdLaboratory($idLaboratory) {
        $this->idLaboratory = $idLaboratory;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setHiringDate($hiringDate) {
        $this->hiringDate = $hiringDate;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setVisitorType($visitorType) {
        $this->visitorType = $visitorType;
    }

    public function eraseCredentials() {
        // Nothing to do here
    }

}

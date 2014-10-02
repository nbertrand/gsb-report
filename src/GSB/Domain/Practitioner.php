<?php

namespace GSB\Domain;

class Practitioner {

    /** practitioner id
     * 
     * @var integer
     */
    private $id_p;

    /** practitioner type id
     * 
     * @var integer
     */
    private $type_id_p;

    /** practionner name
     * 
     * @var string 
     */
    private $prac_name;

    /** practitioner first name
     * 
     * @var string
     */
    private $prac_first_name;

    /** practitioner address
     * 
     * @var string
     */
    private $prac_address;

    /** practitioner zip code
     * 
     * @var string
     */
    private $prac_zip;

    /** practitioner city
     * 
     * @var string
     */
    private $prac_city;

    /** notoriety coefficient
     * 
     * @var integer
     */
    private $notoriety_coef;

    public function getId_p() {
        return $this->id_p;
    }

    public function getType_id_p() {
        return $this->type_id_p;
    }

    public function getPrac_name() {
        return $this->prac_name;
    }

    public function getPrac_first_name() {
        return $this->prac_first_name;
    }

    public function getPrac_address() {
        return $this->prac_address;
    }

    public function getPrac_zip() {
        return $this->prac_zip;
    }

    public function getPrac_city() {
        return $this->prac_city;
    }

    public function getNotoriety_coef() {
        return $this->notoriety_coef;
    }

    public function setId_p($id_p) {
        $this->id_p = $id_p;
    }

    public function setType_id_p($type_id_p) {
        $this->type_id_p = $type_id_p;
    }

    public function setPrac_name($prac_name) {
        $this->prac_name = $prac_name;
    }

    public function setPrac_first_name($prac_first_name) {
        $this->prac_first_name = $prac_first_name;
    }

    public function setPrac_address($prac_address) {
        $this->prac_address = $prac_address;
    }

    public function setPrac_zip($prac_zip) {
        $this->prac_zip = $prac_zip;
    }

    public function setPrac_city($prac_city) {
        $this->prac_city = $prac_city;
    }

    public function setNotoriety_coef($notoriety_coef) {
        $this->notoriety_coef = $notoriety_coef;
    }

}

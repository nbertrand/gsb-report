<?php

namespace GSB\Domain;

class PractitionerType {

    /** practitioner type id
     * 
     * @var integer
     */
    private $type_id_p;

    /** practioner type name
     *       
     * @var string 
     */
    private $type_name_p;

    /*     * practitioner type place
     * 
     * @var string
     */
    private $type_place_p;

    public function getType_id_p() {
        return $this->type_id_p;
    }

    public function getType_name_p() {
        return $this->type_name_p;
    }

    public function getType_place_p() {
        return $this->type_place_p;
    }

    public function setType_id_p($type_id_p) {
        $this->type_id_p = $type_id_p;
    }

    public function setType_name_p($type_name_p) {
        $this->type_name_p = $type_name_p;
    }

    public function setType_place_p($type_place_p) {
        $this->type_place_p = $type_place_p;
    }

}

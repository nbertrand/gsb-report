<?php

namespace GSB\Domain;

class VisitReport {
    
    /**
     * Report id.
     *
     * @var integer
     */
    private $id;
    
    /**
     * practitioner_id
     * 
     * @var integer
     */
    private $practitionerId;
    
    /**
     * visitor id
     * 
     * @var integer
     */
    private $visitorId;
    
    /**
     * reporting date
     * 
     * @var date reporting date
     */
    private $Date;
    
    /**
     * assessment
     * 
     * @var string
     */
    private $assessment;
    
    /**
     * prupose
     * 
     * @var string
     */
    private $purpose;
    
    public function getId() {
        return $this->id;
    }

    public function getPractitionerId() {
        return $this->practitionerId;
    }

    public function getVisitorId() {
        return $this->visitorId;
    }

    public function getDate() {
        return $this->reportingDate;
    }

    public function getAssessment() {
        return $this->assessment;
    }

    public function getPurpose() {
        return $this->purpose;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPractitionerId($practitionerId) {
        $this->practitionerId = $practitionerId;
    }

    public function setVisitorId($visitorId) {
        $this->visitorId = $visitorId;
    }

    public function setDate($reportingDate) {
        $this->reportingDate = $reportingDate;
    }

    public function setAssessment($assessment) {
        $this->assessment = $assessment;
    }

    public function setPurpose($prupose) {
        $this->purpose = $prupose;
    }


    
}
<?php
namespace GSB\DAO;

use GSB\Domain\VisitReport;

class VisitReportDAO extends DAO
{
    
        /**
     * @var \GSB\DAO\PractitionerDAO
     */
    private $PractitionerDAO;    
    
    public function setPractitionerDAO($practitionerDAO)
    {
        $this->PractitionerDAO = $practitionerDAO;
    }
    /**
     * @var \GSB\DAO\VisitorDAO
     */
    private $VisitorDAO;
    public function setVisitorDAO($visitorDAO)
    {
        $this->VisitorDAO = $visitorDAO;
    }
    
    
    /**
     * Returns the list of all visit Report, sorted by id.
     *
     * @return array The list of all practitioner.
     */
    public function findAll() {
        $sql = "select * from visit_report order by reporting_date";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $visitReport = array();
        foreach ($result as $row) {
            $reportID = $row['report_id'];
            $visitReport[$reportID] = $this->buildDomainObject($row);
        }
        return $visitReport;
    }
    
     /**
     * Returns the visit report matching a given id.
     *
     * @param integer $id The visit report id.
     *
     * @return \GSB\Domain\VisitReport |throws an exception if no report is found.
     */
    public function find($id) {
                $sql = "select * from visit_report where report_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No visit report found for id " . $id);
    }
    
    /**
     * Creates a visitReport instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\VisitReport
     */
    protected function buildDomainObject($row) {
        $practitionerId = $row['practitioner_id'];
        $practitioner = $this->PractitionerDAO->find($practitionerId);
        $visitorId = $row['visitor_id'];
        $visitor = $this->VisitorDAO->find($visitorId);

        $visitReport = new visitReport ();
        $visitReport->setId($row['report_id']);
        $visitReport->setPractitionerId($practitioner);
        $visitReport->setVisitorId($visitor);
        $visitReport->setDate($row['reporting_date']);
        $visitReport->setAssessment($row['assessment']);
        $visitReport->setPurpose($row['purpose']);
        return $visitReport;
    }
}
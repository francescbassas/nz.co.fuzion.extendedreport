<?php

/**
 * Class CRM_Extendedreport_Form_Report_Contact_Extendedcontact
 */
class CRM_Extendedreport_Form_Report_Member_MembershipPivot extends CRM_Extendedreport_Form_Report_ExtendedReport {
  protected $_baseTable = 'civicrm_membership';
  protected $skipACL = TRUE;
  protected $_customGroupAggregates = TRUE;
  protected $_aggregatesIncludeNULL = TRUE;
  protected $_aggregatesAddTotal = TRUE;
  protected $_rollup = 'WITH ROLLUP';
  public $_drilldownReport = array('membership/membershipdetail' => 'Link to Participants');
  protected $_potentialCriteria = array();

  /**
   *
   */
  function __construct() {
    $this->_customGroupExtended['civicrm_membership'] = array(
      'extends' => array('Membership'),
      'filters' => TRUE,
      'title' => ts('Membership'),
    );
    $this->_columns = $this->getColumns('membership', array(
        'fields' => FALSE,
        'order_by' => FALSE
      )
    ) + $this->getColumns('contact', array(
        'fields' => FALSE,
        'order_by' => FALSE
      )
    );
    $this->_columns['civicrm_membership']['fields']['id']['required'] = TRUE;

    $this->_aggregateRowFields = array(
      'membership_civireport:membership_type_id' => 'Membership Type',
    );
    $this->_aggregateColumnHeaderFields = array(
      'membership_civireport:membership_type_id' => 'Membership Type',
    );
    parent::__construct();
  }

  /**
   * @return array
   */
  function fromClauses() {
    return array(
      'contact_from_membership',
    );
  }
}

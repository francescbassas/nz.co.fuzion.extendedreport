<?php

/**
 * Class CRM_Extendedreport_Form_Report_ActivityExtended
 */
class CRM_Extendedreport_Form_Report_ActivityEditable extends CRM_Extendedreport_Form_Report_ExtendedReport {
  //todo move def to getActivityColumns
  /**
   * @var array
   */
  protected $_customGroupExtends = array('Activity');
  /**
   * @var bool
   */
  protected $_addressField = FALSE;
  /**
   * @var bool
   */
  protected $_emailField = FALSE;
  /**
   * @var null
   */
  protected $_summary = NULL;
  /**
   * @var bool
   */
  protected $_exposeContactID = FALSE;
  /**
   * @var bool
   */
  protected $_customGroupGroupBy = FALSE;
  /**
   * @var string
   */
  protected $_baseTable = 'civicrm_activity';

  protected $skipACL = FALSE;

  protected $_aclTable = 'target_civicrm_contact';

  /**
   * constructor
   * @todo allow filtering on other contacts
   */
  function __construct() {
    $this->_columns = $this->getActivityColumns()
      + $this->getColumns('Contact', array('prefix' => 'target_',));
    $this->_columns['civicrm_activity']['fields']['id'] = array(
      'title' => 'id',
      'required' => TRUE,
    );
    parent::__construct();
  }

  /**
   * Generate From clause
   * @todo Should remove all this to parent class
   */
  function fromClauses() {
    return array(
      'activity_target_from_activity'
    );
  }
}

<?php

require_once 'CRM/Core/Page.php';

class CRM_Civitax_Page_Settings extends CRM_Core_Page {
  function run() {
  	
  	
  	
	/**
  	 * GET APPLICABLE CONTRIBUTION TYPES  
  	 * FROM THE civicrm_contribution_type TABLE
  	 * PUT RESULTS IN AN ARRAY AND SEND TO THE VIEW 
  	 */
  	$sql = 'SELECT * FROM civicrm_contribution_type';
  	$dao = CRM_Core_DAO::executeQuery($sql);
  	$arr_contribution_types = array();
    $x = 0;
    while( $dao->fetch( ) ) {   
       	$arr_contribution_types[$x]['id'] = $dao->id;
       	$arr_contribution_types[$x]['name'] = $dao->name;
       	$x++;	
    }
  	$this->assign('arr_contribution_types', $arr_contribution_types);
  	
  	
  	/**
  	 * GET TAX RATES FROM THE civi_tax_type TABLE  
  	 * PUT RESULTS IN AN ARRAY AND SEND TO THE VIEW 
  	 */
  	$sql = 'SELECT * FROM civi_tax_type';
  	$dao = CRM_Core_DAO::executeQuery($sql);
  	$arr_arr_tax_types = array();
    $x = 0;
    while( $dao->fetch( ) ) {   
       	$arr_tax_types[$x]['id'] = $dao->id;
       	$arr_tax_types[$x]['tax'] = $dao->tax;
       	$arr_tax_types[$x]['rate'] = $dao->rate;
       	$x++;	
    }
  	$this->assign('arr_tax_types', $arr_tax_types);
  
  
    // Set the page-title 
    CRM_Utils_System::setTitle(ts('CiviTax Settings'));

    parent::run();
  }
}

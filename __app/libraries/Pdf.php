<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //require_once('tcpdf_include.php');
//require_once dirname(__FILE__) . '/TCPDF-master/tcpdf.php';
require_once dirname(__FILE__) . '/ETcPdf.php';
//require_once(dirname(__FILE__).'/tcpdf/tcpdf.php');
//require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
//require_once dirname(__FILE__) . '/TCPDF-master/examples/tcpdf_include.php';
// TCPDF configuration

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
		$this->index();
    }
	function index(){
			
	}
}
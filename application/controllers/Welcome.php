<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$file = "phung.xlsx" ;
		header('Content-Disposition: attachment; filename=' . $file );
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Length: ' . filesize($file));
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
		$this->load->library('XLSXWriter');
		$data = array(
		    array('year','month','amount'),
		    array('2003','1','220'),
		    array('2003','2','153.5'),
		);

		$writer = new XLSXWriter();
		$writer->setAuthor('Phung');
		$writer->writeSheet($data);
		$writer->writeToStdOut($file);
		

		$this->load->view('welcome_message');
	}
}

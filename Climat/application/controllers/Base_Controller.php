<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Load
	 *	- or -
	 * 		http://example.com/index.php/Load/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Load/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();

		if(!$this->session->has_userdata('token')){
			redirect(site_url());
		}
		$this->load->helper('url');
        $this->load->helper('assets_helper');
	}
	public function templateBack($page,$data,$title,$h1){
		$data['template'] = $page.'.php';
		$data['title'] = $title.'- Climat.com';
		$data['h1'] = $h1;
		$data['role'] =$this->session->userdata('role');
		$data['name'] =$this->session->userdata('name');
		$this->load->view('TemplateBack',$data);
	} 
	
}
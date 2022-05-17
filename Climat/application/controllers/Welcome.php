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
    // public function template($page,$data,$title,$h1){
    //     $this->load->helper('url');
    //     $this->load->helper('assets_helper');
    //     $this->load->helper('assets');
    //     $data['template'] = $page.'.php';
    //     $data['title'] = $title.'- Climat.com';
    //     $data['h1'] = $h1;
    //     $this->load->view('Template',$data);
    // } 


    public function index()
    {
		$this->load->helper('url');
        $this->load->helper('assets_helper');
        //$this->load->helper('assets');
        $this->load->model('Fonction');
        $data['listePays'] = $this ->Fonction-> getAllPays(); 
        $data['titre']= "Accueil-Climat.com";
		$this->load->view('home',$data);
     
    }	


    public function templateBack($page,$data,$title,$h1,$role,$name){
        $this->load->helper('url');
        $this->load->helper('assets_helper');
        $data['template'] = $page.'.php';
        $data['title'] = $title.'- Climat.com';
        $data['h1'] = $h1;
        $data['role'] = $role;
        $data['name'] = $name;
        $this->load->view('TemplateBack',$data);
    } 


    public function homeBack()
    {
        $this->load->helper('url');
        $this->load->helper('assets_helper');
        $this->load->view('login',array());
     
    }   

    
    // public function inscriptionUser(){
 //        $this->load->model('Fonction');
 //        $nom = $this->input->post('nom');
 //        $prenom = $this->input->post('prenom');
 //        $sexe = $this->input->post('sexe');
 //        $dtn = $this->input->post('dtn');
 //        $adress = $this->input->post('adress'); 
 //        $email = $this->input->post('email');  
 //        $mdp = $this->input->post('mdp');  
 //        $this->Fonction->inscriptionUtilisateur($nom,$prenom,$sexe,$dtn,$adress,$email,$mdp);
 //        redirect(site_url('Welcome/index'));
 //    }

     public function loginUser(){
        $this->load->model('Fonction');
        $email = $this->input->post('email');  
        $mdp = $this->input->post('password');  
        $token = $this->Fonction->login($email,$mdp);
        // $data['user']=null;
        $donnee['donnee']=$this ->Fonction-> getAllActu(); 
        if ($token==null) {
            redirect(site_url('Welcome/homeBack'));
       }else{
           
            $this->session->set_userdata('token',$token);
            $this->templateBack('listeACt',$donnee,'Accueil','Accueil',1,'');
             
       }
    }
	
    
}

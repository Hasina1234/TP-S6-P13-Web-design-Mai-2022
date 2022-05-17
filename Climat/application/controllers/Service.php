<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'Base_Controller.php';
class Service extends Base_Controller {

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
	public function __construct(){
		parent::__construct();
    }

    
    
   

    public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('welcome/index'));
	}

    public function validateCompteWithEmail($idUser){
        $this->load->model('Fonction');
        $data['user']=$this->Fonction->getUserWithToken($this->session->userdata('token'));
        $this->load->library('email');
        $this->email->from('nereponderpas@gmail.com','no reply');
        $this->email->to($data['user'][0]['email']);
        $this->email->subject('Validation');
        $this->email->message('Votre compte est valide,vous pouvez vous connecter');
    
         if($this->email->send()){
            //var_dump("Email envoye");
            $this->UserDefault->valideUser($idUser);
            redirect(site_url('UserController/activationUser'));
         }else{
             var_dump("Email non envoye");
             show_error($this->email->print_debugger());
         }
       
    }	

    public function exportExcel(){
        $this->load->model('model');
		$timestamp = time();
		$filename = 'Export_Excel_'.$timestamp.'.xls';
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition:attachment;filename=\"$filename\"");
		$isPrintHeader = false;
		foreach($data['util']=$this->model->getfunction() as $utile){
			if(! $isPrintHeader){
				echo implode("\t", array_keys($utile)) . "\n";
				$isPrintHeader = true;
			}
			echo implode("\t", array_values($utile)) . "\n";
		}
		exit();
		
	}

	public function pdf()
	{
		$this->load->library(array( 'PDF/fpdf.php'));
	
		$data['mois'] = 12;
		$data['annee'] = 2010;
		$this->load->view('pdf',$data);
	}


	public function accueilPage(){
            $this->load->model('Fonction');
            $token= $this->session->userdata('token');
            $this->template('accueil',array(),'Accueil','Bonjour');
    }

    public function pageInsertActu(){
        
        $this->load->model('Fonction');
        $data['listeCatego'] = $this->Fonction->getAllCategorie();
		$data['listePays']= $this->Fonction->getAllPays();
		// $data['actu']=null;
        $this->templateBack('insertActu',$data,'Insertion actualite','Insertion actualite ');
    }

	public function insertACtu(){
        
        $this->load->model('Fonction');
        $this->load->helper('assets');
        $idPays=$this->input->post("pays");
        $idCat=$this->input->post("cat");
        $titre=$this->input->post("titre");
        $contenu=$this->input->post("contenu");
        $dateActu=$this->input->post("dateActu");
        $data['offre'] = $this ->Fonction-> insertActu($idPays,$idCat,$titre,$contenu,$dateActu); 
		// $data['actu']=1;
        //$this->templateBack('listeACt',$data,"Insertion contenu de l'actualite","Insertion contenu de l'actualite");
        redirect(site_url('Service/pageInsertActu'));
    }

    // public function insertContenu(){
        
    //     $this->load->model('Fonction');
    //     $this->load->helper('assets');
    //     $resume=$this->input->post("resume");
    //     $contenu=$this->input->post("contenu");
    //     // $idActu= $this ->Fonction-> getMaxIdActu();
    //     $data['offre'] = $this ->Fonction-> insertContenu($resume,$contenu); 
    //     redirect(site_url("Actualite/pageInsertActu"));
    // }

	public function listeActu(){
        
		$this->load->model('Fonction');
        $this->load->helper('assets');
        $donnee['donnee']=$this ->Fonction-> getAllActu(); 
        $this->templateBack('listeACt',$donnee,"Liste actualité","Liste actualité");
    }

	public function contenuActu(){
        
		
        $this->template('contenuActu',array(),"Contenu actualite","Contenu actualite");
    }

    public function modifierActu($idActu){
        
		$this->load->model('Fonction');
        $this->load->helper('assets');
        $data['idActu']=$idActu;
        $data['listeCatego'] = $this->Fonction->getAllCategorie();
        $this->templateBack('modifierActu',$data,"Modifier actualite","Modifier actualite");
    }
    
    public function updateActu(){
        
        $this->load->model('Fonction');
        $this->load->helper('assets');
        $idActu=$this->input->post("idActu");
        $idCat=$this->input->post("cat");
        $titre=$this->input->post("titre");
        $contenu=$this->input->post("contenu");
        $dateActu=$this->input->post("dateActu");
        // $idActu= $this ->Fonction-> getMaxIdActu();
        $data['offre'] = $this ->Fonction-> modifiActu($idActu,$idCat,$titre,$contenu,$dateActu); 
        $donnee['donnee']=$this ->Fonction-> getAllActu(); 
        $this->templateBack('listeACt',$donnee,"Liste actualité","Liste actualité");
    }

}

?>
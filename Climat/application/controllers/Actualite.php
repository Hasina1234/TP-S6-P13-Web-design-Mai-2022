<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'Base_Controller.php';
class Actualite extends CI_Controller {

	

    public function template($page,$data,$title,$h1){
        $this->load->helper('url');
        $this->load->helper('assets_helper');
        $this->load->helper('assets');
        $data['template'] = $page.'.php';
        $data['title'] = $title.'- Climat.com';
        $data['h1'] = $h1;
        $this->load->view('Template',$data);
    } 

	public function accueilPage(){
            $this->load->model('Fonction');
            $this->load->helper('assets');
            $this->load->helper('url');
            $this->load->helper('assets_helper');
            redirect(site_url('Welcome/index'));
            //$data['listePays']=$this ->Fonction-> getAllPays(); 
            //$data['titre']= "Accueil-Climat.com";
            //$this->template('home',$data,"Accueil","Accueil");
    }

    // public function accueilPage(){
    //         $this->load->model('Fonction');
    //         $this->load->helper('assets');
    //         $this->load->helper('url');
    //         $this->load->helper('assets_helper');
    //         $data['listePays'] = $this ->Fonction-> getAllPays(); 
    //         $data['titre']= "Accueil-Climat.com";
    //         $this->load->view('home',$data);

    // }

   

	public function listeActu(){
        
		$this->load->model('Fonction');
        $this->load->helper('assets');
        $this->load->helper('url');
        $this->load->helper('assets_helper');
        $donnee['donnee']=$this ->Fonction-> getAllActu(); 

        $this->template('listeACtu',$donnee,"Liste des actualités","Liste des actualités");
    }

    public function voirActuParPays($idPays){
        
		$this->load->model('Fonction');
        $this->load->helper('assets');
        $this->load->helper('url');
        $this->load->helper('assets_helper');
        // $data['idActu']=$idActu;
        $data['donnee'] = $this->Fonction->getActuParPays($idPays);
        $this->template('actu-pays',$data,"Listes par Pays","Listes par Pays");
    }
    public function voirOneActu(){
        
        $this->load->model('Fonction');
        $this->load->helper('assets');
        $this->load->helper('url');
        $this->load->helper('assets_helper');
        // $data['idActu']=$idActu;
        $idActu= $this->input->get('id');
        $data['listePays'] = $this->Fonction->getOneActu($idActu);
        $this->template('actu-detail',$data,$data['listePays'][0]['titre'],$data['listePays'][0]['titre']);
        // $don=array();
        // $don=$this->Fonction->getOneActu($idActu);
        // for ($i=0; $i <count($don) ; $i++) { 
        //     $this ->Fonctions-> ajoutStockMatiereSortie($data[$i]['idMatiere'],$qte,$data[$i]['pourcentage']);
        // }
    }
    
   
	
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Fonction extends CI_Model{

    public function inscriptionUtilisateur($nom,$prenom,$sexe,$dtn,$adress,$email,$mdp){
		$sql = "INSERT INTO utilisateur VALUES(null,%s,%s,%s,%s,%s%s,sha1(%s))";
        $sql = sprintf($sql,$this->db->escape($nom),$this->db->escape($prenom),$this->db->escape($sexe),
		$this->db->escape($dtn),$this->db->escape($adress),$this->db->escape($email),$this->db->escape($mdp));	
		$query = $this->db->query($sql);
	}

    public function insertToken($idUser,$nom,$prenom){
        $refToken="$nom+$prenom";
        $etat=1;
		$sql = "INSERT INTO tokenUser VALUES(null,sha1(%s),%s,now(),%s)";
        $sql = sprintf($sql,$this->db->escape($refToken),$this->db->escape($idUser),$this->db->escape($etat));	
		$query = $this->db->query($sql);
	}

    public function getToken($idUser,$etatToken){
        $sql = "SELECT token from tokenUser where idUser=%s and etat=%s";
		$sql=sprintf($sql,$this->db->escape($idUser),$this->db->escape($etatToken));
        $query = $this->db->query($sql);
		$token =null;
		foreach ($query->result_array() as $key) {
            $token = $key['token'];
		}
		return $token;
	}

    public function verifToken($idUser){
        $etatToken=0;
        $sql = "UPDATE tokenUser set etat=%s where  idUser=%s and daty>=now()";
		$sql=sprintf($sql,$this->db->escape($etatToken),$this->db->escape($idUser));
        $query = $this->db->query($sql);
	}

    public function login($email,$mdp){
        $tokenValide=null;
        try{      
		    $sql = "SELECT * FROM utilisateur where email=%s and mdp=sha1(%s)";
		    $sql=sprintf($sql,$this->db->escape($email),$this->db->escape($mdp));
		    $query = $this->db->query($sql);
		    $idUser = null;
            $nom = null;
            $prenom = null;
		        foreach ($query->result_array() as $key) {
			        $idUser= $key['idUser'];
                    $nom= $key['nom'];
                    $prenom= $key['prenom'];
		        }
                    $this->verifToken($idUser);
                    $token=$this->getToken($idUser,1);
                    if($token!=null){
                        $tokenValide= $token;
                    }else{
                        $this->insertToken($idUser,$nom,$prenom);
                        $tokenValide=$this->getToken($idUser,1);
                    }
                    return $tokenValide;

        }catch(\Exception $e){
            die($e->getMessage());
        }
        return $tokenValide;
	}

    public function createUrlSlug($urlString){
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }

    public function insertActu($idPays,$idCat,$titre,$contenu,$dateActu){
        $url=$this->createUrlSlug($titre);
        $sql = "INSERT INTO actualite VALUES(null,%s,%s,%s,%s,%s,%s,current_date)";
        $sql = sprintf($sql,$this->db->escape($idPays),$this->db->escape($idCat),$this->db->escape($titre),
        $this->db->escape($url),$this->db->escape($contenu),$this->db->escape($dateActu));  
        $query = $this->db->query($sql);
    }

    public function getMaxIdActu(){
        $sql = "select max(idACtu) as id from actualite";
        $query = $this->db->query($sql);
        $id = null;
        foreach ($query->result_array() as $key) {
            $id = $key['idActu'];
            
        }
        return $id;
    }

    // public function insertContenu($resume,$content){
    //     $idACtu=$this->getMaxIdActu();
    //     $sql = "INSERT INTO contenu VALUES(null,%s,%s,%s)";
    //     $sql = sprintf($sql,$this->db->escape($idACtu),$this->db->escape($resume),$this->db->escape($content)); 
    //     $query = $this->db->query($sql);
    // }

    public function deleteContenu($idContent){
        $sql = "DELETE FROM contenu where idContenu=%s";
        $sql = sprintf($sql,$this->db->escape($idContent)); 
        $query = $this->db->query($sql);
    }

    public function getActuWithFiltre($annee,$pays,$cat){
        $sql = "SELECT * FROM actualite a join contenu c on a.idActu=c.idACtu ";

        if(!$annee.equals("")) {
            $sql += String.format(" where (select extract(year from dateActu)) = '%s'", $annee);
        }
        if(!$pays.equals("")) {
            $sql += String.format(" where idPays= '%s'", $pays);
        }
        if(!$cat.equals("")) {
            $sql += String.format(" where idCat= '%s'", $cat);
        }

        $sql=sprintf($sql);
        $query = $this->db->query($sql);
        $mat = array();
        foreach ($query->result_array() as $key) {
            $mat[] = $key;
        }
        return $mat;
    }

    public function getAllCategorie(){
       
       $sql = "SELECT * FROM categorie";
        $sql=sprintf($sql);
        $query = $this->db->query($sql);
        $client = array();
        foreach ($query->result_array() as $key) {
            $client[] = $key;
        }
        return $client;
    }

    public function getAllPays(){
       
       $sql = "SELECT * FROM pays";
        $sql=sprintf($sql);
        $query = $this->db->query($sql);
        $client = array();
        foreach ($query->result_array() as $key) {
            $client[] = $key;
        }
        return $client;
    }

     public function getAllActu(){
       
       $sql = "SELECT a.idActu,p.pays,c.categorie,a.titre,a.url,a.contenu,a.dateActu,a.daty FROM actualite a join pays p on a.idPays=p.idPays join categorie c on a.idCat=c.idCat group by a.idActu";
        $sql=sprintf($sql);
        $query = $this->db->query($sql);
        $client = array();
        foreach ($query->result_array() as $key) {
            $client[] = $key;
        }
        return $client;
    }

    public function getActuParPays($idPays){
       
       $sql = "SELECT a.idActu,p.pays,p.photo,c.categorie,a.titre,a.url,a.contenu,a.dateActu,a.daty FROM actualite a join pays p on a.idPays=p.idPays join categorie c on a.idCat=c.idCat where a.idPays=%s group by a.idActu";
        $sql=sprintf($sql,$this->db->escape($idPays));
        $query = $this->db->query($sql);
        $client = array();
        foreach ($query->result_array() as $key) {
            $client[] = $key;
        }
        return $client;
    }

    public function getOneActu($idActu){
       
       $sql = "SELECT a.idActu,p.pays,p.photo,c.categorie,a.titre,a.url,a.contenu,a.dateActu,a.daty FROM actualite a join pays p on a.idPays=p.idPays join categorie c on a.idCat=c.idCat where a.idActu=%s group by a.idActu";
        $sql=sprintf($sql,$this->db->escape($idActu));
        $query = $this->db->query($sql);
        $client = array();
        foreach ($query->result_array() as $key) {
            $client[] = $key;
        }
        return $client;
    }


    public function modifiActu($id,$idcat,$titre,$contenu,$daty){
        $url=$this->createUrlSlug($titre);
        $req="UPDATE actualite set idCat=%s , titre=%s , url=%s, contenu=%s , daty=%s where idActu=%s ";
        $sql = sprintf($req,$this->db->escape($idcat),$this->db->escape($titre),$this->db->escape($url),$this->db->escape($contenu),$this->db->escape($daty),$this->db->escape($id));
        $this->db->query($sql);
    }

    
    

}
?>
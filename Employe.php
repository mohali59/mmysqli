<?php 

class Employe{
    private $no_emp;
    private $nom;
    private $prenom;
    private $emploi;
    private $sup;
    private $embauche;
    private $sal;
    private $comm;
    private $noserv;

    
    public function getNo_emp()
    {
        return $this->no_emp;
    }

    
    public function setNo_emp($no_emp)
    {
        $this->no_emp = $no_emp;

        return $this;
    }

    
    public function getNom()
    {
        return $this->nom;
    }

   
     
    
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    
    public function getPrenom()
    {
        return $this->prenom;
    }

  
    
     
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;

        
    }

    
    public function setEmploi($emploi)
    {
        $this->emploi = $emploi;

        return $this;
    }

    
    public function getEmploi()
    {
        return $this->emploi;
    }

    
    public function getSup()
    {
        return $this->sup;
    }

    public function setSup($sup)
    {
        $this->sup = $sup;

        return $this;
    }


    public function getEmbauche()
    {
        return $this->embauche;
    }

    public function setEmbauche($embauche)
    {
        $this->embauche = $embauche;

        return $this;
    }

    
    public function getSal()
    {
        return $this->sal;
    }

    
    public function setSal($sal)
    {
        $this->sal = $sal;

        return $this;
    }
 
    public function getComm()
    {
        return $this->comm;
    }

     
    public function setComm($comm)
    {
        $this->comm = $comm;

        return $this;
    }

    
    public function getNoserv()
    {
        return $this->noserv;
    }

    
    public function setNoserv($noserv)
    {
        $this->noserv = $noserv;

        return $this;
    }
}

   

    
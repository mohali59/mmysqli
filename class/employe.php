<?php
class   Employe{
    private $noemp;
    private $nom;
    private $prenom;
    private $emploi;
    private $sup;
    private $embauche;
    private $sal;
    private $comm;
    private $noserv;

        public function getNoemp() :int{
            return $this->Noemp;
        }
        public function setNoemp(int $newNoemp):self{
            $this->Noemp=$newNoemp;
            return $this;
        }


        public function getNom():string{
            return $this->Nom;
        }
        public function setNom(string $newNom):self{
            $this->Nom=$newNom;
            return $this;
        }

        public function getPrenom():string{
            return $this->Prenom;
        }
        public function setPrenom(string $newPrenom):self{
            $this->Prenom=$newPrenom;
            return $this;
        }

        public function getEmploi():string{
            return $this->Emploi;
        }
        public function setEmploi(string $newEmploi):self{
            $this->Epmploi=$newEmploi;
            return $this;
        }

        public function getSup():int{
            return $this->Sup;
        }
        public function setSup(int $newSup):self{
            $this->Sup=$newSup;
            return $this;
        }

        public function getEmbauche():int{
            return $this->Embauche;
        }
        public function setEmbauche(int $newEmbauche):self{
            $this->Embauche=$newEmbauche;
            return $this;
        }

        public function getSal():int{
            return $this->Sal;
        }
        public function setSal(int $newSal):self{
            $this->Sal=$newSal;
            return $this;
        }

        public function getComm():int{
            return $this->Comm;
        }
        public function setComm(int $newComm):self{
            $this->Comm=$newComm;
            return $this;
        }

        public function getNoserv():int{
            return $this->Noserv;
        }
        public function setNoserv(int $newNoserv):self{
            $this->Noserv=$newNoserv;
            return $this;
        }

        public function __toString() :string
{
    return " [mahrez]:" . $this->newNom . " [riad ] " . $this->newPrenom ;
}
    }


?>
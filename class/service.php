<?php

class service{
    private $noserv;
    private $service;
    private $ville;


        public function getNoserv():int{
            return $this->noserv;
        }
        public function setNoserv(int $newNoserv):self{
            $this->noserv=$newNoserv;
            return $this;
        }

        public function getService():string{
            return $this->service;
        }
        public function setService(string $newService): self
            $this->service=$newService;
            return $this;
        }

        public function getVille():string{
            return $this->Ville;
        }
        public function setVille(string $newVille): self
            $this->ville=$newVille;
            return $this;
        }



}
?>
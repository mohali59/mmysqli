<?php

class Utilisateur{

private $id;
private $mail;
private $password;
private $profil;

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of mail
 */ 
public function getMail()
{
return $this->mail;
}

/**
 * Set the value of mail
 *
 * @return  self
 */ 
public function setMail($mail)
{
$this->mail = $mail;

return $this;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

/**
 * Get the value of profil
 */ 
public function getProfil()
{
return $this->profil;
}

/**
 * Set the value of profil
 *
 * @return  self
 */ 
public function setProfil($profil)
{
$this->profil = $profil;

return $this;
}
}

?>
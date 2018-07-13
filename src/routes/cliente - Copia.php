<?php

namespace appslim;


class {

private $primeiro_nome;
private $ultimo_nome;
private $email;
private $telefone;

public function __construct($primeiro_nome= "" ,$ultimo_nome= "" ,$email= "" ,$telefone= "" ){
	$this->primeiro_nome = $primeiro_nome;
	$this->ultimo_nome = $ultimo_nome;
	$this->email = $email;
	$this->telefone = $telefone;

}

public static function construct($array){
	$obj = new ();
	$obj->setPrimeiro_nome( $array['primeiro_nome']);
	$obj->setUltimo_nome( $array['ultimo_nome']);
	$obj->setEmail( $array['email']);
	$obj->setTelefone( $array['telefone']);
	return $obj;

}

public function getPrimeiro_nome(){
return $this->primeiro_nome;
}

public function setPrimeiro_nome($primeiro_nome){
 $this->primeiro_nome=$primeiro_nome;
}

public function getUltimo_nome(){
return $this->ultimo_nome;
}

public function setUltimo_nome($ultimo_nome){
 $this->ultimo_nome=$ultimo_nome;
}

public function getEmail(){
return $this->email;
}

public function setEmail($email){
 $this->email=$email;
}

public function getTelefone(){
return $this->telefone;
}

public function setTelefone($telefone){
 $this->telefone=$telefone;
}
public function equals($object){
if($object instanceof ){

if($this->primeiro_nome!=$object->primeiro_nome){
return false;

}

if($this->ultimo_nome!=$object->ultimo_nome){
return false;

}

if($this->email!=$object->email){
return false;

}

if($this->telefone!=$object->telefone){
return false;

}

return true;

}
else{
return false;
}

}
public function toString(){

 return "  [primeiro_nome:" .$this->primeiro_nome. "]  [ultimo_nome:" .$this->ultimo_nome. "]  [email:" .$this->email. "]  [telefone:" .$this->telefone. "]  " ;
}

}


?>
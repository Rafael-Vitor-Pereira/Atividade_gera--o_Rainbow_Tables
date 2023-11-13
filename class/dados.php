<?php

class Dados{
	private $string;
	private $hashmd5;
	private $hashsha512;

	public function getString(){
		return $this->string;
	}

	public function setString($value){
		$this->string = $value;
	}

	public function getHashmd5(){
		return $this->hashmd5;
	}

	public function setHashmd5($value){
		$this->hashmd5 = $value;
	}

	public function getHashsha512(){
		return $this->hashsha512;
	}

	public function setHashsha512($value){
		$this->hashsha512 = $value;
	}
}
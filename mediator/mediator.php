<?php
class Observable {

	public function register(){
		
	}
	
}

interface UserAddress {
	public function setAddress($address);
}

/*
* The affected class
*/
class OrderDelivery implements UserAddress {
	private $deliveryAddress;
	public function setAddress($address){
		$this->deliveryAddress = $address;
	}
	
}
class Mediator {
	private $observedClass;
	private $affectedClass;
	
	public function __construct(Observable $observedClass, UserAddress $affectedClass){
		$this->observedClass = $observedClass;
		$this->affectedClass = $affectedClass;
		$this->observedClass->register($this);
	}
	public function update($address){
		$this->affectedClass->setAddress($address);
	}	
}

$handle = fopen('php://temp', 'w+');
fwrite($handle, 'I am freaking awesome');
rewind($handle); // resets the position of pointer
fread($handle, fstat($handle)['size']); // I am freaking awesome
var_export(fstat($handle)['size']);
fclose($handle);



























//
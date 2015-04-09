<?php
Class Magasin
{
	private $id;
	private $name;
	private $adresse;
	private $cp;
	private $city;
	private $phone;

	public function __construct($id, $name, $adresse, $cp, $city, $phone)
	{
		$this->id = $id;
		$this->name = $name;
		$this->adresse = $adresse;
		$this->cp = $cp;
		$this->city = $city;
		$this->phone = $phone;
	}

	public function listEmployee()
	{
		
	}
}
?>
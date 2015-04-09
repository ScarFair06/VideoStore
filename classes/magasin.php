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
		include('bdd.php');
		$sql = $db->prepare('SELECT * FROM employee WHERE magasin = :magasin');
		$valeursParam = array(':magasin' => $this->id);
		$sql->execute($valeursParam);
		$result = $sql->fetch();

		return json_encode(array('result'=>$result));
	}

	public function listClient()
	{
		include('bdd.php');
		$sql = $db->prepare('SELECT * FROM client');
		$sql->execute();
		$result = $sql->fetch();

		return json_encode(array('result'=>$result));
	}

	public function listReservation()
	{
		include('bdd.php');
		$sql = $db->prepare('SELECT * FROM reservation WHERE magasin_id = :magasin');
		$valeursParam = array(':magasin' => $this->id);
		$sql->execute($valeursParam);
		$result = $sql->fetch();

		return json_encode(array('result'=>$result));
	}

	public function listVideo()
	{
		include('bdd.php');
		$sql = $db->prepare('SELECT * FROM video WHERE magasin_id = :magasin');
		$valeursParam = array(':magasin' => $this->id);
		$sql->execute($valeursParam);
		$result = $sql->fetch();

		return json_encode(array('result'=>$result));
	}
}
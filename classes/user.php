<?php
Class User
{
	private $id;
	private $mail;
	private $last_name;
	private $first_name;
	private $adresse;
	private $cp;
	private $city;
	private $phone;
	private $username;
	private $password;
	private $magasin;
	private $type;

	public function __construct($id, $mail,$last_name, $first_name, $adresse, $cp, $city, $phone, $username, $password, $magasin)
	{
		$this->id = $id;
		$this->mail=$mail;
		$this->last_name=$last_name;
		$this->first_name=$first_name;
		$this->adresse=$adresse;
		$this->cp=$cp;
		$this->city=$city;
		$this->phone=$phone;
		$this->username=$username;
		$this->password=$password;
		if($magasin != NULL)
		{
			$this->magasin=$magasin;			
			$this->type="employee";
		}
		else
		{
			$this->magasin=NULL;
			$this->type="client";
		}
	}

	public function connexion($username,$password)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=seeit', 'root', '');
			$db->query('SET NAMES utf8');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$sql='SELECT * FROM client WHERE username = :username AND password = :password';
		$sql->bindParam(':username',$username);
		$sql->bindParam(':password',$password);
		$result = $db->prepare($sql);
		$columns=$result->execute();
		$columns = $result->fetch();
		if(sizeof($columns)>1)
		{
			$token=rand(1,10000);
			$token=md5($token);
			$sql=$db->prepare('UPDATE client SET token = :token WHERE id = :id');
			$sql->bindParam(':token',$token);
			$sql->bindParam(':id', $columns['id']);
			$sql->execute();
			return $token;
		}
		$sql='SELECT * FROM employee WHERE username = :username AND password = :password';
		$sql->bindParam(':username',$username);
		$sql->bindParam(':password',$password);
		$result = $db->prepare($sql);
		$columns=$result->execute();
		$columns = $result->fetch();
		if(sizeof($columns)>1)
		{
			$token=rand(1,10000);
			$token=md5($token);
			$sql=$db->prepare('UPDATE employee SET token = :token WHERE id = :id');
			$sql->bindParam(':token',$token);
			$sql->bindParam(':id', $columns['id']);
			$sql->execute();
			return $token;
		}

	}
}
?>
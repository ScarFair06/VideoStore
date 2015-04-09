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

	public static function connexion($username,$password)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=videostore', 'root', '');
			$db->query('SET NAMES utf8');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$sql='SELECT * FROM client WHERE username = :username AND password = :password';
		$result = $db->prepare($sql);		
		$valeursParam = array(":username"=>$username,":password"=>$password);
		$columns=$result->execute($valeursParam);
		$columns = $result->fetch();
		if(sizeof($columns)>1)
		{
			$token=rand(1,10000);
			$token=md5($token);
			$sql=$db->prepare('UPDATE client SET token = :token WHERE id = :id');
			$valeursParam = array(":token"=>$token,":id"=>$columns['id']);
			$sql->execute($valeursParam);
			return $token;
		}
		$sql='SELECT * FROM employee WHERE username = :username AND password = :password';
		$valeursParam = array(":username"=>$username,":password"=>$password);
		$result = $db->prepare($sql);
		$columns=$result->execute($valeursParam);
		$columns = $result->fetch();
		if(sizeof($columns)>1)
		{
			$token=rand(1,10000);
			$token=md5($token);
			$sql=$db->prepare('UPDATE employee SET token = :token WHERE id = :id');
			$valeursParam = array(":token"=>$token,":id"=>$columns['id']);
			$sql->execute();
			return $token;
		}
	}

	public function inscription()
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=videostore', 'root', '');
			$db->query('SET NAMES utf8');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		if($this->type=="employee"){
			$sql=$db->prepare('INSERT INTO employee (mail, last_name, first_name, adresse, cp, city, phone, username, password, magasin) VALUES (:mail, :last_name, :first_name, :adresse, :cp, :city, :phone, :username, :password, :magasin)');
			$valeursParam = array(':mail' => $this->mail , ':last_name' => $this->last_name, ':first_name' => $this->first_name, ':adresse'=>$this->adresse, 'cp'=>$this->cp,':city'=>$this->city,':phone'=>$this->phone,':username'=>$this->username,':password'=>$this->password, ':magasin'=>$this->magasin);
			$sql->execute($valeursParam);
		}
		elseif ($this->type=="client") {
			$sql=$db->prepare('INSERT INTO client (mail, last_name, first_name, adresse, cp, city, phone, username, password ) VALUES (:mail, :last_name, :first_name, :adresse, :cp, :city, :phone, :username, :password)');
			$valeursParam = array(':mail' => $this->mail , ':last_name' => $this->last_name, ':first_name' => $this->first_name, ':adresse'=>$this->adresse, 'cp'=>$this->cp, ':city'=>$this->cp,':city'=>$this->city,':phone'=>$this->phone,':username'=>$this->username,':password'=>$this->password);
			$sql->execute($valeursParam);
		}
		
	}
	
	/* Employee */
	public function displayEmployee($magasin, $mail, $last_name, $first_name, $adresse, $cp, $city, $phone){
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=videostore', 'root', '');
			$db->query('SET NAMES utf8');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$sql = $db->prepare('SELECT * FROM employee');
		$sql->execute();
		while ($donnees=$sql->fetch()){
			echo 	"<tr>
						<td>".$donnees['magasin']."</td>
						<td>".$donnees['last_name']."</td>
						<td>".$donnees['first_name']."</td>
						<td>".$donnees['adresse']."</td>
						<td>".$donnees['cp']."</td>
						<td>".$donnees['city']."</td>
						<td>".$donnees['phone']."</td>
						<td>".$donnees['mail']."</td>
					</tr>";
		}
	}
	
	
	/* Client */
	public function displayClient($mail, $last_name, $first_name, $adresse, $cp, $city, $phone){
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=videostore', 'root', '');
			$db->query('SET NAMES utf8');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$sql = $db->prepare('SELECT * FROM client');
		$sql->execute();
		while ($donnees=$sql->fetch()){
			echo 	"<tr>
						<td>".$donnees['last_name']."</td>
						<td>".$donnees['first_name']."</td>
						<td>".$donnees['adresse']."</td>
						<td>".$donnees['cp']."</td>
						<td>".$donnees['city']."</td>
						<td>".$donnees['phone']."</td>
						<td>".$donnees['mail']."</td>
					</tr>";
		}
	}

	public function addLocation($id_video, $reservation){
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=videostore', 'root', '');
			$db->query('SET NAMES utf8');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$id_client = $this->id;
		if($this->type == "employee")
		{
			$ts = strtotime($reservation);
			$unJour = 3600*24;
			$ts +=3*$unJour;
			$return = date('Y-m-d',$ts);
			$sql = $db->prepare('INSERT INTO reservation (id_client, id_video, reservation, date_return, magasin_id) VALUES (:id_client, :id_video, :reservation, :return, :magasin_id)');
			$valeursParam = array(":id_client"=>$this->id,":id_video"=>$id_video,":reservation"=>$reservation,":return"=>$return,":magasin_id"=>$this->magasin);
			$sql->execute($valeursParam);
			return 1; //OK
		}
		else{return 0;} //KO
	}

	public function relanceClient($titre, $message){
		$message = wordwrap($message, 70, "\r\n");
		mail($this->mail, $titre, $message);
	}
}
?>
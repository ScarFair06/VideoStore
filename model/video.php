<?php
class Video{
	private $id;
	private $title;
	private $realisateur;
	private $studio;
	private $parution;
	private $genre;
	private $stock;
	private $price;
	private $jaquette;
	private $synopsis;
	
	public function __construct($id, $title, $realisateur, $studio, $parution, $genre, $stock, $price, $jaquette, $synopsis){
		$this->id = $id;
		$this->title = $title;
		$this->realisateur = $realisateur;
		$this->studio = $studio;
		$this->parution = $parution;
		$this->genre = $genre;
		$this->stock = $stock;
		$this->price = $price;
		$this->jaquette = $jaquette;
		$this->synopsis = $synopsis;
	}
	
	public function displayVideo($title, $realisateur, $studio, $parution, $genre, $stock, $price, $jaquette, $synopsis){
		include('bdd.php');
		$sql = $db->prepare('SELECT * FROM video');
		$sql->execute();
		return $sql;
	}
	
	public function displayVideoAdmin($title, $studio, $parution, $stock){
		include('bdd.php');
		$sql = $db->prepare('SELECT title, studio, parution, stock FROM video');
		$sql->execute();
		while ($donnees=$sql->fetch()){
			$table=array(
				'title' => $donnees['title'],
				'studio' => $donnees['studio'],
				'parution' => $donnees['parution'],
				'stock' => $donnees['stock'],
			);
		}
		return $table;
	}
	
	public function addVideo($title, $realisateur, $studio, $parution, $genre, $stock, $price, $jaquette, $synopsis){
		include('bdd.php');
		$reqAddVideo = $db->prepare('INSERT INTO video(title, realisateur, studio, parution, genre, stock, price, jaquette, synopsis)
			VALUES (:title, :realisateur, :studio, :parution, :genre, :stock, :price, :jaquette, :synopsis)');
		$reqAddVideo->bindParam(':title', $this->title, PDO::PARAM_STR);
		$reqAddVideo->bindParam(':realisateur', $this->realisateur, PDO::PARAM_STR);
		$reqAddVideo->bindParam(':studio', $this->studio, PDO::PARAM_STR);
		$reqAddVideo->bindParam(':parution', $this->parution, PDO::PARAM_STR);
		$reqAddVideo->bindParam(':genre', $this->genre, PDO::PARAM_STR);
		$reqAddVideo->bindParam(':stock', $this->stock, PDO::PARAM_INT);
		$reqAddVideo->bindParam(':price', $this->price, PDO::PARAM_INT);
		$reqAddVideo->bindParam(':jaquette', $this->jaquette, PDO::PARAM_STR);
		$reqAddVideo->bindParam(':synopsis', $this->synopsis, PDO::PARAM_STR);
		$reqAddVideo->execute();
		$idVideo = $db->lastInsertID();
		echo "la vidéo à bien été ajouté";
	}

	public static function searchVideo($search){
		include('bdd.php');
		$request = NULL;
		$request = $db->prepare('SELECT * FROM video WHERE title LIKE :search');
		$flags = $arrayName = array(':search' => $search);
		$request->execute($flags);
		return json_encode($request); 
		}

	}
	?>

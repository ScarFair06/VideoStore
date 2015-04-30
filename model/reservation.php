<?php
class Reservation{
	private int id;
	private int mail_client;
	private date reservation;
	private date retour;
	private int magasin_id;
	
	public function __construct(int r_id, int r_mail_client, date r_reservation, date r_retour, int r_magasin){
		$this->id = $r_id;
		$this->mail_client = $r_mail_client;
		$this->reservation = $r_reservation;
		$this->retour = $r_retour;
		$this->magasin = $r_magasin;
	}
	
	
}
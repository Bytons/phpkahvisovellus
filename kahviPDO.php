<?php
require_once "kahvi.php";
class kahviPDO {

	private $db;
	private $amnt;

	function __construct($dsn = "mysql:host=localhost;dbname=a1400150", $user = "root", $password = "salainen") {
		$this->db = new PDO ( $dsn, $user, $password );

		$this->db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

		$this->db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

		$this->amnt = 0;
	}


	function getLkm() {
		return $this->amnt;
	}

	public function listaaKahvit() {
		$sql = "SELECT id, nimi, laji, kuvaus, paahtoaste, tuotantomaa
		        FROM kahvi";
		
		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();

			throw new PDOException ( $virhe [2], $virhe [1] );
		}

		if (! $stmt->execute ()) {
			$virhe = $stmt->errorInfo ();

			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		
		$kahvit = array ();

		while ( $row = $stmt->fetchObject () ) {
	
			$kahvi = new Kahvi ();

			$kahvi->setId ( $row->id );
			$kahvi->setNimi ( utf8_encode ( $row->nimi ) );
			$kahvi->setLaji ( utf8_encode ( $row->laji ) );
			$kahvi->setKuvaus ( $row->kuvaus );
			$kahvi->setPaahtoaste ( $row->paahtoaste );
			$kahvi->setTuotantomaa ( utf8_encode ( $row->tuotantomaa ) );


			$kahvit [] = $kahvi;
		}

		$this->lkm = $stmt->rowCount ();

		return $kahvit;
	}

	public function haekahvit($nimi) {
		$sql = "SELECT id, nimi, laji, kuvaus, paahtoaste, tuotantomaa
		        FROM kahvi
				WHERE nimi like :nimi";

		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}

		$ni = "%" . utf8_decode ( $nimi ) . "%";
		$stmt->bindValue ( ":nimi", $ni, PDO::PARAM_STR );

		if (! $stmt->execute ()) {
			$virhe = $stmt->errorInfo ();

			if ($virhe [0] == "HY093") {
				$virhe [2] = "Invalid parameter";
			}

			throw new PDOException ( $virhe [2], $virhe [1] );
		}

		
		$kahvit = array ();

		while ( $row = $stmt->fetchObject () ) {
			$kahvi = new kahvi ();

			
			$kahvi->setId ( $row->id );
			$kahvi->setNimi ( utf8_encode ( $row->nimi ) );
			$kahvi->setLaji ( utf8_encode ( $row->laji ) );
			$kahvi->setKuvaus ( $row->kuvaus );
			$kahvi->setPaahtoaste ( $row->paahtoaste );
			$kahvi->setTuotantomaa ( utf8_encode ( $row->tuotantomaa ) );
			
			$kahvit [] = $kahvi;
		}

		$this->lkm = $stmt->rowCount ();

		return $kahvit;
	}

	function lisaakahvi($kahvi) {
		$sql = "insert into kahvi (nimi, laji, kuvaus, paahtoaste, tuotantomaa)
		        values (:nimi, :laji, :kuvaus, :paahtoaste, :tuotantomaa)";

		if (! $stmt = $this->db->prepare ( $sql )) {
			$virhe = $this->db->errorInfo ();
			throw new PDOException ( $virhe [2], $virhe [1] );
		}


		$stmt->bindValue ( ":nimi", utf8_decode ( $kahvi->getNimi () ), PDO::PARAM_STR );
		$stmt->bindValue ( ":laji", utf8_decode ( $kahvi->getLaji () ), PDO::PARAM_STR );
		$stmt->bindValue ( ":kuvaus", $kahvi->getKuvaus (), PDO::PARAM_INT );
		$stmt->bindValue ( ":paahtoaste", $kahvi->getPaahtoaste (), PDO::PARAM_STR );
		$stmt->bindValue ( ":tuotantomaa", utf8_decode ( $kahvi->getTuotantomaa () ), PDO::PARAM_STR );


		$this->db->beginTransaction();

	
		if (! $stmt->execute ()) {
			$virhe = $stmt->errorInfo ();

			if ($virhe [0] == "HY093") {
				$virhe [2] = "Invalid parameter";
			}
	
			$this->db->rollBack();
				
			throw new PDOException ( $virhe [2], $virhe [1] );
		}
		$id = $this->db->lastInsertId ();

		$this->db->commit();
		return $id;
	}
	function poistaKahvi($kahvi) {
		$sql = "DELETE FROM kahvi WHERE id=1";
		
		}
	
}
?>
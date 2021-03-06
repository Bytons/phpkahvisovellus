<?php

/**
 * User: antti
 * Date: 4/17/16
 * Time: 5:33 PM
 */
class Kahvi
{

    private static $errorMessages = array(
        1 => "Nimi ei saa sisältää erikoismerkkejä",
        0 => "",
        2 => "Nimi on pakollinen",
        3 => "Nimi on liian lyhyt",
        4 => "Nimi ei saa sisältää epäsoveliaita sanoja",
        5 => "kuvaus on pakollinen",
        6 => "kuvaus on liian lyhyt",
        7 => "Kuvaus on liian pitkä",
        8 => "Kuvaus ei saa sisältää kirosanoja",
        9 => "Paahtoaste on oltava joku näistä:tumma,vaalea, kevyt",
        10 => "Paahtoaste on pakollinen",
        11 => "Tuotantomaa on pakollinen",
        12 => "laji ei saa sisältää kirosanoja",
        13 => "Laji ei saa sisältää erikoismerkkejä",
        14 => "Lajike on pakollinen",
		15 => "Paahtoaste on liian lythyt",
        16 => "Paahtoaste ei saa sisältää erikoismerkkejä!",
        17 => "Kuvaus ei saa sisältää erikoismerkkejä",
        18 => "Tuotantomaa ei saa sisältää erikoismerkkejä!",
        19 => "Tuotantomaa on liian lyhyt!"

    );

	private $id;
    private $nimi;
    private $laji;
    private $kuvaus;
    private $paahtoaste;
    private $tuotantomaa;


    function __construct($nimi = "", $laji = "", $kuvaus = "", $paahtoaste = "", $tuotantomaa = "", $id = 0)
    {
        $this->nimi = trim($nimi);
        $this->laji = trim($laji);
        $this->kuvaus = ($kuvaus);
        $this->paahtoaste = trim($paahtoaste);
        $this->tuotantomaa = trim($tuotantomaa);
        $this->id = $id;
    }
    
    public function setId($id) {
    	$this->id = $id;
    }
    
    public function getId() {
    	return $this->id;
    }
    


    public function getNimi()
    {
        return $this->nimi;
    }

    public function setNimi($nimi)
    {
        $this->nimi = ($nimi);
    }


    function checkNimi($required = true)
    {
        if ($required = true && strlen($this->nimi) == 0) {
            return 2;
        }
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $this->nimi)) {
            return 1;
        }
        if (strlen($this->nimi) <= 3) {
            return 3;
        }
    	else {
            return 0;
        }

    }


    public function getLaji()
    {
        return $this->laji;
    }


    public function setLaji($laji)
    {
        $this->laji = $laji;
    }

    function checkLaji()
    {
        if ($required = true && strlen($this->laji) == 0) {
            return 14;
        }
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $this->laji)) {
            return 13;
        }
        if (strlen($this->laji) <= 3) {
            return 3;
        }
    }


    public function getKuvaus()
    {
        return $this->kuvaus;
    }

    public function setKuvaus($kuvaus)
    {
        $this->kuvaus = $kuvaus;
    }


    function checkKuvaus()
    {

        if ($required = true && strlen($this->kuvaus) == 0) {
            return 5;
        }
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $this->kuvaus)) {
            return 17;
        }
        if (strlen($this->kuvaus) <= 3) {
            return 6;
        }

    }

    public function getPaahtoaste()
    {
        return $this->paahtoaste;
    }

    public function setPaahtoaste($paahtoaste)
    {
        $this->paahtoaste = $paahtoaste;
    }

    function checkPaahtoaste()
    {
        if ($required = true && strlen($this->paahtoaste) == 0) {
            return 10;
        }
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $this->paahtoaste)) {
            return 16;
        }
        if (strlen($this->nimi) <= 3) {
            return 15;
        }
        //Tarkistaa onko paahtoaste jokin näistä.
        if (strpos($this->paahtoaste, '/tumma/vaalea/kevyt ') !== false) {
            echo true;
            return 9;

        }else {
            return 0;
        }

    }

    public function getTuotantomaa()
    {
        return $this->tuotantomaa;
    }

    public function setTuotantomaa($tuotantomaa)
    {
        $this->tuotantomaa = $tuotantomaa;
    }


    function checkTuotantomaa()
    {
        if ($required = true && strlen($this->tuotantomaa) == 0) {
            return 11;
        }
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $this->tuotantomaa)) {
            return 18;
        }
        if (strlen($this->tuotantomaa) <= 2) {
            return 19;
        }else {
            return 0;
        }


    }

    public static function getErrors($errorNum)
    {
        if (isset (self::$errorMessages [$errorNum]))
            return self::$errorMessages [$errorNum];

        return self::$errorMessages [0];
    }
}

?>
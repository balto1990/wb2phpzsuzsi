<?php

interface Kiir {
  public function kiir();
}

/* ------------------------------------------------------------------------ */
abstract class Felhasznalo implements Kiir {
  private $nev;
  private $cim;
  private $kod;
  private $jelszo;
  private $szuletes_datum;
  
  public function __construct ($nev, $cim, $kod, $jelszo, $szuletes_datum) {
      $this->nev = $nev;
      $this->cim = $cim;
      $this->kod = $kod;
      $this->jelszo = sha1($jelszo);
      $this->szuletes_datum = $szuletes_datum;
  }
  
  public function kor() {
    try {
      $szulid = new DateTime($this->szuletes_datum);
      $most = new DateTime();
      return ($most)->diff($szulid)->y;
    }
    catch (Exception $e) {
      return "Ismeretlen";
    }
  }
  
  public function kiir() {
      echo "Név: ".$this->nev."<br>";
      echo "Cím: ".$this->cim."<br>";
      echo "Kod: ".$this->kod."<br>";
      echo "jelszo: ".$this->jelszo."<br>";
      echo "Születési dátum: ".$this->szuletes_datum."<br>";
      echo "Kor: ".$this->kor()."<br>";
  }
}

/* ------------------------------------------------------------------------ */
class Hallgato extends Felhasznalo {
  private $szak;
  private $jegyek = array();
  
  public function __construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $szak) {
    parent::__construct($nev, $cim, $kod, $jelszo, $szuletes_datum);
    $this->szak = $szak;
  }
  
  public function jegybeir($jegy) {
    if(count($this->jegyek) == 5)
      return false;
    else {
      $this->jegyek[] = $jegy;
      return true;
    }
  }
  
  public function kiir() {
    parent::kiir();
    echo "Jegyek:";
    foreach($this->jegyek as $jegy)
      echo " ".$jegy;
    echo " Átlag: ".number_format(array_sum($this->jegyek) / count($this->jegyek), 2, ",", " ")."<br>";
  }
}

/* ------------------------------------------------------------------------ */
abstract class Dolgozo extends Felhasznalo {
  private $fizetes;
  
  public function __construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes) {
    parent::__construct($nev, $cim, $kod, $jelszo, $szuletes_datum);
    $this->fizetes = $fizetes;
  }
  
  public function fizetesemeles($emeles) {
    $this->fizetes += $emeles;
  }
  
  public function kiir() {
    parent::kiir();
    echo "Fizetes: ".number_format($this->fizetes, 0, ",", " ")."<br>";
  }
}

/* ------------------------------------------------------------------------ */
class Admin extends Dolgozo {
  private $feladat;
  
  public function __construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes, $feladat) {
    parent::__construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes);
    $this->feladat = $feladat;
  }
  
  public function feladatmodositas($feladat) {
    $this->feladat = $feladat;
  }
  
  public function kiir() {
    parent::kiir();
    echo "Feladat: ".$this->feladat."<br>";
  }
}

/* ------------------------------------------------------------------------ */
class Tanar extends Dolgozo {
  private $tantargy = array();
  private $hallgatok = array();
  private $tanszek;
  
  public function __construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes, $tanszek) {
    parent::__construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes);
    $this->tanszek = $tanszek;
  }
  
  public function tantargyfelvesz($tantargy, $hallgatok) {
    foreach($this->tantargy as $tantargynev)
      if($tantargynev == $tantargy) return false;
    if(count($this->tantargy) == 3)
      return false;
    $this->tantargy[] = $tantargy;
    $this->hallgatok[] = $hallgatok;
    return true;
  }
  
  public function tantargylevesz($tantargy) {
    $index = array_search($tantargy, $this->tantargy);
    if($index === false)
      return false;
    for($i = $index; $i < count($this->tantargy) -1; $i++) {
      $this->tantargy[$i] = $this->tantargy[$i+1];
      $this->hallgatok[$i] = $this->hallgatok[$i+1];
    }
    unset($this->tantargy[$i]);
    unset($this->hallgatok[$i]);
    return true;
  }
  public function kiir() {
    parent::kiir();
    echo "Tanszék: ".$this->tanszek."<br>";
    echo "Tantárgyak (hallgatók): ";
    for($i = 0; $i < count($this->tantargy); $i++)
      echo " ".$this->tantargy[$i]." (".$this->hallgatok[$i].")";
    echo"<br>";
  }
}

/* ------------------------------------------------------------------------ */
function kiir(Kiir $obj) {
  $obj->kiir();
}


?>

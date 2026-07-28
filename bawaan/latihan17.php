<?php

class Karakter {
    public $nama;            
    protected $darah;        
    protected $id_rahasia;     

    public function __construct($nama, $darah, $id) {
        $this->nama = $nama;
        $this->darah = $darah;
        $this->id_rahasia = $id;
    }

    public function tampilkan_info() {
        echo "Nama Karakter: " . $this->nama . "<br>";
    }
}

class Hero extends Karakter {
    public function getDarah() {
        return "Darah: " . $this->darah;
    }

    public function getIdRahasia() {
        return "ID Rahasia: " . $this->id_rahasia;
    }
}

$heroBaru = new Hero("Ksatria Baja", 100, "SECRET-123");

echo "Akses Nama: " . $heroBaru->nama . "<br>";
echo "Akses Melalui Metode: " . $heroBaru->getDarah() . "<br>";
echo "Mencoba Akses Private: " . $heroBaru->getIdRahasia();

?>

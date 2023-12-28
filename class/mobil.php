<?php

/** Program sderhana pendefinisian class dan pemanggilan class. **/

class Mobil
{
    private $warna;
    private $merk;
    private $harga;

    public function __construct()
    {
        $this->warna = "Baby Blue";
        $this->merk = "Gucci";
        $this->harga = "20000000";
    }

    public function gantiWarna ($warnaBaru)
    {
        $this->warna = $warnaBaru;
    }

    public function tampilWarna ()
    {
        echo "Warna Mobilnya : " . $this->warna;
    }
}

# membuat objek mobil

$a = new Mobil();
$b = new Mobil();

# memanggil objek

echo "<b>Mobil Pertama</b><br>";
$a->tampilWarna();
echo "<br><i>Mobil pertama ganti warna</i><br>";
$a->gantiWarna("Red");
$a->tampilWarna();

# memanggil objek

echo "<br><b>Mobil Kedua</b><br>";
$b->gantiWarna("grey");
$b->tampilWarna();

?>
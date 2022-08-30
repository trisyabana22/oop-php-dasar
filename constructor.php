<?php


class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    public function __construct($judul = "judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0)
    {
        $this->judul    = $judul;
        $this->penulis  = $penulis;
        $this->penerbit = $penerbit;
        $this->harga    = $harga;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }
}


$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
echo "<br>";
$produk2 = new Produk();

echo "Komik : " . $produk1->getLabel();

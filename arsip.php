<?php

class Produk
{
    private
        $judul,
        $penerbit,
        $penulis,
        $harga,
        $diskon = 0;

    public function __construct($judul = "Judul", $penerbit = "Penerbit", $penulis = "Penulis", $harga = 0)
    {
        $this->judul = $judul;
        $this->penerbit = $penerbit;
        $this->penulis = $penulis;
        $this->harga = $harga;
    }

    public function setJudul($judul)
    {
        $this->judul = $judul;
    }

    public function getJudul()
    {
        return $this->judul;
    }

    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }

    public function getPenerbit()
    {
        return $this->penerbit;
    }

    public function setPenulis($penulis)
    {
        $this->penulis = $penulis;
    }

    public function getPenulis()
    {
        return $this->penulis;
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    public function getDiskon()
    {
        return $this->diskon;
    }

    public function getLabel()
    {
        return "$this->penerbit, $this->penulis";
    }

    public function getInfoProduk()
    {
        $str = "{$this->judul} | {$this->getLabel()}, Harga (Rp. {$this->harga})";
        return $str;
    }
}

class Komik extends Produk
{
    public $jmlHalaman;

    public function __construct($judul = "judul", $penerbit = "Penerbit", $penulis = "Penulis", $harga = 0, $jmlHalaman)
    {
        parent::__construct($judul, $penerbit, $penulis, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . parent::getInfoProduk() . " {$this->jmlHalaman} Halaman";
        return $str;
    }
}


class Game extends Produk
{
    public $waktuMain;

    public function __construct($judul = "Judul", $penerbit = "Penerbit", $penulis = "Penulis", $harga = 0, $waktuMain = 0)
    {
        parent::__construct($judul, $penerbit, $penulis, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk()
    {
        $str = "Game : " . parent::getInfoProduk() . " {$this->waktuMain} Jam";
        return $str;
    }
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 250000, 40);

$produk2 = new Game("Pes 2022", "Rudi Tabuti", "Konami", 125000, 11);

echo $produk1->getInfoProduk();
echo "<br>";

echo $produk2->getInfoProduk();
echo "<hr>";


$produk2->setDiskon(10);
echo $produk2->getHarga();
echo "<hr>";

echo $produk1->getDiskon();

<?php

interface InfoProduk
{
    public function getInfoProduk();
}

abstract class Produk
{
    protected
        $judul,
        $penulis,
        $penerbit,
        $harga,
        $diskon = 0;

    public function __construct($judul = "Judul",  $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getJudul()
    {
        return $this->judul;
    }

    public function setJudul($judul)
    {
        $this->judul =  $judul;
    }

    public function getPenulis()
    {
        return $this->penulis;
    }

    public function setPenulis($penulis)
    {
        $this->penulis = $penulis;
    }

    public function getPenerbit()
    {
        return $this->penerbit;
    }

    public function setPenerbit($penerbit)
    {
        $this->penerbit = $penerbit;
    }

    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getDiskon()
    {
        return $this->diskon;
    }

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    abstract public function getInfo();
}

class Komik extends Produk implements InfoProduk
{
    private $jmlHalaman;

    public function __construct($judul = "Judul",  $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . $this->getInfo() . " {$this->jmlHalaman} Halaman";
        return $str;
    }

    public function getInfo()
    {

        $str = "{$this->judul} | {$this->getLabel()}, (Rp. {$this->getHarga()})";
        return $str;
    }
}

class Game extends Produk
{
    private $waktuMain;

    public function __construct($judul = "Judul",  $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $waktuMain = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk()
    {
        $str = "Game : " . $this->getInfo() . " {$this->waktuMain} Jam";
        return $str;
    }

    public function getInfo()
    {

        $str = "{$this->judul} | {$this->getLabel()}, (Rp. {$this->getHarga()})";
        return $str;
    }
}


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 20000, 230);

$produk2 = new Game("Pes 2022", "Tri", "Konami", 250000, 10);


function tampilProduk($produk)
{
    return  $produk->getInfoProduk();
}

echo tampilProduk($produk1);
echo "<br>";
echo tampilProduk($produk2);

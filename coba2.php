<?php

class Coba2
{
    public $pemilik;

    public function HidupkanLaptop()
    {
        return "Hidupkan Laptop {$this->pemilik}";
    }
}


$laptopTri = new Coba2();

$laptopTri->pemilik = "Tri Syabana";

echo $laptopTri->HidupkanLaptop();

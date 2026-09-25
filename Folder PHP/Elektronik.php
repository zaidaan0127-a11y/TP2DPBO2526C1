<?php 

require_once "Produk.php"; // Memanggil class Produk sebagai parent class
 
class Elektronik extends Produk // Membuat class Elektronik yang mewarisi Produk
{ 
    protected string $merek; // Menyimpan merek produk
    protected string $garansi; // Menyimpan informasi garansi
    protected int $daya; // Menyimpan daya listrik produk
 
    public function __construct( 
        $kode, 
        $nama, 
        $harga, 
        $foto_produk, 
        $merek = "-", 
        $garansi = "-", 
        $daya = 0 
    ) { 
        parent::__construct( // Memanggil constructor dari class Produk
            $kode, 
            $nama, 
            $harga, 
            $foto_produk 
        ); 
 
        $this->merek = $merek; // Mengisi nilai merek
        $this->garansi = $garansi; // Mengisi nilai garansi
        $this->daya = $daya; // Mengisi nilai daya
    } 
 
    public function getMerek() 
    { 
        return $this->merek; // Mengembalikan nilai merek
    } 
 
    public function getGaransi() 
    { 
        return $this->garansi; // Mengembalikan nilai garansi
    } 
 
    public function getDaya() 
    { 
        return $this->daya; // Mengembalikan nilai daya
    } 
}

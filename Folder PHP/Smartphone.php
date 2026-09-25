<?php 
 
require_once "Elektronik.php"; // Memanggil class Elektronik sebagai parent class
 
class Smartphone extends Elektronik // Membuat class Smartphone yang mewarisi Elektronik
{ 
    private int $ram; // Menyimpan kapasitas RAM
    private int $penyimpanan; // Menyimpan kapasitas penyimpanan
    private int $kamera; // Menyimpan resolusi kamera
 
    public function __construct( 
        $kode, 
        $nama, 
        $harga, 
        $foto_produk, 
        $merek = "-", 
        $garansi = "-", 
        $daya = 0, 
        $ram = 0, 
        $penyimpanan = 0, 
        $kamera = 0 
    ) { 
        parent::__construct( // Memanggil constructor dari class Elektronik
            $kode, 
            $nama, 
            $harga, 
            $foto_produk, 
            $merek, 
            $garansi, 
            $daya 
        ); 
 
        $this->ram = $ram; // Mengisi nilai RAM
        $this->penyimpanan = $penyimpanan; // Mengisi nilai penyimpanan
        $this->kamera = $kamera; // Mengisi nilai kamera
    } 
 
    public function getRam() 
    { 
        return $this->ram; // Mengembalikan kapasitas RAM
    } 
 
    public function getPenyimpanan() 
    { 
        return $this->penyimpanan; // Mengembalikan kapasitas penyimpanan
    } 
 
    public function getKamera() 
    { 
        return $this->kamera; // Mengembalikan resolusi kamera
    } 
}
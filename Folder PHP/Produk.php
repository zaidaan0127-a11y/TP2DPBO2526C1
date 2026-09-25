<?php 
 
class Produk // Membuat class dasar untuk semua produk
{ 
    protected string $kode; // Menyimpan kode produk
    protected string $nama; // Menyimpan nama produk
    protected int $harga; // Menyimpan harga produk
    protected string $foto_produk; // Menyimpan nama file foto produk
 
    public function __construct( 
        $kode = "-", 
        $nama = "-", 
        $harga = 0, 
        $foto_produk = "" 
    ) { 
        $this->kode = $kode; // Mengisi kode produk
        $this->nama = $nama; // Mengisi nama produk
        $this->harga = $harga; // Mengisi harga produk
        $this->foto_produk = $foto_produk; // Mengisi nama foto produk
    } 
 
    public function getKode() 
    { 
        return $this->kode; // Mengembalikan kode produk
    } 
 
    public function getNama() 
    { 
        return $this->nama; // Mengembalikan nama produk
    } 
 
    public function getHarga() 
    { 
        return $this->harga; // Mengembalikan harga produk
    } 
 
    public function getFotoProduk() 
    { 
        return $this->foto_produk; // Mengembalikan nama foto produk
    } 
}

#include <iostream>
#include <string>
using namespace std;

class Produk
{
protected:
    string kode, nama;
    int harga;

public:
    Produk(string kode, string nama, int harga)
        : kode(kode), nama(nama), harga(harga) {}

    string getKode() const { return kode; }
    string getNama() const { return nama; }
    int getHarga() const { return harga; }
};
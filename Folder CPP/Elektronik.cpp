#include "Produk.cpp"

class Elektronik : public Produk
{
protected:
    string merek, garansi;
    int daya;

public:
    Elektronik(string kode, string nama, int harga,
               string merek, string garansi, int daya)
        : Produk(kode, nama, harga),
          merek(merek), garansi(garansi), daya(daya) {}

    string getMerek() const { return merek; }
    string getGaransi() const { return garansi; }
    int getDaya() const { return daya; }
};
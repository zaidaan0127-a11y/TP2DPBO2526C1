#include "Elektronik.cpp"

class Smartphone : public Elektronik
{
private:
    int ram, penyimpanan, kamera;

public:
    Smartphone(string kode, string nama, int harga,
               string merek, string garansi, int daya,
               int ram, int penyimpanan, int kamera)
        : Elektronik(kode, nama, harga, merek, garansi, daya),
          ram(ram), penyimpanan(penyimpanan), kamera(kamera) {}

    int getRam() const { return ram; }
    int getPenyimpanan() const { return penyimpanan; }
    int getKamera() const { return kamera; }
};
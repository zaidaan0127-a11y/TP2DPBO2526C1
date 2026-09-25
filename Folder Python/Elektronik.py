from Produk import Produk

class Elektronik(Produk):
    def __init__(self, kode, nama, harga, merek, garansi, daya):
        super().__init__(kode, nama, harga)
        self.merek = merek
        self.garansi = garansi
        self.daya = daya

    def getMerek(self):
        return self.merek

    def getGaransi(self):
        return self.garansi

    def getDaya(self):
        return self.daya
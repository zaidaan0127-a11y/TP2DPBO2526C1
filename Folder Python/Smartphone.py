from Elektronik import Elektronik

class Smartphone(Elektronik):
    def __init__(self, kode, nama, harga,
                 merek, garansi, daya,
                 ram, penyimpanan, kamera):
        super().__init__(kode, nama, harga, merek, garansi, daya)
        self.ram = ram
        self.penyimpanan = penyimpanan
        self.kamera = kamera

    def getRam(self):
        return self.ram

    def getPenyimpanan(self):
        return self.penyimpanan

    def getKamera(self):
        return self.kamera
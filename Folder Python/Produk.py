class Produk:
    def __init__(self, kode, nama, harga):
        self.kode = kode
        self.nama = nama
        self.harga = harga

    def getKode(self):
        return self.kode

    def getNama(self):
        return self.nama

    def getHarga(self):
        return self.harga
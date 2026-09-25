from Smartphone import Smartphone

daftar = [] # Menyimpan semua data smartphone


# Cek kode
def kode_ada(kode):
    for s in daftar:
        if s.getKode().lower() == kode.lower():
            return True # Mengembalikan True jika kode sudah digunakan
    return False # Mengembalikan False jika kode belum digunakan


# Input angka
def angka(pesan):
    while True:
        try:
            nilai = int(input(pesan))

            if nilai >= 0:
                return nilai # Mengembalikan angka yang sudah valid

            print("Angka tidak boleh negatif!")
        except ValueError:
            print("Input harus berupa angka!") # Menampilkan pesan jika input bukan angka


# Tampilkan data
def tampilkan():
    print("\n" +
          "+--------+------------------+------------+------------+------------+--------+--------+------------+----------+")

    print(f"| {'Kode':<6} | {'Nama':<16} | {'Harga':<10} | {'Merek':<10} | "
          f"{'Garansi':<10} | {'Daya':<6} | {'RAM':<6} | {'Storage':<10} | {'Kamera':<8} |")

    print(
        "+--------+------------------+------------+------------+------------+--------+--------+------------+----------+")

    for s in daftar:
        print(
            f"| {s.getKode():<6} | {s.getNama():<16} | "
            f"{s.getHarga():<10} | {s.getMerek():<10} | "
            f"{s.getGaransi():<10} | {s.getDaya():<6} | "
            f"{s.getRam():<6} | {s.getPenyimpanan():<10} | "
            f"{s.getKamera():<8} |"
        )

    print(
        "+--------+------------------+------------+------------+------------+--------+--------+------------+----------+")


# Tambah data
def tambah():
    print("\n=== Tambah Smartphone ===")

    while True:
        kode = input("Kode     : ")

        if not kode_ada(kode):
            break

        print("Kode sudah digunakan!") # Menampilkan pesan jika kode sudah digunakan

    nama = input("Nama     : ")
    harga = angka("Harga    : ") # Meminta input harga yang valid
    merek = input("Merek    : ")
    garansi = input("Garansi  : ")
    daya = angka("Daya     : ") # Meminta input daya yang valid
    ram = angka("RAM      : ") # Meminta input RAM yang valid
    storage = angka("Storage  : ") # Meminta input penyimpanan yang valid
    kamera = angka("Kamera   : ") # Meminta input kamera yang valid

    daftar.append(
        Smartphone(
            kode, nama, harga, merek, garansi,
            daya, ram, storage, kamera
        )
    ) # Menambahkan object smartphone ke dalam list

    print("Data berhasil ditambahkan!") # Menampilkan pesan keberhasilan


# 5 objek awal
daftar = [
    Smartphone("P001", "iPhone 15", 12000000,
               "Apple", "1 Tahun", 20, 8, 256, 48), # Menambahkan data smartphone pertama

    Smartphone("P002", "Samsung S24", 11000000,
               "Samsung", "1 Tahun", 25, 8, 256, 50), # Menambahkan data smartphone kedua

    Smartphone("P003", "Xiaomi 14", 9000000,
               "Xiaomi", "1 Tahun", 90, 12, 512, 50), # Menambahkan data smartphone ketiga

    Smartphone("P004", "OPPO Reno", 7000000,
               "OPPO", "1 Tahun", 80, 12, 256, 50), # Menambahkan data smartphone keempat

    Smartphone("P005", "Vivo V30", 6500000,
               "Vivo", "1 Tahun", 80, 12, 256, 50) # Menambahkan data smartphone kelima
]


while True:
    print("\n=== TOKO ELEKTRONIK ===")
    print("1. Tampilkan Data")
    print("2. Tambah Smartphone")
    print("3. Keluar")

    pilihan = input("Pilihan: ")

    if pilihan == "1":
        tampilkan() # Menampilkan seluruh data smartphone

    elif pilihan == "2":
        tambah() # Membuka proses penambahan smartphone

    elif pilihan == "3":
        print("Program selesai.") # Menampilkan pesan saat program selesai
        break

    else:
        print("Pilihan tidak tersedia!") # Menampilkan pesan jika menu tidak valid
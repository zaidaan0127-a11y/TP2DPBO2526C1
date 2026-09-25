#include "Smartphone.cpp"
#include <vector>
#include <iomanip>
using namespace std;

vector<Smartphone> daftarSmartphone; // Menyimpan semua data smartphone

// Cek kode
bool kodeAda(string kode)
{
    for (const auto& smartphone : daftarSmartphone)
        if (smartphone.getKode() == kode)
            return true; // Mengembalikan true jika kode sudah digunakan

    return false; // Mengembalikan false jika kode belum digunakan
}

// Input angka
int inputAngka(string pesan)
{
    int angka;

    while (true)
    {
        cout << pesan;

        if (cin >> angka && angka >= 0)
        {
            cin.ignore(1000, '\n');
            return angka; // Mengembalikan angka yang sudah valid
        }

        cout << "Input harus berupa angka positif!\n";
        cin.clear(); // Menghapus kondisi error pada input
        cin.ignore(1000, '\n'); // Membersihkan input yang tidak valid
    }
}

// Tampilkan data
void tampilkanData()
{
    cout << "\n";

    cout << "+--------+------------------+------------+------------+------------+--------+--------+------------+----------+\n";
    cout << "| Kode   | Nama             | Harga      | Merek      | Garansi    | Daya   | RAM    | Storage    | Kamera   |\n";
    cout << "+--------+------------------+------------+------------+------------+--------+--------+------------+----------+\n";

    for (const auto& smartphone : daftarSmartphone)
    {
        cout << "| "
             << left << setw(6)  << smartphone.getKode() << " | "
             << left << setw(16) << smartphone.getNama() << " | "
             << left << setw(10) << smartphone.getHarga() << " | "
             << left << setw(10) << smartphone.getMerek() << " | "
             << left << setw(10) << smartphone.getGaransi() << " | "
             << left << setw(6)  << smartphone.getDaya() << " | "
             << left << setw(6)  << smartphone.getRam() << " | "
             << left << setw(10) << smartphone.getPenyimpanan() << " | "
             << left << setw(8)  << smartphone.getKamera() << " |\n";
    }

    cout << "+--------+------------------+------------+------------+------------+--------+--------+------------+----------+\n";
}

// Tambah data
void tambahData()
{
    string kode, nama, merek, garansi;
    int harga, daya, ram, penyimpanan, kamera;

    cout << "\n=== Tambah Smartphone ===\n";

    do
    {
        cout << "Kode     : ";
        cin >> kode;

        if (kodeAda(kode))
            cout << "Kode sudah digunakan!\n";

    } while (kodeAda(kode)); // Mengulang input jika kode sudah digunakan

    cin.ignore();

    cout << "Nama     : ";
    getline(cin, nama);

    harga = inputAngka("Harga    : "); // Meminta input harga yang valid

    cout << "Merek    : ";
    getline(cin, merek);

    cout << "Garansi  : ";
    getline(cin, garansi);

    daya = inputAngka("Daya     : "); // Meminta input daya
    ram = inputAngka("RAM      : "); // Meminta input RAM
    penyimpanan = inputAngka("Storage  : "); // Meminta input penyimpanan
    kamera = inputAngka("Kamera   : "); // Meminta input kamera

    daftarSmartphone.push_back(
        Smartphone(kode, nama, harga, merek, garansi,
                   daya, ram, penyimpanan, kamera)
    ); // Menambahkan object smartphone ke dalam vector

    cout << "Data berhasil ditambahkan!\n";
}

int main()
{
    // 5 objek awal
    daftarSmartphone = {
        Smartphone("P001", "iPhone 15", 12000000, "Apple", "1 Tahun", 20, 8, 256, 48),
        Smartphone("P002", "Samsung S24", 11000000, "Samsung", "1 Tahun", 25, 8, 256, 50),
        Smartphone("P003", "Xiaomi 14", 9000000, "Xiaomi", "1 Tahun", 90, 12, 512, 50),
        Smartphone("P004", "OPPO Reno", 7000000, "OPPO", "1 Tahun", 80, 12, 256, 50),
        Smartphone("P005", "Vivo V30", 6500000, "Vivo", "1 Tahun", 80, 12, 256, 50)
    }; // Mengisi vector dengan lima data smartphone awal

    int pilihan;

    do
    {
        cout << "\n=== TOKO ELEKTRONIK ===\n"
             << "1. Tampilkan Data\n"
             << "2. Tambah Smartphone\n"
             << "3. Keluar\n"
             << "Pilihan: ";

        cin >> pilihan;

        if (pilihan == 1)
            tampilkanData(); // Menampilkan seluruh data smartphone
        else if (pilihan == 2)
            tambahData(); // Membuka proses penambahan smartphone
        else if (pilihan == 3)
            cout << "Program selesai.\n";
        else
            cout << "Pilihan tidak tersedia!\n"; // Menampilkan pesan jika menu tidak valid

    } while (pilihan != 3); // Mengulang menu sampai pengguna memilih keluar

    return 0; // Mengakhiri program
}
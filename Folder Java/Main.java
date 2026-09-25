import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    static ArrayList<Smartphone> daftar = new ArrayList<>(); // Menyimpan semua data smartphone
    static Scanner input = new Scanner(System.in); // Membaca input dari pengguna

    // Cek kode
    static boolean kodeAda(String kode) {
        for (Smartphone s : daftar)
            if (s.getKode().equalsIgnoreCase(kode))
                return true; // Mengembalikan true jika kode sudah digunakan
        return false; // Mengembalikan false jika kode belum digunakan
    }

    // Input angka
    static int angka(String pesan) {
        int nilai;

        while (true) {
            System.out.print(pesan);

            if (input.hasNextInt()) {
                nilai = input.nextInt();
                input.nextLine();

                if (nilai >= 0)
                    return nilai; // Mengembalikan angka yang sudah valid
            } else {
                input.nextLine(); // Membersihkan input yang bukan angka
            }

            System.out.println("Input harus berupa angka!"); // Menampilkan pesan jika input tidak valid
        }
    }

    // Tampilkan data
    static void tampilkan() {
        System.out.println("\n" +
            "+--------+------------------+------------+------------+------------+--------+--------+------------+----------+");
        System.out.printf(
            "| %-6s | %-16s | %-10s | %-10s | %-10s | %-6s | %-6s | %-10s | %-8s |%n",
            "Kode", "Nama", "Harga", "Merek", "Garansi",
            "Daya", "RAM", "Storage", "Kamera"
        );

        System.out.println(
            "+--------+------------------+------------+------------+------------+--------+--------+------------+----------+");

        for (Smartphone s : daftar) {
            System.out.printf(
                "| %-6s | %-16s | %-10d | %-10s | %-10s | %-6d | %-6d | %-10d | %-8d |%n",
                s.getKode(), s.getNama(), s.getHarga(),
                s.getMerek(), s.getGaransi(), s.getDaya(),
                s.getRam(), s.getPenyimpanan(), s.getKamera()
            );
        }

        System.out.println(
            "+--------+------------------+------------+------------+------------+--------+--------+------------+----------+");
    }

    // Tambah data
    static void tambah() {
        String kode;

        System.out.println("\n=== Tambah Smartphone ===");

        do {
            System.out.print("Kode     : ");
            kode = input.nextLine();

            if (kodeAda(kode))
                System.out.println("Kode sudah digunakan!"); // Menampilkan pesan jika kode sudah ada

        } while (kodeAda(kode)); // Mengulang input jika kode sudah digunakan

        System.out.print("Nama     : ");
        String nama = input.nextLine();

        int harga = angka("Harga    : "); // Meminta input harga yang valid

        System.out.print("Merek    : ");
        String merek = input.nextLine();

        System.out.print("Garansi  : ");
        String garansi = input.nextLine();

        int daya = angka("Daya     : "); // Meminta input daya yang valid
        int ram = angka("RAM      : "); // Meminta input RAM yang valid
        int storage = angka("Storage  : "); // Meminta input penyimpanan yang valid
        int kamera = angka("Kamera   : "); // Meminta input kamera yang valid

        daftar.add(new Smartphone(
            kode, nama, harga, merek, garansi,
            daya, ram, storage, kamera
        )); // Menambahkan object smartphone ke dalam ArrayList

        System.out.println("Data berhasil ditambahkan!"); // Menampilkan pesan keberhasilan
    }

    public static void main(String[] args) {

        // 5 objek awal
        daftar.add(new Smartphone(
            "P001", "iPhone 15", 12000000,
            "Apple", "1 Tahun", 20, 8, 256, 48)); // Menambahkan data smartphone pertama

        daftar.add(new Smartphone(
            "P002", "Samsung S24", 11000000,
            "Samsung", "1 Tahun", 25, 8, 256, 50)); // Menambahkan data smartphone kedua

        daftar.add(new Smartphone(
            "P003", "Xiaomi 14", 9000000,
            "Xiaomi", "1 Tahun", 90, 12, 512, 50)); // Menambahkan data smartphone ketiga

        daftar.add(new Smartphone(
            "P004", "OPPO Reno", 7000000,
            "OPPO", "1 Tahun", 80, 12, 256, 50)); // Menambahkan data smartphone keempat

        daftar.add(new Smartphone(
            "P005", "Vivo V30", 6500000,
            "Vivo", "1 Tahun", 80, 12, 256, 50)); // Menambahkan data smartphone kelima

        int pilihan;

        do {
            System.out.println("\n=== TOKO ELEKTRONIK ===");
            System.out.println("1. Tampilkan Data");
            System.out.println("2. Tambah Smartphone");
            System.out.println("3. Keluar");
            System.out.print("Pilihan: ");

            pilihan = input.nextInt();
            input.nextLine(); // Membersihkan sisa input

            if (pilihan == 1)
                tampilkan(); // Menampilkan seluruh data smartphone
            else if (pilihan == 2)
                tambah(); // Membuka proses penambahan smartphone
            else if (pilihan == 3)
                System.out.println("Program selesai."); // Menampilkan pesan saat program selesai
            else
                System.out.println("Pilihan tidak tersedia!"); // Menampilkan pesan jika menu tidak valid

        } while (pilihan != 3); // Mengulang menu sampai pengguna memilih keluar
    }
}
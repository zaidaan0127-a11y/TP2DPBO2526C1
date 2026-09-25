public class Smartphone extends Elektronik {
    private int ram, penyimpanan, kamera;

    public Smartphone(String kode, String nama, int harga,
                      String merek, String garansi, int daya,
                      int ram, int penyimpanan, int kamera) {
        super(kode, nama, harga, merek, garansi, daya);
        this.ram = ram;
        this.penyimpanan = penyimpanan;
        this.kamera = kamera;
    }

    public int getRam() { return ram; }
    public int getPenyimpanan() { return penyimpanan; }
    public int getKamera() { return kamera; }
}
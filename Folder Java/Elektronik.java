public class Elektronik extends Produk {
    protected String merek, garansi;
    protected int daya;

    public Elektronik(String kode, String nama, int harga,
                      String merek, String garansi, int daya) {
        super(kode, nama, harga);
        this.merek = merek;
        this.garansi = garansi;
        this.daya = daya;
    }

    public String getMerek() { return merek; }
    public String getGaransi() { return garansi; }
    public int getDaya() { return daya; }
}
# TP2DPBO2526C1

_____
Janji

Saya Zaidaan Dhyaa Ulhaq Budiono dengan NIM 2500945 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

______
Fitur

Tambah Data: Menambah objek baru. 

Tampilkan Data: Menampilkan semua objek yang tersimpan.

_______
Diagram

<img width="192" height="612" alt="Untitled Diagram" src="https://github.com/user-attachments/assets/485ad8f7-57fd-43b7-97c4-a0d06d544dca" />

Penjelasan
1. Produk

Class Produk merupakan superclass utama yang menyimpan atribut dasar dari sebuah produk, yaitu kode, nama, harga, dan foto_produk. Atribut tersebut digunakan untuk menyimpan identitas, nama, harga, dan gambar produk. Class ini memiliki method __construct() yang digunakan untuk memberikan nilai awal pada seluruh atribut ketika objek Produk dibuat. Selain itu, terdapat method getKode(), getNama(), getHarga(), dan getFotoProduk() yang berfungsi untuk mengambil atau menampilkan nilai dari masing-masing atribut.

2. Elektronik

Class Elektronik merupakan subclass dari Produk sehingga memiliki hubungan inheritance dengan Produk. Class ini mewarisi seluruh atribut dan method dari Produk serta menambahkan atribut khusus elektronik, yaitu merek, garansi, dan daya. Atribut merek digunakan untuk menyimpan nama merek, garansi untuk informasi masa garansi, sedangkan daya untuk menyimpan penggunaan daya perangkat dalam watt.Method __construct() digunakan untuk menginisialisasi atribut yang berasal dari Produk sekaligus atribut milik Elektronik dengan bantuan parent::__construct(). Kemudian terdapat method getMerek(), getGaransi(), dan getDaya() yang digunakan untuk mengambil nilai dari atribut masing-masing.

3. Smartphone

Class Smartphone merupakan subclass dari Elektronik, sehingga memiliki hubungan inheritance dengan Elektronik dan secara tidak langsung mewarisi atribut dari Produk. Class ini memiliki atribut khusus smartphone, yaitu ram, penyimpanan, dan kamera. Atribut ram menyimpan kapasitas RAM, penyimpanan menyimpan kapasitas penyimpanan internal, dan kamera menyimpan resolusi kamera. Method __construct() digunakan untuk menginisialisasi seluruh atribut Smartphone serta memanggil constructor dari parent class melalui parent::__construct(). Sementara itu, method getRam(), getPenyimpanan(), dan getKamera() digunakan untuk mengambil nilai RAM, kapasitas penyimpanan, dan kamera. Dengan demikian, Smartphone merupakan bentuk paling spesifik dari pewarisan bertingkat Produk → Elektronik → Smartphone.

____
Error handling

<img width="310" height="315" alt="Screenshot error handling" src="https://github.com/user-attachments/assets/253e83dc-0831-49b8-824f-9bb2fbe38edb" />

Berisi notifikasi error dan akan mengulang input baru jika mengunakan id yang sudah digunakan atau menggunakan karakter non numeric untuk harga.

_____
Dokumentasi Program

Program dimulai dengan membuat objek Smartphone yang mewarisi atribut dan method dari Elektronik dan Produk. Data smartphone seperti kode, nama, harga, merek, RAM, penyimpanan, dan kamera dimasukkan melalui input. Constructor mengatur data tersebut, kemudian getter digunakan untuk mengambil dan menampilkan data. Pada PHP, data dapat ditambah melalui form dan disimpan dalam session, sedangkan tombol reset mengembalikan data ke data awal.

_____
Program cpp

Melihat semua tabel

<img width="779" height="227" alt="Screenshot Tabel semua" src="https://github.com/user-attachments/assets/07f1555d-3bf6-4b82-ae14-c5cd5ffcb20e" />

Penambahan data

<img width="782" height="463" alt="Screenshot add" src="https://github.com/user-attachments/assets/2da222b6-7720-4d11-96fc-684a36359e5f" />

___________
Program Java

Melihat semua tabel

<img width="788" height="225" alt="Screenshot tabel semua" src="https://github.com/user-attachments/assets/96615260-dd75-4d1f-9983-8de48a3838c2" />

Penambahan data

<img width="780" height="460" alt="Screenshot add" src="https://github.com/user-attachments/assets/89011941-1b83-45d3-b45f-fd438e054346" />

____
Program Python

Melihat semua tabel

<img width="780" height="214" alt="Screenshot tabel semua" src="https://github.com/user-attachments/assets/cf6e49a2-1778-49a7-b1ed-8d0496a69f63" />

Penambahan data

<img width="782" height="461" alt="Screenshot add" src="https://github.com/user-attachments/assets/04fd7427-e8b7-4484-aaeb-3c5d1c7e63d0" />

_____
Program PHP

<img width="886" height="256" alt="Screenshot error handling" src="https://github.com/user-attachments/assets/70544ccc-f37d-4c37-9e58-fb083ac6e525" />

Berisi error handling jika menggunakan id yang sama

____
Tabel

<img width="902" height="400" alt="Screenshot tabel semua" src="https://github.com/user-attachments/assets/2b294692-3b30-4873-9ca3-988e4956f1bb" />

Menambah data

<img width="938" height="407" alt="Screenshot add" src="https://github.com/user-attachments/assets/5fe3d713-08e9-4f23-bb61-3924a7d03371" />

hasil:

<img width="879" height="392" alt="Screenshot hasill add" src="https://github.com/user-attachments/assets/2f6fd977-011c-4c85-be85-ede8674370e6" />

Juga ada reset button untuk menghapus data dan mengulangi session

<img width="847" height="386" alt="Screenshot reset button" src="https://github.com/user-attachments/assets/420500c1-5dc4-4ed5-8f09-a88161a7e474" />










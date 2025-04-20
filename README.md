# Janji
Saya Muhammad Alvinza dengan NIM 2304879 mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Desain Program
![index](https://github.com/user-attachments/assets/29b53ff9-d592-4f3e-be7f-d24bd77cedda)  
Program ini dirancang untuk dapat melakukan CRUD (Create Read Update Delete) terhadap database bertemakan Sistem Data Gamestop. Berikut adalah ERD nya:
![ERD](https://github.com/user-attachments/assets/20db332c-013d-4684-9498-34c38323ba56)  
### Genre
id: id genre (PK, Auto-Increment, Not Null)  
nama_genre: nama dari genre game (Not Null)  
deskripsi: Deskripsi Genre game (Not Null)  
### Publisher
id: id publisher (PK, Auto-Increment, Not Null)  
nama_publisher: nama publisher game (Not Null)  
tahun_berdiri: kapan perusahaan didirikan (Not Null)  
negara_asal: Asal Negara perusahaan (Not Null)  
email_kontak: email yang dapat dihubungi oleh customer (Not Null)  
### Game
id: id game (PK, Auto-Increment, Not Null)  
nama_game: nama game tersebut (Not Null)  
genre_id: FK dari id genre (bisa null)  
publisher_id: FK dari id publisher (bisa null)  
harga: harga jual game (Not Null)  
tahun_rilis: tahun game dirilis (Not Null)  
platform: platform game dirilis (Not Null)  
deskripsi_game: deskripsi dari game tersebut (Not Null)  

### Kelas
Terdapat 3 Kelas yang menampung method berdasarkan entitas, yaitu Genre.php, Publisher.php, dan Game.php.  
Ketiga kelas memiliki method yang mirip:  
1. Ambil Semua data  
2. Ambil data dari ID  
3. Hapus Data  
4. Update Data  
5. Tambah Data  
6. Cari dari Keyword  
Yang membedakan hanyalah nama entitas saat query dibuat. 

### Modular
Program ini dirancang secara modular sehingga ditampilkan pada index.php yang meng-include php view, sehingga collaborator dapat bekerja secara pararel dan tidak akan konflik.

## Alur Program
Alur dibagi menjadi 5, Create, Read, Update, Delete, dan Search.

### Read
Kita dapat melihat seluruh data pada database dengan mengklik salah satu tab pada index.  
![game_view](https://github.com/user-attachments/assets/a2d05bb5-8666-4d13-8b92-2691c3f2d190)
Kita dapat melakukan Add, Update, Delete, dan Search pada laman ini.

### Create (Add)
Kita dapat menambahkan data dengan fitur add ini. Kita perlu memasukkan data yang benar ke kolom yang sesuai dan mengklik tombol "Add". Data akan tersimpan pada database.  
Terdapat tombol kembali untuk kembali ke page sebelumnya.
![add](https://github.com/user-attachments/assets/cf7e41f3-6d77-4955-8bd5-cf40e66e5a4e)

### Update
Kita dapat mengupdate Data dengan mengklik tombol "Update" di kolom terakhir. Ketika kita selesai mengisi kolom dan mengupdatenya, data akan langsung diubah pada database.  
![update](https://github.com/user-attachments/assets/daf3eb74-1208-4a78-8b84-8d0dacf56f73)

### Delete
Ketika kita tidak membutuhkan data suatu baris, kita dapat menghapusnya dengan tombol "Delete". Data akan terhapus dari database. Ketika yang dihapus adalah Genre/Publisher dengan kaitan pada Game, maka id FK akan menjadi NULL. Lalu data pada kolom tersebut ditampilkan dengan "Not Available".  

### Search
Kita dapat mencari data dengan keywords, biasanya dicari dengan Nama atau Deskripsi suatu tabel. (kecuali publisher, yaitu nama dan negara asal). Dengan ini kita dapat mencari data yang kita inginkan.
![search](https://github.com/user-attachments/assets/524827b9-ad2e-47fb-80e2-b34e35519630)

## Video
https://github.com/user-attachments/assets/21446e8c-ebf0-4d17-9430-cf53fbe3011b  
https://drive.google.com/file/d/1rVDip_VlYwpQDtRTUg4BmoOjtahG9tNs/view?usp=sharing

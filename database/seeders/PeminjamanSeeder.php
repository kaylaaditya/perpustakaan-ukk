<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\KategoriBuku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->count(4)->create();
        $buku = Buku::factory()->count(15)->create();
        $kategori_list = ['Publikasi Umum, informasi umum dan komputer',
        'Bibiliografi',
        'Perpustakaan dan informasi',
        'Ensiklopedia dan buku yang memuat fakta-fakta',
        'Tidak ada klasifikasi (sebelumnya untuk Biografi)',
        'Majalah dan Jurnal',
        'Asosiasi, Organisasi dan Museum',
        'Media massa, junalisme dan publikasi',
        'Kutipan',
        'Manuskrip dan buku langka',
        'Filsafat dan psikologi',
        'Metafisika',
        'Epistimologi',
        'Parapsikologi dan Okultisme',
        'Pemikiran Filosofis',
        'Psikologi',
        'Filosofis Logis',
        'Etik',
        'Filosofi kuno, zaman pertengahan, dan filosofi ketimuran',
        'Filosofi barat modern',
        'Agama',
        'Ilmu sosial, sosiologi dan antropologi',
        'Statistik',
        'Ilmu politik',
        'Ekonomi',
        'Hukum',
        'Administrasi publik dan ilmu kemiliteran',
        'Masalah dan layanan sosial',
        'Pendidikan',
        'Perdagangan, komunikasi dan transportasi',
        'Norma, etika dan tradisi',
        'Bahasa',
        'Sains',
        'Matematika',
        'Astronomi',
        'Fisika',
        'Kimia',
        'Ilmu kebumian dan geologi',
        'Fosil dan kehidupan prasejarah',
        'Biologi',
        'Tanaman',
        'Zoologi',
        'Teknologi',
        'Kesehatan dan Obat-Obatan',
        'Teknik',
        'Pertanian',
        'Managemen Rumah Tangga dan Keluarga',
        'Manajemen dan Hubungan dengan Publik',
        'Teknik Kimia',
        'Manufaktur',
        'Manufaktur untuk Keperluan Khusus',
        'Konstruksi',
        'Kesenian dan rekreasi',
        'Perencanaan dan Arsitektur Lanskap',
        'Arsitektur',
        'Patung, Keramik dan Seni Metal',
        'Seni Grafis dan Dekoratif',
        'Lukisan',
        'Percetakan',
        'Fotografi, Film, Video',
        'Musik',
        'Olahraga, Permainan dan Hiburan',
        'Literatur, Sastra, Retorika dan Kritik',
        'Sejarah',
        'Geografi dan Perjalanan',
        'Biografi dan Asal-Usul',
        'Sejarah Dunia Lama',
        'Asal–Usul Eropa',
        'Asal-Usul Asia',
        'Asal-Usul Afrika',
        'Asal-Usul Amerika Utara',
        'Asal-Usul Amerika Selatan',
        'Asal-Usul Wilayah Lain'
        ];
        
        foreach ($kategori_list as $kat) {
          KategoriBuku::create([
            'nama_kategori' => $kat
          ]);
        }
        Peminjaman::factory()->count(25)->recycle([$user, $buku])->create();
    }
}

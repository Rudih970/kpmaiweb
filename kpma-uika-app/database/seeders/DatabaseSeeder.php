<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SpmiDocument;
use App\Models\SpmeItem;
use App\Models\Regulation;
use App\Models\InformationPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Spatie Roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $auditorRole = Role::firstOrCreate(['name' => 'Auditor']);
        $userRole = Role::firstOrCreate(['name' => 'User']);

        // 1. Seed Default Admin Account (As requested: admin@uika-bogor.ac.id / password123)
        $admin = User::firstOrCreate(
            ['email' => 'admin@uika-bogor.ac.id'],
            [
                'name' => 'Administrator KPMA UIKA',
                'password' => bcrypt('password123'),
                'role' => 'admin',
            ]
        );
        $admin->assignRole($adminRole);

        // Seed Default Auditor Account
        $auditor = User::firstOrCreate(
            ['email' => 'auditor@uika-bogor.ac.id'],
            [
                'name' => 'Auditor Utama KPMA',
                'password' => bcrypt('password123'),
                'role' => 'auditor',
            ]
        );
        $auditor->assignRole($auditorRole);

        // 2. Seed 5 Featured Hero Banner & Information Posts
        $posts = [
            [
                'title' => 'Universitas Ibn Khaldun Bogor Raih Akreditasi Unggul BAN-PT',
                'slug' => Str::slug('Universitas Ibn Khaldun Bogor Raih Akreditasi Unggul BAN-PT'),
                'category' => 'berita',
                'content' => 'Capaian sejarah bagi UIKA Bogor yang berhasil meraih predikat Akreditasi Unggul dari BAN-PT sebagai bukti komitmen mutu pendidikan tinggi Islam berstandar internasional.',
                'image_path' => 'posts/hero-akreditasi-unggul.jpg',
                'event_date' => now(),
                'is_featured' => true,
                'views' => 1520,
            ],
            [
                'title' => 'Pembukaan Siklus Audit Mutu Internal (AMI) Akademik Tahun 2026/2027',
                'slug' => Str::slug('Pembukaan Siklus Audit Mutu Internal (AMI) Akademik Tahun 2026/2027'),
                'category' => 'pengumuman_penting',
                'content' => 'KPMA UIKA secara resmi membuka jadwal Audit Mutu Internal (AMI) untuk seluruh Program Studi S1, S2, dan S3 di lingkungan Universitas Ibn Khaldun Bogor.',
                'image_path' => 'posts/hero-ami-2026.jpg',
                'event_date' => now()->addDays(3),
                'is_featured' => true,
                'views' => 840,
            ],
            [
                'title' => 'Workshop Penyusunan Dokumen Evaluasi Diri (LED) LAM-PT',
                'slug' => Str::slug('Workshop Penyusunan Dokumen Evaluasi Diri (LED) LAM-PT'),
                'category' => 'agenda',
                'content' => 'Pelatihan intensif bagi Tim Taskforce Akreditasi Program Studi dalam rangka persiapan pengunggahan borang evaluasi diri ke Lembaga Akreditasi Mandiri.',
                'image_path' => 'posts/hero-workshop-led.jpg',
                'event_date' => now()->addDays(7),
                'is_featured' => true,
                'views' => 610,
            ],
            [
                'title' => 'Sosialisasi Standar Mutu Pendidikan Tinggi Berbasis Islam Rahmatan Lil Alamin',
                'slug' => Str::slug('Sosialisasi Standar Mutu Pendidikan Tinggi Berbasis Islam Rahmatan Lil Alamin'),
                'category' => 'pengumuman_penting',
                'content' => 'Integrasi nilai-nilai keislaman dan etika akademik dalam 24 Standar Nasional Pendidikan Tinggi yang diterapkan di UIKA Bogor.',
                'image_path' => 'posts/hero-standar-islam.jpg',
                'event_date' => now()->addDays(10),
                'is_featured' => true,
                'views' => 930,
            ],
            [
                'title' => 'Penyerahan Sertifikat Auditor Mutu Internal Tersertifikasi Nasional',
                'slug' => Str::slug('Penyerahan Sertifikat Auditor Mutu Internal Tersertifikasi Nasional'),
                'category' => 'berita',
                'content' => 'KPMA UIKA menambah 15 auditor mutu internal baru yang telah lulus sertifikasi nasional untuk menjamin objektivitas audit.',
                'image_path' => 'posts/hero-auditor-cert.jpg',
                'event_date' => now(),
                'is_featured' => true,
                'views' => 450,
            ],
        ];

        foreach ($posts as $postData) {
            InformationPost::firstOrCreate(['slug' => $postData['slug']], $postData);
        }

        // 3. Seed SPMI Documents Sample Data
        $spmiDocs = [
            [
                'title' => 'Kebijakan Penjaminan Mutu Internal (SPMI) UIKA 2026',
                'slug' => Str::slug('Kebijakan Penjaminan Mutu Internal (SPMI) UIKA 2026'),
                'cycle_category' => 'dokumen_spmi',
                'file_path' => 'spmi/kebijakan-spmi-2026.pdf',
                'description' => 'Dokumen induk arah dan strategi penjaminan mutu di lingkungan Universitas Ibn Khaldun Bogor.',
                'is_active' => true,
            ],
            [
                'title' => 'Manual Penetapan & Pelaksanaan Standar Pendidikan',
                'slug' => Str::slug('Manual Penetapan & Pelaksanaan Standar Pendidikan'),
                'cycle_category' => 'pelaksanaan',
                'file_path' => 'spmi/manual-pelaksanaan-2026.pdf',
                'description' => 'Panduan pelaksanaan standar pendidikan tinggi akademik.',
                'is_active' => true,
            ],
            [
                'title' => 'Formulir Evaluasi Pembelajaran & Survei Kepuasan',
                'slug' => Str::slug('Formulir Evaluasi Pembelajaran & Survei Kepuasan'),
                'cycle_category' => 'evaluasi',
                'file_path' => 'spmi/form-evaluasi-pembelajaran.pdf',
                'description' => 'Instrumen pengukur kepuasan mahasiswa dan dosen.',
                'is_active' => true,
            ],
            [
                'title' => 'SOP Pengendalian Temuan Audit Mutu Internal',
                'slug' => Str::slug('SOP Pengendalian Temuan Audit Mutu Internal'),
                'cycle_category' => 'pengendalian',
                'file_path' => 'spmi/sop-pengendalian-ami.pdf',
                'description' => 'Prosedur tindakan koreksi atas ketidaksesuaian hasil audit.',
                'is_active' => true,
            ],
            [
                'title' => 'Rencana Peningkatan Standar Mutu Berkelanjutan (RTM)',
                'slug' => Str::slug('Rencana Peningkatan Standar Mutu Berkelanjutan (RTM)'),
                'cycle_category' => 'peningkatan',
                'file_path' => 'spmi/rtm-peningkatan-mutu.pdf',
                'description' => 'Hasil Rapat Tinjauan Manajemen untuk peningkatkan kriteria standar.',
                'is_active' => true,
            ],
        ];

        foreach ($spmiDocs as $docData) {
            SpmiDocument::firstOrCreate(['slug' => $docData['slug']], $docData);
        }

        // 4. Seed SPME Items Sample Data
        $spmeItems = [
            [
                'title' => 'Sertifikat Akreditasi Institusi UIKA Bogor BAN-PT',
                'slug' => Str::slug('Sertifikat Akreditasi Institusi UIKA Bogor BAN-PT'),
                'category' => 'akreditasi_nasional',
                'file_path' => 'spme/sertifikat-institusi-uika.pdf',
                'external_link' => 'https://banpt.or.id',
                'description' => 'SK Akreditasi Institusi Perguruan Tinggi dari BAN-PT.',
            ],
            [
                'title' => 'Akreditasi Internasional FIBAA / ASIC Program Studi',
                'slug' => Str::slug('Akreditasi Internasional FIBAA / ASIC Program Studi'),
                'category' => 'akreditasi_internasional',
                'file_path' => 'spme/sertifikat-internasional.pdf',
                'external_link' => 'https://fibaa.org',
                'description' => 'Pengakuan mutu internasional untuk program unggulan UIKA.',
            ],
            [
                'title' => 'Panduan Akreditasi Lembaga Akreditasi Mandiri Teknik (LAM Teknik)',
                'slug' => Str::slug('Panduan Akreditasi Lembaga Akreditasi Mandiri Teknik (LAM Teknik)'),
                'category' => 'cakupan_lam',
                'file_path' => 'spme/panduan-lam-teknik.pdf',
                'external_link' => 'https://lamteknik.or.id',
                'description' => 'Cakupan instrumen LAM Teknik untuk Prodi Fakultas Teknik.',
            ],
            [
                'title' => 'Matriks Penilaian IAPS 4.0 & IPS 9 Kriteria',
                'slug' => Str::slug('Matriks Penilaian IAPS 4.0 & IPS 9 Kriteria'),
                'category' => 'instrumen_panduan',
                'file_path' => 'spme/matriks-penilaian-9-kriteria.pdf',
                'external_link' => null,
                'description' => 'Panduan penyusunan borang akreditasi 9 kriteria.',
            ],
        ];

        foreach ($spmeItems as $spmeData) {
            SpmeItem::firstOrCreate(['slug' => $spmeData['slug']], $spmeData);
        }

        // 5. Seed Regulations Sample Data
        $regulations = [
            [
                'title' => 'UU No. 12 Tahun 2012 tentang Pendidikan Tinggi',
                'slug' => Str::slug('UU No. 12 Tahun 2012 tentang Pendidikan Tinggi'),
                'category' => 'uu_pemerintah',
                'file_path' => 'regulations/uu-12-2012-pendidikan-tinggi.pdf',
                'year' => 2012,
            ],
            [
                'title' => 'Statuta Yayasan Pendidikan Islam Ibn Khaldun Bogor',
                'slug' => Str::slug('Statuta Yayasan Pendidikan Islam Ibn Khaldun Bogor'),
                'category' => 'statuta_yayasan',
                'file_path' => 'regulations/statuta-ypik-uika.pdf',
                'year' => 2021,
            ],
            [
                'title' => 'Peraturan Rektor No. 04 Tahun 2024 tentang SPMI UIKA',
                'slug' => Str::slug('Peraturan Rektor No. 04 Tahun 2024 tentang SPMI UIKA'),
                'category' => 'peraturan_rektor',
                'file_path' => 'regulations/perrek-04-2024-spmi.pdf',
                'year' => 2024,
            ],
            [
                'title' => 'Pedoman Operasional Penjaminan Mutu & Audit Internal',
                'slug' => Str::slug('Pedoman Operasional Penjaminan Mutu & Audit Internal'),
                'category' => 'pedoman_operasional',
                'file_path' => 'regulations/pedoman-operasional-kpma.pdf',
                'year' => 2025,
            ],
        ];

        foreach ($regulations as $regData) {
            Regulation::firstOrCreate(['slug' => $regData['slug']], $regData);
        }
    }
}

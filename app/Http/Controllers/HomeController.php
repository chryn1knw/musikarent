<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instrument;
use App\Models\Studio;

class HomeController extends Controller
{
    public function index()
    {
        $siteInfo = [
            'name' => 'MusikaRent',
            'slogan' => 'Solusi Sewa Alat Musik & Studio Band Terlengkap',
        ];
        
        $heroSection = [
            'title' => 'Sewa Alat Musik & Studio Band Premium',
            'subtitle' => 'Nikmati pengalaman bermusik dengan alat musik berkualitas dan studio band berstandar profesional dengan harga terjangkau.',
        ];
        
        $carouselItems = [
            [
                'image' => asset('images/data/jacob-hodgson-zSidqBfl7DY-unsplash.jpg'),
                'title' => 'Alat Musik Berkualitas',
                'description' => 'Berbagai alat musik berkualitas dengan kondisi prima'
            ],
            [
                'image' => asset('images/data/jacob-hodgson-tNbk1kTlSY8-unsplash.jpg'),
                'title' => 'Studio Band Profesional',
                'description' => 'Studio recording dengan akustik dan peralatan profesional'
            ],
            [
                'image' => asset('images/data/josh-sorenson-LVmyjS0hxYU-unsplash.jpg'),
                'title' => 'Harga Terjangkau',
                'description' => 'Paket sewa dengan harga bersahabat untuk musisi dan band'
            ]
        ];
        

        $instruments = Instrument::where('status', 'available')
        ->orderBy('created_at', 'desc')
        ->limit(4)
        ->get();
        
        $studios = Studio::where('status', 'available')
        ->orderBy('rating', 'desc')
        ->limit(3)
        ->get();
        
        $rentSteps = [
            [
                'title' => 'Pilih & Pesan',
                'description' => 'Pilih alat musik atau studio yang ingin disewa dan lakukan pemesanan online'
            ],
            [
                'title' => 'Pembayaran',
                'description' => 'Lakukan pembayaran melalui transfer bank atau e-wallet'
            ],
            [
                'title' => 'Konfirmasi',
                'description' => 'Dapatkan konfirmasi pesanan dan jadwal melalui email atau WhatsApp'
            ],
            [
                'title' => 'Ambil/Gunakan',
                'description' => 'Ambil alat musik atau gunakan studio sesuai jadwal yang telah ditentukan'
            ],
        ];
        
        // Data untuk testimoni
        $testimonials = [
            [
                'name' => 'Reza Artamevia',
                'role' => 'Vokalis Band',
                'avatar' => asset('images/testimonial/man.png'),
                'comment' => 'Alat musik yang disewa dari MusikaRent selalu dalam kondisi prima. Sangat membantu untuk penampilan live kami!',
                'rating' => 5
            ],
            [
                'name' => 'Ahmad Dhani',
                'role' => 'Musisi & Produser',
                'avatar' => asset('images/testimonial/man1.png'),
                'comment' => 'Studio premium MusikaRent punya akustik yang luar biasa. Rekaman jadi lebih mudah dan hasil audionya memuaskan.',
                'rating' => 5
            ],
            [
                'name' => 'Astrid Sartiasari',
                'role' => 'Gitaris',
                'avatar' => asset('images/testimonial/woman.png'),
                'comment' => 'Proses pemesanan yang mudah dan pelayanan ramah. Gitar Fender yang saya sewa dalam kondisi sempurna.',
                'rating' => 4
            ],
        ];
        
        // Data untuk kontak
        $contactInfo = [
            [
                'icon' => 'fas fa-map-marker-alt',
                'title' => 'Alamat',
                'value' => 'Jl. Musik Raya No. 42, Jakarta Selatan'
            ],
            [
                'icon' => 'fas fa-phone',
                'title' => 'Telepon/WhatsApp',
                'value' => '+62 812 3456 7890'
            ],
            [
                'icon' => 'fas fa-envelope',
                'title' => 'Email',
                'value' => 'info@musikarent.id'
            ],
        ];
        
        // Set title untuk halaman
        $title = 'Beranda';
        
        // Kirim semua data ke view
        return view('customer.dashboard', compact(
            'siteInfo',
            'heroSection',
            'carouselItems',
            'instruments',
            'studios',
            'rentSteps',
            'testimonials',
            'contactInfo',
            'title'
        ));
    }
}
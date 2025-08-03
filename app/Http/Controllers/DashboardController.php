// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $features = [
            [
                'icon' => 'bolt',
                'title' => 'Pesan Cepat',
                'desc' => 'Proses pemesanan yang mudah dan cepat'
            ],
            // Data lainnya
        ];
        
        return view('dashboard', compact('features'));
    }
}
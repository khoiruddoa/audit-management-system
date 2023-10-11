<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class dashboardController extends Controller
{



    public function index()
    {
        $open = Kegiatan::where('status', '0')->count();
        $onProgress = Kegiatan::where('status', '1')->count();
        $finish =  Kegiatan::where('status', '2')->count();

        return view(
            'dashboard.dashboard',
            [
                'open' => $open,
                'onProgress' => $onProgress,
                'finish' => $finish
            ]
        );
    }
}

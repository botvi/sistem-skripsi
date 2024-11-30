<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranSempro;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DosenPageSemproController extends Controller
{
    public function index()
    {
        // Get the logged-in user ID
        $userId = Auth::id();

        // Fetch seminar proposals where the logged-in user is associated as pembimbing, advisor, or penguji
        $dataSempro = PendaftaranSempro::with(['dosenpembimbing', 'dosenpenguji', 'dosenadvisor', 'mahasiswa'])
            ->where(function ($query) use ($userId) {
                $query->where('pembimbing_id', $userId)
                      ->orWhere('advisor_id', $userId);
            })
            ->get();

        return view('pagedosen.sempro.index', compact('dataSempro'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengantaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:personel');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');

        $jam = date('H');

        if ($jam < 7 && $jam >= 17) {
            $waktu = 'Pagi';
        } else if ($jam >= 7 && $jam < 11) {
            $waktu = 'Siang';
        } else {
            $waktu = 'Sore';
        }

        $pesanan = DB::table('pesanan AS ps')
                    ->join('pembelian AS pb', 'pb.id', 'ps.id_pembelian')
                    ->join('pelanggan AS pl', 'pl.id', 'pb.id_pelanggan')
                    ->join('paket AS pk', 'pk.id', 'pb.id_paket')
                    ->select(
                        'ps.id', 'pl.nama', 'ps.porsi', 'pl.wa', 'pb.lokasi', 'ps.waktu_kirim', 'ps.catatan_pelanggan',
                        'pl.rumah_teks', 'pl.rumah_maps', 'pl.kantor_teks', 'pl.kantor_maps',
                    )
                    ->where('ps.tanggal_kirim', date('Y-m-d', strtotime('today')))
                    ->get();
        
        return view('admin.pengantaran.index', [
            'user' => Auth::guard('personel')->user(),
            'waktu' => $waktu,
            'pesanan' => $pesanan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

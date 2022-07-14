<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Laporan;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //laporan pendapatan
        $january = DB::select("SELECT SUM(total_harga) AS 'total' FROM laporans WHERE MONTH(tanggal)=1 GROUP BY MONTH(tanggal)");
        $february = DB::select("SELECT SUM(total_harga) AS 'february' FROM laporans WHERE MONTH(tanggal)=2 GROUP BY MONTH(tanggal)");
        $maret = DB::select("SELECT SUM(total_harga) AS 'maret' FROM laporans WHERE MONTH(tanggal)=3 GROUP BY MONTH(tanggal)");
        $april = DB::select("SELECT SUM(total_harga) AS 'april' FROM laporans WHERE MONTH(tanggal)=4 GROUP BY MONTH(tanggal)");
        $mei = DB::select("SELECT SUM(total_harga) AS 'mei' FROM laporans WHERE MONTH(tanggal)=5 GROUP BY MONTH(tanggal)");
        $juni = DB::select("SELECT SUM(total_harga) AS 'juni' FROM laporans WHERE MONTH(tanggal)=6 GROUP BY MONTH(tanggal)");
        $juli = DB::select("SELECT SUM(total_harga) AS 'juli' FROM laporans WHERE MONTH(tanggal)=7 GROUP BY MONTH(tanggal)");
        $agustust = DB::select("SELECT SUM(total_harga) AS 'agustust' FROM laporans WHERE MONTH(tanggal)=8 GROUP BY MONTH(tanggal)");
        $september = DB::select("SELECT SUM(total_harga) AS 'september' FROM laporans WHERE MONTH(tanggal)=9 GROUP BY MONTH(tanggal)");
        $oktober = DB::select("SELECT SUM(total_harga) AS 'oktober' FROM laporans WHERE MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
        $november = DB::select("SELECT SUM(total_harga) AS 'november' FROM laporans WHERE MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
        $desember = DB::select("SELECT SUM(total_harga) AS 'desember' FROM laporans WHERE MONTH(tanggal)=12 GROUP BY MONTH(tanggal)");
        //=======================Detail=====================
        $january1 = DB::select("SELECT SUM(jumlah_pesan) AS 'january1' FROM laporans WHERE MONTH(tanggal)=1 GROUP BY MONTH(tanggal)");
        $february2 = DB::select("SELECT SUM(jumlah_pesan) AS 'february2' FROM laporans WHERE MONTH(tanggal)=2 GROUP BY MONTH(tanggal)");
        $maret2 = DB::select("SELECT SUM(jumlah_pesan) AS 'maret2' FROM laporans WHERE MONTH(tanggal)=3 GROUP BY MONTH(tanggal)");
        $april2 = DB::select("SELECT SUM(jumlah_pesan) AS 'april2' FROM laporans WHERE MONTH(tanggal)=4 GROUP BY MONTH(tanggal)");
        $mei2 = DB::select("SELECT SUM(jumlah_pesan) AS 'mei2' FROM laporans WHERE MONTH(tanggal)=5 GROUP BY MONTH(tanggal)");
        $juni2 = DB::select("SELECT SUM(jumlah_pesan) AS 'juni2' FROM laporans WHERE MONTH(tanggal)=6 GROUP BY MONTH(tanggal)");
        $juli2 = DB::select("SELECT SUM(jumlah_pesan) AS 'juli2' FROM laporans WHERE MONTH(tanggal)=7 GROUP BY MONTH(tanggal)");
        $agustust2 = DB::select("SELECT SUM(jumlah_pesan) AS 'agustust2' FROM laporans WHERE MONTH(tanggal)=8 GROUP BY MONTH(tanggal)");
        $september2 = DB::select("SELECT SUM(jumlah_pesan) AS 'september2' FROM laporans WHERE MONTH(tanggal)=9 GROUP BY MONTH(tanggal)");
        $oktober2 = DB::select("SELECT SUM(jumlah_pesan) AS 'oktober2' FROM laporans WHERE MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
        $november2 = DB::select("SELECT SUM(jumlah_pesan) AS 'november2' FROM laporans WHERE MONTH(tanggal)=11 GROUP BY MONTH(tanggal)");
        $desember2 = DB::select("SELECT SUM(jumlah_pesan) AS 'desember2' FROM laporans WHERE MONTH(tanggal)=12 GROUP BY MONTH(tanggal)");
        //------------jumlahorder---------------------------------------------------=============
        $cjanuary = DB::select("SELECT COUNT(*) AS 'cjanuary' FROM laporans WHERE MONTH(tanggal)=1 GROUP BY MONTH(tanggal)");
        $cfebruary = DB::select("SELECT COUNT(*) AS 'cfebruary' FROM laporans WHERE MONTH(tanggal)=2 GROUP BY MONTH(tanggal)");
        $cmaret = DB::select("SELECT COUNT(*) AS 'cmaret' FROM laporans WHERE MONTH(tanggal)=3 GROUP BY MONTH(tanggal)");
        $capril = DB::select("SELECT COUNT(*) AS 'capril' FROM laporans WHERE MONTH(tanggal)=4 GROUP BY MONTH(tanggal)");
        $cmei = DB::select("SELECT COUNT(*) AS 'cmei' FROM laporans WHERE MONTH(tanggal)=5 GROUP BY MONTH(tanggal)");
        $cjuni = DB::select("SELECT COUNT(*) AS 'cjuni' FROM laporans WHERE MONTH(tanggal)=6 GROUP BY MONTH(tanggal)");
        $cjuli = DB::select("SELECT COUNT(*) AS 'cjuli' FROM laporans WHERE MONTH(tanggal)=7 GROUP BY MONTH(tanggal)");
        $cagustust = DB::select("SELECT COUNT(*) AS 'cagustust' FROM laporans WHERE MONTH(tanggal)=8 GROUP BY MONTH(tanggal)");
        $cseptember = DB::select("SELECT COUNT(*) AS 'cseptember' FROM laporans WHERE MONTH(tanggal)=9 GROUP BY MONTH(tanggal)");
        $coktober = DB::select("SELECT COUNT(*) AS 'coktober' FROM laporans WHERE MONTH(tanggal)=10 GROUP BY MONTH(tanggal)");
        $cnovember = DB::select("SELECT COUNT(*) AS 'cnovember' FROM laporans WHERE MONTH(tanggal)=11 GROUP BY MONTH(tanggal)");
        $cdesember = DB::select("SELECT COUNT(*) AS 'cdesember' FROM laporans WHERE MONTH(tanggal)=12 GROUP BY MONTH(tanggal)");
        //===========================
        $jumlahkategori = Kategori::count();
        $jumlahproduk = Produk::count();
        $jumlahorder = DB::select('select count(*) AS jumlahorder from laporans');
        $jumlahpelanggan = User::where('is_admin', 'false')->count();
        $Admin = DB::select("select count(is_admin) As 'admin' from users where is_admin=1");
        $laporan = Laporan::paginate(5);
        return view('pages.dashboard', compact(
            'jumlahkategori', 'jumlahpelanggan', 'jumlahproduk', 'jumlahorder', 'laporan', 'january', 'february', 'maret', 'april', 'mei', 'juni', 'juli', 'agustust', 'september', 'oktober', 'november', 'desember', 'january1', 'cjanuary', 'february2', 
            'cfebruary', 'maret2', 'cmaret', 'april2', 'capril', 'mei2', 'cmei', 'juni2', 'cjuni', 'juli2', 'cjuli', 'agustust2', 'cagustust', 'september2', 'cseptember', 'oktober2', 'coktober',
            'november2', 'cnovember', 'desember2', 'cdesember'
        ));
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

<?php

namespace App\Http\Controllers;

use App\Models\binance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class keuanganController extends Controller
{
    public function index()
    {

        return view('page.home');
    }

    public function keuangan()
    {
        $date = Carbon::now()->toDateString();
        $data = Binance::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $pemasukan = $data->where('type', 'pemasukan');
        $pengeluaran = $data->where('type', 'pengeluaran');

        $pms_kerja = $pemasukan->where('category', 'Kerja')->pluck('total')->sum();
        $pms_bisnis = $pemasukan->where('category', 'Bisnis')->pluck('total')->sum();
        $pms_freelance = $pemasukan->where('category', 'Freelance')->pluck('total')->sum();
        $pms_pemberian = $pemasukan->where('category', 'Pemberian')->pluck('total')->sum();
        $pms_penjualan = $pemasukan->where('category', 'Penjualan')->pluck('total')->sum();
        $pms_lainya = $pemasukan->where('category', 'Lainya')->pluck('total')->sum();

        $total_pemasukan = $pemasukan->pluck('total')->sum();

        $chartPemasukan = (new LarapexChart)->donutChart()
            ->addData([$pms_kerja, $pms_bisnis, $pms_freelance, $pms_pemberian, $pms_penjualan, $pms_lainya])
            ->setTitle('Pemasukan')
            ->setSubtitle('Tahun 2024')
            ->setHeight(400)
            ->setWidth(400)
            ->setLabels(['Kerja', 'Bisnis', 'Freelance', 'Pemberian', 'Penjualan', 'Lainya']);

        $png_makan = $pengeluaran->where('category', 'Makan')->pluck('total')->sum();
        $png_tansportasi = $pengeluaran->where('category', 'Transportasi')->pluck('total')->sum();
        $png_jalan = $pengeluaran->where('category', 'Jalan-Jalan')->pluck('total')->sum();
        $png_handpone = $pengeluaran->where('category', 'Handpone')->pluck('total')->sum();
        $png_peliharaan = $pengeluaran->where('category', 'Peliharaan')->pluck('total')->sum();
        $png_lainya = $pengeluaran->where('category', 'Lainya')->pluck('total')->sum();

        $total_pengeluaran = $pengeluaran->pluck('total')->sum();

        $total_akhir_tabungan = $total_pemasukan - $total_pengeluaran;

        $chartPengeluaran = (new LarapexChart)->donutChart()
            ->addData([$png_makan, $png_tansportasi, $png_jalan, $png_handpone, $png_peliharaan, $png_lainya])
            ->setTitle('Pengeluaran')
            ->setSubtitle('Tahun 2024')
            ->setHeight(400)
            ->setWidth(400)
            ->setLabels(['Makan', 'Transportasi', 'Jalan-Jalan', 'Handpone', 'Peliharaan', 'Lainya']);

        return view('page.keuangan', compact('data', 'date', 'pemasukan', 'pengeluaran', 'chartPemasukan', 'chartPengeluaran', 'total_akhir_tabungan'));
    }

    public function pemasukan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "date" => "required",
            "total" => "required|min:2",
            "category" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('gagal', 'Gagal memasukan data! Coba lebih teliti saat mengisi');
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['type'] = "pemasukan";

        binance::create($data);

        return redirect()->back()->with('berhasil', 'Berhasil menambahkan data!');
    }

    public function pengeluaran(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "date" => "required",
            "total" => "required|min:2",
            "category" => "required",
            "desc" => "required"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('gagal', 'Gagal memasukan data! Coba lebih teliti saat mengisi');
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['type'] = "pengeluaran";

        binance::create($data);

        return redirect()->back()->with('berhasil', 'Berhasil menambahkan data!');
    }

    public function delete($id)
    {
        binance::where('id', $id)->delete();

        return redirect()->back()->with('gagal', 'Berhasil hapus data!');
    }
}

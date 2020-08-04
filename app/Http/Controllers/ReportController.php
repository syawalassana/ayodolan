<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Transaksi;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.transaksi', [
            'data' => Transaksi::orderBy('created_at', 'DESC')->paginate(),
        ]);
    }

    public function export()
    {
        return Excel::download(new TransaksiExport, 'Transaksi ' . date('d-m-Y') . '.xlsx');
    }

    public function print()
    {
        return view('report.cetak', [
            'data' => Transaksi::orderBy('created_at', 'DESC')->get(),
        ]);
    }
}

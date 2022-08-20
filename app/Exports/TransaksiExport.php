<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection {
    public function collection() {
        return DB::table('transaksi')
        ->select('tgl', 'nominal', 'name')
        ->leftJoin('jenis_channel', 'transaksi.jenis_channel', '=', 'jenis_channel.channel')
        ->orderBy('user_id', 'DESC')
        ->get();
    }
}

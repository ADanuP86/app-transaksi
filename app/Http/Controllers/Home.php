<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class Home extends Controller {
    public function index() {
		$transaksi = DB::table('transaksi')
        ->leftJoin('jenis_channel', 'transaksi.jenis_channel', '=', 'jenis_channel.channel')
        ->orderBy('user_id', 'DESC')
        ->get();

		return view('home',[
            "title" => "Home | Transaksi",
            'transaksi'=>$transaksi
        ]);
	}
 
	public function export_excel() {
		return Excel::download(new TransaksiExport, 'transaksi.xlsx');
	}
    
    public function tambah() {
        $channel = DB::table('jenis_channel')->get();
	
	    return view('tambah', [
            "title" => "Tambah Data",
            'channel' => $channel
        ]);
    }

    public function store(Request $request) {
        DB::table('transaksi')->insert([
            'tgl' => $request->tgl,
            'nominal' => $request->nominal,
            'jenis_channel' => $request->jenis_channel
	    ]);
	
	    return redirect('/');
    }

    public function edit($user_id) {
        $channel = DB::table('jenis_channel')->get();
        $transaksi = DB::table('transaksi')
            ->leftJoin('jenis_channel', 'transaksi.jenis_channel', '=', 'jenis_channel.channel')
            ->where('user_id',$user_id)
            ->get();

	    return view('edit', [
            "title" => "Edit Data",
            'transaksi' => $transaksi,
            'channel' => $channel
        ]);
    }

    public function update(Request $request) {
        DB::table('transaksi')
        ->where('user_id',$request->user_id)->update([
            'tgl' => $request->tgl,
            'nominal' => $request->nominal,
            'jenis_channel' => $request->jenis_channel
        ]);
	
	    return redirect('/');
    }

    public function hapus($user_id) {
	    DB::table('transaksi')->where('user_id',$user_id)->delete();
	
	    return redirect('/');
    }

    public function report(Request $request) {
        if(empty($request->tgl_awal) && (empty($request->tgl_akhir))) {
        $transaksi = DB::table('transaksi')
            ->leftJoin('jenis_channel', 'transaksi.jenis_channel', '=', 'jenis_channel.channel')
            ->select('name', DB::raw('count(jenis_channel) as total, sum(nominal) as jumlah'))
            ->groupBy('name')
            ->get();

        $chart = DB::table('transaksi')
            ->leftJoin('jenis_channel', 'transaksi.jenis_channel', '=', 'jenis_channel.channel')
            ->select('tgl', DB::raw('count(*) as total'))
            ->groupBy('tgl')
            ->get();
        } 
        else {
        $transaksi = DB::table('transaksi')
            ->leftJoin('jenis_channel', 'transaksi.jenis_channel', '=', 'jenis_channel.channel')
            ->select('name', DB::raw('count(jenis_channel) as total, sum(nominal) as jumlah'))
            ->whereDate('tgl', '>=', $request->tgl_awal)
            ->whereDate('tgl', '<=', $request->tgl_akhir)
            ->groupBy('name')
            ->get();

        $chart = DB::table('transaksi')
            ->leftJoin('jenis_channel', 'transaksi.jenis_channel', '=', 'jenis_channel.channel')
            ->select('tgl', DB::raw('count(*) as total'))
            ->whereDate('tgl', '>=', $request->tgl_awal)
            ->whereDate('tgl', '<=', $request->tgl_akhir)
            ->groupBy('tgl')
            ->get();
        }
        
        return view('report', [
            "title" => "Home | Data Report",
            'transaksi' => $transaksi,
            'chart' => $chart,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir
        ]);
    }

}

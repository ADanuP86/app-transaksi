@extends('layouts.main')

@section('container')

<h3>Tambah Data Transaksi</h3>
 
	<a href="/" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
	
	<br/>
	<br/>
	
	<form action="/store" method="post">
		{{ csrf_field() }}
		<div class="mb-3 col-5">
		  <label>Tanggal</label>
		  <input type="date" class="form-control" name="tgl" id="tgl" value="<?php echo date("Y-m-d") ?>" required="required">
		</div>

		<div class="form-group mb-3 col-5">
			<label>Jenis Channel</label>
			<select name="jenis_channel" id="jenis_channel" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong.')" oninput="setCustomValidity('')">
			  <option value="" selected disabled>--Pilih--</option>
				 @foreach ($channel as $c)
			  <option value=" {{ $c->channel }} "> {{$c->name}} </option>
				 @endforeach
			</select>
		</div>

		<div class="mb-3 col-5">
		  <label>Nominal</label>
		  <input type="number" class="form-control" name="nominal" id="nominal" required="required">
		</div>

		<button type="submit" class="btn btn-info btn-sm">Submit</button>
	</form>

@endsection

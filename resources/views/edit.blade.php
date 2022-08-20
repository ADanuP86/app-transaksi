@extends('layouts.main')

@section('container')

<h3>Edit Data Transaksi</h3>
 
	<a href="/" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($transaksi as $tr)
	<form action="/update" method="post">
		{{ csrf_field() }}
		<div class="mb-3 col-5">
		  <label>Tanggal</label>
		  <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ $tr->user_id }}">
		  <input type="date" class="form-control" name="tgl" id="tgl" value="{{ $tr->tgl }}" required="required">
		</div>

		<div class="form-group mb-3 col-5">
			<label>Jenis Channel</label>
			<select name="jenis_channel" id="jenis_channel" class="form-control" required="required">
			  	<option value="{{ $tr->channel }}">{{ $tr->name }}</option>
				@foreach ($channel as $c)
			  	<option value="{{ $c->channel }}">{{$c->name}}</option>
				@endforeach
			</select>
		</div>

		<div class="mb-3 col-5">
		  <label>Nominal</label>
		  <input type="number" class="form-control" name="nominal" id="nominal" value="{{ $tr->nominal }}" required="required">
		</div>

		<button type="submit" class="btn btn-info btn-sm">Submit</button>
	</form>
	@endforeach

@endsection

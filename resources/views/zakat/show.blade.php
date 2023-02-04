@extends('admin')

@section('konten')
	<div id_zakat="zakat">
		<h2>Detail Konten</h2>

		<table class="table table-striped">
			<tr>
				<th>Judul</th>
				<td>{{ $zakat->jumlah }}</td>
			</tr>
           
		</table>
	</div>
@stop
@extends('admin')

@section('konten')
	<div id_post="post">
		<h2>Detail Konten</h2>

		<table class="table table-striped">
			<tr>
				<th>Judul</th>
				<td>{{ $post->title }}</td>
			</tr>
			<tr>
				<th>Deskripsi</th>
                <td>{{$post->deskripsi}}</td>
			</tr>
			<tr>
				<th>Gambar</th>
				<td>
					@if(isset($post->gambar))
						<img src="{{ asset('gambarUpload/' . $post->gambar) }}" height="auto" width="200">
					@endif
				</td>
            </tr>
            <tr>
				<th>Campaigner</th>
                <td> {{$post->kategori}}</td>
            </tr>
            
            <tr>
				<th>Kategori</th>
                <td> {{$post->id_category}}</td>
            </tr>
            
            <tr>
				<th>Artikel</th>
                <td>{{$post->artikel}}</td>
			</tr>
			<tr>
				<th>komentar</th>
                <td>{{$post->komentar}}</td>
			</tr>
			<tr>
				<th>batas waktu</th>
                <td>{{$post->end_date}}</td>
			</tr>
		</table>
	</div>
@stop
@extends('layouts.css')

@section('content')
 {{ $blog->title }}
@endsection

@section('og')
<meta property="og:title" content="{{ $blog->title }}" />
<meta property="og:image" content="{{ $blog->gambar }}" />
<meta property="og:type" content="website" />
@endsection
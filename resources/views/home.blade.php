@extends('layouts.mainlayout') 

@section('title', 'Home')

@section('content')
	<h1>Ini Halaman Home</h1>
	<h2>Selamat Datang, {{Auth::user()->name}}. Role Anda {{Auth::user()->role->name}}</h2>
@endsection
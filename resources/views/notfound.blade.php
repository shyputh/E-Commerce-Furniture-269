@extends('_layout')
@section('title', '404 — RUMASELI')
@section('content')
<div style="min-height:60vh;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:4rem 5%">
  <span class="subtitle">404</span>
  <h1 style="font-family:var(--serif);font-size:3.5rem;margin-bottom:1rem">Halaman tidak ditemukan.</h1>
  <p style="color:var(--muted);font-size:.95rem;margin-bottom:2.5rem;max-width:420px;line-height:1.7">
    Sepertinya halaman yang Anda cari sudah dipindahkan atau tidak pernah ada.
  </p>
  <a href="/" class="btn">Kembali ke Beranda</a>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <section class="profile-card overflow-hidden rounded-md border border-zinc-200 bg-white">
        <div class="grid gap-0 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="bg-zinc-100 p-5 sm:p-8">
                <div class="overflow-hidden rounded-md bg-white p-3 shadow-sm">
                    <img src="https://zal.pages.dev/img/rizal-img.webp" alt="Foto Rizal Suryawan" class="aspect-square w-full rounded-md object-cover">
                </div>
                <div class="mt-4 rounded-md bg-white p-4">
                    <p class="text-sm font-semibold text-zinc-500">Project Owner</p>
                    <p class="mt-1 text-lg font-bold text-zinc-950">RIZAL SURYAWAN</p>
                </div>
            </div>

            <div class="flex flex-col justify-center p-6 sm:p-8">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase text-emerald-700">Contact</span>
                    <span class="rounded-full bg-zinc-100 px-3 py-1 text-xs font-semibold uppercase text-zinc-600">Tugas UAS Rekayasa Web</span>
                </div>

                <h1 class="mt-5 text-3xl font-bold leading-tight text-zinc-950 sm:text-4xl">RIZAL SURYAWAN</h1>
                <p class="mt-3 max-w-xl text-sm leading-6 text-zinc-600">Mahasiswa dan pemilik project katalog produk kerajinan tangan untuk kebutuhan tugas UAS.</p>

                <dl class="mt-7 grid gap-3 sm:grid-cols-2">
                    <div class="rounded-md border border-zinc-200 bg-zinc-50 p-4">
                        <dt class="text-sm text-zinc-500">Kelas</dt>
                        <dd class="mt-1 font-semibold text-zinc-950">03SIFE003</dd>
                    </div>
                    <div class="rounded-md border border-zinc-200 bg-zinc-50 p-4">
                        <dt class="text-sm text-zinc-500">Role</dt>
                        <dd class="mt-1 font-semibold text-zinc-950">Project Owner</dd>
                    </div>
                </dl>

                <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                    <a href="https://zal.pages.dev" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-800">Website</a>
                    <a href="https://id.linkedin.com/in/rizal-suryawan/in" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center rounded-md border border-zinc-300 px-4 py-2.5 text-sm font-semibold text-zinc-700 hover:bg-zinc-50">LinkedIn</a>
                </div>
            </div>
        </div>
    </section>
@endsection

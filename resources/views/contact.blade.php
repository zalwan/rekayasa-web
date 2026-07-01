@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <section class="grid gap-6 rounded-md border border-zinc-200 bg-white p-6 sm:p-8 md:grid-cols-[0.8fr_1.2fr]">
        <div>
            <img src="https://zal.pages.dev/img/rizal-img.webp" alt="Foto Rizal Suryawan" class="aspect-square w-full max-w-sm rounded-md object-cover">
        </div>

        <div class="flex flex-col justify-center">
            <p class="text-sm font-semibold uppercase text-emerald-700">Contact</p>
            <h1 class="mt-3 text-3xl font-bold text-zinc-950">RIZAL SURYAWAN</h1>
            <dl class="mt-6 space-y-4 text-sm">
                <div>
                    <dt class="text-zinc-500">Kelas</dt>
                    <dd class="mt-1 font-medium text-zinc-950">03SIFE003</dd>
                </div>
                <div>
                    <dt class="text-zinc-500">Web</dt>
                    <dd class="mt-1">
                        <a href="https://zal.pages.dev" target="_blank" rel="noopener noreferrer" class="font-medium text-blue-600 hover:text-blue-700">https://zal.pages.dev</a>
                    </dd>
                </div>
                <div>
                    <dt class="text-zinc-500">Social</dt>
                    <dd class="mt-1">
                        <a href="https://id.linkedin.com/in/rizal-suryawan/in" target="_blank" rel="noopener noreferrer" class="font-medium text-blue-600 hover:text-blue-700">LinkedIn Rizal Suryawan</a>
                    </dd>
                </div>
            </dl>
        </div>
    </section>
@endsection

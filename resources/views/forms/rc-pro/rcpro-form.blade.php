@extends('app')

@section('content')
    @include('partials.navbar')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        @include('partials.nav-breadcrumbs')
        <h1 class="text-2xl mt-12">Responsabilité civile professionnelle</h1>
        <form action="{{ route('quote.form')  }}" method="POST" class="bg-white shadow-lg rounded-lg w-full mt-6 px-6 py-5 divide-y-[1px]">
            @csrf
            {{-- Personnal information related stuff here --}}
            @include('forms.rc-pro.parts.personal-section')

            {{-- Compagny related stuff here --}}
            @include('forms.rc-pro.parts.company-section')

            {{-- Assurance converage related stuff here --}}
            @include('forms.rc-pro.parts.assuranceCoverage-section')

            <div class="pt-5 pb-2 mt-4 w-full flex items-center">
                <button type="submit" class="bg-indigo-500 rounded-lg ml-auto text-white px-6 py-3 block transition-all hover:scale-105">Je souhaite obtenir un devis</button>
            </div>
        </form>
    </main>
@endsection

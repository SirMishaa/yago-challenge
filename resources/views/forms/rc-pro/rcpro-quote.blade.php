@extends('app')

@section('content')
    @include('partials.navbar')
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        @include('partials.nav-breadcrumbs')
        <h1 class="text-2xl mt-12">Responsabilité civile professionnelle</h1>
        <div class="bg-white shadow-lg rounded-lg w-full mt-6 px-6 py-5 divide-y-[1px]">
            <ul>
                <li>
                    Utilisateur lead : {{ $quote->userLead->first_name }} {{ $quote->userLead->last_name }}
                </li>
                <li>
                    Quote id : {{ $quote->id }}
                </li>
                <li>
                    Coverage celling : {{ $quote->coverage_ceiling }} €
                </li>
                <li>
                    After delivery : {{ $quote->after_delivery }} €
                </li>
                <li>
                    After liability : {{ $quote->after_liability }} €
                </li>
                <li>
                    Professional indemnity : {{ $quote->professional_indemnity }} €
                </li>
                <li>
                    Entrusted Objects : {{ $quote->entrusted_objects }} €
                </li>
                <li>
                    Legal expenses : {{ $quote->legal_expenses }} €
                </li>
            </ul>
        </div>
    </main>
@endsection

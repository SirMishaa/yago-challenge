<?php

namespace App\Http\Controllers;

use App\Dto\ProfessionalLiability\GetQuoteRequestDTO;
use App\Enum\ProfessionalLiability\CoverageCeilingFormulaEnumeration;
use App\Http\Requests\GetQuoteRequest;
use App\Services\ProfessionalLiabilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuoteController extends Controller {

    public function handleForm(GetQuoteRequest $request, ProfessionalLiabilityService $professionalLiabilityService): RedirectResponse
    {

        ray($request->getNaceBelCode());

        $quoteRequest = new GetQuoteRequestDTO([
            'annualRevenue' => (int) $request->get('companyAnnualIncome'),
            'enterpriseNumber' => $request->get('companyNumber'),
            'legalName' => $request->get('companyName'),
            'naturalPerson' => $request->get('companyType') !== 'Société (personne morale)',
            'nacebelCodes' => $request->getNaceBelCode(),
            'deductibleFormula' => $request->get('assuranceCeilingCoverage'),
            'coverageCeilingFormula' => CoverageCeilingFormulaEnumeration::Large
        ]);

        $responseData = $professionalLiabilityService->getQuote($quoteRequest);
        ray($responseData);

        return redirect()->route('quote.form')->with('Hello');
    }

    public function renderForm(): View
    {
        return view('forms.rc-pro.rcpro-form');
    }
}


<?php

namespace App\Http\Controllers;

use App\Dto\ProfessionalLiability\GetQuoteRequestDTO;
use App\Enum\ProfessionalLiability\CoverageCeilingFormulaEnumeration;
use App\Http\Requests\GetQuoteRequest;
use App\Models\Quote;
use App\Services\ProfessionalLiabilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuoteController extends Controller {

    public function handleForm(GetQuoteRequest $request, ProfessionalLiabilityService $professionalLiabilityService): RedirectResponse
    {
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
        if (!$responseData["success"]) {
            throw new \Error('Something went wrong');
        }

        $quote = new Quote();

        $quote->user_lead_id = 1;
        $quote->available = $responseData['data']['available'];
        $quote->coverage_ceiling = $responseData['data']['coverageCeiling'];
        $quote->deductible = $responseData['data']['deductible'];
        $quote->quote_id = $responseData['data']['quoteId'];
        $quote->after_delivery = $responseData['data']['grossPremiums']['afterDelivery'];
        $quote->after_liability = $responseData['data']['grossPremiums']['publicLiability'];
        $quote->professional_indemnity = $responseData['data']['grossPremiums']['professionalIndemnity'];
        $quote->entrusted_objects = $responseData['data']['grossPremiums']['entrustedObjects'];
        $quote->legal_expenses = $responseData['data']['grossPremiums']['legalExpenses'];

        ray($quote);
        $quote->save();

        return redirect()->route('quote.summary', ['id' => $quote->id]);
    }

    public function renderForm(): View
    {
        return view('forms.rc-pro.rcpro-form');
    }

    public function renderQuote(int $id): View | RedirectResponse
    {
        $quote = Quote::whereId($id)->first();

        if (is_null($quote)) {
            return redirect()->route('quote.form');
        }

        return view('forms.rc-pro.rcpro-quote', ['quote' => $quote]);
    }
}


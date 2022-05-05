<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'firstName' => 'required|min:2|max:50',
            'lastName' => 'required|min:2|max:50',
            'phoneNumber' => 'required',
            'email' => 'required|email:rfc',
            'companyName' => 'required|min:3|max:255',
            'companyNumber' => 'digits:10',
            'companyAnnualIncome' => 'numeric',
            'companyType' => 'required',
            'companyActivityKind' => 'required',
            // Todo : improve validation
            'companyNaceBelCode' => 'required',
            'assuranceCeilingCoverage' => 'required',
            'assuranceLegalExpense' => 'required'
        ];
    }

    public function getNaceBelCode(): array
    {
        $trimStr = str_replace(' ', '', $this->get('companyNaceBelCode'));
        return explode(",", $trimStr);
    }
}

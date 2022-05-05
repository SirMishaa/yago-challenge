<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetQuoteRequest;

class QuoteController extends Controller {

    public function handleForm(GetQuoteRequest $request)
    {
        $formData = $request->validated();
        dd($formData);
    }
}

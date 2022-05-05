<?php

use function Pest\Laravel\get;

it('should return 200 HTTP code', function () {

    get(route('quote.form'))->assertStatus(200);

});

<?php

use function Pest\Laravel\get;

it('should return 200 HTTP code', function () {

    get('/')->assertStatus(200);

});

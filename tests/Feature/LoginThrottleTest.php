<?php

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Cache;

beforeEach(function () {
    // Clear relevant throttles
    Cache::flush();
});

it('blocks login after too many attempts', function () {
    $data = ['nik' => '0000000000000000', 'password' => 'wrong'];

    for ($i = 0; $i < 6; $i++) {
        $response = $this->post(route('login.post'), $data);
    }

    $response->assertSessionHasErrors('nik');
});

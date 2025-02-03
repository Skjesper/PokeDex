<?php

declare(strict_types=1);

namespace tests\Http;


use PHPUnit\Framework\TestCase;
use App\Http\Request;

class RequestTest extends TestCase {

    public function test_get_uri() {
        $_SERVER['REQUEST_URI'] = 'pokemon/1';
        $this->assertSame('pokemon/1', Request::uri());
    }
}
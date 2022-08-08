<?php

namespace App\Tests\Unit\Src;

use App\Domain\CPF;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase
{
    public function testInvalidDocumentShouldReceiveAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Invalid document');
        
        new CPF('123.123.123-12');
    }

    public function testDocumentShouldBeAString(): void
    {
        $cpf = new CPF('15196832602');
        $this->assertSame('15196832602', (string) $cpf);
    }
}
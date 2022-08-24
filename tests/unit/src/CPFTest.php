<?php

namespace App\Tests\Unit\Src;

use App\Domain\ValueObjects\CPF;
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
        $cpf = new CPF('12312312312');
        $this->assertSame('12312312312', (string) $cpf);
    }
}
<?php

namespace App\Tests\Unit\Src;

use App\Domain\Entity\CPF;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase
{
    public function testInvalidDocumentShouldReceiveAnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Invalid document');
        
        new CPF('151968326022');
    }

    public function testDocumentShouldBeAString(): void
    {
        $cpf = new CPF('151.968.326-02');
        $this->assertSame('151.968.326-02', (string) $cpf);
    }
}
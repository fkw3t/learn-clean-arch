<?php

namespace App\Tests\Unit\Src;

use App\Domain\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testInvalidEmailShouldReceiveAnException(): void
    {
        
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Invalid e-mail address');
        
        new Email('invalid.mail.asd');
    }

    public function testEmailShouldBeAString(): void
    {
        $email = new Email('somemail@mail.com');
        $this->assertSame('somemail@mail.com', (string) $email);
    }
}
<?php

namespace Tests\Unit\Command;
use PHPUnit\Framework\TestCase;


abstract class GetCommandAbstract extends TestCase {

    protected $email;
    protected $password;
    protected function setUp(): void
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(dirname(dirname(dirname(__DIR__))));
        $dotenv->load();

        $this->email = $_ENV['PHPUNIT_API_EMAIL'];
        $this->password = $_ENV['PHPUNIT_API_PASSWORD'];
    }
}

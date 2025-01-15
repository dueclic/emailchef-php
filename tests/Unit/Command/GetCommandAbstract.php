<?php

namespace Tests\Unit\Command;
use PHPUnit\Framework\TestCase;


abstract class GetCommandAbstract extends TestCase {

    protected $email;
    protected $password;
    protected function setUp(): void
    {

        $phpunit_api_email = getenv('PHPUNIT_API_EMAIL');
        $phpunit_api_password = getenv('PHPUNIT_API_PASSWORD');

        if (!$phpunit_api_email && !$phpunit_api_password) {
            $dotenv = \Dotenv\Dotenv::createImmutable(dirname(dirname(dirname(__DIR__))));
            $dotenv->load();
            $phpunit_api_email = $_ENV['PHPUNIT_API_EMAIL'];
            $phpunit_api_password = $_ENV['PHPUNIT_API_PASSWORD'];
        }

        $this->email = $phpunit_api_email;
        $this->password = $phpunit_api_password;
    }
}

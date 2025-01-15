<?php

namespace Tests\Unit\Command;
use PHPUnit\Framework\TestCase;


abstract class GetCommandAbstract extends TestCase {

    protected $email;
    protected $password;
    protected $consumer_key;
    protected $consumer_secret;
    protected function setUp(): void
    {

        $phpunit_api_email = getenv('PHPUNIT_API_EMAIL');
        $phpunit_api_password = getenv('PHPUNIT_API_PASSWORD');
        $phpunit_consumer_key = getenv('PHPUNIT_CONSUMER_KEY');
        $phpunit_consumer_secret = getenv('PHPUNIT_CONSUMER_SECRET');


        if (!$phpunit_api_email && !$phpunit_api_password) {
            $dotenv = \Dotenv\Dotenv::createImmutable(dirname(dirname(dirname(__DIR__))));
            $dotenv->load();
            $phpunit_api_email = $_ENV['PHPUNIT_API_EMAIL'];
            $phpunit_api_password = $_ENV['PHPUNIT_API_PASSWORD'];
            $phpunit_consumer_key = $_ENV['PHPUNIT_CONSUMER_KEY'];
            $phpunit_consumer_secret = $_ENV['PHPUNIT_CONSUMER_SECRET'];
        }

        $this->email = $phpunit_api_email;
        $this->password = $phpunit_api_password;
        $this->consumer_key = $phpunit_consumer_key;
        $this->consumer_secret = $phpunit_consumer_secret;
    }
}

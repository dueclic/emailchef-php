<?php


namespace Tests\Unit\Command;

use EMailChef\Command\Api\GetAccountCurrentCommand;


require dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';

class GetAccountCurrentCommandTest extends GetCommandAbstract
{
    /**
     * @group apicalls
     * @throws \Exception
     */
    public function testExecute()
    {


        $c = new GetAccountCurrentCommand();
         $result = $c->execute(
             [
                 'consumerKey' => $this->consumer_key,
                 'consumerSecret' => $this->consumer_secret
             ]
         );
        $this->assertIsObject($result, 'Check if response is object');
        $this->assertObjectHasProperty('email', $result, 'Check if response contains account property');
    }
}

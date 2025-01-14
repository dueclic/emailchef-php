<?php


namespace Tests\Unit\Command;

use EMailChef\Command\Api\GetAuthenticationTokenCommand;


require dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';

class GetAuthenticationTokenCommandTest extends GetCommandAbstract
{
    /**
     * @group apicalls
     * @throws \Exception
     */
    public function testExecute()
    {


        $c = new GetAuthenticationTokenCommand();
        $result = $c->execute($this->email, $this->password);
        $this->assertIsString($result);
    }
}

<?php

namespace GuzzleHttp\Tests\Command;

use GuzzleHttp\Command\CommandException;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

/**
 * @covers \GuzzleHttp\Command\CommandException
 */
class CommandExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testHasData()
    {
        $request = new Request('GET', '/');
        $response = new Response(200);
        $previous = new \Exception('bar');
        $client = $this->getMockForAbstractClass('GuzzleHttp\\Command\\ServiceClientInterface');
        $command = $this->getMockForAbstractClass('GuzzleHttp\\Command\\CommandInterface');
        $e = new CommandException(
            'foo',
            $client,
            $command,
            $request,
            $response,
            $previous
        );
        $this->assertSame($client, $e->getClient());
        $this->assertSame($command, $e->getCommand());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame($request, $e->getRequest());
        $this->assertSame($response, $e->getResponse());
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: longw
 * Date: 2018/7/5
 * Time: 22:09
 */

declare(strict_types=1);

namespace Rc;

use Psr\Http\Message\ResponseInterface;

class HelloWorld
{
    private $foo;

    private $response;

    public function __construct(
        string $foo,
        ResponseInterface $response
    )
    {
        $this->foo = $foo;
        $this->response = $response;
    }

    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()
            ->write("<html><head></head><body>Hello, {$this->foo} world!</body></html>");

        return $response;
    }
}
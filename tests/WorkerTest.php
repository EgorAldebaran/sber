<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\InfoService;

class WorkerTest extends KernelTestCase
{
    public function testWorker(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        $myCustomService = static::getContainer()->get(InfoService::class);
        
    }
}

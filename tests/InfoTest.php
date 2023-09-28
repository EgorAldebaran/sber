<?php  

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contract\HttpClient\HttpClientInterface;
use App\Service\InfoService;

class InfoTest extends KernelTestCase
{
    /**
    * @var ContainerInterface
    */
    protected $container;
    
    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->container = static::getContainer();
    }

    public function testInfo()
    {
        $myservice = $this->container->get(InfoService::class);
        //$myservice = $this->container->get('info_service');
        var_dump ($myservice->duckSystem());
    }
}

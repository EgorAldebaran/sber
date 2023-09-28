<?php  

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contract\HttpClient\HttpClientInterface;
use App\Service\RedisService;
use App\Service\InfoService;

class MagicTest extends KernelTestCase
{
    /**
    * @var ContainerInterface
    */
    protected $container;

    /**
    * @var RedisService
    */
    public $redis;

    /**
    * @var InfoService
    */
    private $info;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->assertSame('test', $kernel->getEnvironment());
        $this->container = static::getContainer();
        $this->info = $this->container->get(InfoService::class);

        
    }

    public function testPower()
    {
        //$kernel = self::bootKernel();
        //$this->container = static::getContainer();
        //$this->redis = $this->container->get(RedisService::class);

        var_dump ($this->info);die();

        $system = [];

        while (true) {
            $number = rand(10, 2);
            $system[] = $number;

            if (array_sum($system) >= 100) {
                break;
            }
        }

        $hostname = "127.0.0.1";
        $port = "6379";

        //$myservice = $this->container->get(InfoService::class);
        var_dump ($this->info);

        $redis = RedisService::getInstance($hostname, $port);


        //$redis->rawCommand('LPUSH', 'queue', 'doing jacke diamonds');
        //        $redis->rawCommand('LPUSH', 'queue', 'doing queen hearts');
        //        $redis->rawCommand('LPUSH', 'queue', 'doing king clubs');
        //        $redis->rawCommand('LPUSH', 'queue', 'doing dolly my dolores');

        var_dump ($redis);
    }

}

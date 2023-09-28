<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use CBR\CurrencyDaily;
use CBR\Request;
use App\Command\SberCommand;

class SberTest extends KernelTestCase
{
    private $date;
	private $codes;
	private $codes_type;
	private $result;
	private $result_date;

    /**
    * @var ContainerInterface
    */
    protected $container;

    /**
    * @var SberCommand
    */
    protected $sberWorker;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->assertSame('test', $kernel->getEnvironment());
        $this->container = static::getContainer();
        $this->sberWorker = $this->container->get(SberCommand::class);
    }
    
    public function request()
    {
        $this->result = (new Request(Request::URL_CUR_DAILY, [
            'date_req' => ((empty($this->date)) ? null : $this->date)
        ]))->request();

        return $this;
    }
    
    public function currency(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();

        $sberWorker = $container->get(SberCommand::class);


        $this->assertSame('test', $kernel->getEnvironment());

        try {

            if (date('N') < 6) { // если не суббота и не воскресенье
                $yesterday = date('d/m/Y', strtotime('-1 day')); // получаем вчерашнюю дату
                //echo $yesterday; // выводим дату
            }
            
            $handler = new CurrencyDaily;
            $result = $handler
                    //->setDate('20/07/2015') // Опционально, дата в формате "d/m/Y"
                    ->setDate($yesterday) // Опционально, дата в формате "d/m/Y"
                    //->setCodes(['USD', 'EUR']) // Опционально, фильтр по кодам валют
                    //->setCodes(['840', '978']) Или можно так
                    ->request() // Выполнение запроса
                    ->getResult();

            var_dump ($result['KZT']);
            var_dump (count($result));
            var_dump ('---info kungfu--');
            
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        var_dump ('---kungfu---');
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);

        var_dump ($sberWorker);
    }

    public function testPrototype()
    {
        
    }
}

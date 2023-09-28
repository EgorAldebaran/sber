<?php  

namespace App\Service;

class RedisService
{
    /**
    * @var hostname
    * @var port
    * @return Redis
    */
    static public function getInstance(string $host, string $port): \Redis
    {
        $redis = new \Redis;
        $redis->connect($host, $port);

        return $redis;
    }

}

<?php

/**
 * Created by PhpStorm.
 * User: arifbudiman
 * Date: 9/9/17
 * Time: 10:06 PM
 */

use Phalcon\Di;

class DailyWeightModel
{
    protected $redis;

    public function __construct()
    {
        $this->redis = new RedisLibrary('redisserver:6379');
    }

    public function setWeight($hash, $date, $value)
    {
        $this->redis->hSet($hash, $date, $value);
        return $this->getWeightByDate( $hash, $date);
    }

    public function getWeightByDate($hash, $date)
    {
        return json_decode($this->redis->hGet($hash, $date), true);
    }

    public function getAllWeight($hash)
    {
        $result = [];
        $data = $this->redis->hGetAll($hash);
        foreach ($data as $key => $val){
            $result[$key] = json_decode($val, true);
        }
        return $result;
    }

    public function deleteWeight($hash, $date)
    {
        $this->redis->hDel($hash, $date);
    }
}
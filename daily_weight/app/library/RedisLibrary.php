<?php

class RedisLibrary
{
    /** @var \Redis */
    private $redis;

    public function __construct($redisHost)
    {;
        $tmp = explode(":", $redisHost);
        $this->redis = $this->instantiateRedis($tmp[0], $tmp[1], 10, isset($tmp[2]) ? $tmp[2] : null);
    }

    public function getRedisInstance()
    {
        return $this->redis;
    }

    public function hSet($hashname = "dailyweight", $id, $data, $json_option = JSON_UNESCAPED_SLASHES)
    {
        return $this->redis->hSet($hashname, $id, json_encode($data, $json_option));
    }

    public function hDel($hashname = "dailyweight", $id)
    {
        return $this->redis->hDel($hashname, $id);
    }

    public function hGet($hashname = "dailyweight", $id)
    {
        try {
            $result = json_decode($this->redis->hGet($hashname, $id));
        } catch (\RedisException $e) {
            if (in_array(trim($e->getMessage()), [
                'Redis is LOADING the dataset',
                'socket error on read socket'
            ])) {
                $result = json_decode($this->redis->hGet($hashname, $id));
            }
            else {
                throw $e;
            }
        }

        return $result;
    }

    public function hMGet($hashname = "dailyweight", $ids, $is_string = FALSE) {
        try {
            $result = $this->redis->hMGet($hashname, $ids);
            if (!$is_string) {
                foreach ($result as $k => $v) {
                    $result[$k] = json_decode($v);
                }
            }
        } catch (\RedisException $e) {
            if (in_array(trim($e->getMessage()), [
                'Redis is LOADING the dataset',
                'socket error on read socket'
            ])) {
                $result = $this->redis->hMGet($hashname, $ids);
                if (!$is_string) {
                    foreach ($result as $k => $v) {
                        $result[$k] = json_decode($v);
                    }
                }
            }
            else {
                throw $e;
            }
        }

        return $result;
    }

    public function hGetAll($hashname = "dailyweight")
    {
        $result = $this->redis->hGetAll($hashname);
        $result = array_map(function($value){
            return json_decode($value);
        },$result);
        return $result;
    }

    private function instantiateRedis($host, $port, $timeout, $pass)
    {
        $redis = new \Redis();
        $redis->connect($host, $port, $timeout);
        if (!empty($pass)) {
            $redis->auth($pass);
        }
        return $redis;
    }
}
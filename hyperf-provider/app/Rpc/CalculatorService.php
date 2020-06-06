<?php


namespace App\Rpc;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * 注意，如希望通过服务中心来管理服务，需在注解内增加 publishTo 属性
 * @RpcService(name="CalculatorService", protocol="jsonrpc-http", server="jsonrpc-http" ,publishTo="consul")
 */
class CalculatorService implements CalculatorServiceInterface
{
    public function add(int $a, int $b) : int
    {
        return $a +$b;
    }
}
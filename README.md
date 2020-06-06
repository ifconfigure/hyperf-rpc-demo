# hyperf-rpc-demo
Hyperf RPC Demo - 基于Hyperf下json-RPC的Demo

### Step 1 - 安装并启动consul

- 安装consul，并设置全局可访问

- 新建consul目录，在consul目录下新建etc和data文件夹

- 在etc下新建provider.json，并填入如下内容

```
{
    "service": {
        //这里写服务的ID，必须唯一
        "id": "CalculatorService",
        
        //这里写服务名称，一般也是ID名，非唯一
        "name": "CalculatorService",
        
        //服务提供者的IP地址，服务在哪台服务器上，就填写那台服务器IP
        "address": "127.0.0.1",
        
        //随便写
        "tags": [
            "webapi"
        ],
        
        //填写服务提供者的端口，
        "port": 9502
    }
}
```

启动命令：

`consul agent -dev -ui -config-dir=./etc -data-dir=./data -client=0.0.0.0`

### Step 2 - 启动服务提供者
```
- 切换到hyperf-provider目录
- 执行composer install
- php bin/hyperf.php start
```

回过神来思考一下，留意config配置文件夹内的
```
- autoload/consul.php
- autoload/server.php
```

前者配置了注册到consul的地址，后者配置了服务提供的端口和地址，是不是就和provider.json的配置对应上了，这样consul就能发现到服务提供者了

### Step 3 - 启动服务消费者

```
- 切换到hyperf-consumer目录
- 执行composer install
- php bin/hyperf.php start
```

访问：http://127.0.0.1:9503

### Done
## Swoole-coroutine

[**docker-hub**](https://hub.docker.com/r/twosee/swoole-coroutine/) 

[**github**](https://github.com/twose/swoole-coroutine-docker)

### Usage

```Bash
docker pull twosee/swoole-coroutine
docker pull twosee/swoole-coroutine:mysql
docker pull twosee/swoole-coroutine:redis
```
```Bash
docker run -d --name=swoole \
 -v /workdir:/workdir \
 -p 9501:9501 \
 twosee/swoole-coroutine \
 php /app/server.php start
```
OR
```Bash
docker-compose up


- Based on PHP7.3-cli
- use swoole 1.*, 2.* and 4.*(libco) latest stable version, All functions are fully open
- Provide the perfect partner for Swoole such as ` MySQL`, `Redis`, `Inotify` images, you can also use `docker-compose`, Out of the box.
- PHP extension installed: ["GD", "iconv", "pdo_mysql", "dom", "xml", "curl", "swoole"]
- enable ["coroutine", "openssl", "http2", "async-redis", "mysqlnd", "swoole-serialize"]
- this container has no PHP code or framework included
- Asia/Shanghai timezone default (you can remove it on the last RUN line)
- Inotify provides hot auto updates and other support

### Version

| DIR      | INTRO                                                | Tag     |
| -------- | ---------------------------------------------------- | ------- |
| /master  | Latest master version (Experimental type)            | latest  |
| /mysql   | It's a perfect MySQL8's docker                       | mysql   |
| /mysql5  | It's a perfect MySQL5's docker                       | mysql5  |
| /redis   | It's a perfect Redis's docker                        | redis   |
| /inotify | inotify, composer, git, node, to support hot updates | inotify |
| /release | Latest release version                               | release |
| /1.x-lts | Latest version from branch 1.x-lts                   | 1.x-lts |
| /2.x-lts | Latest version from branch 1.x-lts                   | 2.x-lts |

### Docker-compose

Swoole + mysql + redis

```yaml
version: '3.4'
services:
  swoole:
    image: "twosee/swoole-coroutine"
    ports:
      - "9501:9501"
    volumes:
      - ./src:/app/src:rw
    restart: always
    depends_on:
      - mysql
    command: php /app/src/server.php start

  mysql:
    image: "twosee/swoole-coroutine:mysql"
    ports:
      - "9502:3306"
    volumes:
      - ./data/mysql/data:/var/lib/mysql:rw
      - ./data/mysql/sock:/var/run/mysqld:rw # remove when windows.
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root_password_here
      MYSQL_DATABASE: test
      MYSQL_USER: php
      MYSQL_PASSWORD: php_user_password_here
    
  redis:
    image: "twosee/swoole-coroutine:redis"
    ports:
      - "9503:6379"
    volumes:
      - ./data/redis/data:/var/lib/redis:rw
    sysctls:
        net.core.somaxconn: 65535
    restart: always

  inotify:
    image: "twosee/swoole-coroutine:inotify"
    volumes:
      - ./:/app:rw
    restart: always
    environment:
      APP_ENV: dev # or product
    working_dir: /app/util
    command: /bin/bash inotify.sh
```
You can see [mysqld.cnf](https://github.com/twose/swoole-coroutine-docker/tree/master/mysql).

```php
$options = [
  'host'     => 'mysql', //So there.
  'port'     => 3306,
  'user'     => 'php',
  'password' => 'php_user_password_here',
  'database' => 'test'
];
$db = new \Swoole\Coroutine\Mysql();
$db->connect($options);
```
You can see [redis.conf](https://github.com/twose/swoole-coroutine-docker/tree/master/redis).
```php
$redis = new \Swoole\Coroutine\Redis();
$redis->connect('redis', 6379);
$val = $redis->get('foo');
```

ใช้ร่วมกับ blink framework
ใช้ docker-compose -f docker-compose-blink.yml up -d


# PHP Tutorial
## Create a Docker Network
```docker network create php-mysql-network```

## Start MySQL-Container
```docker run -d \
  --name my-mysql \
  --network php-mysql-network \
  -e MYSQL_ROOT_PASSWORD=xl6-die-weisse-des-wals \
  -e MYSQL_DATABASE=MySQL-DB \
  -p 3306:3306 \
  mysql:latest```

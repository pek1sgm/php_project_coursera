# PHP Tutorial
## Create a Docker Network
```
docker network create php-mysql-network
```
## Start MySQL-Container
```
docker run --name mysql_container --network php_mysql_net -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -v mysql_data:/var/lib/mysql -d mysql:latest
```
## Build Docker-Image for PHP 
(Run the command in the folder containing the Dockerfile)
```
docker build -t custom-php-mysql .
```
## Start the PHP-Container
```
docker run --name php_container --network php_mysql_net -p 8080:80 -v $(pwd)/html:/var/www/html -d custom-php-mysql
```
## Test if setup is correct
```
http://localhost:8080
```


# Important Docker Commands
List images: ```docker images```
Delete specific image: ```docker rmi <image_id>```
Delete all images: ```docker rmi $(docker images -q)```

List running container: ```docker ps```
List all container: ```docker ps -a```
Delete specific container: ```docker rm <container_id>```
Delete all stopped container: ```docker container prune```
Delete all container: ```docker rm $(docker ps -aq)```

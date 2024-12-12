# PHP and MySQL Dockerized Project

This project demonstrates how to set up a PHP development environment using Docker and MySQL. You can automate the process using `docker-compose` or manually follow the setup instructions.

---

## Table of Contents
1. [Quick Setup with Docker Compose](#1-quick-setup-with-docker-compose)
2. [Manual Setup](#2-manual-setup)
3. [Testing the Setup](#3-testing-the-setup)
4. [Important Docker Commands](#4-important-docker-commands)

---

## 1. Quick Setup with Docker Compose

Follow these steps to set up the environment using `docker-compose`:

1. Clone this repository to your local machine:
   ```bash
   git clone https://github.com/pek1sgm/php_project_coursera.git
   cd php_project_coursera
   ```

2. Ensure your project folder structure is correct:
   ```
   project-folder/
   ├── docker-compose.yml
   ├── Dockerfile
   ├── db-init/
   │   └── init-database.sql
   └── html/
       └── (PHP files, e.g., index.php)
   ```

3. Start the environment:
   ```bash
   docker-compose up --build
   ```

4. The environment will:
   - Build a PHP container with Apache and MySQL support.
   - Start a MySQL container and create a `test` database automatically.

5. Visit your application at:
   ```
   http://localhost:8080
   ```

6. Stop the running container with **Ctrl+C** or by using the Docker application.

---

## 2. Manual Setup

If you prefer to set up the environment manually, follow these steps:

### Step 1: Create a Docker Network
Create a network for PHP and MySQL:
```bash
docker network create php-mysql-network
```

---

### Step 2: Start MySQL Container
Start the MySQL container and connect it to the network:
```bash
docker run --name mysql_container --network php-mysql-network -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -v mysql_data:/var/lib/mysql -d mysql:latest
```

---

### Step 3: Build the Docker Image for PHP
Build the PHP Docker image (run this command in the folder containing the `Dockerfile`):
```bash
docker build -t custom-php-mysql .
```

---

### Step 4: Start the PHP Container
Start the PHP container and connect it to the network:
```bash
docker run --name php_container --network php-mysql-network -p 8080:80 --mount type=bind,src=<local-html-folder>,dst=/var/www/html -d custom-php-mysql
```

---

### Step 5: Create the `test` Database
1. Connect to the MySQL container:
   ```bash
   docker exec -it mysql_container mysql -u root
   ```

2. Create the `test` database:
   ```sql
   CREATE DATABASE test;
   EXIT;
   ```

---

## 3. Testing the Setup

Once the environment is running, visit the following URL in your browser:
```
http://localhost:8080
```

---

## 4. Important Docker Commands

### Images
- **List images**:
  ```bash
  docker images
  ```
- **Delete a specific image**:
  ```bash
  docker rmi <image_id>
  ```
- **Delete all images**:
  ```bash
  docker rmi $(docker images -q)
  ```

---

### Containers
- **List running containers**:
  ```bash
  docker ps
  ```
- **List all containers (including stopped)**:
  ```bash
  docker ps -a
  ```
- **Delete a specific container**:
  ```bash
  docker rm <container_id>
  ```
- **Delete all stopped containers**:
  ```bash
  docker container prune
  ```
- **Delete all containers**:
  ```bash
  docker rm $(docker ps -aq)
  ```

---

### Networks
- **List networks**:
  ```bash
  docker network ls
  ```
- **Inspect a specific network**:
  ```bash
  docker network inspect <network_name>
  ```

---
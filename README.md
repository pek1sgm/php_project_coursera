# **PHP Tutorial**

### **1. Create a Docker Network**
Create a network for PHP and MySQL:
```bash
docker network create php-mysql-network
```

---

### **2. Start MySQL Container**
Start the MySQL container and connect it to the network:
```bash
docker run --name mysql_container --network php-mysql-network -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -v mysql_data:/var/lib/mysql -d mysql:latest
```

---

### **3. Build the Docker Image for PHP**
Build the PHP Docker image (run this command in the folder with the Dockerfile):
```bash
docker build -t custom-php-mysql .
```

---

### **4. Start the PHP Container**
Start the PHP container and connect it to the network:
```bash
docker run --name php_container --network php-mysql-network -p 8080:80 --mount type=bind,src=C:\code\php_project_coursera\html,dst=/var/www/html -d custom-php-mysql
```

---

### **5. Create a 'test' Database in the MySQL Container**
#### Connect to the MySQL container:
```bash
docker exec -it mysql_container mysql -u root
```
#### Create the 'test' database:
```sql
CREATE DATABASE test;
EXIT;
```

---

### **6. Test the Setup**
Visit the following address in your browser to verify the setup:
```
http://localhost:8080
```

---

# **Important Docker Commands**

### **Images**
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

### **Containers**
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

### **Networks**
- **List networks**:  
  ```bash
  docker network ls
  ```
- **Inspect a specific network**:  
  ```bash
  docker network inspect <network_name>
  ```

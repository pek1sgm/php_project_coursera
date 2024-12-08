# **PHP Tutorial**

### **1. Create a Docker Network**
Erstelle ein Netzwerk für PHP und MySQL:
```bash
docker network create php-mysql-network
```

---

### **2. Start MySQL-Container**
Starte den MySQL-Container und verbinde ihn mit dem Netzwerk:
```bash
docker run --name mysql_container \
  --network php-mysql-network \
  -e MYSQL_ALLOW_EMPTY_PASSWORD=yes \
  -v mysql_data:/var/lib/mysql \
  -d mysql:latest
```

---

### **3. Build Docker-Image for PHP**
Baue das PHP-Docker-Image (führe diesen Befehl im Ordner mit der `Dockerfile` aus):
```bash
docker build -t custom-php-mysql .
```

---

### **4. Start the PHP-Container**
Starte den PHP-Container und verbinde ihn mit dem Netzwerk:
```bash
docker run --name php_container \
  --network php-mysql-network \
  -p 8080:80 \
  -v $(pwd)/html:/var/www/html \
  -d custom-php-mysql
```

---

### **5. Test if Setup is Correct**
Rufe folgende Adresse im Browser auf, um das Setup zu testen:
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
- **Delete specific image**:  
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
- **Delete specific container**:  
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

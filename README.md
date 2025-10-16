# phpServer

PHP + MySQL Development Environment (Docker)

This guide explains how to quickly set up and run a lightweight local PHP + MySQL development environment using Docker.
By the end, you’ll be able to view and develop PHP sites locally at:

http://localhost

1. Setup
Create your local project folder

Open your terminal and create a directory for your environment:

mkdir -p ~/sites/phpServer/www
cd ~/sites/phpServer

2. Add the Files

Your folder structure should look like this:

phpServer/
│
├── www/
│   └── index.php
└── docker-compose.yml

Example index.php

Create a simple PHP test file inside the www/ folder:

<?php
phpinfo();
?>

Example docker-compose.yml

Add the following:

services:
  php:
    image: php:8.2-apache
    restart: always
    ports:
      - "80:80"
    volumes:
      - ./www:/var/www/html/

  mysql:
    image: mysql:8
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: mydatabase
    ports:
      - "3306:3306"
    volumes:
      - db_data:/var/lib/mysql

volumes:
  db_data:

3. Start the Environment

From your project folder (~/sites/phpServer), run:

docker-compose up -d


This will:

Download the required Docker images (first time only)

Start your PHP + MySQL containers in the background

4. Open Your Site

Once the containers are running, open your browser and visit:

http://localhost

If your www folder contains an index.php file, you’ll see your PHP site load successfully.


5. Database Access

Your MySQL database is available on your local machine:

Setting	Value
Host	127.0.0.1
Port	3306
User	root
Password	root
Default DB	mydatabase

If connecting from PHP (PDO), use:

$db = new PDO('mysql:host=mysql;dbname=mydatabase', 'root', 'root');

Note: The hostname inside Docker is mysql (the service name).


6. Managing Containers
Command	Description
docker-compose up -d	Start environment in background
docker-compose down	Stop all containers
docker ps	List running containers
docker-compose exec php bash	Access PHP container shell
docker-compose exec mysql bash	Access MySQL container shell

7. Rebuilding Containers

If you ever change the docker-compose.yml file, rebuild with:

docker-compose up --build -d


8. Shutting Down

When you’re done working, safely stop everything with:

docker-compose down


Your MySQL data is stored in a Docker volume (db_data) and will persist between restarts.

Summary
Purpose	Command / URL
Start environment	docker-compose up -d
Stop environment	docker-compose down
Website	http://localhost

Database host (for PHP)	mysql
MySQL credentials	root / root
Persistent data	Docker volume db_data

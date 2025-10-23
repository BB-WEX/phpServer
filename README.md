# phpServer
## PHP + MySQL Development Environment (Docker)

This guide explains how to quickly set up and run a lightweight local PHP + MySQL development environment using Docker.
By the end, you’ll be able to develop and run multiple PHP projects locally at:

http://localhost/

## 1. Setup

- Clone the Repository
- Open your terminal and clone the project repository:
```
git clone git@github.com:BB-WEX/phpServer.git ~/sites/phpServer
cd ~/sites/phpServer
```
**Replace your-username with your GitHub username or the repository URL.**


##  2. Project Structure

The www/ folder acts as your workspace for multiple PHP projects:

```
www/
├── my_new_app/
│   └── index.php
├── another_app/
│   └── index.php
└── ...
```

Each project should live in its own folder under www/. eg:
```
mkdir -p www/my_new_app
echo "<?php phpinfo(); ?>" > www/my_new_app/index.php
```

**You can add as many projects as you like — each will be accessible in the browser.**

## 3. Start the Environment

From the project folder (~/sites/phpServer), run:

`docker-compose up -d
`

This will:

- Download the required Docker images (first time only)
- Start your PHP + MySQL containers in the background

## 4. Access Your Sites

- Once the containers are running:
- Open your browser at http://localhost/
- Access each project by its folder name:
```
http://localhost/my_new_app
http://localhost/another_app
```

##  5. Show a Directory of All Projects

By default, Apache returns 403 Forbidden when no index.php is found in www/.
If you’d rather see a list of all project folders, enable directory listings:

1. **Create a .htaccess file in www/**
-  Inside the www/ folder, create a file named .`htaccess` with the following content:
`Options +Indexes
`

2. **Restart the PHP container**
 `docker-compose restart php`

**Now, when you visit http://localhost/, you’ll see a directory listing of all project folders in www/.**

## 6. Database Access
Your MySQL database is available on your local machine:

```
Host | 127.0.0.1
Port | 3306
User | root
Password | root
Default DB | mydatabase
```

## 7. Managing Containers

Start environment in background:

`docker-compose up -d`

Stop all containers:

`docker-compose down`

List running containers:

`docker ps`

Access PHP container shell:

`docker-compose exec php bash`

Access MySQL container shell:

`docker-compose exec mysql bash `

### 8. Rebuilding Containers

If you change the docker-compose.yml file, rebuild with:

`docker-compose up --build -d`

### 9. Shutting Down

Stop everything safely with:

`docker-compose down
`

**Your MySQL data is stored in a Docker volume (db_data) and will persist between restarts.**

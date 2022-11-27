# Projet-Blog
## Context
For the purpose of a school project, we have 2 weeks to create a blog in PHP using the MVC architecture.

## Getting started
After cloning the repository:
```
cd app
composer install
cd ..
```

After installing composer dependecies, to start the project you need to use docker.  
Enter this command from the terminal :
```
docker compose up -d
```

### To access the site
`http://localhost:2020`


## To access database with Adminer
```
http://localhost:8080

System : PostgreSQL  
Server : db  
User : root  
Password : password  
Database : blog
```

If you use an external database management software, use the port : `1010`

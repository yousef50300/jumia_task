# Jumia Task


## Notes

I'm not make crud operations for all actions just make for (buses - routes - trips - users)

and List cities

Also i considered that every bus has 12 seat so to make task simple  
when every bus created i will create 12 seat for it 



## Installation manual

1) Download repo


2) Install packages by running this command in your terminal/cmd:
```
composer install
```

3) copy .env.example to .env file :
```
cp .env.example .env
```

4) set database credentials


5) run following commands :
```
php artisan key:generate
php artisan migrate --seed
```

6) run project :
```
php artisan serve
```

## Docker Installation

1) Download repo


2) build docker compose file using :
```
docker-compose build
```

3) run container using  :
```
docker-compose up
```

4) access project on port 8000 :
```
http://localhost:8000/dashboard
```

5) access phpmyadmin on port 3000 :
```
http://localhost:3000
```

6) database credentials  :
```
    User     : homestead
    Password : secret
```

### admin dashboard :
```
    Link     : {app_url}/dashboard
    Email     : admin@admin.com
    Password : 123456
```

### test user credentials for api :
```
    Email     : user@example.com
    Password : 123456
```

## notes
There are postman collection on project files.

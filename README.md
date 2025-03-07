1. Open your terminal
git clone https://github.com/ramseyjiang/lara-11-docker-demo.git

2. Go to the clone folder
docker-compose up -d --build

3. After all dockers are created, ho into docker
docker exec -it lara_11_app_demo bash

4. Do migration and seed database.
docker exec -it lara_11_app_demo php artisan migrate
docker exec -it lara_11_app_demo php artisan migrate:refresh --seed
docker exec -it lara_11_app_demo php artisan db:seed --class=ProductSeeder

5. Start php artisan server on port 8000
php artisan serve --host=0.0.0.0 --port=8000
http://0.0.0.0:8000/debug
http://0.0.0.0:8000

6. Access mysqladmin, which is on port 8080
http://0.0.0.0:8080/

7. Check route list and all tests work
docker exec -it lara_11_app_demo php artisan route:list
docker exec -it lara_11_app_demo php artisan test

8. Use curl to check all product requests

GET:
curl -X GET http://localhost:8000/api/products

POST:
curl -X POST http://localhost:8000/api/products \
     -H "Content-Type: application/json" \
     -d '{"name": "Laptop", "price": 1500, "stock": 10, "description":"asdas"}'

PUT:
curl -X PUT http://localhost:8000/api/products/1 \
     -H "Content-Type: application/json" \
     -d '{"name": "Updated Laptop", "price": 1800}'

DELETE:
curl -X DELETE http://localhost:8000/api/products/1

n. remove all dockers
docker-compose down --volumes

The below can execute directly outside the docker. These commands are used during create the project.

docker exec -it lara_11_app_demo php artisan make:migration create_products_table

docker exec -it lara_11_app_demo php artisan migrate

docker exec -it lara_11_app_demo php artisan install:api    // make sure the api can be access, it will change the bootstrap/app.php

docker exec -it lara_11_app_demo php artisan make:model Product

docker exec -it lara_11_app_demo php artisan make:controller api/ProductController --api

docker exec -it lara_11_app_demo php artisan make:test api/ProductTest --unit

docker exec -it lara_11_app_demo php artisan make:test api/ProductTest

docker exec -it lara_11_app_demo php artisan make:factory ProductFactory

docker exec -it lara_11_app_demo php artisan make:seeder ProductSeeder

docker exec -it lara_11_app_demo php artisan migrate:refresh --seed

docker exec -it lara_11_app_demo php artisan db:seed --class=ProductSeeder

docker exec -it lara_11_app_demo php artisan route:clear

docker exec -it lara_11_app_demo php artisan cache:clear

docker exec -it lara_11_app_demo php artisan config:clear



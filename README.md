# Technical Test for TheGrint App
This test contains the solution for the technical test for TheGrint App.

The technical test is in the following path: `technical-test-thegrint-app.pdf`

## Installation
1. Clone the repository `git clone https://github.com/alexlatam/the-grint-app.git`
2. Run `composer install`
3. Create a copy of the `.env.example` file and rename it to `.env` and set the database credentials
4. Run server `./vendor/bin/sail up -d`
5. Run `./vendor/bin/sail artisan migrate --seed`
6. Execute the tests `./vendor/bin/sail test`
7. Execute the tests with coverage `./vendor/bin/sail test --caverage`
8. Access the application in the browser at `http://localhost:8080`

## API Endpoints
- Login `POST /api/login`
- Register `POST /api/register`
- Get All Advertisement `GET /api/advertisements?show_all=1&status=new&keyword=et&category_id=2&min_price=10&max_price=500`
- Create Advertisement `POST /api/advertisements`
- Delete Advertisement `DELETE /api/advertisements/{advertisement}`

## Postman Collection
The collection file is in the root of the project. `TheGrint-Api.postman_collection.json`


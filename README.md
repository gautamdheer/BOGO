# BOGO Offer Laravel Application

This project implements a "Buy One Get One Free" (BOGO) offer logic in a Laravel application. The application is containerized using Docker and Docker Compose.

## Offer Rules

### Offer Rule 1

- For each pair, the second product can be equal to or less than the price of the first product.
- Sort the product prices in descending order.
- Iterate through the sorted list, pairing each product with the next available product that is less than or equal to its price.

### Offer Rule 2

- The second product must be less than the price of the first product.
- Sort the product prices in descending order.
- Iterate through the sorted list, pairing each product with the next available product that is strictly less than its price.

### Offer Rule 3

- Customers can buy two products and get two products for free as long as the price of the product is less than the price of the first product.
- Sort the product prices in descending order.
- Iterate through the sorted list, pairing two products with the next two available products that are less than their prices.

## Step 4: Build and Run Docker Containers

Build the Docker images and start the containers:

```sh
docker-compose up --build -d
```

Install Laravel dependencies using Composer inside the Docker container:

```sh
docker-compose exec app composer install
```

Generate the Laravel application key:
```sh
docker-compose exec app php artisan key:generate
```

Run database migrations if needed:
```sh
docker-compose exec app php artisan migrate
```


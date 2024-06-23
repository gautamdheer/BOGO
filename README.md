## Offer Rule 1:

For each pair, the second product can be equal to or less than the price of the first product.
Sort the product prices in descending order.
Iterate through the sorted list, pairing each product with the next available product that is less than or equal to its price.

## Offer Rule 2:
The second product must be less than the price of the first product.
Sort the product prices in descending order.
Iterate through the sorted list, pairing each product with the next available product that is strictly less than its price.

## Offer Rule 3:
Customers can buy two products and get two products for free as long as the price of the product is less than the price of the first product.
Sort the product prices in descending order.
Iterate through the sorted list, pairing two products with the next two available products that are less than their prices.

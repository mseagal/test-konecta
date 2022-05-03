# Test-Konecta - Requisitos
- Composer ^2.0.11
- PHP ^8.0
- El proyecto está en Laravel 9

# Paso 1 (BD)
Crear base de datos llamada 'test_konect'

# Paso 2 (.env)
Crear archivo .env, puedes copiar el contenido del archivo .env.example

# Paso 3 (Dependencias)
ejecutar `composer install`

# Paso 4 (App Key)
ejecutar `php artisan key:generate`

# Paso 5 (Migrate)
ejecutar `php artisan migrate --seed`

# Paso 6 (Run server)
finalmente `php artisan serve`

# Consultas SQL
- Producto que más stock tiene `SELECT * FROM products ORDER BY stock DESC LIMIT 1;`
- Producto más vendido: 
`SELECT products.id, products.name as product_name, SUM(sales.quantity) AS total FROM sales
INNER JOIN products ON sales.product_id = products.id
GROUP BY products.id desc
ORDER BY total desc
LIMIT 1`

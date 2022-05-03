# Test-Konecta
Prueba técnica

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

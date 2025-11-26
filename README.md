Sistema para administrar una barbería.

1️⃣ Clona el repositorio
git clone <URL_DEL_REPOSITORIO>
cd Laravel-BarberShop

2️⃣ Instala las dependencias de PHP
composer install

3️⃣ Configura el archivo .env

Copia el archivo de ejemplo:

cp .env.example .env

Genera la clave de la app:

php artisan key:generate

En el archivo .env, ajusta los datos de tu base de datos:

DB_DATABASE

DB_USERNAME

DB_PASSWORD

4️⃣ Instala dependencias del Frontend (opcional, pero recomendable)
npm install && npm run build

5️⃣ Crea las tablas y datos de prueba
php artisan migrate --seed

6️⃣ Inicia el servidor local
php artisan serve


-Usuario Administrador de Prueba-

Correo: admin@barbershop.com
Contraseña: password
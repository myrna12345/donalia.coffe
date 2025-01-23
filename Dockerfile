# Gunakan PHP 8.2 sebagai base image
FROM php:8.2-cli

# Update dan install dependensi yang dibutuhkan
RUN apt-get update && apt-get install -y libssl-dev unzip git

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Salin file aplikasi kamu ke dalam container
COPY . /var/www/html/

# Tentukan direktori kerja
WORKDIR /var/www/html

# Install dependensi PHP dengan Composer
RUN composer install --no-dev --optimize-autoloader

# Install dependensi frontend dengan npm (jika diperlukan)
RUN npm install && npm run prod

# Perintah untuk menjalankan aplikasi PHP
CMD ["php", "-S", "0.0.0.0:8080"]

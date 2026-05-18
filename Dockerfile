FROM php:8.2-cli

# Instala a extensão mysqli
RUN docker-php-ext-install mysqli

WORKDIR /app
COPY . .

CMD ["php", "-S", "0.0.0.0:8080", "-t", "src"]
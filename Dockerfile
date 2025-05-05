FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

# Install dependencies
RUN apk add --no-cache \
    bash \
    curl \
    git \
    zip \
    unzip \
    nodejs \
    npm \
    libzip-dev \
    oniguruma-dev \
    postgresql-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring zip

# Build frontend assets with Vite
RUN npm install && npm run build

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

RUN echo "Installing npm packages..." && \
    curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install --prefix /var/www/html && \
    npm run build -- --manifest --prefix /var/www/html && \
    npm install --save-dev vite laravel-vite-plugin && \
    npm install --save-dev @vitejs/plugin-vue
    
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
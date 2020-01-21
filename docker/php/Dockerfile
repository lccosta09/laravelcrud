FROM php:7.2-fpm
 
RUN docker-php-ext-install mysqli

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y \
		libmcrypt-dev \
    && pecl install mcrypt-1.0.2 \
    && docker-php-ext-enable mcrypt

RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
	&& docker-php-ext-configure zip --with-libzip \
	&& docker-php-ext-install zip

RUN apt-get update && apt-get install -y \
		libicu-dev \
	&& docker-php-ext-configure intl \
	&& docker-php-ext-install intl

RUN apt update && apt install -y git

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'c5b9b6d368201a9db6f74e2611495f369991b72d9c8cbd3ffbc63edff210eb73d46ffbfce88669ad33695ef77dc76976') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html/laravel_crud
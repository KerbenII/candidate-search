FROM php:8.0-fpm

COPY wait-for-it.sh /usr/bin/wait-for-it

RUN chmod +x /usr/bin/wait-for-it


RUN apt-get update && apt-get install -y \
        build-essential \
         curl \
         git \
         htop \
         ncdu \
         netcat \
         net-tools \
         telnet \
         unzip \
         vim \
         wget

#librabbitmq-dev
RUN apt-get install -y libssl-dev bash-completion
RUN docker-php-ext-install pdo_mysql


RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip

RUN  apt install -y zlib1g-dev libpng-dev && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install gd
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/candidate-search-app

CMD cd /var/www/candidate-search-app; composer install;  php-fpm


EXPOSE 9000




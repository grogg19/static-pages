FROM alpine

RUN apk update
RUN apk add mc
RUN apk add openrc
RUN ln -sf /sbin/openrc-init /sbin/init

RUN apk add nginx
RUN mkdir -p /run/nginx

RUN apk add php8-fpm \
php8-soap php8-openssl php8-gmp php8-pdo_odbc php8-json \
php8-dom php8-pdo php8-zip php8-mysqli php8-sqlite3 \
php8-pdo_pgsql php8-bcmath php8-gd php8-odbc php8-pdo_mysql \
php8-pdo_sqlite php8-gettext php8-xmlreader \
php8-bz2 php8-iconv php8-pdo_dblib php8-curl php8-ctype php8-mbstring

RUN apk add nano

RUN rc-update add nginx default
RUN rc-update add php-fpm8 default

COPY nginx-site.conf /etc/nginx/http.d/default.conf

COPY --chown=www-data:www-data . /home/www

WORKDIR /home/www

EXPOSE 80

ENTRYPOINT ["/sbin/init"]
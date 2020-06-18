FROM php:7.1-fpm-alpine

#Default
RUN apk add bash supervisor openssl-dev $PHPIZE_DEPS autoconf g++ make

COPY supervisord.conf /etc/
COPY entrypoint.sh /srv/commands.sh

RUN chmod +x /srv/commands.sh

WORKDIR /var/www/html

# ENTRYPOINT [ "php-fpm" ]
ENTRYPOINT ["/srv/commands.sh"]

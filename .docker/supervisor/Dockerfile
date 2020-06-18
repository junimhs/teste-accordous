FROM php:7.3.6-fpm-alpine3.9

#Default
RUN apk add bash supervisor openssl-dev $PHPIZE_DEPS autoconf g++ make

COPY supervisord.conf /etc/
COPY entrypoint.sh /srv/commands.sh

RUN chmod +x /srv/commands.sh

WORKDIR /var/www

# ENTRYPOINT [ "php-fpm" ]
ENTRYPOINT ["/srv/commands.sh"]

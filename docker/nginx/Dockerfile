FROM nginx:latest

RUN mkdir -p /etc/nginx/conf.d/ && \
    mkdir -p /etc/nginx/ssl/

COPY ./demo.conf /etc/nginx/conf.d/demo.conf
COPY ./self-signed.crt /etc/nginx/ssl/self-signed.crt
COPY ./self-signed.key /etc/nginx/ssl/self-signed.key

# RUN rm /etc/nginx/conf.d/default.conf
# RUN echo "upstream php-fpm { server php-fpm:9000; }" > /etc/nginx/conf.d/upstream.conf

RUN usermod -u 1000 www-data
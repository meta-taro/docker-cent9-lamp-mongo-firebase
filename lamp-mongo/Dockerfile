# CentOS Stream 9 ベースの LAMP + PHP 環境（curl競合に注意）
FROM quay.io/centos/centos:stream9

# PHP 8.2 + FPM + 必須ツールをRemiリポジトリ経由で導入
RUN dnf -y install dnf-utils epel-release && \
    dnf -y install https://rpms.remirepo.net/enterprise/remi-release-9.rpm && \
    dnf module reset php -y && \
    dnf module enable php:remi-8.2 -y && \
    dnf -y install --allowerasing \
        httpd php php-fpm php-cli php-common php-devel php-pear gcc make \
        php-mysqlnd php-pdo php-gd php-mbstring php-xml unzip curl git autoconf \
        zlib-devel libxml2-devel openssl-devel libcurl-devel && \
    pecl install mongodb && \
    echo "extension=mongodb.so" > /etc/php.d/20-mongodb.ini && \
    pecl install grpc && \
    echo "extension=grpc.so" > /etc/php.d/20-grpc.ini && \
    sed -i 's|^listen = .*|listen = 127.0.0.1:9000|' /etc/php-fpm.d/www.conf && \
    dnf clean all

# Composerインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && \
    composer --version

# 作業ディレクトリ
WORKDIR /var/www/html

# lamp-mongo/wwwの中身を先に入れて…
COPY lamp-mongo/www /var/www/html

# PHPアプリケーションを examples からコピー
COPY ../examples/lamp-mongo-php /var/www/html

# Firestore などの PHP ライブラリをインストール
RUN composer install

# Apache + PHP-FPM 連携設定
RUN echo 'ServerName localhost' >> /etc/httpd/conf/httpd.conf && \
    echo 'ProxyPassMatch ^/(.*\.php)$ fcgi://127.0.0.1:9000/var/www/html/$1' > /etc/httpd/conf.d/php-fpm.conf && \
    mkdir -p /run/php-fpm

CMD php-fpm -D && /usr/sbin/httpd -D FOREGROUND

EXPOSE 80

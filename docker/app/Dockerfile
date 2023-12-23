# ベースイメージの指定
FROM php:8.2-fpm

# 作成した設定ファイルをコンテナ内にコピー
COPY ./docker/app/php.ini /usr/local/etc/php/php.ini

# パッケージのインストール
RUN apt-get update \
    && apt-get -y install git zip unzip vim \
    wget xz-utils

RUN docker-php-ext-install pdo_mysql mysqli

RUN apt-get -y install libzip-dev \
    && docker-php-ext-install zip

RUN apt-get install -y zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev libwebp-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd

RUN apt-get install -y ffmpeg 

RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash -
RUN apt-get install -y nodejs


# composerのインストール
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# 開発環境でpythonを動かしたいだけ
# RUN apt-get install -y python3-pip
# RUN pip3 install mysql-connector-python
# RUN pip3 install beautifulsoup4
# RUN pip3 install requests
# RUN pip3 install gspread
# RUN pip3 install lxml


# コンテナ内で作業する際のカレンとディレクトリの指定
WORKDIR /var/www/html

# appコンテナに入って、
# composer install && npm installをする

# php artisan コマンドでfiled to open stream: no such file or directoryが発生する時は、.vendor、bootstrap/cache/services.php + packages.php を削除してcomposer install
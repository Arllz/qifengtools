FROM centos:7
MAINTAINER "huangqifengsuper@163.com"
RUN yum install -y install epel-release && \
    yum -y install  wget lrzsz vim  libxml2 libxml2-devel openssl openssl-devel curl curl-devel libjpeg-turbo libjpeg-turbo-devel libpng-devel libpng freetype-devel freetype icu libicu-devel libicu libxslt libxslt-devel php-mysql && \
    wget -O /etc/yum.repos.d/CentOS-Base.repo http://mirrors.aliyun.com/repo/Centos-7.repo && \
    yum update -y && \
    yum provides "*/applydeltarpm" && \
    yum -y groupinstall "Development Tools" && \
    yum install deltarpm -y && \
    yum install sqlite-devel -y && \
    yum clean all && \
    groupadd www && \
    useradd -g www www
ADD php-7.4.8.tar.gz   /usr/local/src/
RUN cd /usr/local/src/php-7.4.8 && \
    ./configure --prefix=/usr/local/php74 \
    --with-config-file-path=/usr/local/php74/etc \
    --with-config-file-scan-dir=/usr/local/php74/conf.d \
    --enable-fpm --with-fpm-user=www \
    --with-fpm-group=www \
    --with-mysql=mysqlnd \
    --with-mysqli=mysqlnd \
    --with-pdo-mysql=mysqlnd \
    --with-iconv-dir \
    --with-freetype-dir=/usr/local/freetype \
    --with-jpeg-dir \
    --with-png-dir \
    --with-zlib \
    --with-libxml-dir=/usr \
    --enable-xml \
    --disable-rpath \
    --enable-bcmath \
    --enable-shmop \
    --enable-sysvsem \
    --enable-inline-optimization \
    --with-curl \
    --disable-mbregex \
    --enable-mbstring \
    --with-mcrypt \
    --enable-ftp \
    --with-gd \
    --enable-gd-native-ttf \
    --with-openssl \
    --with-mhash \
    --enable-pcntl \
    --enable-sockets \
    --with-xmlrpc \
    --enable-zip \
    --enable-soap \
    --with-gettext \
    --disable-fileinfo \
    --enable-opcache \
    --enable-intl \
    --with-xsl && \
    make -j 4 && make install && \
    cp /usr/local/php74/etc/php-fpm.conf.default /usr/local/php74/etc/php-fpm.conf && \
    cp ./php.ini-production  /usr/local/php74/etc/php.ini && \
    cp /usr/local/php74/etc/php-fpm.d/www.conf.default /usr/local/php74/etc/php-fpm.d/www.conf && \
    cp ./sapi/fpm/init.d.php-fpm /etc/init.d/php-fpm && \
    chmod +x /etc/init.d/php-fpm && \
    rm -rf /usr/loacl/src/php-7.4.8
EXPOSE 9000
CMD ["/etc/init.d/php-fpm","start"]

FROM php:8.1-apache

# 安装 mysqli 扩展
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# 启用 Apache mod_rewrite
RUN a2enmod rewrite

# 设置工作目录
WORKDIR /var/www/html

# 复制源代码
COPY ./src /var/www/html

# 设置权限
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

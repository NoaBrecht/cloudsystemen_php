FROM php:8.2-cli
COPY . /app
WORKDIR /app
CMD [ "php", "index.php" ]
EXPOSE 3000:3306
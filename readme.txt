php -i | grep pdo
docker-compose build php-apache
docker-compose up
docker exec -it test-mysql mysql -uuser -ppassword
docker exec -it test-php-apache bash // get into container
php bin/console debug:route // see all routes

first start 
http://localhost:8080/phpmyadmin/index.php


cd ~/Downloads/Live-chat-app-main
php -S localhost:8080




http://localhost:4566/my-php-bucket



aws --endpoint-url=http://localhost:4566 s3 ls s3://my-php-bucket



Run


mkdir ~/livechat-run
cd ~/livechat-run

# 2. Download from LocalStack S3
aws --endpoint-url=http://localhost:4566 s3 cp s3://my-php-bucket . --recursive

# 3. Start PHP's built-in server
php -S localhost:8000



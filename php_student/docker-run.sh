docker rm `docker stop php`
docker run --name php \
--restart=always \
--dns=192.168.100.222 \
-e TZ＝'Asia/Shanghai' \
-p 8100:80 \
-d 192.168.100.222:5000/php:student \
sh /php/startphp.sh

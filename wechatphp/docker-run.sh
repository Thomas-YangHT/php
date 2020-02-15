docker rm `docker stop wechatphp5`
docker run --name wechatphp5 \
--restart=always \
--dns=223.5.5.5 \
-e TZ＝'Asia/Shanghai' \
-p 8110:80 \
-d php5 \
sh /php/startphp.sh

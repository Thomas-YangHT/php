/usr/sbin/nginx -c /php/nginx/nginx.conf
nohup /usr/bin/spawn-fcgi -a 0.0.0.0 -p 9000 -u nginx -g nginx -f /usr/local/bin/php-cgi -C 10
while [[ true ]]; do 
    sleep 1 
done 


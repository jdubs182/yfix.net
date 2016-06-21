(docker exec -it $(docker-compose ps -q mysql) /usr/sbin/mysqld --help --verbose 1>/dev/null) && echo 'OK'

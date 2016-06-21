#!/bin/bash

trap "exit -1;" SIGQUIT SIGTERM SIGINT
docker exec -it $(docker-compose ps -q logrotate) logrotate -v /etc/logrotate.conf

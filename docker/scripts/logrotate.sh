#!/bin/bash

trap "exit -1;" SIGQUIT SIGTERM SIGINT
docker-compose exec logrotate logrotate -v /etc/logrotate.conf

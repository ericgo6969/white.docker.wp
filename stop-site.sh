#!/bin/bash
docker-compose stop
docker-compose rm -fv
docker-network rm wp-wordpress
# removal calls may require sudo rights depending on file permissions
rm -rf ./wordpress
rm -rf ./dbdata
rm -rf ./logs

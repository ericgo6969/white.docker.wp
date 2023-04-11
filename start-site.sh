#!/bin/bash
docker-compose up -d database-one
sleep 5s
docker-compose up -d wordpress nginx

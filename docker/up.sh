#!/bin/bash

if [ "$1" == "production" ]; then
  COMPOSE_FILES="--file docker-compose.yaml --file docker-compose.production.yaml"
else
  COMPOSE_FILES="--file docker-compose.yaml --file docker-compose.development.yaml"
fi

docker compose $COMPOSE_FILES run --build application bash
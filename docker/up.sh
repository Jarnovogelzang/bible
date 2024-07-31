#!/bin/bash

if [ "$1" == "production" ]; then
  COMPOSE_FILES="--file docker-compose.yaml --file docker-compose.production.yaml"
  SHELL_EXECUTABLE="sh"
else
  COMPOSE_FILES="--file docker-compose.yaml --file docker-compose.development.yaml"
  SHELL_EXECUTABLE="bash"
fi

docker compose $COMPOSE_FILES run --build application $SHELL_EXECUTABLE
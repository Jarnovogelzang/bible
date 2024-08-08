#!/bin/bash

COMPOSE_FILES="--file docker-compose.yaml --file docker-compose.development.yaml"
SHELL_EXECUTABLE="bash"

docker compose $COMPOSE_FILES run --build --remove-orphans application $SHELL_EXECUTABLE
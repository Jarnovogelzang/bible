#!/bin/bash

DOCKER_COMPOSE_COMMAND="docker compose --file docker-compose.yaml --file docker-compose.production.yaml"

$DOCKER_COMPOSE_COMMAND build application
$DOCKER_COMPOSE_COMMAND create application
$DOCKER_COMPOSE_COMMAND cp application:/go/src/app/dist/frankenphp-linux-x86_64 dist/application
up:
	docker-compose -f docker-compose.yml up -d

down:
	docker-compose -f docker-compose.yml stop

build:
	docker-compose -f docker-compose.yml build

in:
	docker exec -ti example-app-laravel.test-1 /bin/bash

init: down build up

restart: down up

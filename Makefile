install: env_from_example build start composer migrate seed

env_from_example:
	cp .env.example .env
	cp .env.example src/.env

build: env_from_example
	docker compose build

composer: build
	docker exec php-book-game sh -c "composer install"

migrate: composer
	docker exec php-book-game sh -c "php artisan migrate"

seed: migrate
	docker exec php-book-game sh -c "php artisan db:seed"

start:
	docker compose up -d

stop:
	docker compose down

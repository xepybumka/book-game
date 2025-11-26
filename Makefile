install: copy_config build start composer npm migrate seed

copy_config:
	cp .env.example .env
	cp .env.example src/.env

build: 
	docker compose build

composer: 
	docker exec php-book-game sh -c "composer install"

npm:
	docker exec php-book-game sh -c "npm install && npm run build"

migrate: 
	docker exec php-book-game sh -c "php artisan migrate"

seed: 
	docker exec php-book-game sh -c "php artisan db:seed"

start:
	docker compose up -d

stop:
	docker compose down

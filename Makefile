start: docker-up
stop: docker-down
restart: docker-down docker-up
test: backend-test
debug-test: backend-test-debug
clean: rm-flag docker-down-clear docker-up
pull: docker-pull

backend-test: rm-flag docker-down-clear sleep start backend-test-run-unit
backend-test-debug: rm-flag docker-down-clear sleep start backend-test-run-unit

docker-up:
	docker-compose --env-file autotests.env up -d
docker-down:
	docker-compose --env-file autotests.env down --remove-orphans
docker-down-clear:
	docker-compose --env-file autotests.env down -v --remove-orphans
docker-pull:
	docker-compose --env-file autotests.env pull
docker-build:
	docker-compose --env-file autotests.env build
backend-init:
	db-ready-clear backend-deploy
db-ready-clear:
	rm -f ./.docker/postgres/dumps/dev/.done ./.docker/postgres/dumps/test/.done
backend-deploy:
	docker-compose --env-file autotests.env exec php-15 bash ./.docker/scripts/app_new_deploy.sh
backend-test-run-unit:
	docker-compose --env-file autotests.env exec php-15 ./.docker/scripts/run-tests.sh || true
rm-flag:
	echo ">>> Delete Deploy Done Flag <<<" && rm -f ./.deploy_done
sleep:
	sleep 3

#!/bin/bash
set -e
#echo "starting" > /locks/status
PWD=$(pwd)
WAIT_DB_HOST=${CACHE_DB_HOST:-$DB_HOST}
WAIT_DB_PORT=${CACHE_DB_PORT:-$DB_PORT}
WAIT_AFTER_CONNECT=0

echo ">>> Create configuration"
bash $APP_PATH/docker/scripts/create_config.sh

cd $APP_PATH;
echo " >> Wait $WAIT_DB_HOST:$WAIT_DB_PORT ..."
while ! timeout 1 bash -c "echo > /dev/tcp/$WAIT_DB_HOST/$WAIT_DB_PORT"; do
    WAIT_AFTER_CONNECT=30
    sleep 5;
done

sleep $WAIT_AFTER_CONNECT;

until echo " >> Wait end of deploy before run tests..." && [ -f /src/.deploy_done ] ; do sleep 5 ; done

echo " >> Composer load require dev libs..."
composer install --dev

echo " >> Autoload classes dumping..."
composer dump-autoload
echo " >> Autoload classes dumped successfully!"

echo " >> Run tests "
echo " >> Clear cache..."
rm -rf ./runtime/cache/*

./tests/bin/yii cache/flush-schema --interactive=0

./vendor/bin/codecept clean
./vendor/bin/codecept build -c codeception.medical.yml

./tests/bin/yii fixture/unload --namespace app\\tests\\Medical\\Fixture "*" --interactive=0
./tests/bin/yii fixture/load --namespace app\\tests\\Medical\\Fixture "*" --interactive=0

./vendor/bin/codecept run Unit -c codeception.medical.yml
./vendor/bin/codecept run Functional -c codeception.medical.yml
./vendor/bin/codecept run Acceptance -c codeception.medical.yml

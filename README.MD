composer install

yarn add --dev @symfony/webpack-encore

yarn add webpack-notifier --dev

yarn encore dev

php bin/console doctrine:database:create

php bin/console doctrine:schema:create

php bin/console doctrine:migrations:version --add --all

php bin/console doctrine:fixtures:load
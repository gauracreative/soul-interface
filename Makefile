destroy:
		docker-compose rm -vsf
		docker-compose down -v --remove-orphans
build:
		docker-compose build --no-cache
up:
		docker-compose up -d

stop:
		docker-compose down

in:
		docker-compose exec php ash

test:
		docker-compose exec php vendor/bin/phpunit tests --color

fix:
		docker-compose exec php vendor/bin/php-cs-fixer fix src

cres:
		docker-compose exec php composer dump-autoload

test1:
	@if [ $(args) = on ]; then \
		echo 'Haribol'; \
	fi
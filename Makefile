include .env
export

test:
	./vendor/bin/phpunit tests --color

fix:
	./tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src

cres:
	composer dump-autoload

test1:
	@if [ $(args) = on ]; then \
		echo 'Haribol'; \
	fi
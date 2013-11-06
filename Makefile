TITLE = [commando]

all: install

clean-composer-lock:
	@rm -rf composer.lock \
	&& /bin/echo -e "${TITLE} deleted composer.lock"

install:
	@/bin/echo -e "${TITLE} downloading composer ..." \
	&& curl -sS https://getcomposer.org/installer | php \
	&& /bin/echo -e "${TITLE} installing dependencies..." \
	&& php composer.phar install \
	&& /bin/echo -e "${TITLE} dependencies installed"

test:
	@/bin/echo -e "${TITLE} testing suite started..." \
	&& vendor/phpunit/phpunit/composer/bin/phpunit -c test/phpunit.xml

test-group:
	@/bin/echo -e "${TITLE} testing suite started..." \
	&& vendor/phpunit/phpunit/composer/bin/phpunit -c tests/phpunit.xml --group $(g) \

.PHONY: all
.PHONY: clean-composer-lock
.PHONY: install
.PHONY: test test-group
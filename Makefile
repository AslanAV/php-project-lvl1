install:
	composer install

validate:
	composer validate

lint:
	composer exec phpcs -- --standard=PSR12 src bin

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

brain-games:
	./bin/brain-games

brain-gcd:
	./bin/brain-gcd

brain-progression:
	./bin/brain-progression
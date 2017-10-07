# Demo 4

## Run
```sh
docker run --rm -ti -v "$PWD":/var/www/html -p 8080:80 php:7-apache
```

```sh
docker run --rm -d -v "$PWD":/var/www/html -p 8080:80 php:7-apache
docker ps
```

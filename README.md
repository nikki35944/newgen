# Тестовое задание для NewGen Vision

## YandexMusic parser

**Как развернуть проект локально через [Docker](https://www.docker.com/products/docker-desktop/)**

1. Склонироваить репозиторий в папку с проектами
2. Перейти в репозиторий
```
cd newgen
```
3. Поднимаем докер сервер
```
docker compose up -d
```
4. Устанавливаем зависимости
```
composer install
```
5. Перейти в баш контейнера с проектом
```
docker exec -it itglobal-laravel.test-1 bash
```
6. Накатить миграции
```
php artisan migrate:fresh
```
Приложение доступно по адресу http://localhost/

Phpmyadmin для просмотра бд http://localhost:8001/

login - sail

pw- password

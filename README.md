# Система управления бронированием ресурсов

Это проект на Laravel, реализующий RESTful API для управления бронированием различных ресурсов (например, комнат, автомобилей и т.д.).

## Описание проекта

Данный проект предоставляет API для:
- Создания, получения и обновления информации о ресурсах.
- Создания, отмены и получения бронирований для указанных ресурсов.
- Документирования API с использованием Swagger (OpenAPI) и PHP 8 атрибутов.
- Автоматизированного тестирования (unit и feature тесты).

## Технологии

- **PHP** >= 8.0
- **Laravel** (последняя версия)
- **Composer**
- **MySQL** или **PostgreSQL**
- **Swagger / OpenAPI** для документации
- **PHPUnit** для тестирования

## Установка

1. **Клонирование репозитория:**

   ```bash
   git clone https://github.com/yourusername/resource-booking.git
   cd resource-booking
   
2. **Установка зависимостей:**

	```bash
	composer install
	
3. **Настройка окружения:**

	Скопируйте файл .env.example в .env:

	cp .env.example .env
	Затем отредактируйте файл .env для указания настроек подключения к базе данных, почты и других параметров.

3. **Генерация ключа приложения:**

	```bash
	php artisan key:generate
4. **Запуск миграций:**

	```bash
	php artisan migrate
	
5. **Тестирование**

	Запустите тесты для проверки работоспособности:

	php artisan test
6. **Документация API**
	Документация API генерируется с использованием Swagger (OpenAPI) и PHP 8 атрибутов.

	Чтобы сгенерировать документацию, выполните команду:
	```bash
	./vendor/bin/openapi app -o openapi.yaml
Генерируемый файл openapi.yaml можно использовать для просмотра документации через Swagger UI (если настроено) или другими OpenAPI-инструментами.
Если Swagger UI настроен, документация может быть доступна по адресу, например, http://localhost/api/documentation.

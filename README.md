Запуск 
В корне проекта 
docker-compose up --build
docker exec -it php bash
composer install
php artisan migrate

Стили и скрипты
npm install
npm run dev

если файл .env не появился - скопировать .env.example и переименовать в .env


Работает по ссылке http://127.0.0.1:3000  
Валидацию на клиенте не делал - внешне ошибок не видно 

Чтобы письма по сбросу пароля приходили, настройте почту - сброс работает(я проверял)

Генерация конфига swagger
php artisan l5-swagger:generate

Токен для апи можно сгенерировать
php artisan app:api.user-token-generation {user : The ID of the user}}

http://localhost:3000/api/documentation
Api всё в постмане проверил



Необходимо разработать веб-приложение “Телефонная книга“:

- приложение должно быть написано на Laravel;
- должна быть регистрация, авторизация, восстановление пароля;
- пользователь должен иметь возможность:
  • создавать, редактировать контакты (ФИО, номер телефона);
  • просматривать список собственных контактов;
  • просматривать контакт на отдельной странице;
  • отмечать контакты как избранные;
  • удалять контакты;
  • должно быть api для crud контактов с описанием api с помощью Swagger.

Решение должно быть выложено на GitHub, Bitbucket.

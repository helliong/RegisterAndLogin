# Register & Login PHP Project

## Описание
Простое веб-приложение для регистрации и входа пользователей на PHP и MySQL.

## Установка и запуск

1. **Скачайте и установите [XAMPP](https://www.apachefriends.org/index.html).**
2. **Склонируйте репозиторий:**
   ```
   git clone https://github.com/ВАШ_ЛОГИН/ВАШ_РЕПОЗИТОРИЙ.git
   ```
   или скачайте архив и распакуйте в папку `c:\xampp\htdocs\Register`.

3. **Запустите Apache и MySQL через XAMPP Control Panel.**

4. **Создайте базу данных:**
   - Откройте [phpMyAdmin](http://localhost/phpmyadmin).
   - Создайте новую базу данных, например, `register_db`.
   - Выполните SQL-запрос для создания таблицы:
     ```sql
     CREATE TABLE `user` (
       `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
       `login` VARCHAR(20) NOT NULL UNIQUE,
       `pass` VARCHAR(20) NOT NULL,
       `email` VARCHAR(50) NOT NULL UNIQUE
     );
     ```

5. **Настройте подключение к базе данных:**
   - Откройте файл `database.php`.
   - Укажите свои параметры подключения:
     ```php
     $conn = new mysqli("localhost", "root", "", "register_db");
     ```

6. **Откройте сайт:**
   - Перейдите по адресу [http://localhost/Register/index.php](http://localhost/Register/index.php).

## Использование

- Зарегистрируйтесь через форму регистрации.
- Войдите через форму входа.
- После входа или регистрации вы увидите приветствие и случайную картинку с котиком.

## Важно

- Пароли хранятся в открытом виде (для учебных целей). Для реальных проектов используйте хеширование паролей!
- Не храните секретные данные в репозитории.

## Лицензия

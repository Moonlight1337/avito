# avito
Avito test task
Тестовое задание на стажировку в Авито

## Реализованная функциональность
* Возможность подписываться на обновления цены через простую форму.
* Обновление цены товара в случае ее изменения.
* Уведомление пользователя/пользователей в случае изменения цен

## Выполненные доп. задания, не являющиеся функциональностями
* Подтверждение Email пользователя
 

## Стек технологий
1. PHP 7.2 - язык программирования
2. MySQL - система управления базы данных
3. Apache - сервер
4. CRON - демон, для периодического обновления цен на подписанные товары
    
## Инструкция по запуску
1. git clone https://github.com/Moonlight1337/avito.git
2. Выгрузить дамп базы данных db_dump.sql, для создания пустой базы данных проекта.
3. Запустить скрипт index.php
4. Для обновления цен запустить скрипт update.php(подразумевается запустить его в CRON для периодического обновления цен)

## Инструкция по использованию
После запуска в браузере откроется простая форма подписки. После заполнения всех данных на указанный Email будет отправлен код подтверждения валидности почты.
При успешном подтверждении почты пользователь будет внесен в бд и в дальнейшем в случае изменения цен он будет уведомлен об этом.
Для обновления используется скрипт update.php запущенный в CRON, период запуска будет зависеть от соответствующих настроек CRON.

## Архитектура и схема работы кода.
Подробнее о коде написано в документе по ссылке: https://docs.google.com/document/d/1mG1IFt1Yl3Y2NJizXWlMcDGxlr0kh4zvwBZv2JHxxI4/edit?usp=sharing

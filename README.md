<h1 align="center"># konstructor
<h3 align="center">Репозиторий дипломной работы</h3>
<hr>
В этой ветке я добавил возможность загружать на сервер файлы .plx. Все файлы попадают в папку uploads
<hr>

## Ссылка для работы
<h3>Ссылка 👇 uploadFile - позваляет принимать файл на сервер POST запросом.</h3>

```php
https://konstr:8890/api/uploadFile
```
<h3>POST Передаёт данные в теле</h3>
> POST https://konstr:8890/api/uploadFile HTTP/1.1
<br>content-type: application/json
<br>{
<br>"file": "example_file.plx",
<br>}

## Пример в POSTMAN

![Снимок экрана 2023-05-17 в 20.18.30.png](images%2F%D0%A1%D0%BD%D0%B8%D0%BC%D0%BE%D0%BA%20%D1%8D%D0%BA%D1%80%D0%B0%D0%BD%D0%B0%202023-05-17%20%D0%B2%2020.18.30.png)

## Пример с клиентской стороной

![Снимок экрана 2023-05-17 в 20.28.17.png](images%2F%D0%A1%D0%BD%D0%B8%D0%BC%D0%BE%D0%BA%20%D1%8D%D0%BA%D1%80%D0%B0%D0%BD%D0%B0%202023-05-17%20%D0%B2%2020.28.17.png)
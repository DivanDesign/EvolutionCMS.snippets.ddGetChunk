# (MODX)EvolutionCMS.snippets.ddGetChunk changelog


## Версия 2.2 (2017-03-01)
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.18.
* \+ В параметр `placeholders` добавлена поддержка формата [JSON](https://ru.wikipedia.org/wiki/JSON).


## Версия 2.1 (2016-12-29)
* \* Внимание! Требуется PHP >= 5.4.
* \* Внимание! Требуется (MODX)EvolutionCMS >= 1.1.
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.16.2.
* \+ Добавлена указания шаблона `name` без чанка, через префикс `@CODE:`.
* \* Дополнительные данные, передаваемые в параметр `placeholders` должны быть в виде [query formated string](https://en.wikipedia.org/wiki/Query_string) (старый формат поддерживается, но не рекомендуется к использвоанию).
* \* Параметр `escaping` переименован в `escapeResultForJS` (старое имя поддерживается, но не рекомендуется к использованию).


## Версия 2.0 (2015-10-06)
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.12.
* \* Параметр `screening` переименован в `escaping`.
* \* Параметр `escaping` по умолчанию равен `0`.
* \* Комментарии и прочие незначительные изменения.


## Версия 1.4 (2013-09-24)
* \+ Добавлен параметр `removeEmptyPlaceholders`, позволяющий удалять из чанка плэйсхолдеры, значения которых не переданы.
* \* Незначительные изменения.


## Версия 1.3 (2012-03-21)
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.2.
* \+ Добавлена возможность передачи дополнительных данных для подстановки в чанк (параметр `placeholders`).
* \+ Добавлена возможность отключить экранирование всяких специальных символов (параметр `screening`).


## Версия 1.2 (2010-09-27)
* \* Небольшие изменения.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>
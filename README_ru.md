# (MODX)EvolutionCMS.snippets.ddGetChunk

Сниппет получает содержимое чанка по имени. Например, удобно использовать для получения чанков в JS.

Также он умеет:
* Передавать в чанк дополнительные данные для парсинга.
* Экранировать всякие специальные символы для JS.
* Удалять пустые плейсхолдеры.


## Использует

* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.ru/modx/ddtools) >= 0.60


## Установка


### Используя [(MODX)EvolutionCMS.libraries.ddInstaller](https://github.com/DivanDesign/EvolutionCMS.libraries.ddInstaller)

Просто вызовите следующий код в своих исходинках или модуле [Console](https://github.com/vanchelo/MODX-Evolution-Ajax-Console):

```php
//Подключение (MODX)EvolutionCMS.libraries.ddInstaller
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddInstaller/require.php'
);

//Установка (MODX)EvolutionCMS.snippets.ddGetChunk
\DDInstaller::install([
	'url' => 'https://github.com/DivanDesign/EvolutionCMS.snippets.ddGetChunk',
	'type' => 'snippet'
]);
```

* Если `ddGetChunk` отсутствует на вашем сайте, `ddInstaller` просто установит его.
* Если `ddGetChunk` уже есть на вашем сайте, `ddInstaller` проверит его версию и обновит, если нужно. 


### Вручную


#### 1. Элементы → Сниппеты: Создайте новый сниппет со следующими параметрами

1. Название сниппета: `ddGetChunk`.
2. Описание: `<b>2.3</b> Сниппет получает содержимое чанка по имени. Например, удобно использовать для получения чанков в JS.`.
3. Категория: `Core`.
4. Анализировать DocBlock: `no`.
5. Код сниппета (php): Вставьте содержимое файла `ddGetChunk_snippet.php` из архива.


#### 2. Элементы → Управление файлами

1. Создайте новую папку `assets/snippets/ddGetChunk/`.
2. Извлеките содержимое архива в неё (кроме файла `ddGetChunk_snippet.php`).


## Описание параметров

* `name`
	* Описание: Имя чанка, либо код напрямую, начиная с `@CODE:`.
	* Допустимые значения:
		* `stringChunkName`
		* `string` — передавать код напрямую без чанка можно начиная значение с `@CODE:`
	* **Required**
	
* `placeholders`
	* Описание:
		Дополнительные данные, которые будут переданы в чанк.  
		Вложенные объекты и массивы также поддерживаются: `some[a]=one&some[b]=two` => `[+some.a+]`, `[+some.b+]`; `some[]=one&some[]=two` => `[+some.0+]`, `[some.1]`.
	* Допустимые значения:
		* `stringJsonObject` — в виде [JSON](https://ru.wikipedia.org/wiki/JSON)
		* `stringHjsonObject` — в виде [HJSON](https://hjson.github.io/)
		* `stringQueryFormatted` — в виде [Query string](https://en.wikipedia.org/wiki/Query_string)
		* Также может быть задан, как нативный PHP объект или массив (например, для вызовов через `\DDTools\Snippet::runSnippet`).
			* `arrayAssociative`
			* `object`
	* Значение по умолчанию: —
	
* `removeEmptyPlaceholders`
	* Описание: Нужно ли заменять плэйсхолдеры, значения которых не переданы, на пустоту.
	* Допустимые значения:
		* `0`
		* `1`
	* Значение по умолчанию: `0`
	
* `escapeResultForJS`
	* Описание: Экранировать специальные символы для JS.
	* Допустимые значения:
		* `0`
		* `1`
	* Значение по умолчанию: `0`


## Примеры


### Получение содержимого формы в JS

```html
<script>
	var form = '[[ddGetChunk? &name=`someForm` &escapeResultForJS=`1`]]';
	
	//Вставляем форму на страницу
	$('body').append(form);
</script>
```


### Вывод содержащего вызов Ditto чанка с передачей определённых параметров

```
[[ddGetChunk?
	&name=`someChunk`
	&placeholders=`{
		"id": "33",
		"orderBy": "someTv ASC, pub_date DESC"
	}`
]]
```

Код чанка `someChunk`:

```html
<div class="some">
	<div class="someDesignDiv"></div>
	<div>
		[[Ditto?
			&startID=`[+id+]`
			&orderBy=`[+orderBy+]`
			&tpl=`someChunk_item`
		]]
	</div>
</div>
```


### Запустить сниппет через `\DDTools\Snippet::runSnippet` без DB и eval

```php
\DDTools\Snippet::runSnippet([
	'name' => 'ddGetChunk',
	'params' => [
		'name' => 'someChunk'
	]
]);
```


## Ссылки

* [Home page](https://code.divandesign.ru/modx/ddgetchunk)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-snippets-ddgetchunk)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.snippets.ddGetChunk)


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />
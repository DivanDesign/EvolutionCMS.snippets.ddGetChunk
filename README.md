# (MODX)EvolutionCMS.snippets.ddGetChunk

Snippet gets the chunk contents by its name. For example, it useful to get chunks inside JS code.

Also it can:
* Pass additional data to chunk for parsing.
* Escape special chars for JS.
* Remove empty placeholders.


## Requires

* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.ru/modx/ddtools) >= 0.60


## Installation


### Using [(MODX)EvolutionCMS.libraries.ddInstaller](https://github.com/DivanDesign/EvolutionCMS.libraries.ddInstaller)

Just run the following PHP code in your sources or [Console](https://github.com/vanchelo/MODX-Evolution-Ajax-Console):

```php
//Include (MODX)EvolutionCMS.libraries.ddInstaller
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddInstaller/require.php'
);

//Install (MODX)EvolutionCMS.snippets.ddGetChunk
\DDInstaller::install([
	'url' => 'https://github.com/DivanDesign/EvolutionCMS.snippets.ddGetChunk',
	'type' => 'snippet'
]);
```

* If `ddGetChunk` is not exist on your site, `ddInstaller` will just install it.
* If `ddGetChunk` is already exist on your site, `ddInstaller` will check it version and update it if needed.


### Manually


#### 1. Elements → Snippets: Create a new snippet with the following data

1. Snippet name: `ddGetChunk`.
2. Description: `<b>2.4</b> Snippet gets the chunk contents by its name. For example, it useful to get chunks inside JS code.`.
3. Category: `Core`.
4. Parse DocBlock: `no`.
5. Snippet code (php): Insert content of the `ddGetChunk_snippet.php` file from the archive.


#### 2. Elements → Manage Files

1. Create a new folder `assets/snippets/ddGetChunk/`.
2. Extract the archive to the folder (except `ddGetChunk_snippet.php`).


## Parameters description

* `name`
	* Desctription: Chunk name or code via `@CODE:` prefix.
	* Valid values:
		* `stringChunkName`
		* `string` — use inline templates starting with `@CODE:`
	* **Required**
	
* `placeholders`
	* Desctription:
		Additional data has to be passed into the chunk.  
		Arrays are supported too: `some[a]=one&some[b]=two` => `[+some.a+]`, `[+some.b+]`; `some[]=one&some[]=two` => `[+some.0+]`, `[some.1]`.
	* Valid values:
		* `stringJsonObject` — as [JSON](https://en.wikipedia.org/wiki/JSON)
		* `stringHjsonObject` — as [HJSON](https://hjson.github.io/)
		* `stringQueryFormatted` — as [Query string](https://en.wikipedia.org/wiki/Query_string)
		* It can also be set as native PHP object or array (e. g. for calls through `\DDTools\Snippet::runSnippet` or `$modx->runSnippet`):
			* `arrayAssociative`
			* `object`
	* Default value: —
	
* `removeEmptyPlaceholders`
	* Desctription: Placeholders which have not values to be replaced by will be deleted from parsed chunk if the parameter equals 1.
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `escapeResultForJS`
	* Desctription: Escaping special chars for JS.
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`


## Examples

_All examples are written using [HJSON](https://hjson.github.io/) for the `placeholders` parameter, but if you want you can use vanilla JSON instead._


### Get content of the form into JS code

```html
<script>
	var form = '[[ddGetChunk? &name=`someForm` &escapeResultForJS=`1`]]';
	
	//Insert form to page
	$('body').append(form);
</script>
```


### Get chunk with Ditto and send necessary additional data into it

```
[[ddGetChunk?
	&name=`someChunk`
	&placeholders=`{
		id: 33
		orderBy: "someTv ASC, pub_date DESC"
	}`
]]
```

Code of `someChunk`:

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


### Run the snippet through `\DDTools\Snippet::runSnippet` without DB and eval

```php
\DDTools\Snippet::runSnippet([
	'name' => 'ddGetChunk',
	'params' => [
		'name' => 'someChunk'
	]
]);
```


## Links

* [Home page](https://code.divandesign.ru/modx/ddgetchunk)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-snippets-ddgetchunk)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.snippets.ddGetChunk)


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />
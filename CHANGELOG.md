# (MODX)EvolutionCMS.snippets.ddGetChunk changelog


## Version 2.3 (2021-03-24)
* \* Attention! PHP >= 5.6 is required.
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.47 is required.
* \+ You can just call `\DDTools\Snippet::runSnippet` to run the snippet without DB and eval.
* \+ Parameters → `placeholders`: [HJSON](https://hjson.github.io/) is supported.
* \+ `\ddGetChunk\Snippet`: The new class. All snippet code moved here.


## Version 2.2.2 (2020-06-22)
* \* Attention! (MODX)Evolution.libraries.ddTools >= 0.40.1 is required (not tested in older versions).
* \* Composer.json:
	* \+ `homepage`
	* \+ `authors`.
	* \* `require` → `dd/evolutioncms-libraries-ddtools`: Renamed from `dd/modxevo-library-ddtools`.


## Version 2.2.1 (2020-05-02)
* \* The snippet result will be returned in anyway (empty string for empty result).
* \+ Composer.json.
* \+ README.
* \+ README_ru.
* \+ CHANGELOG.
* \+ CHANGELOG_ru.
* \* Refactoring, small changes, code style.


## Version 2.2 (2017-03-01)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.18 is required.
* \+ Added [JSON](https://en.wikipedia.org/wiki/JSON) support for the `placeholders` parameter.


## Version 2.1 (2016-12-29)
* \* Attention! PHP >= 5.4 is required.
* \* Attention! (MODX)EvolutionCMS >= 1.1 is required.
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.16.2 is required.
* \+ Added support of the `@CODE:` keyword prefix in the `name` parameter.
* \* Additional data has to be passed through the `placeholders` parameter must be set as a [query formated string](https://en.wikipedia.org/wiki/Query_string) (the old format is still supported but deprecated).
* \* The `escaping` parameter was renamed as `escapeResultForJS` (with backward compatibility).


## Version 2.0 (2015-10-06)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.12 is required.
* \* The `screening` parameter has been renamed as `escaping`.
* \* The default value of the `escaping` parameter is now equals `0`.
* \* Comments, readme and other minor changes.


## Version 1.4 (2013-09-24)
* \+ Parameter `removeEmptyPlaceholders` that allows placeholders that have not values to be deleted from the parsed chunk has been added.
* \* Minor changes.


## Version 1.3 (2012-03-21)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.2 is required.
* \+ Added ability to transfer additional data to parse into chunk (param `placeholders`).
* \+ Added ability to turn off screening special chars (param `screening`).


## Version 1.2 (2010-09-27)
* \* Minor changes.


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />
<style>ul{list-style:none;}</style>
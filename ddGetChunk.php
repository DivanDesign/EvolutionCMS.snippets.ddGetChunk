<?php
/**
 * ddGetChunk
 * @version 2.1 (2016-12-29)
 * 
 * @desc Snippet gets the chunk contents by its name. For example, it useful to get chunks inside js code.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo >= 1.1.
 * @uses MODXEvo.library.ddTools >= 0.16.2.
 * 
 * @param $name {string_chunkName|string} — Chunk name or code via “@CODE:” prefix. @required
 * @param $placeholders {string_queryFormated} — Additional data as query string (https://en.wikipedia.org/wiki/Query_string) has to be passed into the chunk. E. g. “pladeholder1=value1&pagetitle=My awesome pagetitle!”. Default: ''.
 * @param $removeEmptyPlaceholders {0|1} — Placeholders which have not values to be replaced by will be deleted from parsed chunk if the parameter equals 1. Default: 0.
 * @param $escapeResultForJS {0|1} — Escaping special chars (for js). Default: 0.
 * 
 * @link http://code.divandesign.biz/modx/ddgetchunk/2.1
 * 
 * @copyright 2009–2016 DivanDesign {@link http://www.DivanDesign.biz }
 */

if (!empty($name)){
	//Подключаем modx.ddTools
	require_once $modx->getConfig('base_path').'assets/libs/ddTools/modx.ddtools.class.php';
	
	//Для обратной совместимости
	extract(ddTools::verifyRenamedParams($params, [
		'escapeResultForJS' => 'escaping'
	]));
	
	//Получаем чанк
	$result = $modx->getTpl($name);
	
	//Если переданы дополнительные данные
	if (!empty($placeholders)){
		//If “=” exists
		if (strpos($placeholders, '=') !== false){
			//Parse a query string
			parse_str($placeholders, $placeholders);
		//Backward compatibility
		}else{
			//The old format
			$placeholders = ddTools::explodeAssoc($placeholders);
			$modx->logEvent(1, 2, '<p>String separated by “::” && “||” in the “placeholders” parameter is deprecated. Use a <a href="https://en.wikipedia.org/wiki/Query_string)">query string</a>.</p><p>The snippet has been called in the document with id '.$modx->documentIdentifier.'.</p>', $modx->currentSnippet);
		}
	}else{
		$placeholders = [];
	}
	
	//Парсим
	$result = ddTools::parseText([
		'text' => $result,
		'data' => $placeholders,
		//Удаляем пустые плэйсхолдеры, если нужно
		'removeEmptyPlaceholders' => isset($removeEmptyPlaceholders) &&	$removeEmptyPlaceholders == '1' ? true : false
	]);
	
	//Окончательно парсим
	$result = ddTools::parseSource($result);
	
	//Экранируем сиволы, если нужно
	if (
		isset($escapeResultForJS) &&
		$escapeResultForJS == '1'
	){
		$result = ddTools::escapeForJS($result);
	}
	
	return $result;
}
?>
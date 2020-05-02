<?php
/**
 * ddGetChunk
 * @version 2.2 (2017-03-01)
 * 
 * @desc Snippet gets the chunk contents by its name. For example, it useful to get chunks inside JS code.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo >= 1.1.
 * @uses MODXEvo.libraries.ddTools >= 0.18.
 * 
 * @param $name {stringChunkName|string} — Chunk name or code via “@CODE:” prefix. @required
 * @param $placeholders {stirngJsonObject|stringQueryFormated} — Additional data as JSON (https://en.wikipedia.org/wiki/JSON) or Query string (https://en.wikipedia.org/wiki/Query_string) has to be passed into the chunk. E. g. `{"width": 800, "height": 600}` or `width=800&height=600`. Default: ''.
 * @param $removeEmptyPlaceholders {0|1} — Placeholders which have not values to be replaced by will be deleted from parsed chunk if the parameter equals 1. Default: 0.
 * @param $escapeResultForJS {0|1} — Escaping special chars (for js). Default: 0.
 * 
 * @link https://code.divandesign.biz/modx/ddgetchunk
 * 
 * @copyright 2009–2017 DD Group {@link https://www.DivanDesign.biz }
 */

if (!empty($name)){
	//Include (MODX)EvolutionCMS.libraries.ddTools
	require_once(
		$modx->getConfig('base_path') .
		'assets/libs/ddTools/modx.ddtools.class.php'
	);
	
	//Для обратной совместимости
	extract(\ddTools::verifyRenamedParams(
		$params,
		[
			'escapeResultForJS' => 'escaping'
		]
	));
	
	//Получаем чанк
	$result = $modx->getTpl($name);
	
	//Если переданы дополнительные данные
	if (!empty($placeholders)){
		$placeholders = \ddTools::encodedStringToArray($placeholders);
	}else{
		$placeholders = [];
	}
	
	//Парсим
	$result = \ddTools::parseText([
		'text' => $result,
		'data' => $placeholders,
		//Удаляем пустые плэйсхолдеры, если нужно
		'removeEmptyPlaceholders' =>
			(
				isset($removeEmptyPlaceholders) &&
				$removeEmptyPlaceholders == '1'
			) ?
			true :
			false
	]);
	
	//Окончательно парсим
	$result = \ddTools::parseSource($result);
	
	//Экранируем сиволы, если нужно
	if (
		isset($escapeResultForJS) &&
		$escapeResultForJS == '1'
	){
		$result = \ddTools::escapeForJS($result);
	}
	
	return $result;
}
?>
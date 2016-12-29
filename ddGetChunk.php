<?php
/**
 * ddGetChunk
 * @version 2.0 (2015-10-06)
 * 
 * @desc Snippet gets the chunk contents by its name. For example, it useful to get chunks inside js code.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.library.ddTools >= 0.16.2.
 * 
 * @param $name {string_chunkName} — Chunk name. @required
 * @param $placeholders {string_separated} — Additional data for parsed result chunk. Format: separated string with '::' for pair key-value and '||' between pairs. Default: ''.
 * @param $removeEmptyPlaceholders {0|1} — Placeholders which have not values to be replaced by will be deleted from parsed chunk if the parameter equals 1. Default: 0.
 * @param $escapeResultForJS {0|1} — Escaping special chars (for js). Default: 0.
 * 
 * @link http://code.divandesign.biz/modx/ddgetchunk/2.0
 * 
 * @copyright 2009–2015 DivanDesign {@link http://www.DivanDesign.biz }
 */

if (!empty($name)){
	//Подключаем modx.ddTools
	require_once $modx->getConfig('base_path').'assets/libs/ddTools/modx.ddtools.class.php';
	
	//Для обратной совместимости
	extract(ddTools::verifyRenamedParams($params, [
		'escapeResultForJS' => 'escaping'
	]));
	
	//Получаем чанк
	$result = $modx->getChunk($name);
	
	//Если переданы дополнительные данные
	if (!empty($placeholders)){
		//Разбиваем их
		$placeholders = ddTools::explodeAssoc($placeholders);
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
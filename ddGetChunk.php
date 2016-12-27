<?php
/**
 * ddGetChunk
 * @version 2.0 (2015-10-06)
 * 
 * @desc Snippet gets the chunk contents by its name. For example, it useful to get chunks inside js code.
 * 
 * @uses MODXEvo.library.ddTools >= 0.12.
 * 
 * @param $name {string_chunkName} — Chunk name. @required
 * @param $placeholders {string_separated} — Additional data for parsed result chunk. Format: separated string with '::' for pair key-value and '||' between pairs. Default: ''.
 * @param $removeEmptyPlaceholders {0|1} — Placeholders which have not values to be replaced by will be deleted from parsed chunk if the parameter equals 1. Default: 0.
 * @param $escaping {0|1} — Escaping special chars (for js). Default: 0.
 * 
 * @link http://code.divandesign.biz/modx/ddgetchunk/2.0
 * 
 * @copyright 2009–2015 DivanDesign {@link http://www.DivanDesign.biz }
 */

if (!empty($name)){
	//Подключаем modx.ddTools
	require_once $modx->getConfig('base_path').'assets/snippets/ddTools/modx.ddtools.class.php';
	
	//Получаем чанк
	$result = $modx->getChunk($name);
	
	//Если переданы дополнительные данные
	if (!empty($placeholders)){
		//Разбиваем их
		$placeholders = ddTools::explodeAssoc($placeholders);
		//Парсим
		$result = ddTools::parseText($result, $placeholders);
	}
	
	//Удаляем пустые плэйсхолдеры, если нужно
	if (
		isset($removeEmptyPlaceholders) &&
		$removeEmptyPlaceholders == '1'
	){
		$result = preg_replace('/\[\+\S+\+\]/', '', $result);
	}
	
	//Окончательно парсим
	$result = ddTools::parseSource($result);
	
	//Экранируем сиволы, если нужно
	if (
		isset($escaping) &&
		$escaping == '1'
	){
		$result = ddTools::screening($result);
	}
	
	return $result;
}
?>
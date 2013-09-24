<?php
/**
 * ddGetChunk.php
 * @version 1.3 (2012-03-21)
 *
 * Snippet gets the chunk contents by its name. For example, it useful to get chunks in js code.
 * 
 * @uses modx.ddTools lib 0.2.
 *
 * @param name {string: chunkName} - Chunk name. @required
 * @param screening {0; 1} - Screening special chars. Default: 1.
 * @param placeholders {separated string} - Additional data for parsed result chunk. Format: separated string with '::' for pair key-value and '||' between pairs. Default: ''.
 * @param removeEmptyPlaceholders {0; 1} - Placeholders which have not values to be replaced by will be deleted from parsed chunk if the parameter equals 1. Default: 0.
 * 
 * @link http://code.divandesign.biz/modx/ddgetchunk/1.3
 *
 * @copyright 2012, DivanDesign
 * http://www.DivanDesign.biz
 */

if (!empty($name)){
	//Подключаем modx.ddTools
	require_once $modx->config['base_path'].'assets/snippets/ddTools/modx.ddtools.class.php';

	//Получаем чанк
	$result = $modx->getChunk($name);
	
	//Если заданы дополнительные данные для парса
	if (!empty($placeholders)){
		//Разбиваем их
		$placeholders = ddTools::explodeAssoc($placeholders);
		//Парсим
		$result = ddTools::parseText($result, $placeholders);
	}

	//Удаляем пустые плэйсхолдеры, если нужно
	if (isset($removeEmptyPlaceholders) && $removeEmptyPlaceholders == '1'){
		$result = preg_replace('/\[\+\S+\+\]/', '', $result);
	}
	
	//Окончательно парсим
	$result = ddTools::parseSource($result);
	
	//Экранируем сиволы, если нужно
	if (!isset($screening) || $screening == '1'){
		$result = ddTools::screening($result);
	}

	return $result;
}
?>
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
 * 
 * @link http://code.divandesign.biz/modx/ddgetchunk/1.3
 *
 * @copyright 2012, DivanDesign
 * http://www.DivanDesign.biz
 */

if (isset($name)){
	//Подключаем modx.ddTools
	require_once $modx->config['base_path'].'assets/snippets/ddTools/modx.ddtools.class.php';

	//Получаем чанк
	$str = $modx->getChunk($name);
	
	//Если заданы дополнительные данные для парса
	if (isset($placeholders)){
		//Разбиваем их
		$placeholders = ddTools::explodeAssoc($placeholders);
		//Парсим
		$str = ddTools::parseText($str, $placeholders);
	}
	
	//Окончательно парсим
	$str = ddTools::parseSource($str);
	
	//Экранируем сиволы, если нужно
	if (!isset($screening) || $screening == '1'){
		$str = ddTools::screening($str);
	}

	return $str;
}
?>
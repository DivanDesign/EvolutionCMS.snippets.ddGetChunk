<?php
/**
 * ddGetChunk
 * @version 2.2.1 (2020-05-02)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/ddgetchunk
 * 
 * @copyright 2009–2020 DD Group {@link https://DivanDesign.biz }
 */

//The snippet must return an empty string even if result is absent
$snippetResult = '';

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
	$snippetResult = $modx->getTpl($name);
	
	//Если переданы дополнительные данные
	if (!empty($placeholders)){
		$placeholders = \ddTools::encodedStringToArray($placeholders);
	}else{
		$placeholders = [];
	}
	
	//Парсим
	$snippetResult = \ddTools::parseText([
		'text' => $snippetResult,
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
	$snippetResult = \ddTools::parseSource($snippetResult);
	
	//Экранируем сиволы, если нужно
	if (
		isset($escapeResultForJS) &&
		$escapeResultForJS == '1'
	){
		$snippetResult = \ddTools::escapeForJS($snippetResult);
	}
}

return $snippetResult;
?>
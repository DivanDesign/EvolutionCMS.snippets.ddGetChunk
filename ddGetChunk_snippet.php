<?php
/**
 * ddGetChunk
 * @version 2.2.2 (2020-06-22)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/ddgetchunk
 * 
 * @copyright 2009–2020 DD Group {@link https://DivanDesign.biz }
 */

//The snippet must return an empty string even if result is absent
$snippetResult = '';

//Backward compatibility
$params = \ddTools::verifyRenamedParams([
	'params' => $params,
	'compliance' => [
		'escapeResultForJS' => 'escaping'
	],
	'returnCorrectedOnly' => false
]);

$params = \DDTools\ObjectTools::extend([
	'objects' => [
		//Defaults
		(object) [
			'name' => '',
			'placeholders' => [],
			'removeEmptyPlaceholders' => false,
			'escapeResultForJS' => false
		],
		$params
	]
]);


if (!empty($params->name)){
	//Include (MODX)EvolutionCMS.libraries.ddTools
	require_once(
		$modx->getConfig('base_path') .
		'assets/libs/ddTools/modx.ddtools.class.php'
	);
	
	//Получаем чанк
	$snippetResult = $modx->getTpl($params->name);
	
	//Если переданы дополнительные данные
	if (is_string($params->placeholders)){
		$params->placeholders = \ddTools::encodedStringToArray($params->placeholders);
	}
	
	//Парсим
	$snippetResult = \ddTools::parseText([
		'text' => $snippetResult,
		'data' => $params->placeholders,
		//Удаляем пустые плэйсхолдеры, если нужно
		'removeEmptyPlaceholders' => $params->removeEmptyPlaceholders
	]);
	
	//Окончательно парсим
	$snippetResult = \ddTools::parseSource($snippetResult);
	
	//Экранируем сиволы, если нужно
	if ($params->escapeResultForJS){
		$snippetResult = \ddTools::escapeForJS($snippetResult);
	}
}

return $snippetResult;
?>
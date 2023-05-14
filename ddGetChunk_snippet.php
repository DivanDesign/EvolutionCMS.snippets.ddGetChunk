<?php
/**
 * ddGetChunk
 * @version 2.3 (2021-03-24)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.ru/modx/ddgetchunk
 * 
 * @copyright 2009–2021 Ronef {@link https://Ronef.ru }
 */

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

return \DDTools\Snippet::runSnippet([
	'name' => 'ddGetChunk',
	'params' => $params
]);
?>
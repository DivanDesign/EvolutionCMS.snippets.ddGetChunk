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
<?php
namespace ddGetChunk;

class Snippet extends \DDTools\Snippet {
	protected
		$version = '2.3.0',
		
		$params = [
			//Defaults
			'name' => '',
			'placeholders' => [],
			'removeEmptyPlaceholders' => false,
			'escapeResultForJS' => false
		],
		
		$renamedParamsCompliance = [
			'escapeResultForJS' => 'escaping'
		],
		
		$paramsTypes = [
			'placeholders' => 'objectArray',
		]
	;
		
	/**
	 * run
	 * @version 1.0.1 (2023-05-14)
	 * 
	 * @return {string}
	 */
	public function run(){
		$result = '';
		
		if (!empty($this->params->name)){
			//Получаем чанк
			$result = \ddTools::getTpl($this->params->name);
			
			//Парсим
			$result = \ddTools::parseText([
				'text' => $result,
				'data' => $this->params->placeholders,
				//Удаляем пустые плэйсхолдеры, если нужно
				'removeEmptyPlaceholders' => $this->params->removeEmptyPlaceholders
			]);
			
			//Окончательно парсим
			$result = \ddTools::parseSource($result);
			
			//Экранируем сиволы, если нужно
			if ($this->params->escapeResultForJS){
				$result = \ddTools::escapeForJS($result);
			}
		}
		
		return $result;
	}
}
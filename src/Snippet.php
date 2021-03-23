<?php
namespace ddGetChunk;

class Snippet extends \DDTools\Snippet {
	protected
		$version = '2.2.2',
		
		$params = [
			//Defaults
			'name' => '',
			'placeholders' => [],
			'removeEmptyPlaceholders' => false,
			'escapeResultForJS' => false
		],
		
		$renamedParamsCompliance = [
			'escapeResultForJS' => 'escaping'
		]
	;
		
	/**
	 * prepareParams
	 * @version 1.1 (2021-03-23)
	 *
	 * @param $params {stdClass|arrayAssociative|stringJsonObject|stringQueryFormatted}
	 *
	 * @return {void}
	 */
	protected function prepareParams($params = []){
		//Call base method
		parent::prepareParams($params);
		
		//Если переданы дополнительные данные
		if (is_string($this->params->placeholders)){
			$this->params->placeholders = \DDTools\ObjectTools::convertType([
				'object' => $this->params->placeholders,
				'type' => 'objectArray'
			]);;
		}
	}
	
	/**
	 * run
	 * @version 1.0 (2021-03-23)
	 * 
	 * @return {string}
	 */
	public function run(){
		$result = '';
		
		if (!empty($this->params->name)){
			//Получаем чанк
			$result = \ddTools::$modx->getTpl($this->params->name);
			
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
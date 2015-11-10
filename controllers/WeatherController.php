<?php 

namespace Craft;

class WeatherController extends BaseController{

	public function actionTemplate(){

		$values = craft()->weather->process();

		$this->renderTemplate('weather/field/index', $values);
	}
}
<?php 

namespace Craft;

class WeatherVariable{

	public function getWeatherData() {
    	$values = craft()->weather->process();
    	
    	return craft()->templates->render('weather/field/index', $values);

 	}

 	public function getZipCode() {
    	return craft()->weather->getSetting('zipCode');
  	}

  // 	public function getAppId() {
  //   	return craft()->weather->getSetting('appId');
  // 	}

}

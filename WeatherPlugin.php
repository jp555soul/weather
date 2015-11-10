<?php

/**
 * Craft Weather by @jmpaul
 *
 * @package   Craft Weather
 * @author    @jmpaul
 * @copyright Copyright (c) 2014, @jmpaul
 */

namespace Craft;

class WeatherPlugin extends BasePlugin{

  public function getName(){
     return Craft::t('Weather powered by OpenWeatherMap');
  }

  public function getVersion(){
    return '0.1';
  }

  public function getDeveloper(){
    return '@jmpaul';
  }

  public function getDeveloperUrl(){
    return 'http://twitter.com/jmpaul';
  }

  public function hasCpSection(){
      return true;
  }

  protected function defineSettings() {
    return array(
      'zipCode' => array(AttributeType::String, 'default'=>'90404'),
      'appId' => array(AttributeType::String, 'default'=>'69233d960a63f11daa4661691a853288')
    );
  }

  public function getSettingsHtml() {

    $config_settings = array();
    $config_settings['zipCode'] = craft()->config->get('zipCode');
    $config_settings['appId'] = craft()->config->get('appId');

    return craft()->templates->render('weather/settings', array(
      'settings' => $this->getSettings(),
      'config_settings' => $config_settings
    ));
  }

}

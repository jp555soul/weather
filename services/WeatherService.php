<?php

namespace Craft;

class WeatherService extends BaseApplicationComponent{

    var $settings = array();

    public function process() {
        $this->settings = $this->_init_settings();
        
        return $this->_getData();    
    }

    public function getSetting($name) {
        return $this->settings[$name];
    }

    private function _init_settings() {
        $plugin = craft()->plugins->getPlugin('weather');
        $plugin_settings = $plugin->getSettings();    
        
        $settings = array();
        $settings['zipCode'] = craft()->config->get('zipCode')!==null ? craft()->config->get('zipCode') : $plugin_settings['zipCode'];
        $settings['appId'] = craft()->config->get('appId')!==null ? craft()->config->get('appId') : $plugin_settings['appId'];
        
        return $settings;
    }


    private function _getData(){

        $zipCode = $this->settings['zipCode'];
        $appId = $this->settings['appId'];

        //Something is up with the date
        date_default_timezone_set('America/Los_Angeles');
        if (!function_exists('curl_init')){
            die('Sorry cURL is not working.');
        }

        $url = 'http://api.openweathermap.org/data/2.5/weather?zip='.$zipCode.',us&units=imperial&appid='.$appId.'';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);

        if(curl_errno($ch)){
            echo 'Curl error: ' . curl_error($ch);
        }else{
            //echo "<pre>";
            //print_r(curl_getinfo($ch));
            //echo "</pre>";
        }
        curl_close($ch);

        $json = json_decode($data);

        // echo "<pre>";
        // print_r($json);
        // echo "</pre>";

        $city = $json->name;
        $temp = $json->main->temp;
        $status_id = $json->weather[0]->id;
        $status = $json->weather[0]->main;
        $time_of_day = '';
        $hour = date("G");
        
        // IMAGES NOT LINKED
        if (($hour >= 0) && ($hour <= 12)){
            if($status_id == '800'){
                //Clear
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '801'){
                //Few Clouds
                $time_of_day = "http://www.example.com/global/day_cloudy.png";
            }elseif($status_id == '802'){
                //Broken Clouds
                $time_of_day = "http://www.example.com/global/day_partlycloudy.png";
            }elseif($status_id == '803'){
                //Partly Clouds
                $time_of_day = "http://www.example.com/global/day_partlycloudy.png";
            }elseif($status_id == '804'){
                //Clouds
                $time_of_day = "http://www.example.com/global/day_cloudy.png";
            }elseif($status_id == '741'){
                //Fog
                $time_of_day = "http://www.example.com/global/day_foggy.png";
            }elseif($status_id == '500'){
                //Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '501'){
                //Light Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '502'){
                //Heavy Intensity Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '503'){
                //Very Heavy Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '504'){
                //Extreme Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '511'){
                //Freezing Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '520'){
                //Light Intensity Shower Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '521'){
                //Shower Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '522'){
                //Heavy Intensity Shower Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '531'){
                //Ragged Shower Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '200'){
                //Thunderstorm w Light Rain
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '201'){
                //Thunderstorm w Rain
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '202'){
                //Thunderstorm w Heavy Rain
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '210'){
                //Light Thunderstorm
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '211'){
                //Thunderstorm
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '212'){
                //Heavy Thunderstorm
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '221'){
                //Ragged Thunderstorm
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '230'){
                //Thunderstorm w Light Drizzle
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '231'){
                //Thunderstorm w Drizzle
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '232'){
                //Thunderstorm w Heavy Drizzle
                $time_of_day = "http://www.example.com/global/day_thunderstorms.png";
            }elseif($status_id == '300'){
                //Light Intensity Drizzle
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '301'){
                //Drizzle
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '302'){
                //Heavy Intensity Drizzle
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '310'){
                //Light Intensity Drizzle Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '311'){
                //Drizzle Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '312'){
                //Heavy Intensity Drizzle Rain
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '313'){
                //Shower Rain and Drizzle
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '314'){
                //Heavy Shower Rain and Drizzle
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '321'){
                //Shower Drizzle
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '600'){
                //Light Snow
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '601'){
                //Snow
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '602'){
                //Heavy Snow
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '611'){
                //Sleet
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '612'){
                //Shower Sleet
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '615'){
                //Light Rain and Snow
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '616'){
                //Rain and Snow
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '620'){
                //Light Shower Snow
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '621'){
                //Shower Snow
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '622'){
                //Heavy Shower Snow
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '701'){
                //Mist
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '711'){
                //Smoke
                $time_of_day = "http://www.example.com/global/day_foggy.png";
            }elseif($status_id == '721'){
                //Haze
                $time_of_day = "http://www.example.com/global/day_foggy.png";
            }elseif($status_id == '731'){
                //Dust Whirls
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '751'){
                //Sand
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '761'){
                //Dust
                $time_of_day = "http://www.example.com/global/day_foggy.png";
            }elseif($status_id == '762'){
                //Volcanic Ash
                $time_of_day = "http://www.example.com/global/day_foggy.png";
            }elseif($status_id == '771'){
                //Sqaulls
                $time_of_day = "http://www.example.com/global/day_foggy.png";
            }elseif($status_id == '781'){
                //Tornado
                $time_of_day = "http://www.example.com/global/day_foggy.png";
            }elseif($status_id == '951'){
                //Calm
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '952'){
                //Light Breeze
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '953'){
                //Gentle Breeze
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '954'){
                //Moderate Breeze
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '955'){
                //Fresh Breeze
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '956'){
                //Strong Breeze
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '957'){
                //High Wind
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '958'){
                //Gale
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '959'){
                //Severe Gale
                $time_of_day = "http://www.example.com/global/day_sunny.png";
            }elseif($status_id == '959'){
                //Strom
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '960'){
                //Violent Strom
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }elseif($status_id == '962'){
                //Hurrican
                $time_of_day = "http://www.example.com/global/day_rain.png";
            }
        }else{
            if($status_id == '800'){
                //Clear
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '801'){
                //Few Clouds
                $time_of_day = "http://www.example.com/global/night_cloudy.png";
            }elseif($status_id == '802'){
                //Broken Clouds
                $time_of_day = "http://www.example.com/global/night_partlycloudy.png";
            }elseif($status_id == '803'){
                //Partly Clouds
                $time_of_day = "http://www.example.com/global/night_partlycloudy.png";
            }elseif($status_id == '804'){
                //Clouds
                $time_of_day = "http://www.example.com/global/night_cloudy.png";
            }elseif($status_id == '741'){
                //Fog
                $time_of_day = "http://www.example.com/global/night_foggy.png";
            }elseif($status_id == '500'){
                //Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '501'){
                //Light Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '502'){
                //Heavy Intensity Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '503'){
                //Very Heavy Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '504'){
                //Extreme Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '511'){
                //Freezing Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '520'){
                //Light Intensity Shower Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '521'){
                //Shower Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '522'){
                //Heavy Intensity Shower Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '531'){
                //Ragged Shower Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '200'){
                //Thunderstorm w Light Rain
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '201'){
                //Thunderstorm w Rain
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '202'){
                //Thunderstorm w Heavy Rain
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '210'){
                //Light Thunderstorm
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '211'){
                //Thunderstorm
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '212'){
                //Heavy Thunderstorm
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '221'){
                //Ragged Thunderstorm
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '230'){
                //Thunderstorm w Light Drizzle
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '231'){
                //Thunderstorm w Drizzle
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '232'){
                //Thunderstorm w Heavy Drizzle
                $time_of_day = "http://www.example.com/global/night_thunderstorms.png";
            }elseif($status_id == '300'){
                //Light Intensity Drizzle
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '301'){
                //Drizzle
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '302'){
                //Heavy Intensity Drizzle
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '310'){
                //Light Intensity Drizzle Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '311'){
                //Drizzle Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '312'){
                //Heavy Intensity Drizzle Rain
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '313'){
                //Shower Rain and Drizzle
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '314'){
                //Heavy Shower Rain and Drizzle
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '321'){
                //Shower Drizzle
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '600'){
                //Light Snow
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '601'){
                //Snow
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '602'){
                //Heavy Snow
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '611'){
                //Sleet
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '612'){
                //Shower Sleet
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '615'){
                //Light Rain and Snow
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '616'){
                //Rain and Snow
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '620'){
                //Light Shower Snow
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '621'){
                //Shower Snow
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '622'){
                //Heavy Shower Snow
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '701'){
                //Mist
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '711'){
                //Smoke
                $time_of_day = "http://www.example.com/global/night_foggy.png";
            }elseif($status_id == '721'){
                //Haze
                $time_of_day = "http://www.example.com/global/night_foggy.png";
            }elseif($status_id == '731'){
                //Dust Whirls
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '751'){
                //Sand
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '761'){
                //Dust
                $time_of_day = "http://www.example.com/global/night_foggy.png";
            }elseif($status_id == '762'){
                //Volcanic Ash
                $time_of_day = "http://www.example.com/global/night_foggy.png";
            }elseif($status_id == '771'){
                //Sqaulls
                $time_of_day = "http://www.example.com/global/night_foggy.png";
            }elseif($status_id == '781'){
                //Tornado
                $time_of_day = "http://www.example.com/global/night_foggy.png";
            }elseif($status_id == '951'){
                //Calm
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '952'){
                //Light Breeze
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '953'){
                //Gentle Breeze
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '954'){
                //Moderate Breeze
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '955'){
                //Fresh Breeze
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '956'){
                //Strong Breeze
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '957'){
                //High Wind
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '958'){
                //Gale
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '959'){
                //Severe Gale
                $time_of_day = "http://www.example.com/global/night_clear.png";
            }elseif($status_id == '959'){
                //Strom
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '960'){
                //Violent Strom
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }elseif($status_id == '962'){
                //Hurrican
                $time_of_day = "http://www.example.com/global/night_rain.png";
            }
        }

        $values = array();
        $values['city'] = $city;
        $values['status'] = $status;
        $values['temp'] = $temp;
        $values['time_of_day'] = $time_of_day;

        return $values;
    }

}

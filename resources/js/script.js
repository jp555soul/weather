function showWeather() {
    $.get("/gweather_proxy.php", function (a) {
        var b = $.parseJSON(a);
        image = "";
        condiv = b.current_observation.weather;
        tmpdiv = b.current_observation.temp_f;
        $.get("/time.php", function (a) {
            if (a == "sunrise") {
                if (b.current_observation.weather == "Cloudy") {
                    image = '<img src="/assets/site/images/global/day_cloudy.png">'
                } else if (b.current_observation.weather == "Partly Cloudy") {
                    image = '<img src="/assets/site/images/global/day_partlycloudy.png">'
                } else if (b.current_observation.weather == "Mostly Cloudy") {
                    image = '<img src="/assets/site/images/global/day_cloudy.png">'
                } else if (b.current_observation.weather == "Foggy") {
                    image = '<img src="/assets/site/images/global/day_foggy.png">'
                } else if (b.current_observation.weather == "Rain") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Thunderstorm") {
                    image = '<img src="/assets/site/images/global/day_thunderstorms.png">'
                } else if (b.current_observation.weather == "Scattered Thunderstorms") {
                    image = '<img src="/assets/site/images/global/day_thunderstorms.png">'
                } else if (b.current_observation.weather == "Showers") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Scattered Showers") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Chance of Storm") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Chance of Snow") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Rain and Snow") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Overcast") {
                    image = '<img src="/assets/site/images/global/day_cloudy.png">'
                } else if (b.current_observation.weather == "Light Snow") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Freezing Drizzle") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Chance of Rain") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Clear") {
                    image = '<img src="/assets/site/images/global/day_sunny.png">'
                } else if (b.current_observation.weather == "Mostly Sunny") {
                    image = '<img src="/assets/site/images/global/day_sunny.png">'
                } else if (b.current_observation.weather == "Mist") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Storm") {
                    image = '<img src="/assets/site/images/global/day_thunderstorms.png">'
                } else if (b.current_observation.weather == "Chance of TStorm") {
                    image = '<img src="/assets/site/images/global/day_thunderstorms.png">'
                } else if (b.current_observation.weather == "Sleet") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Snow") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Icy") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Dust") {
                    image = '<img src="/assets/site/images/global/day_foggy.png">'
                } else if (b.current_observation.weather == "Fog") {
                    image = '<img src="/assets/site/images/global/day_foggy.png">'
                } else if (b.current_observation.weather == "Smoke") {
                    image = '<img src="/assets/site/images/global/day_foggy.png">'
                } else if (b.current_observation.weather == "Haze") {
                    image = '<img src="/assets/site/images/global/day_foggy.png">'
                } else if (b.current_observation.weather == "Flurries") {
                    image = '<img src="/assets/site/images/global/day_foggy.png">'
                } else if (b.current_observation.weather == "Light Rain") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Snow Showers") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else if (b.current_observation.weather == "Hail") {
                    image = '<img src="/assets/site/images/global/day_rain.png">'
                } else {
                    image = '<img src="/assets/site/images/global/day_sunny.png">'
                }
            } else {
                if (b.current_observation.weather == "Cloudy") {
                    image = '<img src="/assets/site/images/global/night_cloudy.png">'
                } else if (b.current_observation.weather == "Partly Cloudy") {
                    image = '<img src="/assets/site/images/global/night_partlycloudy.png">'
                } else if (b.current_observation.weather == "Mostly Cloudy") {
                    image = '<img src="/assets/site/images/global/night_cloudy.png">'
                } else if (b.current_observation.weather == "Foggy") {
                    image = '<img src="/assets/site/images/global/night_foggy.png">'
                } else if (b.current_observation.weather == "Rain") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Thunderstorm") {
                    image = '<img src="/assets/site/images/global/night_thunderstorms.png">'
                } else if (b.current_observation.weather == "Scattered Thunderstorms") {
                    image = '<img src="/assets/site/images/global/night_thunderstorms.png">'
                } else if (b.current_observation.weather == "Showers") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Scattered Showers") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Chance of Storm") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Chance of Snow") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Rain and Snow") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Overcast") {
                    image = '<img src="/assets/site/images/global/night_cloudy.png">'
                } else if (b.current_observation.weather == "Light Snow") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Freezing Drizzle") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Chance of Rain") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Clear") {
                    image = '<img src="/assets/site/images/global/night_clear.png">'
                } else if (b.current_observation.weather == "Mist") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Storm") {
                    image = '<img src="/assets/site/images/global/night_thunderstorms.png">'
                } else if (b.current_observation.weather == "Chance of TStorm") {
                    image = '<img src="/assets/site/images/global/night_thunderstorms.png">'
                } else if (b.current_observation.weather == "Sleet") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Snow") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Icy") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Dust") {
                    image = '<img src="/assets/site/images/global/night_foggy.png">'
                } else if (b.current_observation.weather == "Fog") {
                    image = '<img src="/assets/site/images/global/night_foggy.png">'
                } else if (b.current_observation.weather == "Smoke") {
                    image = '<img src="/assets/site/images/global/night_foggy.png">'
                } else if (b.current_observation.weather == "Haze") {
                    image = '<img src="/assets/site/images/global/night_foggy.png">'
                } else if (b.current_observation.weather == "Flurries") {
                    image = '<img src="/assets/site/images/global/night_foggy.png">'
                } else if (b.current_observation.weather == "Light Rain") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Snow Showers") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else if (b.current_observation.weather == "Hail") {
                    image = '<img src="/assets/site/images/global/night_rain.png">'
                } else {
                    image = '<img src="/assets/site/images/global/night_clear.png">'
                }
            }
            $(".weather_bg").append(image);
            $(".weather_temp_big").append(condiv);
            $(".weather_temp_med").append(tmpdiv)
        })
    })
}
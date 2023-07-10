var days = ["Pondelok", "Utorok", "Streda", "Štvrtok", "Piatok", "Sobota", "Nedeľa"]
  function initMap() {
    var options = {
    types: ['(cities)'],
    };
    const autocompleteSearch = document.getElementById("autocompleteSearch")
    const autocomplete = new google.maps.places.Autocomplete(autocompleteSearch, options);
    autocomplete.addListener("place_changed", () => {
    document.getElementById("invisible").style="width: 18rem; display: block;"
    document.getElementById("invisibleTwo").style="display: block;"
    const place = autocomplete.getPlace();
    document.getElementById("place").innerText = place.name
    console.log(place);
    console.log(place.geometry.location.lat());
    console.log(place.geometry.location.lng());
    document.getElementById("gps").innerText = "Šírka: " + place.geometry.location.lng()
    document.getElementById("gpsTwo").innerText = "Výška: " + place.geometry.location.lat()
    var state;
    var stateCode;
    console.log(place);
    place.address_components.forEach(element => {
      if (element.types[0] === "country") {
        document.getElementById("state").innerText = "State: " + element.long_name;
        state = element.long_name;
        stateCode = element.short_name.toLowerCase();
      }
    });
        //(id, state, time, ip, longtitude, latitude)
  
  fetch("https://site139.webte.fei.stuba.sk/stvrteZadanie/writeToDatabase.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `state=${state}&time=${new Date()}&longtitude=${place.geometry.location.lng()}&latitude=${place.geometry.location.lat()}&countryCode=${stateCode}`,
})
    .then((response) => response.text())
    .then((res) => console.log(res));
    logJSONData(place.geometry.location.lat(), place.geometry.location.lng(), state)
  })

}

function getDayName(number){
  switch (number) {
    case 0:
      return "Pondelok"
      break;
    case 1:
      return "Utorok"
      break;
    case 2:
      return "Streda"
      break;
    case 3:
      return "Štvrtok"
      break;
    case 4:
      return "Piatok"
      break;
    case 5:
      return "Sobota"
      break;
    case 6:
      return "Nedeľa"
      break;
  }
}

function getWeather(number){
    switch (number) {
      case 0:
        return "Jasno"
        break;
      case 1:
        case 2:
            case 3:
        return "Prevažne jasno"
        break;
      case 45:
        case 48:
        return "Hmla"
        break;
      case 51:
        case 53:
            case 55:
                case 56:
                    case 57:
        return "Mrholenie"
        break;
      case 61:
        case 63:
            case 65:
                case 66:
                    case 67:
        return "Dážď"
        break;
      case 71:
        case 73:
            case 75:
                case 77:
        return "Sneh"
        break;
      case 80:
        case 81:
            case 82:
        return "Silný dážď"
        break;
                    case 85:
                        case 86:
            return "Silný sneh"
            break;
        case 95:
            return "Búrka"
            break;
                case 96:
                    case 99:
                return "Krupobitie"
                break;
    }
  }

async function logJSONData(lat, lng, state) {
  const response = await fetch("https://api.open-meteo.com/v1/forecast?latitude=" + lat + "&longitude=" + lng + "&current_weather=true&daily=temperature_2m_max&timezone=Europe%2FBerlin&daily=temperature_2m_min&daily=weathercode");
  const jsonData = await response.json();
  console.log(jsonData);

  var day1 = document.getElementById("day1");
  var day2 = document.getElementById("day2");
  var day3 = document.getElementById("day3");
  var day4 = document.getElementById("day4");
  var day5 = document.getElementById("day5");
  var day6 = document.getElementById("day6");
  var day7 = document.getElementById("day7");

  const date1 = new Date(jsonData.daily.time[0])
  const date2 = new Date(jsonData.daily.time[1])
  const date3 = new Date(jsonData.daily.time[2])
  const date4 = new Date(jsonData.daily.time[3])
  const date5 = new Date(jsonData.daily.time[4])
  const date6 = new Date(jsonData.daily.time[5])
  const date7 = new Date(jsonData.daily.time[6])

  console.log(date4.getDay());

  var days = [getDayName(date1.getDay()), getDayName(date2.getDay()), getDayName(date3.getDay()), getDayName(date4.getDay()), getDayName(date5.getDay()), getDayName(date6.getDay()), getDayName(date7.getDay())]

  


  day1.innerText = days[0] + ": " + jsonData.daily.temperature_2m_min[0] + " °C" + " - " + jsonData.daily.temperature_2m_max[0] + " °C"  + " - " + getWeather(jsonData.daily.weathercode[0]);
  day2.innerText = days[1] + ": " + jsonData.daily.temperature_2m_min[1] + " °C" + " - " + jsonData.daily.temperature_2m_max[1] + " °C"  + " - " + getWeather(jsonData.daily.weathercode[1]);
  day3.innerText = days[2] + ": " + jsonData.daily.temperature_2m_min[2] + " °C" + " - " + jsonData.daily.temperature_2m_max[2] + " °C"  + " - " + getWeather(jsonData.daily.weathercode[2]);
  day4.innerText = days[3] + ": " + jsonData.daily.temperature_2m_min[0] + " °C" + " - " + jsonData.daily.temperature_2m_max[3] + " °C"  + " - " + getWeather(jsonData.daily.weathercode[3]);
  day5.innerText = days[4] + ": " + jsonData.daily.temperature_2m_min[1] + " °C" + " - " + jsonData.daily.temperature_2m_max[4] + " °C"  + " - " + getWeather(jsonData.daily.weathercode[4]);
  day6.innerText = days[5] + ": " + jsonData.daily.temperature_2m_min[2] + " °C" + " - " + jsonData.daily.temperature_2m_max[5] + " °C"  + " - " + getWeather(jsonData.daily.weathercode[5]);
  day7.innerText = days[6] + ": " + jsonData.daily.temperature_2m_min[0] + " °C" + " - " + jsonData.daily.temperature_2m_max[6] + " °C"  + " - " + getWeather(jsonData.daily.weathercode[6]);


  const capitals = await fetch("https://countriesnow.space/api/v0.1/countries/capital");
  const capitalsJson = await capitals.json();

  capitalsJson.data.forEach(element => {
    if (element.name === state) {
      document.getElementById("capital").innerText = "Capital: " + element.capital
    }
  });
            
}



  /*
  google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
      var input = document.getElementById('autocomplete_search');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      console.log(place.geometry);
    });
  }
  */

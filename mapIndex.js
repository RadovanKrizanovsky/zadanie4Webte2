// Initialize and add the map
let map;

async function initMap() {
    //console.log(passedArray);
  // The location of Uluru

  
  var positions = []
  passedArray.forEach(element => {
    var position = { lat: element.latitude, lng: element.longtitude };
    positions.push(position)
  });


  //console.log(positions);
  const position = { lat: -25.344, lng: 131.031 };
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

  // The map, centered at Uluru
  map = new Map(document.getElementById("map"), {
    zoom: 4,
    center: position,
    mapId: "DEMO_MAP_ID",
  });


positions.forEach(element => {
    console.log(element);
    var markerTwo = new google.maps.Marker({
        position: { lat: Number(element.lat), lng: Number(element.lng) },
        title:"Hello World!"
    });
    markerTwo.setMap(map);
});
// To add the marker to the map, call setMap();


}

initMap();
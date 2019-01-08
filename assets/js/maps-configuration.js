function initMap() {
    var locations = {lat: -7.316147, lng: 110.175477};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: locations,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    });
}
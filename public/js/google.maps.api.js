


var service;
var map;
var myLatLng;
//var myLatlng = new google.maps.LatLng(12.6500,-8.0000);
var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';

function success(position) {

    var latval = position.coords.latitude;
    var lngval = position.coords.longitude;
   // var addr = position.state.name;
     myLatLng = {lat: latval, lng: lngval };
     console.log([latval,lngval]);
    createMap(myLatLng);
   // nearbySearch(myLatLng,"school");
    SearchProducteur(latval,lngval);
    $('#lat').val(latval);
    $('#lng').val(lngval);
    getCountry(latval,lngval);
    console.log(getCountry(latval,lngval));

}


function getCountry(latval,lngval) {
    var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+latval+","+lngval+"&key=AIzaSyC6o2C-U1vXjo_xGBqJ8Z2RV5AFFpnCJHY";
    $.get({
        url : url,
        success : function (data) {
           // console.log(data);
            x = data.results[0].address_components[4].long_name;
            //alert($('#city').val(data.results[0].address_components[4].long_name));
            //alert(x)
        }
    });
}
function fail() {
    alert("Nous n'avons pas reuissi à vous localiser");
}

function geoLocationInit() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success,fail)
    }else {
        alert("Navigateur ne support pas la géolocalisation");
    }
}
function createMarker(latlng,icn,names) {

    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: icn,
        title: names
    });
    //console.log(names);
    infowindow = new google.maps.InfoWindow();
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(names);
        infowindow.open(map, this);
    });
}
function createMap(myLatlng) {
    var mapOptions = {
        zoom: 12,
        center: myLatlng
    };
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });
}
function nearbySearch(myLatLng,type) {
    var request = {
        location: myLatLng,
        radius: '1500',
        type: [type]
    };

    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);
    function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                var place = results[i];
                latlng = place.geometry.location;
                icn =  iconBase + 'info-i_maps.png';
                names= place.name;
                createMarker(latlng,icn,names);
            }
        }


    }
}
function SearchProducteur(lat,lng) {
    $.post('http://127.0.0.1:8000/api/searchProducteurs',{lat:lat,lng:lng},function (match) {
        $.each(match,function (i,val) {
            var glatval = val.lat;
            var glngval = val.lng;
            var gname = '<strong>Nom&Prénom :</strong> ' +val.first_name +' '+ val.last_name +' <br> <strong>Proféssion :</strong> '+ val.profession_id + '<br>' +' <strong>Email</strong> : ' + val.email+
                '<br> <strong>Latitude</strong> : ' + val.lat+'<br> <strong>Longitude</strong> : ' + val.lng+'<br> <strong>A propos</strong> : ' + val.about;
            var GLatLng = {lat: glatval, lng: glngval };
            // var gicn =  iconBase + 'library_maps.png';
            // var gicn = "<img src='../avatar/206544.jpg'   >";
            var gicn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
            createMarker(GLatLng,gicn,gname);
        })
    });
}




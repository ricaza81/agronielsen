@extends('layouts.app')

@section('htmlheader_title')

  Mapa de todos los prospectos
@stop

@section('main-content')
<body>
    

    
<div class="row docs-premium-template">
  <div class="col-md-6">
    <div class="box box-primary col-xs-6">                
        <div class="box-header">
         
                  <div class="callout callout-info">
                    <h3 class="box-title">Sección para crear finca de agricultor existente</h3>
                    <i class="ion ion-person-add"></i>
<style>
                    .ion {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: 18px;
    right: 30px;
    z-index: 0;
    font-size: 90px;
    color: rgba(0,0,0,0.15);
}
</style>
                       <div  style="
                                margin: auto;
                                box-shadow: none;
                                color: #76A82B;
                                font-weight: 600;
                                padding:6px;
                                margin-top: 20px;
                                border-radius:6px;
                                border:1px solid #76A82B;                                
                                background:#fff;
                                ">                   
                      </div>
                      

                  </div>
                </div><!-- /.box-header -->

                <div id="notificacion_resul_fanu"></div>
        <form  id="f_nueva_finca_agricultor"  method="post"  action="{{ url('/agregar_nueva_finca_agricultor') }}" class="" >         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                 
                        <div class="form-group">
                                <label for="cultivo">Agricultor</label>
                                              <select name="agricultor" class="form-control" id="agricultor" required>
                                <option>Selecciona un agricultor</option>
                                <?php  for($i=0;$i<=count($prospectos)-1;$i++){  if($prospectos[$i]->id !=$i){ ?>
                                       <option value="<?= $prospectos[$i]->id  ?>" ><?= $prospectos[$i]->agricultor; ?></option>
                              <?php   }} ?>
                                      </select>                  
                        </div>

                        <div class="form-group">
                                                <label for="nombre">Nombre de la Finca*</label>
                                                <input type="text" class="form-control" id="nombre_finca" name="nombre_finca" placeholder="Nombre de la Finca" required>
                        </div>
                        <div class="form-group">
                                <label for="cultivo">Cultivo</label>
                                              <select name="cultivo" class="form-control" id="cultivo" required>
                                               
                                        <?php  for($i=0;$i<=count($cultivos)-1;$i++){  if($cultivos[$i]->id !=$i){ ?>

                                              <option value="<?= $cultivos[$i]->id  ?>" ><?= $cultivos[$i]->cultivo ?></option>
                                              <?php   }} ?>
                                              </select>                   
                        </div>
                        <div class="form-group">
                                              <label for="hectareas">No. Hectareas</label>
                                              <input type="text" class="form-control" id="hectareas" name="hectareas" placeholder="Número Hectaréas" required>
                        </div>
                        <div class="form-group">
                                <label for="pais">País</label>
                                              <select name="pais" class="form-control" id="pais" required >
                                               <option>Selecciona un pais</option>
                                        <?php  for($i=0;$i<=count($paises)-1;$i++){  if($paises[$i]->id !=$i){ ?>

                                              <option value="<?= $paises[$i]->id  ?>" ><?= $paises[$i]->nombre ?></option>
                                              <?php   }} ?>
                                              </select>                   
                        </div>
                        <div class="form-group">
                                <label for="departamento">Departamento</label>
                                              <select name="departamento" class="form-control" id="departamento" required >
                                               <option> Departamento </option>
                                               <option value="">Selecciona:</option>
                                              </select>                     
                        </div>
                                                        
    <input type="hidden" class="form-control" id="zona" name="zona" placeholder="Zona" value="">
 <input type="hidden" class="form-control" id="email_jz" name="email_jz" placeholder="Zona" value="">
<input type="hidden" class="form-control" id="id_ciudad" name="id_ciudad" placeholder="id_ciudad" value="">
                 <div class="form-group ">
                                                            <button type="submit" class="nbtn-two">Crear Finca</button>
                                        </div>
                                </div>
                
                      </div>
         <div class="col-md-6">

                <div class="box box-primary col-xs-6">

                                  <div class="box-header">
                                         <h3 class="box-title"></h3>
                                 </div>


                            <div id="map"style="width:100%;height:80%;"></div>
                            <input type="text" id="coords" name="coords">
                            <input type="text" id="coords_lat" name="coords_lat">
                            <input type="text" id="coords_lon" name="coords_lon">
                            <input class="form-control" style="font-size:8px" type="text" placeholder="" id="url" name="url">
                            
          
              </div>
        </form>

          <a id="enlace" href="" style="margin-top: 0px;width: 100%;
    margin-top: 16px;
    margin-right: 0px;
    background-color: #22d976;
    border-color: #22d976;
    height: 61px;
    font-size: 24px;border-radius:5px;" target="_blank" class="btn btn-primary" >
                                    Ver pronostico
                                </a>
<style>
.nbtn-two {
    background: #3224af;
    border-radius: 6px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    font-size: 20px;
    padding: 9px 28px;
    border: 1px solid transparent;
    
}
</style>
          </div>   



      </div>

</body>
@endsection


<script>
var marker;          //variable del marcador
var coords = {};    //coordenadas obtenidas con la geolocalización
//var map, infoWindow;
//Funcion principal
initMap = function (){
    //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
              lng: position.coords.longitude,
              lat: position.coords.latitude,
            };
            var coords= coords;
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el
          },
          function(error){console.log(error);});
}




var coords = coords;
function setMapa (coords)
{   
      //Se crea una nueva instancia del objeto mapa
      var map = new google.maps.Map(document.getElementById('map'),
      {
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.HYBRID,
        center:new google.maps.LatLng(coords.lat,coords.lng),
              });
              
       var goldStar = {
          path: 'M 125,5 155,90 245,90 175,145 200,230 125,180 50,230 75,145 5,90 95,90 z',
          fillColor: 'yellow',
          fillOpacity: 0.8,
          scale: 0.2,
          strokeColor: 'gold',
          strokeWeight: 14
        };
        
        var markerLabel = {
            text: markerLabel,
            color: "#eb3a44",
            fontSize: "16px",
            fontWeight: "bold"
        };
        
        var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: 'poly'
        };
        

      //Creamos el marcador en el mapa con sus propiedades
      //para nuestro obetivo tenemos que poner el atributo draggable en true
      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
        var markerLabel = 'Aquí estoy';
        marker = new google.maps.Marker({
        map: map,
        draggable: false,
        animation: google.maps.Animation.BOUNCE,
        map: map,
        shape: shape,
        title: 'Aquí estoy!',
         icon: 'https://www.agronielsen.com/encampo/public/imagenes/maker-agronielsen.png',
       label: {
          text: markerLabel,
          color: "#fff",
          fontSize: "16px",
          fontWeight: "bold",
          background:"#fff",
          width:"100px"
             },
       
        position: new google.maps.LatLng(coords.lat,coords.lng),
        
       
      });
      
    //  google.maps.event.addDomListener(window, 'load', initMap);
      
      //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
      //cuando el usuario a soltado el marcador
   //   marker.addListener('click', toggleBounce);
      
     /*       google.maps.event.addDomListener(window, 'load', function (event)
      {
              document.getElementById("coords").value = this.getPosition().lat()+","+ this.getPosition().lng();
        });*/
        
                 
      
      marker.addListener( 'mouseover', function (event)
      {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("coords").value = this.getPosition().lat()+","+ this.getPosition().lng();
        
      });

}
//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
// Carga de la libreria de google maps 
    </script>
    


    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2O6NRzoS7rpQ4ftOgrrzOdPLHUcb1RJk&callback=initMap" async defer></script>

@section('scripts')
<script>
    $(document).ready(function(){
          navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
            lng: position.coords.longitude,
            lat: position.coords.latitude,                            }
        document.getElementById("coords").value = '{"lat":'+position.coords.latitude+',"lnt":'+ position.coords.longitude+'}';
         document.getElementById("coords_lat").value = position.coords.latitude;
        document.getElementById("coords_lon").value = position.coords.longitude; });
  var OPEN_WEATHER_MAP_API_KEY = "d13eb18064cea8bae2ef7ee7c6478111";
                    var textoActivo="MDN";
                    const lat= coords.lat;
                    const lon=coords.lng;
                    //const lat= 31.2323;
                    //const lon=121.469;
                    var params1 = {
                            "ds1.lat": lat,
                            "ds1.lon": lon,
                            "ds8.lat": lat,
                            "ds8.lon": lon,
                            "ds6.lat": lat,
                            "ds6.lon": lon,
                            "ds9.lat": lat,
                            "ds9.lon": lon
                                    };
    var params1AsString = JSON.stringify(params1);
    var encodedParams1 = encodeURIComponent(params1AsString);
    var urlencode=(JSON.stringify(encodedParams1));
    console.log(JSON.stringify(encodedParams1));
//var URL="https://developer.mozilla.org/"
//https://datastudio.google.com/u/0/reporting/afeb864b-96f8-48bc-9b94-42948cd1d35f/page/SP3gB?params=%7B%22ds1.lat%22%3Acoords.lat,ds1.loncoords.lng
//var URL="https://api.openweathermap.org/data/2.5/onecall?lat=" + lat + "&lon=" + lon + "&units=metric"  + "&appid=" + OPEN_WEATHER_MAP_API_KEY
//var URL="https://datastudio.google.com/u/0/reporting/afeb864b-96f8-48bc-9b94-42948cd1d35f/page/SP3gB?params=%7B%22ds1.lat%22%3A" + lat + "%2C%22ds1.lon%22%3A" + lon
var URL="https://datastudio.google.com/u/0/reporting/afeb864b-96f8-48bc-9b94-42948cd1d35f/page/SP3gB?params=" + urlencode.replace(/\"/g, "");
var URL2="https://datastudio.google.com/embed/reporting/eec5d08b-1dee-4ef1-afaa-37d8d93082f7/page/SP3gB/?params=" + urlencode.replace(/\"/g, "");
//var URL2 = "https://datastudio.google.com/embed/reporting/eec5d08b-1dee-4ef1-afaa-37d8d93082f7/page/SP3gB";
 //var URL="https://datastudio.google.com/u/0/reporting/afeb864b-96f8-48bc-9b94-42948cd1d35f/page/SP3gB?params=%7B%22ds1.lat%22%3Alat%2C%22ds1.lon%22%3A-76.5%7D"


//console.log("Haga click para volver a " + textoActivo.link(URL));
console.log(coords.lat);
console.log(coords.lng);
//document.getElementById("enlace").value = textoActivo.link(URL);
document.getElementById("enlace").setAttribute('href',URL);
document.getElementById("url").value=URL;
//document.getElementById("enlace1").setAttribute('href',URL);
//$('#historyframe').attr('src',URL2);
//var iframe = document.getElementById('historyframe');
//iframe.src = iframe.src + window.location.search;
// var search = window.location.search;
//$("#historyframe").attr("src", $("historyframe").attr("src")+search);

    //var lat= 3.40556;
//var lon=-76.53239;
    //const lat= coords.lat;
    //const lon=coords.lng;
    //console.log(lat + "," + lon);
    //https://api.openweathermap.org/data/2.5/onecall?lat=3.40556&lon=-76.53239&units=metric&appid=d13eb18064cea8bae2ef7ee7c6478111
    $.getJSON("https://api.openweathermap.org/data/2.5/onecall?lat=" + lat + "&lon=" + lon + "&units=metric"  + "&appid=" + OPEN_WEATHER_MAP_API_KEY,function(data) {
      var temp=(data.daily[0].temp);
      var uvi=(data.daily[0].uvi);
      var pop_origen=(data.daily[0].pop);
      var pob=pop_origen * 100;
      console.log("MaxTempOne: " + temp.max);
      console.log("MinTempOne: " + temp.min);
      console.log("UVI: " + uvi);
      console.log("pop: " + pop_origen * 100);
    $('#temp_max').html(temp.max);
    $('#temp_max').html(temp.max);
    $('#temp_min').html(temp.min);
    $('#uvi').html(uvi);
    $('#pop').html(pop_origen * 100);
});
    //https://api.openweathermap.org/data/2.5/weather?lat=3.40556&lon=-76.53239&units=metric&lang=es&appid=d13eb18064cea8bae2ef7ee7c6478111
    $.getJSON("https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + lon + "&units=metric" + "&lang=es" + "&appid=" + OPEN_WEATHER_MAP_API_KEY,function(data) {
      console.log("Weather: " + (data.weather[0].description));
      console.log("icon: " + (data.weather[0].icon));
      console.log("Pais: " + (data.sys.country));
      console.log("Ciudad: " + (data.name));
      console.log("Temp Actual: " + (data.main.temp));
      console.log("Temp Maxima: " + (data.main.temp_max));
      console.log("Temp Mínima: " + (data.main.temp_min));
      console.log("Humidity: " + (data.main.humidity));
      console.log("Pressure: " + (data.main.pressure));
      console.log("Temp in F: " + (((data.main.temp-273.15) * 1.8) + 32));
    var icon=data.weather[0].icon;
    var iconurl = "https://openweathermap.org/img/wn/" + "02n" + ".png";
    $('#pais').html(data.sys.country);
    $('#ciudad').html(data.name);
    $('#icon').attr('src',iconurl);
    $('#weather').html(data.weather[0].description);
    $('#temp_actual').html( (data.main.temp) );
    $('#humidity').html( (data.main.humidity + 0) );
    $('#pressure').html( (data.main.pressure + 0) );
    $('#tempF').html( (((data.main.temp-273.15) * 1.8) + 32) );
    });

    //https://api.openweathermap.org/data/2.5/forecast?lat=3.40556&lon=-76.53239&units=metric&appid=d13eb18064cea8bae2ef7ee7c6478111
 $.getJSON("https://api.openweathermap.org/data/2.5/forecast?lat=" + lat + "&lon=" + lon + "&units=metric"  + "&appid=" + OPEN_WEATHER_MAP_API_KEY,function(data) {
      var wind=data.list[0].wind;
      var temp_max=(data.list[0].main.temp_max);
      var temp_min=(data.list[0].main.temp_min);
      var rain = data.list[0].rain && data.list[0].rain["3h"] || 0
      console.log("Wind: " + data.list[0].wind);
      console.log("MaxTemp: " + temp_max);
      console.log("Rain: " + rain);
$('#wind').html(wind.speed);
$('#rain').html(rain);
    });
 //SOILAPI
 //API=6c421d18-f909-11ea-9025-0242ac130002-6c421e6c-f909-11ea-9025-0242ac130002

//const lat= coords.lat;
//const lon=coords.lng;
/*const lat1=3.40556;
const lon1= -76.53239;
fetch("https://api.stormglass.io/v2/bio/point?lat=${lat}&lng=${lon}&params=soilTemperature", {
  headers: {
    'Authorization': '6c421d18-f909-11ea-9025-0242ac130002-6c421e6c-f909-11ea-9025-0242ac130002'
  }
}).then((response) => response.json()).then((jsonData) => {
  // Do something with response data.
  //.then(result => console.log(result))
  console.log("SoilT: " + jsonData.hours[0].soilTemperature.noaa);
   $('#soilTemperature').html(jsonData.hours[0].soilTemperature.noaa);
  //console.log("SoilT: " + jsonData.meta.dailyQuota);
});*/

//const lat1 = 58.7984;
//const lng1 = 17.8081;
const params = 'soilTemperature';

fetch(`https://api.stormglass.io/v2/bio/point?lat=${lat}&lng=${lon}&params=${params}`, {
  headers: {
    'Authorization': '6c421d18-f909-11ea-9025-0242ac130002-6c421e6c-f909-11ea-9025-0242ac130002'
  }
}).then((response) => response.json()).then((jsonData) => {
  // Do something with response data.
   console.log("SoilT: " + jsonData.hours[0].soilTemperature.noaa);
   $('#soilTemperature').html(jsonData.hours[0].soilTemperature.noaa);
});
  //.then(result => console.log(result[0].hours))
  //.then(console.log("SoilT: " + data.hours.soilTemperature)
  //.then(result => console.log(result[0]))
  //.then(result => console.log(noaa))
  //.catch(error => console.log('error', error));

                
                },
                function (error) {
                    console.log(error);
                });
        
    </script>
<script>
$(document).ready(function() {
$("#pais").change(function(event){
$.get("/encampo/public/departamentos/"+event.target.value+"",function(response,state) {
$("#departamento").empty();
$("#departamento").append("<option value=''>Selecciona un departamento</option>");
for(i=0; i<response.length; i++) {
$("#departamento").append("<option value='"+response[i].id+"'>"+response[i].departamento+"</option>");
                                   }
                                                                 });
                               });
                               });
</script>


<script>  
$(document).ready(function() {
$("#agricultor").change(function(event){
$.get("id_ciudad_agri/"+event.target.value+"",function(response,state) {
$("#id_ciudad").empty();
var id_ciudad= response[0].id_ciudad;
$("#id_ciudad").val(id_ciudad);
                                                                  });
                                         });
                                  });
</script>

<script>  
$(document).ready(function() {
$("#departamento").change(function(event){
$.get("datos_departamento/"+event.target.value+"",function(response,state) {
$("#zona").empty();
var nombre_zona= response[0].idZona;
$("#zona").val(nombre_zona);
                                                                  });
                                         });
                                  });
</script>

<script>  
$(document).ready(function() {
$("#departamento").change(function(event){
$.get("email_jz/Z1",function(response,state) {
$("#email_jz").empty();
var nombre_zona= response[0].mail_jz;
$("#email_jz").val(nombre_zona);
                                                                  });
                                         });
                                  });
</script>

@endsection


    




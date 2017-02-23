@extends('layouts.master')
@section("title", "Welcome")
@section('content')
<div class="row">
     <div class="col-md-12">
		<div class="panel panel-white" style="min-height : 10000%;">
			<div class="panel-body" >
			    <div class="row">
		        	<div class="panel uploads">
					       <div id="map" style="width:100%;height:500px"></div>
					       <div class="alert alert-block alert-info fade in">
								<button data-dismiss="alert" class="close" type="button">
									&times;
								</button>
								<h4 class="alert-heading"><i class="fa fa-home"></i> {{$library[0]['library'] }}</h4>
								<p>
								    {{$library[0]['address'] }}
								    <a href="#" class="btn btn-blue pull-right">Visit <i class="fa fa-arrow-circle-right"></i></a>
								    
								</p>
							    <br/>
							</div>

					</div>
			    </div>
			<!--/emd of first row-->
		
			
			</div>
		</div>
	</div>
</div>

@endsection
@section('js')

<script>
/*
* @author: Nwachukwu Uchenna
* @date: 21-02-2017
* This Javascript code was for creating the map displaying the location of the school on  the map.
* The map longitude and Latitudes are values received from the LocationController.
* @variables: longitude, latitude and url
*
*/

//Saving the values gotten from the controller as variables
var longtitude = {{ $library[0]['x'] }}; //map longitude
var latitude   = {{ $library[0]['y'] }}; //map latitude
var url        = "{{$library[0]['url'] }}"; //map url

//This function is used to setup the map. check the callback parameter below to see how it was called on page load
function myMap() {
  var myCenter = new google.maps.LatLng(latitude,longtitude); //Setting the center if the map using the lat and londeclared above
  var mapCanvas = document.getElementById("map"); //Getting the id of the div where the mao would be displayed.
  var mapOptions = {center: myCenter, zoom: 18,draggable: false}; //Setting the basic map options.
  var map = new google.maps.Map(mapCanvas, mapOptions); //making the mao
  var marker = new google.maps.Marker({position:myCenter}); //Adding a marker to the map
  
  //This is an event listener that redirects the user to url of the Library where he can get more information about the Library
  google.maps.event.addListener(marker, 'click', function() {
			window.location.href = url ;
		});	
 //Set the marker on the map.
  marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgN9CIRlJracfYDyLmtXyVsemfjTMDgs0&callback=myMap"></script>


@endsection
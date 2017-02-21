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
var longtitude = {{$library[0]['x'] }}
var latitude  = {{$library[0]['y'] }}
function myMap() {
  var myCenter = new google.maps.LatLng(latitude,longtitude );
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 18};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgN9CIRlJracfYDyLmtXyVsemfjTMDgs0&callback=myMap"></script>


@endsection
@extends('layouts.master')
@section("title", "All")
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgN9CIRlJracfYDyLmtXyVsemfjTMDgs0&callback=myMap"></script>
<script>
    var locations = {!! json_encode($locations) !!};
    var userPoint = {lat: 42.2969917 , lng: -83.05012007 };
    var bounds = new google.maps.LatLngBounds();


function myMap() {
  var myCenter = new google.maps.LatLng(42.2969917,-83.05012007);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
	  	                center: myCenter,
	  	                zoom: 18,
	  	                draggable: false
                   };
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({
  	                      position:myCenter
                          });
                          
  google.maps.event.addListener(marker, 'click', function() {
		//	window.location.href = url ;
		});	
  marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgN9CIRlJracfYDyLmtXyVsemfjTMDgs0&callback=myMap"></script>



</script>
@endsection
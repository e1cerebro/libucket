@extends('layouts.master')
@section("title", "All")
@section('breadcrumbs')
	<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<a href="{{url('/')}}">Welcome</a>
			</li>
			<li class="active">
				Libraries
			</li>
		</ol>
	</div>
</div>
@endsection
@section('content')
<div class="row">
     <div class="col-md-12">
		<div class="panel panel-white" style="min-height : 10000%;">
			<div class="panel-body" >
			    <div class="row">
		        	<div class="col-md-4">
		        		<h2 class="panel-title"><span class="text-bold text-primary"><i class="fa fa-sort-amount-asc"></i> Windsor Libraries</span></h2>
						<hr/>
		        		<!--Accordion starts here-->
		   <div class="panel-group accordion" id="accordion">
			
			@foreach($locations as $location)
				<div class="panel panel-white">
					<div class="panel-heading">
						<h5 class="panel-title">
						<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$location->id}}">
							<i class="icon-arrow"></i> {{$location->library}}
						</a></h5>
					</div>
				
					<div id="collapse{{$location->id}}" class="panel-collapse collapse">
						<div class="panel-body">
						   	<span class="text-info">
						   		<i class="fa  fa-road"></i> {{$location->address}}
						   	</span>
						   
								<div class="pull-right">
								<a class="" target="_blank" href="{{$location->url}}">
								<i class="fa fa-globe"></i>	Website 
								</a>
								<span class="text-primary"><i class="fa fa-ellipsis-v"></i></span>
								<a class="view_map_bt" href="#">
								<i class="fa  fa-map-marker"></i> Map 
								</a>
								</div>
								
						</div>
					</div>
				</div>
			@endforeach
			
       	  </div>

<!-- end: ACCORDION PANEL -->
		        		
		        		
		        		
		        		
		        		
		        		
		        		
		        		
		        		
		        		
		        		<!--/Accordion ends here-->
		        	</div>
		        	<div class="col-md-8">
		        		<div class="panel uploads">
					       <div id="map" style="width:100%;height:500px"></div>
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

function initMap() {
	 locations =  [
                     ['Bridgeview Library',-83.05012007,42.29699177],
                     ['Windsor Community Museum',-83.04243349,42.31851448],
                     ['Remington Park Neighbourhood Library',-83.00621559,42.28491598],
                     ['Seminole Community Library',-82.97930053,42.31697264],
                     ['Nikola Budimir Memorial Resource Library',-83.02671616,42.26829665],
                     ['Forest Glade - Optimist Library',-82.91584705,42.3030678],
                     ['Sandwich Library',-83.07789316,42.29965953],
                     ['Central Resource Library',-83.0343100035999,42.3112700129999],
                     ['Fontainbleau Library',-82.95323669,42.29525096],
                 ];

    // Setup the different icons and shadows
    var iconURLPrefix = 'http://maps.google.com/mapfiles/ms/icons/';
    
    var icons = [
      iconURLPrefix + 'red-dot.png',
      iconURLPrefix + 'green-dot.png',
      iconURLPrefix + 'blue-dot.png',
      iconURLPrefix + 'orange-dot.png',
      iconURLPrefix + 'purple-dot.png',
      iconURLPrefix + 'pink-dot.png',      
      iconURLPrefix + 'yellow-dot.png'
    ]
    var iconsLength = icons.length;

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 24,
      center: new google.maps.LatLng(42.31697264, -82.97930053 ),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: true,
      streetViewControl: true,
      panControl: true,
      zoomControlOptions: {
         position: google.maps.ControlPosition.RIGHT_BOTTOM
      }
    });

    var infowindow = new google.maps.InfoWindow({
      maxWidth: 250
    });

    var markers = new Array();
    
    var iconCounter = 0;
    
    // Add the markers and infowindows to the map
    for (var i = 0; i < locations.length; i++) {  
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][2], locations[i][1]),
        map: map,
        icon: icons[iconCounter]
      });

      markers.push(marker);
      
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        var link = "<a href='https://smartlib-e1cerebro.c9users.io/library/singlelibrary/"+locations[i][0]+"/1'>"+locations[i][0]+"</a>";
        return function() {
          infowindow.setContent(link);
          var pos = map.getZoom();
		  map.setZoom(30);
		  map.setCenter(marker.getPosition());
          window.setTimeout(function() {map.setZoom(pos);},3000);
          infowindow.open(map, marker);
        }
      })(marker, i));
      
      iconCounter++;
      // We only have a limited number of possible icon colors, so we may have to restart the counter
      if(iconCounter >= iconsLength) {
      	iconCounter = 0;
      }
    }
	  autoCenter();
}




    function autoCenter() {
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      for (var i = 0; i < markers.length; i++) {  
				bounds.extend(markers[i].position);
      }
      //  Fit these bounds to the map
      map.fitBounds(bounds);
    }
  
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgN9CIRlJracfYDyLmtXyVsemfjTMDgs0&callback=initMap"></script>



</script>
@endsection
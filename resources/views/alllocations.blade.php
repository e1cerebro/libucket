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
		        	<div class="col-md-12 menu">
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
								<a class="view_map_bt" latitude="{{$location->y}}" longtitude="{{$location->x}}" url="{{$location->url}}" href="javascript:;" data-target=".bs-example-modal-lg" data-toggle="modal">
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
		        	<div class="hidden map">
		        		<div class="panel uploads">
<!--		        			<button class="btn btn-sm btn-default pull-right collapse_bt"><i class="fa fa-minus-circle"></i></button>
-->					       <div id="map" style="width:100%;height:500px"></div>
					    </div>
		        	</div>
			    </div>
			<!--/emd of first row-->
		
			
			</div>
		</div>
	</div>
</div>

@endsection
@section('optionals')
		<!--<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">
								×
							</button>
							<h4 id="myLargeModalLabel" class="modal-title">Modal Heading</h4>
						</div>
						<div class="modal-body">
							<p>
								Your content here.
							</p>
						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" class="btn btn-default" type="button">
								Close
							</button>
							<button class="btn btn-primary" type="button">
								Save changes
							</button>
						</div>
					</div>
				</div>
			</div>-->
@endsection
@section('js')
<script>

function collapsemenu(){
	$(".menu").removeClass("col-md-12");
	$(".menu").addClass("col-md-4");
}

function expandmenu(){
	/*$(".menu").removeClass("col-md-4");
	$(".menu").addClass("col-md-12");*/
	alert();
}

function expandmenu(){
	$(".map").addClass("col-md-8");
}
  
function showmap(){
	$(".map").removeClass("hidden");
}

function hidemap(){
	$(".map").addClass("hidden");
}

function makeMap(latitude, longtitude, url){
	
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
$('.view_map_bt').on('click',function(){
	
	collapsemenu();
	showmap();
	expandmenu();
	var latitude = $(this).attr("latitude");
	var longtitude = $(this).attr("longtitude");
	var url = $(this).attr("url");
	makeMap(latitude, longtitude, url);
    
});


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgN9CIRlJracfYDyLmtXyVsemfjTMDgs0"></script>
@endsection
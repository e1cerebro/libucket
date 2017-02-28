@extends('layouts.master')
@section("title", "Welcome")
@section('breadcrumbs')
	<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active">
				Welcome
			</li>
		</ol>
	</div>
</div>
@endsection
@section('content')
<div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-white" style="min-height : 10000%;">
			<div class="panel-body" >
			    <div class="row visible-sm visible-xs">
		        	<div class="container">
		        		@include('includes.slider')
		        	</div>
			    </div>
			    <div class="row visible-md visible-lg">
			    		<div class="container">
			    			<div class="jumbotron">
								<h1>Welcome to Windsor Libraries</h1>
								<p class="lead">
									We provide you with details about libraries in the city of Windsor, Ontario.
								</p>
								<p>
									<a role="button" href="{{url('about')}}" class="btn btn-lg btn-success">
										Learn more
									</a>
								</p>
							</div>
			    		</div>
			    	
			    </div>
			<!--/emd of first row-->
				<div class="row">
				    
				    <div class="container">
										       
							<div class="col-md-8 col-sm-12 col-xs-12">
								<div id="notes">
									<div class="panel panel-note">
										<div class="e-slider owl-carousel owl-theme">
											
											<div class="item">
												<div class="panel-heading">
													<h4 class="no-margin">Welcome</h4>
												</div>
												<div class="panel-body space10">
													<div class="note-short-content text-justify">
														This website provides information of libraries in Windsor. For users, there are two ways to get libraries' data. The first one is that users are able to input specific library name to get library data on the index page. The page would show the location marker on the google map and provide other information below the map. Another option is that they can click the link on the index page which call the library list page and then choose any library name to get the same information.
													</div>
											
												</div>
											   	<div class="panel-footer">
										        <div class=""><i class="fa fa-pencil fa-lg"></i> Chris</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					       <div class="col-md-4 col-sm-12 col-xs-12">
					       	<h4 class="panel-title"><span class="text-bold text-primary">Search Library</span></h4>
					       	<hr/>
					       	<p>Please enter the library name in the box below:</p>
					              <form action="{{route('locationsearch')}}" class="deleteform" method="post" accept-charset="utf-8">
                						{{ csrf_field() }}
                						<input name="name" class="form-control input-lg" placeholder="Enter your search keyword..." list="locations" type="text" id="name" size="70"/>
                						<br/>
                						@if(strlen(session("searcherror")) > 1)
                						   <div class="alert alert-danger">
											    <button data-dismiss="alert" class="close">×</button>
											   	{!! session("searcherror") !!}
											</div>
                						@endif
                						<input type="hidden" name="source" value="1"/>
                						<datalist id="locations">
                						    @foreach($locations as $location)
                						     <option value="{{$location->library }}"></option>
                						    @endforeach
                						</datalist>
                						<br/>
                						<button type="submit" id="search" class="btn btn-dark-azure btn-lg pull-right">Search <i class="fa fa-search"></i> </button>
                                 </form>
					       </div>
										       
							    </div>
							</div>
						
						</div>
					</div>
				</div>
</div>

@endsection
@section('js')
    <script type="text/javascript">
    
            

$(window).load(function(){
	
	if (typeof(Storage) !== "undefined") {
	
		getLocation();
	}
});
		
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
	
    var latlon = position.coords.latitude + "," + position.coords.longitude;
     x.innerHTML = "User accepted the request for Geolocation."
    
    saveLatlng(position.coords.latitude,  position.coords.longitude);
}

function saveLatlng(lat, lng){
	 $.ajax({
                  type    : "POST",
                  url     :  "https://smartlib-e1cerebro.c9users.io/library/setLatLng",
                  data    : {lat:lat, lng:lng},
                  success : callback,
                  error   : err
                });

                function callback(d, status)
                { 

                }
                function err(xhr, reason,ex ){
                  $("#info").text('there was an error in your code.'+ ex);
                }
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}


	$("#search").click(function(){
		var name = $("#name").val();
		if(name.length < 1){
			
			    $("#info").text("Please enter a library name").delay(2000).fadeOut(2000);
				return false;
		}
	
	});

        
    </script>
@endsection
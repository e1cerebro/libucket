@extends('layouts.master')
@section("title", "Welcome")
@section('breadcrumbs')
	<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li>
				<a href="{{url('/')}}">Welcome</a>
			</li>
			<li class="active">
				Contact
			</li>
		</ol>
	</div>
</div>
@endsection
@section('content')
<div class="row">
     <div class="col-md-12">
     	
     	<!--contact starts-->
     		<div class="panel panel-white" style="min-height : 10000%;">
				<div class="panel-body" >
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<!-- start: REGISTER BOX -->
				<div class="box-register">
					<h3>Contact Us</h3>
					<p>
					   We are always happy to hear from you!
					</p>
					<form class="form-register">
						
						<fieldset>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name">
							</div>
							
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder="Email">
									<i class="fa fa-envelope"></i> </span>
							</div>
							<div class="form-group">
								<div>
										<textarea maxlength="50" id="form-field-23" class="form-control limited"></textarea>
								</div>
							</div>
							<div class="form-actions">
						
								<button type="submit" class="btn btn-green pull-right">
									Send <i class="fa fa-envelope"></i>
								</button>
							</div>
						</fieldset>
					</form>
				
				</div>
				<!-- end: REGISTER BOX -->
			</div>
			<div class="col-md-3"></div>
				
				</div>
			</div>

     	<!--/ contact ends-->
     	
	</div>
</div>

@endsection
@section('js')
    <script type="text/javascript">
    

    </script>
@endsection
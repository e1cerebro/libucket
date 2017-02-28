@extends('layouts.master')
@section("title", "Contact")
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
					<div class="col-md-6 col-xs-12 col-sm-12">
						<!-- start: REGISTER BOX -->
				<div class="box-register">
					<h3><i class="fa fa-envelope fa-lg"></i>  Contact Us</h3>
					<p>
					   We are always happy to hear from you!
					</p>
					<p>
						@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

					</p>
					<form class="form-register" action="{{route('verify')}}" id="form" method="post">
						
						<fieldset>
							<div class="form-group">
								<span class="input-icon">
								   <input type="text" class="form-control" name="name" placeholder="Your name" required>
									<i class="fa fa-user"></i>
								</span>
							</div>
							
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder="Your email" required>
									<i class="fa fa-envelope"></i> </span>
							</div>
							<div class="form-group">
								<div>
										<textarea maxlength="150" name="message" id="form-field-23" class="form-control limited" required></textarea>
								</div>
							</div>
							{{csrf_field()}}
						  <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LcmehUUAAAAAD7PGAFWiJ9YXPAFj0VurO2m_SRW"></div>
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
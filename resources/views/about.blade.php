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
				About
			</li>
		</ol>
	</div>
</div>
@endsection
@section('content')
<div class="row">
@include('includes.construction');
</div>
@endsection
@section('js')
    <script type="text/javascript">
    

    </script>
@endsection
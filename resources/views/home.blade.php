@extends('admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
					<a href="{{url('/dashboard')}}" class="inbox">
                               Welcame to Live Train Tracking System
                    </a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

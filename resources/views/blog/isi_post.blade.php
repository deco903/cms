@extends('template_blog.template')
@section('isi')

<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
					    @foreach($data as $isi)
					    <img src="{{url('uploads/post/'.$isi->gambar)}}" class="img-fluid" style="width:600px;height:500px;"><br><br>
						{!!$isi->content!!}
						@endforeach
					</div>
					<!-- /row -->
				</div>
				
					
				@include('template_blog.widget')
				   
				
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

@endsection



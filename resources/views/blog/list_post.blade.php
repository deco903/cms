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
					   <!-- post -->
					   @foreach($data as $list_post)
					<div class="post post-row">
						<a class="post-img" href="{{route('post.isi', $list_post->id)}}"><img src="{{url('uploads/post/'.$list_post->gambar)}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{$list_post->category->name}}</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">{{$list_post->category->judul}}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{$list_post->users->name}}</a></li>
								<li>{{$list_post->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->
					<center>{{$data->links()}}</center>
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

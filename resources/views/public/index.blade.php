@extends('layouts.public')

@section('title', 'Blog')

@section('content')
	<!-- Content
	============================================= -->
	<section id="content">

		<div class="content-wrap">

			<div class="container clearfix">

			@if(Session::has('account_activation'))
				<div class="style-msg errormsg">
					<div class="sb-msg"><i class="icon-remove"></i> {{ session('account_activation') }}</div>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				</div>
			@endif

			@if(Session::has('account_comfirmation'))
				<div class="style-msg successmsg">
					<div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('account_comfirmation') }}</div>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				</div>
			@endif

				<!-- Post Content
				============================================= -->
				<div class="postcontent nobottommargin clearfix">

					<!-- Posts
					============================================= -->
					<div id="posts">

						@if( count($posts) > 0 )
							@foreach($posts as $post)
							
								<div class="entry clearfix">
									<div class="entry-image">
										<img src="{{ $post->photo ? $post->photo->file : url('images/blog/standard/17.jpg') }}" alt="">
									</div>
									<div class="entry-title">
										<h2>{{ $post->title }}</h2>
									</div>
									<ul class="entry-meta clearfix">
										<li><i class="icon-calendar3"></i> {{ $post->created_at->toFormattedDateString()  }}</li>
										<li><i class="icon-user"></i> {{ $post->user->role->name }}</li>
										<li><i class="icon-folder-open"></i> <a href="{{ url('/posts/category/'. strtolower($post->category->name)) }}">{{ $post->category->name }}</a></li>
										<li><i class="icon-comments"></i> {{ count($post->comments) }}</li>
									</ul>
									<div class="entry-content">
										<p>{{ $post->content }}</p>
										<a href="{{ route('show.post', $post->slug) }}"class="more-link">Read More</a>
									</div>
								</div>

							@endforeach
						@else
							<h1>No Posts Available</h1>
						@endif


					</div><!-- #posts end -->

				</div><!-- .postcontent end -->

				<!-- Sidebar
				============================================= -->
				<div class="sidebar nobottommargin col_last clearfix">
					<div class="sidebar-widgets-wrap">

						<div class="widget widget_links clearfix">							

							<h4 class="highlight-me">Categories</h4>

							<ul>
								@foreach($categories as $category)

									@if( count($category->posts) > 0 )
										<li><a href="{{ url('/posts/category/' . strtolower($category->name)) }}"><div>{{ $category->name }}</div></a></li>
									@endif
									
								@endforeach								
							</ul>

						</div>

					</div>

				</div><!-- .sidebar end -->

			</div>

		</div>

	</section><!-- #content end -->	
@endsection
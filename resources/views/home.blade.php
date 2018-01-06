@extends('layouts.master')

@section('title', 'Blog')

@section('content')
	<!-- Content
	============================================= -->
	<section id="content">

		<div class="content-wrap">

			<div class="container clearfix">

				<!-- Post Content
				============================================= -->
				<div class="postcontent nobottommargin clearfix">

					<!-- Posts
					============================================= -->
					<div id="posts">

                        <h2 class="highlight-me">Posts</h2>

					</div><!-- #posts end -->

					<!-- Pagination
					============================================= -->
					<ul class="pager nomargin">
						<li class="previous"><a href="#">&larr; Older</a></li>
						<li class="next"><a href="#">Newer &rarr;</a></li>
					</ul><!-- .pager end -->

				</div><!-- .postcontent end -->

				<!-- Sidebar
				============================================= -->
				<div class="sidebar nobottommargin col_last clearfix">
					<div class="sidebar-widgets-wrap">

						<div class="widget widget_links clearfix">

							<h4 class="highlight-me">Categories</h4>

						</div>

					</div>

				</div><!-- .sidebar end -->

			</div>

		</div>

	</section><!-- #content end -->	
@endsection
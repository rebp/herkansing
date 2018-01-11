@extends('layouts.dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">

                @if(Session::has('created_post'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('created_post') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

                @if(Session::has('updated_post'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('updated_post') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

                @if(Session::has('deleted_post'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('deleted_post') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

                <h1>{{ ( auth()->user()->isAdmin() ) ? "All Posts" : "My Posts" }}</h1>

                <table class="table table-bordered table-striped">     
                    <thead>
                        <tr>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ( auth()->user()->role_id == 1)
                            @foreach($admin_posts as $post)
                                <tr>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category ? $post->category->name : 'uncategorized' }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td><a href="{{ route('posts.edit', $post->id) }}">Edit Post</a></td>
                                    {{--  <td><a href="{{ route('home.post', $post->slug) }}">View Post</a></td>
                                    <td><a href="{{ route('admin.comments.post', $post->id) }}">View Comments</a></td>  --}}
                                    <td>View Post</td>
                                    <td>View Comments</td>
                                </tr>
                            @endforeach
                        @else
                            @foreach($non_admin_posts as $post)
                                <tr>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category ? $post->category->name : 'uncategorized' }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td><a href="{{ route('posts.edit', $post->id) }}">Edit Post</a></td>
                                    {{--  <td><a href="{{ route('home.post', $post->slug) }}">View Post</a></td>
                                    <td><a href="{{ route('admin.comments.post', $post->id) }}">View Comments</a></td>  --}}
                                    <td>View Post</td>
                                    <td>View Comments</td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

        </div>
	</section>
	
    
@endsection
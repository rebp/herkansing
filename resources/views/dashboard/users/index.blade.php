@extends('layouts.dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">

                @if(Session::has('created_user'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('created_user') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

                @if(Session::has('updated_user'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('updated_user') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

                @if(Session::has('deleted_user'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('deleted_user') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif


                <h1>All Users</h1>

                <table class="table table-bordered">     
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th></th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                
                                @if(!$user->isActive())
                                    <td>
                                        {!! Form::model($user, ['action' => ['UsersController@update_status', $user->id], 'method' => 'patch', 'class' => 'nobottommargin']) !!}
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <label class="switch">
                                                <?php echo Form::checkbox('', '', false); ?>                                             
                                                <span class="slider round"></span>                                            
                                            </label>
                                        {!! Form::close() !!}                                   
                                    </td>
                                @else
                                    <td>
                                        {!! Form::model($user, ['action' => ['UsersController@update_status', $user->id], 'method' => 'patch', 'class' => 'nobottommargin']) !!}
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <label class="switch">
                                                <?php echo Form::checkbox('', '', true); ?>                                             
                                                <span class="slider round"></span>                                            
                                            </label>
                                        {!! Form::close() !!}
                                    </td>
                                @endif                    

                                <td><a href="{{ route('users.edit', $user->id) }}">Edit</a></td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                            </tr>  
                        @endforeach  
                    </tbody>
                </table>
            </div>

        </div>
	</section>
    
@endsection

@section('script')

    <script>
        $(document).ready(function(){

            $('.switch input[type="checkbox"]').on('change', function(e){

                var $this = $(this);

                var status_state;                
                var user_id = $this.parent().prev().val();
                var token = $this.parent().prev().prev().val();
                var method = $this.parent().prev().prev().prev().val();
                var form = $this.parent().parent();
                
                if ( !e.target.checked ) {
                    status_state = 0;
                } else {
                    status_state = 1;
                }
                
                var data = {
                    "is_active" :  status_state,
                    "_method" : method,
                    "_token" : token                    
                }

                setTimeout(function(){ 


                        $.ajax({
                            method: "POST",
                            url: "/dashboard/user/status/" + user_id,
                            data: data,
                            success: function(data) {
                                console.log(data);
                            },
                            error: function(err){
                                console.log(err);
                            }
                          });


                 }, 1000);
                

            });

        });
    </script>
    
@endsection
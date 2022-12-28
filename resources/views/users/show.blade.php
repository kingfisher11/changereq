@extends('layouts.apps', ['activePage' => 'createUser', 'titlePage' => __('Add New User')])
@if(session()->has('jsAlert'))
    <script>
        alert({{ session()->get('jsAlert') }});
    </script>
@endif 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0">Starter Page</h1> --}}
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
            <h1 class="card-title"><b>
                    CREATE USER</b>
                </h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- left column -->
                    {{-- <div class="col-md-3">
                        
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="//placehold.it/160" alt="User profile picture">
                                </div>
                                
                                <p class="text-muted text-center">Upload profile image...</p>               
                                <div class="form-group">
                                    <input type="file" class="form-control-file">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div> --}}
            
                    <!-- edit form column -->
                    <div class="col-md-12">

                        <form class="form-horizontal" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name :</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">IC No :</label>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="without space ('-')" name="ic_no" value="{{ $user->nokp }}" class="form-control @error('ic_no') is-invalid @enderror" readonly>
                                </div>

                                <label class="col-sm-2 col-form-label">Email :</label>
                                <div class="col-sm-4">
                                    <input type="email" placeholder="eg: test@gmail.com" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" readonly>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone :</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control @error('phone') is-invalid @enderror"readonly>
                                        @error('phone')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                <label class="col-sm-2 col-form-label">Role<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-4">
                                    <input type="text" name="role" value="{{ $user->userRole->name ?? '' }}" class="form-control @error('role') is-invalid @enderror"readonly>
                                    </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Branch :</label>
                                <div class="col-sm-4">
                                <input type="text" name="branch" value="{{ $user->branch->name ?? '' }}" class="form-control @error('branch') is-invalid @enderror"readonly>

                                </div>
                            <label class="col-sm-2 col-form-label">Department :</label>
                                <div class="col-sm-4">
                                <input type="text" name="department" value="{{ $user->department->name ?? '' }}" class="form-control @error('department') is-invalid @enderror"readonly>
                                    
                                </div>
                        </div>


                            


                            <div class="form-group text-right">
                                <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                    SAVE</button>
                                <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@section('scripts')
<script>
    $(function() {
        //initialize select2
        $('.role').select2();
        $('.category').select2();
        $('.status').select2();
        $('.department').select2();
        $('.branch').select2();

        //set staff_no to readonly 
        $("input[name='staff_no']").attr("readonly","readonly");

        // convert to uppercase
        $('#name, #address').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });
    });



</script>
@endsection

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
                        <div class="alert alert-warning alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a> 
                            <i class="fa fa-exclamation-triangle"></i>
                            <strong>Please fill the <span style="color: red;">(*)</span>required input fields.</strong>
                        </div>
                        <form class="form-horizontal" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name<span style="color: red;">*</span> :</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
            
                                    @error('name')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">IC No<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="without space ('-')" name="ic_no" value="{{ old('ic_no') }}" class="form-control @error('ic_no') is-invalid @enderror" required>
            
                                    @error('ic_no')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-sm-2 col-form-label">Email<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <input type="email" placeholder="eg: test@gmail.com" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
            
                                    @error('email')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <input type="password" name="password" value="12345678" class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-sm-2 col-form-label">Password Confirmation<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <input type="password" name="password_confirmation" value="12345678" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone :</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="example: 01XXXXXXX" pattern="^(01)[0-46-9][0-9]{7,8}$">
                                        @error('phone')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                <label class="col-sm-2 col-form-label">Role<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-4">
                                        <select id="role" name="role" class="role form-control select2 select2-hidden-accessible @error('role') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                            <option value="">Select category</option>
                                                @foreach ($userRoles as $userRole)
                                                    <option value="{{ $userRole->id }}" {{ ((($user->userRole->id ?? '') == $userRole->id) ? 'selected' : '')}}> 
                                                        {{ $userRole->name }} 
                                                    </option>
                                                @endforeach  
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Branch<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-4">
                                        <select id="branch" name="branch" class="branch form-control select2 select2-hidden-accessible @error('branch') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                            <option value="">Select branch</option>
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}" {{ ((($user->branch->id ?? '') == $branch->id) ? 'selected' : '')}}> 
                                                        {{ $branch->name }} 
                                                    </option>
                                                @endforeach  
                                        </select>
                                        @error('branch')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                <label class="col-sm-2 col-form-label">Department<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-4">
                                        <select id="department" name="department" class="department form-control select2 select2-hidden-accessible @error('department') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                            <option value="">Select department</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}" {{ ((($user->department->id ?? '') == $department->id) ? 'selected' : '')}}> 
                                                        {{ $department->name }} 
                                                    </option>
                                                @endforeach  
                                        </select>
                                        @error('department')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
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

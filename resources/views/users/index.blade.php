@extends('layouts.apps', ['activePage' => 'users', 'titlePage' => __('Users')])

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0">Starter Page</h1> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                {{-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> --}}
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h1 class="card-title">
                <b>USER INDEX</b>
            </h1>
        </div>
        <div class="card-body">
                
                <div class="col-sm-8">
                    <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">     
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputFile">Bulk Upload</label>
                            <br>
                            @if (isset($errors) && $errors->any())
                                @foreach ($errors->all() as $error)
                                    <span style="color: red">{{ $error }}</span>
                                @endforeach
                            @endif
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile" width="20">Choose file</label>
                                </div>
                            
                                <div class="input-group-append">
                                    <button type="submit" title="Upload" class="btn btn-success"><i class="fas fa-file-upload"></i> Upload</button>
                                </div>

                                <div class="col-sm-4">
                                <a href="{{route('user.create')}}" class="btn btn-primary"> Add New </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered yajra-datatable">
                        <thead class="thead-light">
                        <tr class="text-center">
                            <th width="50">No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Branch</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $no => $user)
                            
                                <tr >
                                    <td scope="row" class="text-center">{{ ++$no }}</td>
                                    <td>
                                        {{ $user->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->email ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->userRole->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->branch->name ?? '' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.show', $user)}}" class="btn btn-primary">View</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div>
        </div>
    </div>
  </div>
</div>
@endsection
@extends('layouts.apps', ['activePage' => 'inquiry', 'titlePage' => __('Inquiry')])

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
<div class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h1 class="card-title">
                <b>TICKET INDEX</b>
            </h1>
        </div>


      <div class="card-body">
          <div class="col-sm-8">
              <form action="{{ route('department.import') }}" method="POST" enctype="multipart/form-data">     
                  @csrf
                  <div class="form-group">
                          <div class="col-sm-4">
                          <a href="{{route('ticket.create')}}" class="btn btn-primary"> Add New </a>
                          </div>
                  </div>
              </form>
          </div>

          <div class="table-responsive">
            <table id="datatable1" class="table table-bordered yajra-datatable">
                <thead class="thead-light">
                  <tr class="text-center">
                      <th width="50">No.</th>
                      <th width="150">Date</th>
                      <th>Subject</th>
                      <th width="150">Categories</th>
                      <th width="150">Status</th>
                      <th width="50">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- @foreach($activities as $no => $activity) --}}
                
                    <tr class="text-center">
                        <td scope="row" style="text-align: center"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                  {{-- @endforeach --}}
                </tbody>
            </table>  
          </div>
      </div>

    </div>
  </div>
</div>
@endsection
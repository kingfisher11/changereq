@extends('layouts.apps', ['activePage' => 'showTicket', 'titlePage' => __('Butiran Maklum Balas')])

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0">Starter Page</h1> --}}
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('tickets.index')}}">Senarai Maklum Balas</a></li>
                    <li class="breadcrumb-item active">Butiran Maklum Balas</li>
                </ol>
            </div>

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h1 class="card-title">
                <b>BUTIRAN MAKLUM BALAS</b>
            </h1>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status :</label>
                                <div class="col-sm-4">
                                <input type="text" id="sts" name="sts" value="{{ $tickets->ticketStatus->name ?? ''}}" class="form-control @error('branch') is-invalid @enderror" readonly>
                                </div>
                            <label class="col-sm-2 col-form-label">Kod Semakan :</label>
                                <div class="col-sm-4">
                                <input type="text" id="ticketType" name="ticketType" value="{{ $tickets->tracking ?? ''}}" class="form-control @error('ticketType') is-invalid @enderror" readonly>
                                    
                                </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cawangan :</label>
                                <div class="col-sm-4">
                                <input type="text" id="branch" name="branch" value="{{ $tickets->branch->name ?? ''}}" class="form-control @error('branch') is-invalid @enderror" readonly>
                                </div>
                        </div>

                        <div class="form-group row">
                            {{--<label class="col-sm-2 col-form-label">Feedback Priority :</label>
                                <div class="col-sm-4">
                                <input type="text" id="ticketPriority" name="ticketPriority" value="{{ $tickets->priority->name ?? ''}}" class="form-control @error('ticketPriority') is-invalid @enderror" readonly>
                                    
                                </div>--}}
                            <label class="col-sm-2 col-form-label">Jenis Maklum Balas :</label>
                                <div class="col-sm-4">
                                <input type="text" id="ticketType" name="ticketType" value="{{ $tickets->ticketType->name ?? ''}}" class="form-control @error('ticketType') is-invalid @enderror" readonly>
                                    
                                </div>
                        </div>

                        {{--<div class="form-group row">
                            <label class="col-sm-2 col-form-label">Feedback To :</label>
                                <div class="col-sm-4">
                                <input type="text" id="ticketCategory" name="ticketCategory" value="{{ $tickets->ticketCategory->name ?? ''}}" class="form-control @error('ticketCategory') is-invalid @enderror" readonly>

                                </div>

                        </div>--}}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama :</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" value="{{ $tickets->name ?? ''}}" class="form-control @error('name') is-invalid @enderror" readonly>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No. Tel :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="phone" value="{{ $tickets->phone ?? ''}}" class="form-control @error('phone') is-invalid @enderror" readonly>

                                </div>

                            <label class="col-sm-2 col-form-label">Email :</label>
                                <div class="col-sm-4">
                                    <input type="email" name="email" value="{{ $tickets->email ?? ''}}" class="form-control @error('email') is-invalid @enderror" readonly>

                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kategori Pengirim :</label>
                                <div class="col-sm-4">
                                <input type="text" id="category" name="category" value="{{ $tickets->category->name ?? ''}}" class="form-control @error('category') is-invalid @enderror" readonly>
                                </div>

                        </div>

                        {{--<div class="form-group row">
                            <label class="col-sm-2 col-form-label">Subject> :</label>
                                <div class="col-sm-10">
                                    <input type="text" id="subject" name="subject" value="{{ $tickets->title ?? ''}}" class="form-control @error('subject') is-invalid @enderror" readonly>

                                </div>
                        </div>--}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan :</label>
                                <div class="col-sm-10">
                                    <textarea id="details" name="details" row="3" class="form-control @error('details') is-invalid @enderror" readonly>{{ $tickets->details ?? ''}}</textarea>

                                </div>
                        </div>
                        <!-- <input type="text" id="ticketId" name="ticketId" value="{{ $tickets->id ?? ''}}" class="form-control @error('ticketId') is-invalid @enderror" readonly> -->
                        <div class="form-group text-right">
                        @if( $tickets->ticketStatus->id == 1)
                            {{-- @if( auth()->user()->user_role_id == 1 && auth()->user()->branch_id == 8)
                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                EDIT</button>
                            @endif --}}
                                <a href="{{ route('ticket.assign', $tickets->id)}}" class="btn btn-primary"> ASSIGN </a>

                        @endif
                        <a href="{{ route('ticket.reply', $tickets->id)}}" class="btn btn-primary"> BALAS</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <div class="card-header">
            <h1 class="card-title">
                <b>TINDAKAN</b>
            </h1>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table id="datatable1" class="table table-bordered yajra-datatable">
                <thead class="thead-light">
                  <tr class="text-center">
                      <th width="50">Bil.</th>
                      <th >Tarikh</th>
                      <th >Response ID</th>
                      <th >Catatan</th>
                      <th >Oleh</th>
                      <th ></th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($responses as $no => $response)
                
                    <tr class="text-center">
                        <td scope="row" style="text-align: center">{{ ++$no }}</td>
                        <td>{{ \Carbon\Carbon::parse($response->created_at)->format('d/m/Y') ?? '' }}</td>
                        <td>{{$response->id ?? ''}}</td>
                        <td>{{$response->remarks}}</td>
                        <td>{{$response->assign->name ?? ''}}</td>
                        <td><a href="{{ route('ticket.show.response', $response->id)}}" class="btn btn-primary">Papar</a></td>
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
@section('scripts')
<script>
    $(function() {
        //initialize select2
        $('.branch').select2();
        $('.department').select2();
        $('.category').select2();
        $('.ticketType').select2();
        $('.ticketPriority').select2();
        $('.ticketCategory').select2();

        //set staff_no to readonly 
        // $("input[name='staff_no']").attr("readonly","readonly");

        // convert to uppercase
        $('#name, #address').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });


    });
</script>
@endsection
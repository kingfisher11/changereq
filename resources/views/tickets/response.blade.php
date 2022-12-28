@extends('layouts.apps', ['activePage' => 'responseDetail', 'titlePage' => __('Balas')])

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
                <b>MAKLUMAT BALASAN</b>
            </h1>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Response By :</label>
                                <div class="col-sm-4">
                                <input type="text" id="assigner" name="assigner" value="{{ $responses->assign->name ?? ''}}" class="form-control @error('branch') is-invalid @enderror" readonly>
                                </div>
                            <label class="col-sm-2 col-form-label">Response Date :</label>
                                <div class="col-sm-4">
                                <input type="text" id="responseDate" name="responseDate" value="{{ \Carbon\Carbon::parse($responses->created_at)->format('d/m/Y') ?? '' }}" class="form-control @error('responseDate') is-invalid @enderror" readonly>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Issue :</label>
                                <div class="col-sm-10">
                                    <textarea id="details" name="details" row="3" class="form-control @error('details') is-invalid @enderror" readonly>{{ $responses->ticket->details ?? ''}}</textarea>

                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ticket ID :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="ticketId" value="{{ $responses->ticket->id ?? ''}}" class="form-control @error('ticketId') is-invalid @enderror" readonly>

                                </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category :</label>
                                <div class="col-sm-4">
                                <input type="text" id="ticketCategory" name="ticketCategory" value="{{ $responses->ticket->ticketCategory->name ?? ''}}" class="form-control @error('ticketCategory') is-invalid @enderror" readonly>

                                </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status :</label>
                                <div class="col-sm-4">
                                    <input type="text" id="subject" name="subject" value="{{ $responses->responseStatus->name ?? ''}}" class="form-control @error('subject') is-invalid @enderror" readonly>

                                </div>

                                <label class="col-sm-2 col-form-label">To :</label>
                                <div class="col-sm-4">
                                    <input type="text" id="subject" name="subject" value="{{ $responses->user->name ?? ''}} - {{ $responses->user->branch->name ?? ''}}" class="form-control @error('subject') is-invalid @enderror" readonly>

                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Remarks :</label>
                                <div class="col-sm-10">
                                    <textarea id="remarks" name="remarks" row="3" class="form-control @error('remarks') is-invalid @enderror" readonly>{{ $responses->remarks ?? ''}}</textarea>

                                </div>
                        </div>

                        <div class="form-group text-right">
                        @if( $responses->ticket->status_id != 6)
                                <a href="{{ route('ticket.reply.response', $responses->id)}}" class="btn btn-primary"> REPLY </a>
                        @endif
                        </div>


                    </form>
                </div>

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
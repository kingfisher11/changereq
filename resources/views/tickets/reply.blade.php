@extends('layouts.apps', ['activePage' => 'reply', 'titlePage' => __('Balasan')])

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
                    <form class="form-horizontal" action="{{ route('ticket.store.reply')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @php
                        $responder = $responses->assign->id;
                        @endphp
                        <input type="hidden" id="responder" name="responder" value="{{ $responder ?? ''}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Response to :</label>
                                <div class="col-sm-4">
                                <input type="text" id="response" name="response" value="{{ $responses->id ?? ''}}" class="form-control @error('response') is-invalid @enderror" readonly>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Issue :</label>
                                <div class="col-sm-10">
                                    <textarea id="details" name="details" row="3" class="form-control @error('details') is-invalid @enderror" readonly>{{ $responses->ticket->details ?? ''}}</textarea>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Feedback ID :</label>
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
                            <label class="col-sm-2 col-form-label">Remarks<span style="color: red;">*</span> :</label>
                                <div class="col-sm-10">
                                    <textarea id="remarks" name="remarks" row="3" class="form-control @error('remarks') is-invalid @enderror" required>{{ old('remarks') }}</textarea>

                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Set Feedback Status<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                            <select id="sts" name="sts" class="user form-control @error('sts') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                                <option value="">Select Status</option>
                                                    @foreach ($statuses as $sts)
                                                        <option value="{{ $sts->id }}" {{ $sts->id ?? ''}}> 
                                                            {{ $sts->name ?? ''}}
                                                        </option>
                                                    @endforeach  
                                            </select>
                                            @error('sts')
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
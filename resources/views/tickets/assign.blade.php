@extends('layouts.apps', ['activePage' => 'assignTicket', 'titlePage' => __('Tugaskan Maklum Balas')])

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
                    <li class="breadcrumb-item"><a href="{{route('tickets.index')}}">Indeks Maklum Balas</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('ticket.show', $tickets->id)}}">Butiran Maklum Balas</a></li>
                    <li class="breadcrumb-item active">Tugaskan</li>
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
                <b>TUGASKAN MAKLUM BALAS</b>
            </h1>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="{{ route('ticket.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                                <div class="form-group row">
                                <input type="hidden" id="ticketId" name="ticketId" value="{{ $tickets->id ?? ''}}">
                                    <label class="col-sm-2 col-form-label">Kepada<span style="color: red;">*</span> :</label>
                                        <div class="col-sm-4">
                                            <select id="user" name="user" class="user form-control select2 select2-hidden-accessible @error('user') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                                <option value="">Pilih PIC</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" {{ $user->id ?? ''}}> 
                                                            {{ $user->name ?? ''}} - {{$user->branch->name ?? ''}} 
                                                        </option>
                                                    @endforeach  
                                            </select>
                                            @error('user')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Catatan<span style="color: red;">*</span> :</label>
                                        <div class="col-sm-10">
                                            <textarea id="remarks" name="remarks" row="3" class="form-control @error('details') is-invalid @enderror" required>{{ old('remarks') }}</textarea>
                                                @error('remarks')
                                                <div class="invalid-feedback" style="display: block">
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                        </div>
                                </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                HANTAR</button>
                                <!-- <a href="#" class="btn btn-primary"> SAVE </a> -->
                        </div>
                </div>
            </div>
        </div>
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
                            <label class="col-sm-2 col-form-label">Cawangan :</label>
                                <div class="col-sm-4">
                                <input type="text" id="branch" name="branch" value="{{ $tickets->branch->name ?? ''}}" class="form-control @error('branch') is-invalid @enderror" readonly>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keutamaan :</label>
                                <div class="col-sm-4">
                                <input type="text" id="ticketPriority" name="ticketPriority" value="{{ $tickets->priority->name ?? ''}}" class="form-control @error('ticketPriority') is-invalid @enderror" readonly>
                                    
                                </div>
                            <label class="col-sm-2 col-form-label">Jenis Maklum Balas :</label>
                                <div class="col-sm-4">
                                <input type="text" id="ticketType" name="ticketType" value="{{ $tickets->ticketType->name ?? ''}}" class="form-control @error('ticketType') is-invalid @enderror" readonly>
                                    
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kepada :</label>
                                <div class="col-sm-4">
                                <input type="text" id="ticketCategory" name="ticketCategory" value="{{ $tickets->ticketCategory->name ?? ''}}" class="form-control @error('ticketCategory') is-invalid @enderror" readonly>

                                </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama :</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" value="{{ $tickets->name ?? ''}}" class="form-control @error('name') is-invalid @enderror" readonly>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No. Tel. :</label>
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
                            <label class="col-sm-2 col-form-label">Subject :</label>
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
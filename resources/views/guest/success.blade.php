@extends('layouts.appguest',['title'=>'Feedback Recorded'])

@section('content')
<!-- Main content -->
<br><br>
<div class="container">
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="card card-primary card-outline">
            </br>
            <img class="rounded mx-auto d-block text-center responsive" src="{{ asset('assets/img/logoKPTM.png') }}">
            <div class="card-header">
                <h3 class="text-center"><b>
                    MAKLUM BALAS DITERIMA</b>
                </h3>
            </div>
            <div class="card-body">
                
                <div class = "text-center">
                    <img class="rounded mx-auto text-center" src="{{ asset('assets/img/letter.gif') }}">
                    <h5 class="text-center"><b>Status : <span style="color: green;">{{ $tickets->ticketStatus->name ?? ''}}</span></b></h5>
                    <h5 class="text-center"><b>Kod Maklum Balas : <span style="color: blue;"><label class="pointer" id="trackingId" onclick="copyTrackingId('#trackingId')">{{ $tickets->tracking ?? ''}}</label> </span></b><i>(Simpan kod ini untuk semakan)</i></h5>
                
                </div>

                <form class="form-horizontal" action="{{ route('guest.feedback.store') }}" method="POST" enctype="multipart/form-data">

                    <div class="card-body">
                    
                            @csrf
                        <!-- <h4 class="text-left"><b>Maklumat Diadu:</b></h4> -->
                        <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cawangan :</label>
                                    <div class="col-sm-4">
                                    <input type="text" id="branch" name="branch" value="{{ $tickets->branch->name ?? ''}}" class="form-control @error('branch') is-invalid @enderror" readonly>
                                    </div>
                                <label class="col-sm-2 col-form-label">Jenis Maklumbalas :</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="ticketType" name="ticketType" value="{{ $tickets->ticketType->name ?? ''}}" class="form-control @error('ticketType') is-invalid @enderror" readonly>
                                    </div>
                            </div>
                           {{-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keutamaan<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="ticketPriority" name="ticketPriority" value="{{ $tickets->priority->name ?? ''}}" class="form-control @error('ticketPriority') is-invalid @enderror" readonly>
                                        
                                    </div>

                            </div>--}}

                            {{--<div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ditujukan Kepada :</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="ticketCategory" name="ticketCategory" value="{{ $tickets->ticketCategory->name ?? ''}}" class="form-control @error('ticketCategory') is-invalid @enderror" readonly>
                                    </div>

                            </div>--}}
                    </div>

                    <div class="card-body"> 
                        <br>

                        <h4 class="text-left"><b>Maklumat Pengirim:</b></h4>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-10">
                                    <input type="text" id="name" name="name" value="{{ $tickets->name ?? ''}}" class="form-control @error('name') is-invalid @enderror" readonly>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. H/P<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-4">
                                    <input type="text" name="phone" value="{{ $tickets->phone ?? ''}}" class="form-control @error('phone') is-invalid @enderror" readonly>
                                    </div>

                                <label class="col-sm-2 col-form-label">Email<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-4">
                                    <input type="email" name="email" value="{{ $tickets->email ?? ''}}" class="form-control @error('email') is-invalid @enderror" readonly>

                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="category" name="category" value="{{ $tickets->category->name ?? ''}}" class="form-control @error('category') is-invalid @enderror" readonly>
                                    </div>

                            </div>
                           {{-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Perkara<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-10">
                                    <input type="text" id="subject" name="subject" value="{{ $tickets->title ?? ''}}" class="form-control @error('subject') is-invalid @enderror" readonly>

                                    </div>
                            </div>--}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keterangan<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-10">
                                    <textarea id="details" name="details" row="3" class="form-control @error('details') is-invalid @enderror" readonly>{{ $tickets->details ?? ''}}</textarea>
                                    </div>
                            </div>


                    </div>

                    <div class="form-group text-right">
                        @if( $tickets->ticketStatus->id == 1)
                            <div class="card-body text-center">
                                <p>Maklum balas anda sedang diproses. Harap bersabar.</p>
                            </div> 
                        @else
                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>REPLY</button>
                        @endif
                    </div>
                </form>
                <hr>
                <div class="card-body">
                    <div class="card-body text-center">
                        <p><a href="{{ route('guest.feedback.create') }}"><button class="btn btn-info">Kembali ke halam utama</button></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

@endsection
@section('scripts')
<script>

function copyTrackingId(element) {
  var $temp = $("<input>");
  
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  alert('Kod Maklum Balas Telah Disalin!');
  $temp.remove();
}



</script>
@endsection
@extends('layouts.appguest',['title'=>'Semakan Maklum Balas'])

@section('content')
<br><br>
<div class="container">
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="card card-primary card-outline">
            </br>
            <img class="rounded mx-auto d-block text-center responsive" src="{{ asset('assets/img/logoKPTM.png') }}">
            <div class="card-header">
                <h3 class="text-center"><b>
                    SEMAKAN - BUTIRAN MAKLUM BALAS</b>
                </h3>
            </div>
            <div class="card-body">
            @if($responses != null)
                <div class = "text-center">
                    <img class="rounded mx-auto text-center" src="{{ asset('assets/img/letter.gif') }}">
                    <h5 class="text-center"><b>Status : <span style="color: green;">{{ $tickets->ticketStatus->name ?? ''}}</span></b></h5>
                    <h5 class="text-center"><b>Kod Maklum Balas : <span style="color: blue;"><a href="" value="{{ $tickets->tracking ?? ''}}" onclick="myFunction()" id="tracking">{{ $tickets->tracking ?? ''}}</a> </span></b><i>(Simpan kod ini untuk semakan)</i></h5>
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
                                <label class="col-sm-2 col-form-label">Jenis Maklum Balas :</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="ticketType" name="ticketType" value="{{ $tickets->ticketType->name ?? ''}}" class="form-control @error('ticketType') is-invalid @enderror" readonly>
                                    </div>
                            </div>
                           {{-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keutamaan<span style="color: red;">*</span> :</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="ticketPriority" name="ticketPriority" value="{{ $tickets->priority->name ?? ''}}" class="form-control @error('ticketPriority') is-invalid @enderror" readonly>
                                        
                                    </div>

                            </div>

                            <div class="form-group row">
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
                            {{--<div class="form-group row">
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

                   {{-- <div class="form-group text-right">
                        @if( $tickets->ticketStatus->id == 1)
                            <div class="card-body text-center">
                                <p>Maklum balas anda sedang diproses. Harap bersabar.</p>
                            </div> 
                        @else
                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>REPLY</button>
                        @endif
                    </div> --}}

                

                    <div class="card-header">
                        <h1 class="card-title">
                            <b>RESPONSE</b>
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable2" class="table yajra-datatable">
                                <thead class="thead-dark">
                                <tr class="text-center">
                                    <th width="50">No.</th>
                                    <th width="100">Date</th>
                                    <th width="300">Respond by</th>
                                    <th >Remarks</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($responses as $no => $response)
                                        @if($response->status_id == 6)
                                        <tr class="text-center">
                                            <td scope="row" style="text-align: center">{{ ++$no }}</td>
                                            <td>{{ \Carbon\Carbon::parse($response->created_at)->format('d/m/Y') ?? '' }}</td>
                                            <td>{{$response->assign->name ?? ''}} - {{$response->assign->department->name ?? ''}}</td>
                                            <td>{{$response->remarks}}</td>
                                        </tr>
                                        <tr>
                                        @else

                                        <td colspan="4" scope="row" style="text-align: center">Maklum balas anda sedang diproses</td>

                                        @endif
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table> 
                        </div>
                    </div>
                </form>
            @else
                <div class="card-body text-center">
                    <p>Kod maklum balas yang dimasukkan tiada dalam rekod!</p>
                </div> 
            @endif
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
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("tracking");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Feedback code copied!");
}

</script>
@endsection
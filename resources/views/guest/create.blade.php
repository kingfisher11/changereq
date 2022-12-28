@extends('layouts.appguest',['title'=>'Sistem Maklum Balas'])

@section('content')
<!-- Main content -->
<br><br>
@php
$jenis = '';
$jenisId = '';
@endphp
<div class="container">
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="card card-primary card-outline" >
            </br>
            <img class="rounded mx-auto d-block text-center responsive" src="{{ asset('assets/img/logoKPTM.png') }}">
            <div class="card-header">
                <h3 class="text-center"><b>
                    MAKLUM BALAS PELANGGAN</b>
                </h3>
            </div>
            <div class="card-body text-center">
            <p>Selamat datang ke Sistem Maklum Balas Pelanggan KPTM. Pihak kami mengalu-alukan anda untuk mengemukaan sebarang aduan, pertanyaan, cadangan atau penghargaan.
            Maklum balas anda akan membantu pihak kami melayani anda dengan lebih baik.</p>

            <p><i>We invite you to submit the complaint, inquiry, suggestion or appreciation.
            Your feedback will help us serve you better.</i></p>
            </div>
            <div class="card-body">
                <h5 class="text-center"><i>Sila pilih jenis maklum balas:</i></h5>
                <div class = "text-center">
                    <a id="aduan" target="_blank" href="http://aduan.kptm.edu.my/eaduan/"><img id="aduanImg" class="rounded mx-auto text-center respCard" src="{{ asset('assets/img/aduan.jpg') }}"></a>
                    <a  href="#" id="cadangan"><img id="cadanganImg" class="rounded mx-auto text-center respCard" src="{{ asset('assets/img/cadangan.jpg') }}"></a>
                    <a href="#" id="penghargaan"><img id="penghargaanImg" class="rounded mx-auto text-center respCard" src="{{ asset('assets/img/penghargaan.jpg') }}"></a>
                    <a href="#" id="pertanyaan"><img id="pertanyaanImg" class="rounded mx-auto text-center respCard" src="{{ asset('assets/img/pertanyaan.jpg') }}"></a>
                    <a href="#" id="semakan"><img id="semakanImg" class="rounded mx-auto text-center respCard" src="{{ asset('assets/img/semakan.jpg') }}"></a>
                </div>
            


                <form class="form-horizontal" action="{{ route('guest.feedback.store', $ticket->id ?? '') }}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group text-center d-none" id="resetbtn" >
                            <button class="btn btn-primary mr-1 btn-reset" type="reset" id="reselect"><i class="fa fa-redo"></i> PILIH SEMULA JENIS MAKLUM BALAS</button>
                        </div>
                        <!-- Maklumat Penerima -->
                        <div class="card-body d-none" id="penerima" name="penerima">
                            <div class="alert alert-warning alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert">×</a> 
                                <i class="fa fa-exclamation-triangle"></i>
                                <strong>Ruangan bertanda <span style="color: red;">(*)</span>adalah wajib diisi.</strong>
                            </div>
                        
                                @csrf
                            <!-- <h4 class="text-left"><b> {{$jenis}}</b></h4> -->
                            <input type="hidden" id="jenis" name="jenis" value="{{ $jenis }}">
                            <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Cawangan<span style="color: red;">*</span> :</label>
                                        <div class="col-sm-4">
                                            <select id="branch" name="branch" class="branch form-control @error('branch') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                                <option value="">Pilih Cawangan</option>
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
                                        <!-- <input type="text" id="ticketType" name="ticketType" value="{{ $jenis ?? ''}}" class="form-control @error('ticketType') is-invalid @enderror" readonly> -->
                                        <!-- <label class="col-sm-2 col-form-label">Jenis Maklumbalas<span style="color: red;">*</span> :</label> -->
                                        <!-- <div class="col-sm-4"> -->
                                            <select style="display: none" id="ticketType" name="ticketType" class="ticketType form-control @error('ticketType') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                                <option value="">Pilih Jenis Maklumbalas</option>
                                                    @foreach ($ticketTypes as $ticketType)
                                                        <option value="{{ $ticketType->id }}" {{ ((($user->ticketType->id ?? $jenisId) == $ticketType->id) ? 'selected' : '')}}> 
                                                            {{ $ticketType->name }} 
                                                        </option>
                                                    @endforeach  
                                            </select> 
                                            @error('ticketType')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        <!-- </div> -->

                                </div>
                                <!-- <div class="form-group row"> -->
                                    <!-- <label class="col-sm-2 col-form-label">Keutamaan<span style="color: red;">*</span> :</label> -->
                                        <div class="col-sm-4">
                                            <select style="display: none" id="ticketPriority" name="ticketPriority" class="ticketPriority form-control @error('ticketPriority') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                                <option value="">Pilih Keutamaan</option>
                                                    @foreach ($priorities as $ticketPriority)
                                                        <option value="{{ $ticketPriority->id }}" {{ ((($user->ticketPriority->id ?? '1') == $ticketPriority->id) ? 'selected' : '')}}> 
                                                            {{ $ticketPriority->name }} 
                                                        </option>
                                                    @endforeach  
                                            </select>
                                            @error('ticketPriority')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                <!-- </div> -->

                                {{--<div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Ditujukan Kepada<span style="color: red;">*</span> :</label>
                                        <div class="col-sm-10">
                                            <select id="ticketCategory" name="ticketCategory" class="ticketCategory form-control @error('ticketPriority') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                                <option value="">Pilih Pihak Yang Ditujukan</option>
                                                    @foreach ($ticketCategories as $ticketCategory)
                                                        <option value="{{ $ticketCategory->id }}" {{ ((($user->ticketCategory->id ?? '') == $ticketCategory->id) ? 'selected' : '')}}> 
                                                            {{ $ticketCategory->name }} 
                                                        </option>
                                                    @endforeach  
                                            </select>
                                            @error('ticketCategory')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                </div>--}}

                        </div>
                        <!-- End Maklumat Penerima -->
                        <!-- Maklumat Pengirim -->
                        <div class="card-body d-none" name="pengirim" id="pengirim"> 
                            <br>
                            <h4 class="text-left"><b>Maklumat Pengirim:</b></h4>
                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama<span style="color: red;">*</span> :</label>
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
                                    <label class="col-sm-2 col-form-label">No. H/P<span style="color: red;">*</span> :</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="example: 01XXXXXXX" pattern="^(01)[0-46-9][0-9]{7,8}$">
                                            @error('phone')
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
                                    <label class="col-sm-2 col-form-label">Kategori<span style="color: red;">*</span> :</label>
                                        <div class="col-sm-4">
                                            <select id="category" name="category" class="category form-control @error('category') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                                <option value="">Select category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ ((($user->category->id ?? '') == $category->id) ? 'selected' : '')}}> 
                                                            {{ $category->name }} 
                                                        </option>
                                                    @endforeach  
                                            </select>
                                            @error('category')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                </div>
                               {{-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Perkara<span style="color: red;">*</span> :</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" required>
                    
                                            @error('subject')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                </div>--}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan<span style="color: red;">*</span> :</label>
                                        <div class="col-sm-10">
                                            <textarea id="details" name="details" row="3" class="form-control @error('details') is-invalid @enderror" required>{{ old('details') }}</textarea>
                                            @error('details')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" name="ack" id="ack" value = 1 required> Saya akui maklumat yang diberikan adalah benar.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- End Maklumat Pengirim -->
                        <div class="form-group text-right d-none" id="sendbtn" >
                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> HANTAR</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> KOSONGKAN BORANG</button>
                        </div>
                    

                    </div>
                </form>

                <form class="form-horizontal" action="{{ route('ticket.search') }}">
                    <div class="card-body d-none" id="carian" name="carian">
                        <div class="card-body text-center">
                        <p>Sila masukan kod maklum balas dan tekan butang semak untuk melihat perkembangan maklum balas anda.</p>
                        </div>
                        <div class="input-group">

                            <input type="text" class="form-control mr-2" name="tracking" placeholder="Kod Maklum Balas. Contoh: YjQyZWYzZD" id="tracking" value="{{ old('tracking')}}" required>
                            <span class="input-group-btn mr-5 mt-1">
                                <button class="btn btn-info" type="submit" title="Semak">
                                    <span class="fas fa-search"></span> Semak
                                </button>
                            </span>
                        </div>
                        <br>
                        <br>
                    </div>
                </form>

                <div class="card-body">
                    <div class="card-body text-center">
                        <p><a href="{{ route('login') }}"><button class="btn btn-info">Halaman Admin</button></a></p>
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
    $(document).ready(function(){

        // $('#sendbtn').slideUp(1000);
        // $('#pengirim').hide();
    $('#name, #address').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });

    $('#cadangan').click(function() {
        $(this).data('clicked', true);
        if($("#cadangan").data('clicked'))
        {
            $('#aduan').css('pointer-events','none');
            $('#pertanyaan').css('pointer-events','none');
            $('#penghargaan').css('pointer-events','none');
            $('#semakan').css('pointer-events','none');

            // $('#pengirim').css('visibility','visible');
            $('#pengirim').removeClass('d-none').show(500);
            $('#penerima').removeClass('d-none').show(500);
            $('#resetbtn').removeClass('d-none').show(500);
            var $jenis = "Cadangan";
            var $jenisId = 4;
            document.getElementById("jenis").value = $jenis;
            document.getElementById("ticketType").value = $jenisId;

            // alert($jenisId);
            // $('#pengirim').removeClass('d-none');
            document.getElementById("aduanImg").src="{{ asset('assets/img/aduandisable.jpg') }}";
            document.getElementById("penghargaanImg").src="{{ asset('assets/img/penghargaandisable.jpg') }}";
            document.getElementById("pertanyaanImg").src="{{ asset('assets/img/pertanyaandisable.jpg') }}";
            document.getElementById("semakanImg").src="{{ asset('assets/img/semakandisable.jpg') }}";
        }
        
    });

    $('#pertanyaan').click(function() {
        $(this).data('clicked', true);
        if($("#pertanyaan").data('clicked'))
        {
            $('#aduan').css('pointer-events','none');
            $('#cadangan').css('pointer-events','none');
            $('#penghargaan').css('pointer-events','none');
            $('#semakan').css('pointer-events','none');

            // $('#pengirim').css('visibility','visible');
            $('#pengirim').removeClass('d-none').show(500);
            $('#penerima').removeClass('d-none').show(500);
            $('#resetbtn').removeClass('d-none').show(500);
            var $jenis = "Pertanyaan";
            var $jenisId = 3;
            document.getElementById("jenis").value = $jenis;
            document.getElementById("ticketType").value = $jenisId;
            // $('#pengirim').removeClass('d-none');
            document.getElementById("aduanImg").src="{{ asset('assets/img/aduandisable.jpg') }}";
            document.getElementById("penghargaanImg").src="{{ asset('assets/img/penghargaandisable.jpg') }}";
            document.getElementById("cadanganImg").src="{{ asset('assets/img/cadangandisable.jpg') }}";
            document.getElementById("semakanImg").src="{{ asset('assets/img/semakandisable.jpg') }}";
        }
        
    });

    $('#penghargaan').click(function() {
        $(this).data('clicked', true);
        if($("#penghargaan").data('clicked'))
        {
            $('#aduan').css('pointer-events','none');
            $('#cadangan').css('pointer-events','none');
            $('#pertanyaan').css('pointer-events','none');
            $('#semakan').css('pointer-events','none');

            // $('#pengirim').css('visibility','visible');
            $('#pengirim').removeClass('d-none').show(500);
            $('#penerima').removeClass('d-none').show(500);
            $('#resetbtn').removeClass('d-none').show(500);
            var $jenis = "Penghargaan";
            var $jenisId = 1;
            document.getElementById("jenis").value = $jenis;
            document.getElementById("ticketType").value = $jenisId;
            // $('#pengirim').removeClass('d-none');
            document.getElementById("aduanImg").src="{{ asset('assets/img/aduandisable.jpg') }}";
            document.getElementById("pertanyaanImg").src="{{ asset('assets/img/penghargaandisable.jpg') }}";
            document.getElementById("cadanganImg").src="{{ asset('assets/img/cadangandisable.jpg') }}";
            document.getElementById("semakanImg").src="{{ asset('assets/img/semakandisable.jpg') }}";
        }
        
    });

    $('#semakan').click(function() {
        $(this).data('clicked', true);
        if($("#semakan").data('clicked'))
        {
            $('#aduan').css('pointer-events','none');
            $('#cadangan').css('pointer-events','none');
            $('#pertanyaan').css('pointer-events','none');
            $('#penghargaan').css('pointer-events','none');

            // $('#pengirim').css('visibility','visible');
            $('#carian').removeClass('d-none').show(500);
            $('#resetbtn').removeClass('d-none').show(500);
            var $jenis = "Semakan";
            document.getElementById("jenis").value = $jenis;
            // $('#pengirim').removeClass('d-none');
            document.getElementById("aduanImg").src="{{ asset('assets/img/aduandisable.jpg') }}";
            document.getElementById("pertanyaanImg").src="{{ asset('assets/img/penghargaandisable.jpg') }}";
            document.getElementById("cadanganImg").src="{{ asset('assets/img/cadangandisable.jpg') }}";
            document.getElementById("penghargaanImg").src="{{ asset('assets/img/penghargaandisable.jpg') }}";
        }
        
    });
        // document.getElementById('cadangan').onclick = function() {
            
        //     document.getElementById('cadangan').disabled = true;

            
        //     };
        $('#ack').click(function() {
            // if(this.checked) {
            //     $("sendbtn").attr("visibility","show");
            // }
            if(document.getElementById('ack').checked) {
                // $('#sendbtn').css('visibility','visible');
                $('#sendbtn').removeClass('d-none').show(500);
            } else {
                // $('#sendbtn').css('visibility','hidden');
                $('#sendbtn').hide(500);
            }
        });

        $('#reselect').click(function() {
            location.reload();

        });


    });
</script>
@endsection


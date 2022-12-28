@extends('layouts.appguest',['title'=>'Feedback Recorded'])

@section('content')
<!-- Main content -->
<br><br>
<div class="container text-center">
    <div class="container-fluid">
        <!-- Begin Page Content -->
        <div class="card card-primary card-outline">
            </br>
            <img class="rounded mx-auto d-block text-center" src="{{ asset('assets/img/logoKPTM.png') }}">
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
        </div>
    </div>
</div>
@endsection
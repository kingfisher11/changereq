@extends('layouts.app')


@section('content')
<div class="login-box">
    <img src="{{ asset('assets/img/logoKPTM.png') }}" class="text-center" width="100%">
    <!-- /.login-logo -->
    <div class="card card-outline card-danger">
        <div class="card-header text-center">
            <a href="#" class="h2"> <b>FEEDBACK</b> SYSTEM</a>
        </div>
        <div class="card-body">
            @if (session('status')=='false')
            <table class="table table-danger">
                @foreach (session('message') as $item)
                <tr>
                    <td>{{$item}}</td>
                </tr>
                @endforeach
            </table>
            <hr>
            @endif
            <form name="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" value="{{old('email')}}"  placeholder="Email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>   
                    @enderror
                    
                </div>

                <div class="input-group mb-3">
                    <input type="password" placeholder="Password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="error invalid-feedback">{{ $message }}</span>   
                    @enderror
                </div>

                <div class="d-grid mx-auto">
                    <button type="submit" class="btn btn-danger btn-block">Log In</button>
                </div>
            </form>
  
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection

@section('scripts')
<script>
 
</script>
@endsection
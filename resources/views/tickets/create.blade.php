@extends('layouts.apps', ['activePage' => 'createTicket', 'titlePage' => __('New Feedback')])

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
                <b>NEW FEEDBACK</b>
            </h1>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> 
                        <i class="fa fa-exclamation-triangle"></i>
                        <strong>Please fill the <span style="color: red;">(*)</span>required input fields.</strong>
                    </div>
                    <form class="form-horizontal" action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Branch<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <select id="branch" name="branch" class="branch form-control select2 select2-hidden-accessible @error('branch') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        <option value="">Select branch</option>
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
                            {{-- <label class="col-sm-2 col-form-label">Department<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <select id="department" name="department" class="department form-control select2 select2-hidden-accessible @error('department') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        <option value="">Select department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" {{ ((($user->department->id ?? '') == $department->id) ? 'selected' : '')}}> 
                                                    {{ $department->name }} 
                                                </option>
                                            @endforeach  
                                    </select>
                                    @error('department')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div> --}}
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Feedback Priority<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <select id="ticketPriority" name="ticketPriority" class="ticketPriority form-control select2 select2-hidden-accessible @error('ticketPriority') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        <option value="">Select feedback priority</option>
                                            @foreach ($priorities as $ticketPriority)
                                                <option value="{{ $ticketPriority->id }}" {{ ((($user->ticketPriority->id ?? '') == $ticketPriority->id) ? 'selected' : '')}}> 
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
                            <label class="col-sm-2 col-form-label">Feedback Type<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <select id="ticketType" name="ticketType" class="ticketType form-control select2 select2-hidden-accessible @error('ticketType') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        <option value="">Select Feedback type</option>
                                            @foreach ($ticketTypes as $ticketType)
                                                <option value="{{ $ticketType->id }}" {{ ((($user->ticketType->id ?? '') == $ticketType->id) ? 'selected' : '')}}> 
                                                    {{ $ticketType->name }} 
                                                </option>
                                            @endforeach  
                                    </select>
                                    @error('ticketType')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Feedback To<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <select id="ticketCategory" name="ticketCategory" class="ticketCategory form-control select2 select2-hidden-accessible @error('ticketPriority') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        <option value="">Select feedback to</option>
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

                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name<span style="color: red;">*</span> :</label>
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
                            <label class="col-sm-2 col-form-label">Phone<span style="color: red;">*</span> :</label>
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
                            <label class="col-sm-2 col-form-label">Category<span style="color: red;">*</span> :</label>
                                <div class="col-sm-4">
                                    <select id="category" name="category" class="category form-control select2 select2-hidden-accessible @error('category') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        <option value="">Select sender category</option>
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

                        {{--<div class="form-group row">
                            <label class="col-sm-2 col-form-label">Subject<span style="color: red;">*</span> :</label>
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
                            <label class="col-sm-2 col-form-label">Description<span style="color: red;">*</span> :</label>
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
                                <input type="checkbox" name="ack" value = 1 required> Saya akui maklumat yang diberikan adalah benar.
                                </label>
                            </div>
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
        $('#name, #address, #subject').keyup(function() {
            this.value = this.value.toLocaleUpperCase();
        });


    });
</script>
@endsection
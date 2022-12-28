@extends('layouts.apps', ['activePage' => 'tickets', 'titlePage' => __('Maklum Balas - Selesai')])

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
                    <li class="breadcrumb-item">Senarai Maklum Balas - Selesai</li>
                    
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
                <b>SENARAI MAKLUM BALAS - SELESAI</b>
            </h1>
        </div>


      <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tapis Maklum Balas :</label>
                    <div class="col-sm-4">
                        <form action="" enctype="multipart/form-data">
                                
                                <select id="ticketTypeReq" name="ticketTypeReq" onChange ="this.form.submit()" class="form-control @error('branch_id') is-invalid @enderror" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="">Pilih Kategori </option>
                                        @foreach ($ticketTypes as $ticketType)
                                            <option value="{{ $ticketType->id }}" {{ ($ticketTypeReq  == $ticketType->id  ) ? 'selected' : ''}}> 

                                                {{ $ticketType->name }} 
                                            </option>
                                        @endforeach  
                                </select>
                                
                        </form>
                    </div>
            </div>

          <div class="col-sm-8">
              <form action="" method="POST" enctype="multipart/form-data">     
                  @csrf
                  <div class="form-group">
                          <div class="col-sm-4">
                            <a href="{{route('ticket.create')}}" class="btn btn-primary"> Tambah </a>
                            <a href="#" class="btn btn-primary"> Cetak </a>
                          </div>

                  </div>
              </form>
          </div>

          <div class="table-responsive">
            <table id="datatable1" class="table table-bordered yajra-datatable">
                <thead class="thead-light">
                  <tr class="text-center">
                      <th width="50">Bil.</th>
                      <th >Tarikh</th>
                      <th>Keterangan</th>
                      <th >Cawangan</th>
                      <th >Jenis</th>
                      <th >Status</th>
                      <th ></th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($tickets as $no => $ticket)
                
                    <tr class="text-center">
                        <td scope="row" style="text-align: center">{{ ++$no }}</td>
                        <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y') ?? '' }}</td>
                        <td>{{$ticket->details ?? ''}}</td>
                        <td>{{$ticket->branch->name ?? ''}}</td>
                       {{-- <td>
                            @if ($ticket->priority->id == 4)
                                <b><span style="color: red;">{{$ticket->priority->name ?? ''}}</span></b>
                            @elseif ($ticket->priority->id == 3) 
                                <b><span style="color: orange;">{{$ticket->priority->name ?? ''}}</span></b>
                            @elseif ($ticket->priority->id == 2)
                                <b><span style="color: yellow;">{{$ticket->priority->name ?? ''}}</span></b>
                            @else
                                <b><span style="color: grey;">{{$ticket->priority->name ?? ''}}</span></b>
                            @endif
                        </td> --}}
                        <td>{{$ticket->ticketType->name ?? ''}}</td>
                        <td>{{$ticket->ticketStatus->name ?? ''}}</td>
                        <td><a href="{{ route('ticket.show', $ticket)}}" class="btn btn-primary">Papar</a></td>
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
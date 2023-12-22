@extends('layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Respondens</h4>
              <a href="{{ route('export') }}" class="btn btn-sm btn-success mb-2" style="float: right;">EXPORT <span class="mdi mdi-file-excel"></span></a>
              {{-- <p class="card-description">
                Add class <code>.table-striped</code>
              </p> --}}
              <div class="table-responsive">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        Responden IP
                      </th>
                      <th>
                        Nama Lengkap Responden
                      </th>
                      <th style="width: 200px;">
                        Jawaban
                      </th>
                      <th>
                        PRINT
                      </th>
                      {{-- <th>
                        Progress
                      </th> --}}
                      <th>
                        Tanggal mengisi survey
                      </th>
                      <th>
                        Kritik & Saran
                      </th>
                      <th>
                        Skor
                      </th>
                      <th>
                        
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($respondens as $key => $responden)
                    <tr>
                      <td>
                         {{ $key+1 }}
                      </td>
                      <td class="py-1">
                        {{ $responden->ip_address }}
                        {{-- <img src="{{ asset('assets/images/faces/face1.jpg')}}" alt="image"/> --}}
                      </td>
                      <td class="py-1">
                        {{ $responden->name }}
                      </td>
                      <td>
                        <a href="{{ route('answers', $responden->id) }}" class="btn btn-primary btn-sm">View Answers</a>
                      </td>
                      <td>
                        <a href="{{ route('print', $responden->id) }}" class="btn btn-danger btn-sm"><span class="mdi mdi-file-pdf"></span></a>
                      </td>
                      {{-- <td>
                        <div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </td> --}}
                      <td>
                        {{ $responden->criticism_and_suggestions }}
                      </td>
                      <td>
                        {{ $responden->created_at->format('d-m-Y H:i:s') }}
                      </td>
                      <td>
                        {{ $responden->score }}
                      </td>
                      <td>
                          <a href="{{ route('responden.destroy', $responden->id) }}" class="btn btn-danger add todo-list-add-btn btn-sm"  data-confirm-delete="true">
                            Delete
                          </a>
                        {{-- <button type="submit" class="add btn btn-warning todo-list-add-btn btn-sm" id="add-task"  data-toggle="modal" data-target="#modalEdit">Edit</button> --}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('layouts.includes.footer')
    <!-- partial -->
  </div>
@stop
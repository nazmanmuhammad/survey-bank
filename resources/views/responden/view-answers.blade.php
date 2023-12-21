@extends('layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Answers</h4>
              {{-- <p class="card-description">
                Add class <code>.table-striped</code>
              </p> --}}
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>
                        No
                      </th>
                      <th style="width: 200px;">
                        Question
                      </th>
                      <th>
                        Answer
                      </th>
                      <th>
                        Submit Date
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($responden->answers as $answer)
                    <tr>
                      <td class="py-1">
                        {{ $answer->question->serial_number }}
                        {{-- <img src="{{ asset('assets/images/faces/face1.jpg')}}" alt="image"/> --}}
                      </td>
                      <td>
                        {{ $answer->question->question }}
                      </td>
                      <td>
                        @if ($answer->answer==1)
                            Sangat tidak puas
                        @elseif ($answer->answer==2)
                            Tidak puas
                        @elseif ($answer->answer==3)
                            Netral
                        @elseif ($answer->answer==4)
                            Puas
                        @else
                            Sangat Puas
                        @endif
                      </td>
                      <td>
                        {{ $answer->answer_date }}
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
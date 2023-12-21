@extends('layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Questions</h4>
              {{-- <p class="card-description">
                Add class <code>.table-striped</code>
              </p> --}}
                <button type="submit" class="add btn todo-list-add-btn btn-sm btn-primary mb-2" id="add-task" style="float: right;" data-toggle="modal" data-target="#exampleModal">Add Question</button>
                <div class="table-responsive">
                <table class="table table-striped display" id="datatable" style="width:100%">
                  <thead>
                    <tr>
                      <th style="width: 220px">
                        Question Number
                      </th>
                      <th>
                        Question
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                   @if (count($questions) > 0)
                    @foreach ($questions as $key => $question)
                      <tr>
                        <td>
                          {{ $question->serial_number }}
                        </td>
                        <td>
                          {{ $question->question }}
                        </td>
                        <td>
                          {{ $question->description }}
                        </td>
                        <td>
                            <a href="{{ route('question.destroy', $question->id) }}" class="btn btn-danger add todo-list-add-btn btn-sm"  data-confirm-delete="true">
                              Delete
                            </a>
                          <button type="submit" class="add btn btn-warning todo-list-add-btn btn-sm" id="add-task"  data-toggle="modal" data-target="#modalEdit{{ $question->id }}">Edit</button>
                        </td>
                      </tr>
                      <div class="modal fade" id="modalEdit{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form class="forms-sample" action="{{ route('question.update', [$question->id]) }}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <div class="form-group">
                                    <label for="exampleInputName1">Question Number</label>
                                    <input type="number" name="serial_number" class="form-control" id="exampleInputName1" placeholder="Question Number" value="{{ $question->serial_number }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName1">Question</label>
                                    <input type="text" name="question" class="form-control" id="exampleInputName1" placeholder="Question" value="{{ $question->question }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleTextarea1">Description</label>
                                    <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{ $question->description }}</textarea>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                  </div>
                                </form>
                              </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="4" class="text-center">No Data Available</td>
                    </tr>
                   @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form class="forms-sample" action="{{ route('question.store') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Question Number</label>
                  <input type="number" name="serial_number" class="form-control" id="exampleInputName1" placeholder="Question Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Question</label>
                  <input type="text" name="question" class="form-control" id="exampleInputName1" placeholder="Question">
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Description</label>
                  <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('layouts.includes.footer')
    <!-- partial -->
  </div>
@stop
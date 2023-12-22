<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Survey Apps</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/surveyapps-logo.png')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <div class="brand-logo text-center">
                    <b>SurveyApps</b>
                    {{-- <img src=".{{ asset('images/logo.svg" alt="logo"> --}}
                  </div>
                  {{-- <h6 class="font-weight-light">Sign in to continue.</h6> --}}
                  <form class="pt-3" action="{{ route('submitSurvey') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nama Lengkap</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Isi Nama Lengkap">
                      @error('name')
                        <span class="">{{ $message }}</span>
                      @enderror
                    </div>
                    @foreach ($questions as $key => $question)
                    <div class="form-group">
                            @if ($key==0)
                            <div>
                                {{ $question->question }}
                            </div>
                            @else
                            <div style="margin-top: 40px;">
                                {{ $question->question }}
                            </div>
                            @endif
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" required class="form-check-input" value="1" name="{{ $question->id }}" id="answer{{ $key+1 }}" value="">
                                Sangat tidak puas
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="2" name="{{ $question->id }}" id="answer{{ $key+1 }}" value="">
                                Tidak Puas
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="3" name="{{ $question->id }}" id="answer{{ $key+1 }}" value="">
                                Netral
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="4" name="{{ $question->id }}" id="answer{{ $key+1 }}" value="">
                                Puas
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="5" name="{{ $question->id }}" id="answer{{ $key+1 }}" value="">
                                Sangat puas
                            </label>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group">
                          <label for="name">Kritik & Saran</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="4" name="criticism_and_suggestions"></textarea>
                          @error('criticism_and_suggestions')
                            <span class="">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="d-flex justify-content-center" style="margin-top: 50px;">
                            <button type="submit" class="btn btn-primary btn-sm font-weight-medium auth-form-btn" href="#">Submit Survey</button>
                        </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
        <!-- main-panel ends -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/select2/select2.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/js/template.js')}}"></script>
  <script src="{{ asset('assets/js/settings.js')}}"></script>
  <script src="{{ asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/file-upload.js')}}"></script>
  <script src="{{ asset('assets/js/typeahead.js')}}"></script>
  <script src="{{ asset('assets/js/select2.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>

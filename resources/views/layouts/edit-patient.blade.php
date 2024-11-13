@include ('includes.base')
<style>
        .select2-container--default .select2-selection--single {
            height: 50px; /* Adjust height */
            line-height: 50px; /* Match line height */
            border: 1px solid #ccc; /* Optional: Add border */
            border-radius: 4px; /* Optional: Round corners */
            padding: 5px; /* Optional: Add padding */
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding: 0 10px; /* Horizontal padding */
            margin-top: -5px; /* Adjust vertical position */
            line-height: 50px; /* Match line height */
            transition: all 0.2s ease; /* Smooth transition */
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            padding: 0 10px; /* Match padding with rendered text */
            line-height: 50px; /* Match line height */
            transition: all 0.2s ease; /* Smooth transition */
        }

        .select2-container--default .select2-selection--single.select2-selection--placeholder .select2-selection__placeholder {
            margin-top: -5px; /* Adjust to float */
            color: #999; /* Color for placeholder */
        }

        .select2-container {
            width: 100% !important; /* Ensures full width */
        }
        .profile-picture {
            width: 150px; /* Set the width */
            height: 150px; /* Set the height */
            border-radius: 50%; /* Make it circular */
            background-color: #f0f0f0; /* Placeholder background color */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999; /* Placeholder text color */
            font-size: 20px; /* Placeholder text size */
            position: relative; /* Position for overlay */
            margin-bottom: 10px; /* Margin at the bottom */
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            border-radius: 50%; /* Keep the image circular */
            object-fit: cover; /* Ensure the image covers the area */
            display: none; /* Initially hide the image */
        }

        .file-input {
            display: none; 
        }

        .custom-file-label {
            cursor: pointer; 
        }

    </style>
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}'
                });
            @endif
        });
    </script>
       <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: '{{ session('error') }}'
                });
            @endif
        });
    </script>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
    @include ('includes.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include ('includes.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Patient  <a href="" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-info btn-sm text-white" style="float:right">Add Parent</a><a href="{{route('view.profile', ['id' => $patient->id ])}}" class="btn btn-warning btn-sm text-dark" style="float:right; margin-right:2px;">View Profile</a></h4>
                    <form class="form-sample" method="POST" action="{{ route('patient.update', ['id' => $patient->id]) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <p class="card-description"> Personal information </p>
                      <div class="row">
                      <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="text" class="form-control" value="{{$patient->patient_id}}" name="patient_id" placeholder="Patient ID"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="text" class="form-control" value="{{$patient->lastname}}" name="lastname" placeholder="Last Name"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="text" class="form-control" value="{{$patient->firstname}}" name="firstname" placeholder="First Name" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="text" class="form-control" value="{{$patient->middlename}}" name="middlename" placeholder="Middle Name"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="text" class="form-control" value="{{$patient->suffix}}" name="suffix" placeholder="Suffix"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="date" class="form-control" value="{{$patient->birthday}}" name="birthday" placeholder="Birthday" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select class="form-select text-dark"  name="gender" aria-label="Select Gender">
                                    <option selected>{{$patient->gender}}</option>
                                    <option class="text-dark" value="Male">Male</option>
                                    <option class="text-dark" value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select class="js-example-basic-single w-100" name="parent_id">
                                    @if($patient->parents)
                                        <option value="{{ $patient->parents->id }}" selected>
                                            {{ $patient->parents->lastname }}, {{ $patient->parents->firstname }} {{ $patient->parents->middlename }}
                                        </option>
                                    @else
                                        <option disabled selected>Select Parent</option>
                                    @endif
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}">
                                            {{ $parent->lastname }}, {{ $parent->firstname }} {{ $parent->middlename }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group row">
                          <div class="col-sm-12">
                              <input type="number" class="form-control" value="{{$patient->height}}" name="height" placeholder="Height (cm)" step="0.01" min="0" />
                          </div>
                      </div>
                  </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="number" class="form-control"  value="{{$patient->weight}}" name="weight" placeholder="Weight(kg)"/>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="file" class="form-control"  value="{{$patient->profile_pic}}" name="profile_pic" placeholder="profile Picture"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-end">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>  
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add Parent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{  route('add.parent') }}">
                  @csrf
                  <div class="row mb-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                        </div>
                        </div>
                        <div class="row mb-2 ">
                          <div class="col-md-6">
                          <input type="text" class="form-control" name="middlename" placeholder="Middle Name" required>
                          </div>
                          <div class="col-md-6">
                          <input type="date" class="form-control" name="birthday" placeholder="Birthday" required>
                          </div>
                          </div>
                          <div class="row ">
                          <div class="col-md-6">
                          <select class="form-select text-dark" name="civil_stat" aria-label="Select Gender">
                                <option disabled selected>Civil Status</option>
                                <option class="text-dark" value="Single">Single</option>
                                <option class="text-dark" value="Married">Married</option>
                                <option class="text-dark" value="Widowed">Widowed</option>
                                <option class="text-dark" value="Legally seperated">Legally separated</option>
                              </select>
                          </div>
                          <div class="col-md-6">
                          <input type="text" class="form-control" name="contact_no" placeholder="Mobile/Tel No." required>
                          </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                      </div>
                   </div>
                </form>
             </div>
          </div>
        </div>
        <!-- Footer -->
        <footer class="footer">
                                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2024 Brgy. San Manuel Malnutrition Monitoring System. All rights reserved.</span>
                                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                                            <a href="{{ route('termsprivacy.index') }}" class="footer-link">Terms of Service</a>  |  
                                            <a href="{{ route('termsprivacy.index') }}" class="footer-link">Privacy Policy</a>
                                        </span>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
        </div>
       </div>
     </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset ('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- Vendor JS -->
    <script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <!-- End custom js for this page-->
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
  </body>
</html>
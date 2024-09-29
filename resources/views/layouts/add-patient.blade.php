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
            display: none; /* Hide the file input */
        }

        .custom-file-label {
            cursor: pointer; /* Change cursor on hover */
        }

    </style>
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
                    <h4 class="card-title">Add Patient</h4>
                    <form class="form-sample">
                      <p class="card-description"> Personal information </p>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="text" class="form-control" placeholder="Last Name"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="text" class="form-control" placeholder="First Name" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="text" class="form-control" placeholder="Middle Name"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="text" class="form-control" placeholder="Suffix"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="date" class="form-control" placeholder="Birthday" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <select class="js-example-basic-single w-100">
                                <option disabled selected >Select Parent</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AM">America</option>
                                <option value="CA">Canada</option>
                                <option value="RU">Russia</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select class="form-select text-dark" aria-label="Select Gender">
                                    <option disabled selected>Select Gender</option>
                                    <option class="text-dark">Male</option>
                                    <option class="text-dark">Female</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Height(cm)"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Weight(kg)"/>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <input type="file" class="form-control" placeholder="profile Picture"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>  
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ms-1"></i></span>
  </div>
</footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
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
    
  </body>
</html>
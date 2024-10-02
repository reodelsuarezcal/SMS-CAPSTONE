@include('includes.base')
  <body>
      <!-- partial:partials/_navbar.html -->
      @include('includes.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('includes.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Mabuhay mga Kabarangay!</h3>
                    <h6 class="font-weight-normal mb-0">Every action taken towards addressing malnutrition brings hope for a healthier future.</h6>
                  </div>
                  <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="mdi mdi-calendar"></i> Today (10 Jan 2021) </button>
                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                          <a class="dropdown-item" href="#">January - March</a>
                          <a class="dropdown-item" href="#">March - June</a>
                          <a class="dropdown-item" href="#">June - August</a>1
                          <a class="dropdown-item" href="#">August - November</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                        <h3 class="font-weight-bold">Personal Information</h3>
                        <br>
                        <!-- First Row of Personal Information -->
                        <div class="row">
                            <div class="col-12 col-md-auto mb-2">
                                <h5><b class="card-title">Last Name:</b> <p class="custom-size mb-0">{{$patient->lastname}}</p></h5>
                            </div>
                            <div class="col-12 col-md-auto mb-2">
                                <h5><b class="card-title">First Name:</b> <p class="custom-size mb-0">{{$patient->firstname}}</p></h5>
                            </div>
                            <div class="col-12 col-md-auto mb-2">
                                <h5><b class="card-title">Middle Name:</b> <p class="custom-size mb-0">{{$patient->middlename}}</p></h5>
                            </div>
                            <div class="col-12 col-md-auto mb-2">
                                <h5><b class="card-title">Suffix:</b> <p class="custom-size mb-0">{{$patient->suffix ? $patient->suffix: ''}}</p></h5>
                            </div>
                            <div class="col-12 col-md-auto mb-2">
                                <h5><b class="card-title">Gender:</b> <p class="custom-size mb-0">{{$patient->gender}}</p></h5>
                            </div>
                        </div>
                        <br>
                        <!-- Second Row of Personal Information -->
                        <div class="row">
                            <div class="col-12 col-md-auto mb-2">
                                <h5><b class="card-title">Birth Day:</b> <p class="custom-size mb-0">{{$patient->birthday}}</p></h5>
                            </div>
                            <div class="col-12 col-md-auto mb-2">
                                <h5><b class="card-title">Height (cm):</b> <p class="custom-size mb-0">{{$patient->height}}</p></h5>
                            </div>
                            <div class="col-12 col-md-auto mb-2">
                                <h5><b class="card-title">Weight (kg):</b> <p class="custom-size mb-0">{{$patient->weight}}</p></h5>
                            </div>
                            <div class="col-12 col-md-auto mb-2">
                                <h5><b class="card-title">Guardian:</b> <p class="custom-size mb-0">{{ $patient->parents ? $patient->parents->lastname . ', ' . $patient->parents->firstname . ' ' . $patient->parents->middlename : ' ' }}</p></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Right Side: Client Picture -->
                    <div class="client-picture">
                         <img src=" {{ $patient->profile_pic ? asset('storage/pictures/' . $patient->profile_pic) : '' }}" alt="Client Picture" class="img-fluid" style="width: 200px; height: auto;">
                    </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <div class="d-flex justify-content-center flex-wrap mb-5">
                        <div class="mt-3 col-12 col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">BMI Weight Status</h4>
                                    <canvas id="barChart" style="height: 400px; width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        var ctx = document.getElementById('barChart').getContext('2d');
                        var barChart = new Chart(ctx, {
                            type: 'bar', // Specify the type of chart
                            data: {
                                labels: ['BMI Range'], // Sample labels
                                datasets: [{
                                    label: 'Normal',
                                    data: [20, 100], // Sample data
                                    backgroundColor: [
                                        'rgba(75, 192, 192, 0.2)',
                                    ],
                                    borderColor: [
                                        'rgba(75, 192, 192, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                    <div class="text-center">
                    <a href="{{route('edit.index', ['id'=> $patient->id]) }}" class="btn btn-primary">Edit</a>
                    <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                  </div>
               </div>
              </div>
             </div>     
          </div>
       </div>
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
    <!-- Vendor JS -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->

<!-- Plugin JS for this page -->
<script src="{{ asset('vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
{{-- Uncomment if needed --}}
{{-- <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script> --}}
<script src="{{ asset('vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('js/dataTables.select.min.js') }}"></script>
<!-- End plugin JS for this page -->

<!-- Core JS (injected JS) -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>
<!-- endinject -->

<!-- Custom JS for this page -->
<script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>

  </body>
</html>
@include('includes.base')
<style>
  table, th, td {
  border: 1px solid;
}
</style>
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
                        <div id="printableArea">
                          <h3 class="font-weight-bold">Personal Information</h3>
                          <br>
                          <!-- First Row of Personal Information -->
                          <div class="row">
                              <div class="col-12 col-md-auto mb-2">
                                  <h5><b class="card-title">Last Name:</b> <p class="custom-size mb-0" data-lastname>{{$patient->lastname}}</p></h5>
                              </div>
                              <div class="col-12 col-md-auto mb-2">
                                  <h5><b class="card-title">First Name:</b> <p class="custom-size mb-0" data-firstname>{{$patient->firstname}}</p></h5>
                              </div>
                              <div class="col-12 col-md-auto mb-2">
                                  <h5><b class="card-title">Middle Name:</b> <p class="custom-size mb-0" data-middlename>{{$patient->middlename}}</p></h5>
                              </div>
                              <div class="col-12 col-md-auto mb-2">
                                  <h5><b class="card-title">Suffix:</b> <p class="custom-size mb-0" data-suffix>{{$patient->suffix ? $patient->suffix : ''}}</p></h5>
                              </div>
                              <div class="col-12 col-md-auto mb-2">
                                  <h5><b class="card-title">Gender:</b> <p class="custom-size mb-0" data-gender>{{$patient->gender}}</p></h5>
                              </div>
                          </div>
                          <br>
                          <!-- Second Row of Personal Information -->
                          <div class="row">
                              <div class="col-12 col-md-auto mb-2">
                                  <h5><b class="card-title">Birth Day:</b> <p class="custom-size mb-0" data-birthday>{{ \Carbon\Carbon::parse($patient->birthday)->format('F j, Y') }}</p></h5>
                              </div>
                              <div class="col-12 col-md-auto mb-2">
                                  <h5><b class="card-title">Height (m):</b> <p class="custom-size mb-0" data-height>{{$patient->height}}</p></h5>
                              </div>
                              <div class="col-12 col-md-auto mb-2">
                                  <h5><b class="card-title">Weight (kg):</b> <p class="custom-size mb-0" data-weight>{{$patient->weight}}</p></h5>
                              </div>
                              <div class="col-12 col-md-auto mb-2">
                                  <h5><b class="card-title">Guardian:</b> <p class="custom-size mb-0" data-guardian>{{ $patient->parents ? $patient->parents->lastname . ', ' . $patient->parents->firstname . ' ' . $patient->parents->middlename : '' }}</p></h5>
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
                      var bmi = {{ $bmi }};
                      var label, backgroundColor, borderColor;

                      if (bmi >= 16 && bmi < 18.5) {
                          label = 'Underweight {{ $bmi }}';
                          backgroundColor = 'rgba(255, 0, 0, 0.6)';
                          borderColor = 'rgba(255, 0, 0, 1)'; // Red
                      } else if (bmi >= 18.5 && bmi <= 25) {
                          label = 'Normal  {{ $bmi }}';
                          backgroundColor = 'rgba(0, 128, 0, 0.6)';
                          borderColor = 'rgba(0, 128, 0, 1)'; // Green
                      } else if (bmi > 25 && bmi <= 30) {
                          label = 'Overweight {{ $bmi }}';
                          backgroundColor = 'rgba(255, 255, 0, 0.6)'; // Yellow with 60% opacity
                          borderColor = 'rgba(255, 255, 0, 1)'; // Yellow
                      } else if (bmi > 30 && bmi <= 40) {
                          label = 'Obese {{ $bmi }}';
                          backgroundColor = 'rgba(128, 0, 0, 0.6)'; 
                          borderColor = 'rgba(128, 0, 0, 1)'; // Maroon
                      } else {
                          label = 'Invalid BMI'; 
                          backgroundColor = 'rgba(128, 128, 128, 0.6)'; 
                          borderColor = 'rgba(128, 128, 128, 1)'; 
                      }

                      var ctx = document.getElementById('barChart').getContext('2d');
                      var barChart = new Chart(ctx, {
                          type: 'bar', // Specify the type of chart
                          data: {
                              labels: [label], // Label for the BMI category
                              datasets: [{
                                  label: 'BMI',
                                  data: [bmi,35], // The calculated BMI value
                                  backgroundColor: [
                                      backgroundColor, // RGBA color based on BMI category
                                  ],
                                  borderColor: [
                                      borderColor, // RGBA border color
                                  ],
                                  borderWidth: 1
                              }]
                          },
                          options: {
                              scales: {
                                  y: {
                                      beginAtZero: true,
                                      title: {
                                          display: true,
                                          text: 'BMI Value' // Y-axis title
                                      }
                                  },
                                  x: {
                                      title: {
                                          display: true,
                                          text: 'BMI Category' // X-axis title
                                      }
                                  }
                              }
                          }
                      });
                  </script>
                    <div class="text-center">
                    <button onclick="printDiv('printableArea')" class="btn btn-secondary">Print</button>
                    <a href="{{route('edit.index', ['id'=> $patient->id]) }}" class="btn btn-primary text-white fw-bold">Edit</a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{$patient->id}}" class="btn btn-danger text-white fw-bold"> Delete</a>
                    <div class="modal fade" id="deleteModal{{$patient->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog ">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="myModalLabel">Delete Patient</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                            <form action="{{ route('patient.delete', ['id' => $patient->id]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                            <p>Delete <span class="text-danger fw-bold">{{$patient->lastname}}, {{$patient->firstname}} {{$patient->middlename}}</span> as patient?</p>
                        </div>
                        <div class="modal-footer">
                              
                              <button type="submit" name="submit" class="btn btn-danger btn-sm text-white fw-bold">Delete</button>
                              <button type="button" data-bs-dismiss="modal" class="btn btn-secondary btn-sm fw-bold"> Close</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
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
<script>
function printDiv(divId) {
    var chartCanvas = document.getElementById('barChart');
    var chartImage = chartCanvas.toDataURL('image/png');

    // Fetching patient information from the DOM
    var lastName = document.querySelector('[data-lastname]').textContent;
    var firstName = document.querySelector('[data-firstname]').textContent;
    var middleName = document.querySelector('[data-middlename]').textContent;
    var suffix = document.querySelector('[data-suffix]').textContent;
    var gender = document.querySelector('[data-gender]').textContent;
    var birthday = document.querySelector('[data-birthday]').textContent;
    var height = document.querySelector('[data-height]').textContent;
    var weight = document.querySelector('[data-weight]').textContent;
    var guardian = document.querySelector('[data-guardian]').textContent;

    // Create the print window
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Print</title></head><body>');

    printWindow.document.write('<div class="client-picture" style="text-align:center; margin-bottom: 20px;">');
    printWindow.document.write('<img src="{{ $patient->profile_pic ? asset('storage/pictures/' . $patient->profile_pic) : '' }}" alt="Client Picture" style="width: 200px; height: auto;">');
    printWindow.document.write('</div>');
    
    
    // Add patient information to the print window
    printWindow.document.write('<h4>Patient Information</h4>');
    printWindow.document.write('<table border="1" cellpadding="5" cellspacing="0">');
    printWindow.document.write('<tr>');
    printWindow.document.write('<th>Last Name</th>');
    printWindow.document.write('<th>First Name</th>');
    printWindow.document.write('<th>Middle Name</th>');
    printWindow.document.write('<th>Suffix</th>');
    printWindow.document.write('<th>Gender</th>');
    printWindow.document.write('<th>Birthday</th>');
    printWindow.document.write('<th>Height (m)</th>');
    printWindow.document.write('<th>Weight (kg)</th>');
    printWindow.document.write('<th>Guardian</th>');
    printWindow.document.write('</tr>');
    printWindow.document.write('<tr>');
    printWindow.document.write('<td>' + lastName + '</td>');
    printWindow.document.write('<td>' + firstName + '</td>');
    printWindow.document.write('<td>' + middleName + '</td>');
    printWindow.document.write('<td>' + suffix + '</td>');
    printWindow.document.write('<td>' + gender + '</td>');
    printWindow.document.write('<td>' + birthday + '</td>');
    printWindow.document.write('<td>' + height + ' m</td>');
    printWindow.document.write('<td>' + weight + ' kg</td>');
    printWindow.document.write('<td>' + guardian + '</td>');
    printWindow.document.write('</tr>');
    printWindow.document.write('</table>');

    // Add the chart image
    printWindow.document.write('<h4>BMI Weight Status</h4>');
    printWindow.document.write('<img src="' + chartImage + '" style="max-width: 50%;">'); 
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>



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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </body>
</html>
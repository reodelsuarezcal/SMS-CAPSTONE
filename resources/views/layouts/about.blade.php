@include ('includes.base')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Information (Admin Only)</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
/* Main Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0rem;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    margin-bottom: -5rem;
}

/* Header Section */
.header, .system-info-header {
    background: linear-gradient(135deg, #2193b0, #3a66e0);
    border-radius: 12px;
    padding: 2.5rem;
    margin-bottom: 2.5rem;
    position: relative;
    overflow: hidden;
}

.header::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
    pointer-events: none;
}

.header h1, .system-info-header h1 {
    color: #ffffff;
    font-size: 2.75rem;
    margin-bottom: 1rem;
    font-weight: 700;
    text-align: left;
    line-height: 1.2;
    letter-spacing: -0.5px;
}

.header p, .system-info-header p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.25rem;
    margin-bottom: 1.5rem;
    text-align: left;
    font-weight: 400;
    max-width: 600px;
}

/* Badge Styles */
.badge, .admin-badge {
    background-color: rgba(255, 255, 255, 0.15);
    color: #ffffff;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.badge:hover, .admin-badge:hover {
    background-color: rgba(255, 255, 255, 0.25);
    transform: translateY(-1px);
}

.badge i, .admin-badge i {
    color: #ffffff;
    font-size: 1.1rem;
}

/* Card Styles */
.card {
    background: #fff;
    border-radius: 12px;
    margin-bottom: 2rem;
    overflow: hidden;
    border: none;

}

.card:hover {
   
}

.card-header {
    background: #fff;
    padding: 1.5rem 2rem;
    border-bottom: 2px solid #f0f0f0;
}

.card-header h2 {
    color: #2c3e50;
    font-size: 1.5rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.8rem;
    font-weight: 600;
}

.card-body {
    padding: 2rem;
}

.card-body p {
    color: #505760;
    line-height: 1.8;
    margin-bottom: 1.5rem;
    font-size: 1.05rem;
}

.card-body ul {
    padding-left: 1.2rem;
    margin-bottom: 1.5rem;
}

.card-body li {
    color: #505760;
    margin-bottom: 0.8rem;
    line-height: 1.6;
    font-size: 1.05rem;
    position: relative;
    padding-left: 0.5rem;
}

.card-body strong {
    color: #2c3e50;
    font-weight: 600;
}

/* Icon Colors */
.fa-bullseye { color: #e74c3c; }
.fa-info-circle { color: #3498db; }
.fa-users { color: #2ecc71; }

/
/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #2193b0;
    border-radius: 5px;
}

::-webkit-scrollbar-thumb:hover {
    background: #6dd5ed;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Accessibility */
.footer-link:focus,
.admin-badge:focus {
    outline: 3px solid #2193b0;
    outline-offset: 2px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 0rem;
    }

    .header, .system-info-header {
        padding: 2rem;
        text-align: center;
    }

    .header h1, .system-info-header h1 {
        font-size: 2.25rem;
        text-align: center;
    }

    .header p, .system-info-header p {
        font-size: 1.1rem;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }

    .badge, .admin-badge {
        display: inline-flex;
        justify-content: center;
        margin: 0 auto;
    }

    .card-header {
        padding: 1.2rem 1.5rem;
    }

    .card-header h2 {
        font-size: 1.3rem;
    }

    .card-body {
        padding: 1.5rem;
    }


@media (max-width: 480px) {
    .header, .system-info-header {
        padding: 1.5rem;
    }

    .header h1, .system-info-header h1 {
        font-size: 1.875rem;
    }

    .header p, .system-info-header p {
        font-size: 1rem;
    }

    .badge, .admin-badge {
        padding: 0.6rem 1.25rem;
        font-size: 0.9rem;
    }

    .card-header h2 {
        font-size: 1.2rem;
    }

    .card-body {
        padding: 1.2rem;
    }

    .card-body p,
    .card-body li {
        font-size: 1rem;
    
    }
}

/* Print Styles */
@media print {
    .container {
        background: none;
    }

    .card {
        box-shadow: none;
        border: 1px solid #ddd;
        break-inside: avoid;
    }

    .header, .system-info-header {
        background: none;
        border: 1px solid #000;
    }

    .header h1,
    .header p,
    .system-info-header h1,
    .system-info-header p {
        color: #000;
    }

    .badge, .admin-badge {
        border: 1px solid #000;
        color: #000;
    }
}
    </style>
</head>
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
                            <div class="container">
                                <div class="header">
                                    <h1>System Information</h1>
                                    <p>Administrative Control Panel</p>
                                    <span class="badge"><i class="fas fa-shield-alt"></i>&nbsp; Admin Access Only</span>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h2><i class="fas fa-bullseye"></i> Mission Statement</h2>
                                    </div>
                                    <div class="card-body">
                                        <p>Our mission is to address and monitor childhood malnutrition in Brgy. San Manuel with a doable and accessible track for improvement in nutritional health in children. We aim to empower families, BNS workers, and community leaders with data-driven insights, creating positive impacts on health conditions for generations ahead.</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h2><i class="fas fa-info-circle"></i> System Background</h2>
                                    </div>
                                    <div class="card-body">
                                        <p>The Brgy. San Manuel Children's Malnutrition Monitoring System was developed as a critical intervention tool for combating childhood malnutrition in our community. This system serves as the primary mechanism for:</p>
                                        <ul>
                                            <li>Tracking nutritional data with precision</li>
                                            <li>Early identification of at-risk cases</li>
                                            <li>Facilitating timely interventions</li>
                                            <li>Supporting data-driven health improvements</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h2><i class="fas fa-users"></i> About the System</h2>
                                    </div>
                                    <div class="card-body">
                                        <p>The Brgy. San Manuel Children's Malnutrition Monitoring System (CSMMS) is an integrated tool designed to provide real-time, accurate data on childhood malnutrition in our community. The system aims to empower local health workers, families, and government officials with insights to take actionable steps in combating malnutrition.</p>

                                        <p>The system was born out of a collaborative effort between the local government, public health experts, and community stakeholders, who identified the need for a dedicated tool to improve early detection and intervention for malnourished children.</p>

                                        <p>Key system features and goals include:</p>
                                        <ul>
                                            <li><strong>Real-time Data Monitoring:</strong> The system continuously tracks and updates nutritional health data, ensuring that the information is always current and actionable.</li>
                                            <li><strong>Case Management:</strong> It supports individual case management by flagging children who are at risk of malnutrition, allowing health workers to prioritize interventions.</li>
                                            <li><strong>Holistic Community Approach:</strong> The system integrates community feedback, enabling a collective effort towards improving nutritional health in Brgy. San Manuel.</li>
                                            <li><strong>Improved Health Outcomes:</strong> By fostering early interventions and data-driven decisions, the system aims to drastically reduce childhood malnutrition and its associated long-term health consequences.</li>
                                        </ul>

                                        <p>Through continuous improvements and feedback from the community, we envision this system not just as a tool for today, but as a model for the future — one that can be expanded to other municipalities and communities to further scale its impact.</p>
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
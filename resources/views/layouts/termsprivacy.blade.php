@include ('includes.base')
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --text-color: #333;
            --light-gray: #f5f6fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0rem;
            margin-bottom: -5rem;
        }

        .tabs {
            display: flex;
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--light-gray);
        }

        .tab-button {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-color);
            position: relative;
        }

        .tab-button.active {
            color: var(--secondary-color);
        }

        .tab-button.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--secondary-color);
        }

        .content {
            display: none;
            animation: fadeIn 0.5s ease-in;
        }

        .content.active {
            display: block;
        }

        .section {
            background: white;
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 20px;
        }

        h2 {
            color: var(--primary-color);
            margin-top: 0rem;
            margin-bottom: 1.5rem;
        }

        h3 {
            color: var(--primary-color);
            margin: 1.5rem 0 1rem 0;
        }

        p, ul {
            margin-bottom: 1rem;
        }

        ul {
            padding-left: 2rem;
        }

        li {
            margin-bottom: 0.5rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0rem;
            }

            .tabs {
                flex-direction: column;
            }

            .tab-button {
                width: 100%;
                text-align: center;
            }

            .section {
                padding: 1rem;
            }
        }

        .important-note {
            background: #f8d7da;
            border-left: 4px solid #f44336;
            padding: 1rem;
            margin-bottom: 2rem;
            color: #721c24;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    @include ('includes.navbar')
    <div class="container-fluid page-body-wrapper">
        @include ('includes.sidebar')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin">

    <div class="container">
        <div class="tabs">
            <button class="tab-button active" onclick="switchTab('terms')">Terms of Service</button>
            <button class="tab-button" onclick="switchTab('privacy')">Privacy Policy</button>
        </div>

        <div id="terms" class="content active">
            <div class="section">
                <h2>Terms of Service (TOS)</h2>

                <div class="important-note">
                    <h3><strong>Note:</strong></h3>
                    <p><strong>Parental Consent Required:</strong> This system collects and processes health and nutritional data for children aged 0 to 5 years. Explicit consent from the child's parent or legal guardian is mandatory before any data can be collected, stored, or processed.</p>
                <p><strong>Data Security and Confidentiality:</strong> We are committed to securing children's data with state-of-the-art security measures. Only authorized personnel with the appropriate role are permitted to access, modify, or delete this sensitive information.</p>
                <p><strong>Role-Based Access Control:</strong> The system utilizes a strict role-based access model to ensure that data is accessible only by those with the proper authorization. Admins, healthcare providers, and other authorized personnel are granted varying levels of access.</p>
                </div>

                <h3>Acceptance of Terms</h3>
                <p>By logging into the San Manuel Children's Malnutrition Monitoring System, you agree to these Terms of Service, which outline your responsibilities as a user of the system. As the system involves the collection and processing of sensitive data about children aged 0 to 5, you acknowledge that you are acting with the consent of the child's <strong>parent or guardian</strong>.</p>

                <h3>User Access & Roles</h3>
                <p>The system provides access based on roles. <strong>Administrators</strong>, <strong>healthcare workers</strong>, and other authorized users are granted different levels of access, ranging from viewing to adding, updating, or deleting data. Users are strictly prohibited from accessing or modifying data beyond their designated role.</p>

                <h3>Data Management Responsibilities</h3>
                <p>Authorized personnel are responsible for managing children's nutritional health data. <strong>Only those with administrative access</strong> are permitted to add, update, or delete data, and they must do so in compliance with the system’s purpose and <strong>data protection laws</strong>. Unauthorized use of data may result in disciplinary actions.</p>

                <h3>Compliance with Laws</h3>
                <p>The system complies with all relevant data protection laws, including the <strong>Data Privacy Act of 2012</strong> (Philippines) and international standards like <strong>COPPA</strong> (Children’s Online Privacy Protection Act), ensuring the protection of children’s sensitive health data.</p>

                <h3>Parental Consent</h3>
                <p>Since this system deals with children aged 0-5 years old, <strong>parental or guardian consent</strong> is required to collect, store, or process any data about the child. Parents or guardians must provide explicit consent before data is entered into the system, and they have the right to revoke this consent at any time.</p>

                <h3>Service Availability & Maintenance</h3>
                <p>The system may experience occasional downtime for maintenance or updates. Users will be notified of any planned service interruptions. We strive to ensure high availability and minimal disruption to system operations.</p>

            </div>
        </div>

        <div id="privacy" class="content">
            <div class="section">
                <h2>Privacy Policy</h2>

                <div class="important-note">
                    <h3><strong>Most Important Note:</strong></h3>
                    <p><strong>Parental Consent Required:</strong> This system collects and processes health and nutritional data for children aged 0 to 5 years. Explicit consent from the child's parent or legal guardian is mandatory before any data can be collected, stored, or processed.</p>
                <p><strong>Data Security and Confidentiality:</strong> We are committed to securing children's data with state-of-the-art security measures. Only authorized personnel with the appropriate role are permitted to access, modify, or delete this sensitive information.</p>
                <p><strong>Role-Based Access Control:</strong> The system utilizes a strict role-based access model to ensure that data is accessible only by those with the proper authorization. Admins, healthcare providers, and other authorized personnel are granted varying levels of access.</p>
                </div>

                <h3>Data Collection and Use</h3>
                <p>We collect personal information and health-related data of children aged 0 to 5 years to monitor nutritional status and support early interventions. The data collected may include <strong>health records, growth measurements</strong>, and other relevant information that directly affects the child’s nutrition.</p>

                <h3>Parental Consent for Data Collection</h3>
                <p>As per applicable laws, we require the <strong>explicit consent</strong> of the child’s <strong>parent or legal guardian</strong> before collecting any data about the child. Parents can provide consent via the registration process, and they have the right to withdraw consent at any time by contacting us.</p>

                <h3>Data Access and Permissions</h3>
                <p>Access to the data collected is restricted based on user roles. <strong>Administrators</strong> and other authorized personnel are permitted to view and manage the data. <strong>Healthcare providers</strong> may access only relevant portions of the data to monitor and assist with the child’s nutritional health. Unauthorized access or misuse of data will result in immediate action and may include legal consequences.</p>

                <h3>Data Security Measures</h3>
                <p>The system employs advanced encryption techniques and <strong>role-based access control</strong> to ensure that only authorized individuals can access, update, or delete sensitive data. Regular security audits are performed to identify and mitigate any potential threats.</p>

                <h3>Data Retention</h3>
                <p>We retain personal and health data for as long as necessary to fulfill the purposes of the system. Once the data is no longer needed, or if the child reaches the age of majority, it will be deleted in accordance with applicable laws.</p>
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
    <script>
        function switchTab(tabId) {
            document.querySelectorAll('.content').forEach(content => {
                content.classList.remove('active');
            });

            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });

            document.getElementById(tabId).classList.add('active');
            document.querySelector(`[onclick="switchTab('${tabId}')"]`).classList.add('active');
        }
    </script>



    <!-- container-scroller -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <!-- [Head] start -->
    <head>
        <title>@yield('title', 'Sistem Informasi Desa')</title>

        <!-- [Meta] -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Sistem Informasi Desa">
        <meta name="keywords" content="Sistem Informasi Desa">
        <meta name="author" content="Desa">

        <!-- [Favicon] icon -->
        <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
        <!-- [Google Font] Family -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <!-- [Tabler Icons] https://tablericons.com -->
        <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
        <!-- [Feather Icons] https://feathericons.com -->
        <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
        <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
        <!-- [Material Icons] https://fonts.google.com/icons -->
        <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
        <!-- [Template CSS Files] -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
        <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">

        <style>
            /* === MODERN MINIMALIST STYLE === */
            :root {
                --primary: #2563eb;
                --primary-hover: #1d4ed8;
                --text: #1f2937;
                --text-light: #6b7280;
                --border: #e5e7eb;
                --background: #ffffff;
                --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                --shadow-hover: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                font-family: 'Inter', sans-serif;
                padding: 20px;
                line-height: 1.6;
            }

            .auth-container {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            .auth-card {
                background: #ffffff; /* PUTIH BERSIH */
                padding: 40px;
                border-radius: 20px;
                border: 1px solid var(--border);
                box-shadow: var(--shadow);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
                width: 100%;
                max-width: 450px;
            }

            .auth-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 3px;
                background: linear-gradient(90deg, var(--primary), #60a5fa);
            }

            .auth-card:hover {
                box-shadow: var(--shadow-hover);
                transform: translateY(-2px);
            }

            /* Form Elements - PUTIH BERSIH */
            .form-group {
                margin-bottom: 1rem;
            }

            .form-label {
                display: block;
                font-size: 14px;
                font-weight: 500;
                color: var(--text);
                margin-bottom: 8px;
            }

            .form-control {
                width: 100%;
                padding: 12px 16px;
                border: 1.5px solid var(--border);
                border-radius: 12px;
                font-size: 15px;
                background: #ffffff; /* PUTIH BERSIH */
                transition: all 0.2s ease;
                font-family: 'Inter', sans-serif;
                color: var(--text);
            }

            .form-control:focus {
                outline: none;
                border-color: var(--primary);
                box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
                background: #ffffff; /* TETAP PUTIH */
            }

            .form-control::placeholder {
                color: #9ca3af;
            }

            /* Button */
            .btn {
                padding: 12px 24px;
                border: none;
                border-radius: 12px;
                font-size: 15px;
                font-weight: 500;
                font-family: 'Inter', sans-serif;
                cursor: pointer;
                transition: all 0.2s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
            }

            .btn-primary {
                background: var(--primary);
                color: white;
                box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3);
                width: 100%;
            }

            .btn-primary:hover {
                background: var(--primary-hover);
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
            }

            /* Links */
            .link-primary {
                color: var(--primary);
                text-decoration: none;
                font-size: 14px;
                font-weight: 500;
                transition: color 0.2s ease;
            }

            .link-primary:hover {
                color: var(--primary-hover);
            }

            /* Alert Styles - BACKGROUND PUTIH */
            .alert {
                padding: 12px 16px;
                border-radius: 12px;
                margin-bottom: 1rem;
                border: 1px solid transparent;
                background: #ffffff; /* PUTIH BERSIH */
            }

            .alert-danger {
                background: #ffffff; /* PUTIH BERSIH */
                border-color: rgba(220, 53, 69, 0.3);
                color: #dc3545;
            }

            .alert-success {
                background: #ffffff; /* PUTIH BERSIH */
                border-color: rgba(40, 167, 69, 0.3);
                color: #28a745;
            }

            /* Checkbox - BACKGROUND PUTIH */
            .form-check {
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .form-check-input {
                width: 16px;
                height: 16px;
                border-radius: 4px;
                border: 2px solid var(--border);
                background: #ffffff; /* PUTIH BERSIH */
            }

            .form-check-input:checked {
                background-color: var(--primary);
                border-color: var(--primary);
            }

            .form-check-label {
                font-size: 14px;
                color: var(--text-light);
                margin-bottom: 0;
            }

            /* Separator */
            .saprator {
                display: flex;
                align-items: center;
                text-align: center;
                margin: 24px 0;
                color: var(--text-light);
                font-size: 14px;
                background: transparent; /* TRANSPARAN */
            }

            .saprator::before,
            .saprator::after {
                content: '';
                flex: 1;
                border-bottom: 1px solid var(--border);
            }

            .saprator:not(:empty)::before {
                margin-right: 16px;
            }

            .saprator:not(:empty)::after {
                margin-left: 16px;
            }

            /* Utility Classes */
            .d-flex { display: flex; }
            .justify-content-between { justify-content: space-between; }
            .justify-content-center { justify-content: center; }
            .align-items-center { align-items: center; }
            .align-items-end { align-items: flex-end; }
            .d-grid { display: grid; }
            .text-center { text-align: center; }
            .mb-0 { margin-bottom: 0; }
            .mb-3 { margin-bottom: 1rem; }
            .mb-4 { margin-bottom: 1.5rem; }
            .mt-1 { margin-top: 0.25rem; }
            .mt-3 { margin-top: 1rem; }
            .mt-4 { margin-top: 1.5rem; }
            .f-w-400 { font-weight: 400; }
            .text-muted { color: var(--text-light); }
            .text-secondary { color: var(--text-light); }

            /* Invalid Feedback */
            .invalid-feedback {
                display: block;
                width: 100%;
                margin-top: 4px;
                font-size: 12px;
                color: #dc3545;
            }

            .is-invalid {
                border-color: #dc3545;
                background: #ffffff; /* TETAP PUTIH */
            }

            /* Loading State */
            .btn-loading {
                position: relative;
                color: transparent;
            }

            .btn-loading::after {
                content: '';
                position: absolute;
                width: 18px;
                height: 18px;
                border: 2px solid transparent;
                border-top: 2px solid white;
                border-radius: 50%;
                animation: spin 0.8s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            /* Text Colors - Pastikan readable di background putih */
            h1, h2, h3, h4, h5, h6 {
                color: var(--text);
            }

            p, span {
                color: var(--text);
            }

            /* Responsive */
            @media (max-width: 480px) {
                .auth-card {
                    padding: 24px;
                    margin: 0 10px;
                    background: #ffffff; /* TETAP PUTIH di mobile */
                }
                
                body {
                    padding: 16px;
                }
            }
        </style>
    </head>
    <!-- [Head] end -->
    <!-- [Body] Start -->

    <body>
        <!-- [ Pre-loader ] start -->
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>
        <!-- [ Pre-loader ] End -->

        <div class="auth-container">
            <div class="auth-card">
                <!-- Content Area -->
                @yield('content')
            </div>
        </div>

        <!-- Required Js -->
        <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
        <script src="{{ asset('assets/js/pcoded.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

        <!-- SweetAlert2 for auth pages -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Simple Switch CSS -->
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 44px;
                height: 24px;
                vertical-align: middle;
            }
            .switch input { display: none; }
            .switch-slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #e5e7eb;
                transition: .25s;
                border-radius: 999px;
                box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
            }
            .switch-slider:before {
                content: "";
                position: absolute;
                height: 18px;
                width: 18px;
                left: 3px;
                top: 3px;
                background: white;
                border-radius: 50%;
                transition: .25s;
                box-shadow: 0 2px 6px rgba(0,0,0,0.12);
            }
            .switch input:checked + .switch-slider {
                background-color: var(--primary);
            }
            .switch input:checked + .switch-slider:before {
                transform: translateX(20px);
            }
            /* small helper spacing */
            .switch-label-inline { display: inline-flex; align-items: center; gap: 10px; }
        </style>

        <script>
            layout_change('light');
            change_box_container('false');
            layout_rtl_change('false');
            preset_change("preset-1");
            font_change("Inter");

            document.addEventListener("DOMContentLoaded", function() {
                const forms = document.querySelectorAll('form[method="post"]');

                forms.forEach(form => {
                    form.addEventListener("submit", function() {
                        const submitButton = form.querySelector('button[type="submit"]');
                        if (submitButton) {
                            submitButton.disabled = true;
                            submitButton.classList.add('btn-loading');
                            submitButton.innerHTML = 'Processing...';
                        }
                    });
                });

                // Enhanced NIK validation
                const nikInputs = document.querySelectorAll('input[name="nik"]');
                nikInputs.forEach(input => {
                    input.addEventListener('input', function(e) {
                        this.value = this.value.replace(/[^0-9]/g, '');
                        if (this.value.length > 16) {
                            this.value = this.value.slice(0, 16);
                        }
                    });
                });
            });
        </script>

        @yield('scripts_content')
    </body>
    <!-- [Body] end -->
</html>
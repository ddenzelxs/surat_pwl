<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="d-flex justify-content-center">
                            <img src="assets/img/logo.png" alt=""
                                style="width: 250px; height: auto; margin-bottom: -75px; margin-top: -100px;">
                        </div><!-- End Logo -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">

                                <div class="card-body">
                                    <h5 class="card-title">Form</h5>
                                    <form class="row g-3" action="{{ route('register.store') }}" method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="nrp_nip" class="form-label">NIP</label>
                                            <input type="text" class="form-control" id="nrp_nip" name="nrp_nip"
                                                maxlength="20" value="{{ old('nrp_nip') }}" required autofocus>
                                        </div>
                                        <div class="col-12">
                                            <label for="nama_lengkap" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama_lengkap"
                                                name="nama_lengkap" maxlength="100" value="{{ old('nama_lengkap') }}"
                                                required>
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                maxlength="100" value="{{ old('email') }}" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                maxlength="255" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="prodi_id" class="form-label">Program Studi</label>
                                            <select class="form-select" id="prodi_id" name="prodi_id" required>
                                                @error('prodi_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <option value="">Pilih Program Studi</option>
                                                @foreach ($prodis as $prodi)
                                                    <option value="{{ $prodi->id }}"
                                                        {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                                        {{ $prodi->nama_prodi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>

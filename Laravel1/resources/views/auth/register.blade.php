<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="{{ url('postRegister') }}" method="post">
                  @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="name" placeholder="Username" name="name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                  <div class="input-group mb-3">
            <select class="form-control" id="role" name="role">
                <option value="" hidden> Role </option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-hashtag"></span>
              </div>
            </div>
        </div>
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" id="submit">Register</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="{{url('/login')}}" class="text-primary">Login</a>
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>

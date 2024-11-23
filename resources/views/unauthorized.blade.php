<!DOCTYPE html>
<html>
<head>
    <title>Unauthorized</title>
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
</head>
<body>
    <div class="content-wrapper pt-5">
        <section class="content">
          <div class="error-page">
            <h2 class="headline text-warning">404</h2><br>
            <div class="error-content">
              <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
              <p>
                We could not find the page you were looking for.
                Meanwhile, you may <a href="{% link index.md %}">return to index</a>.
              </p>
            </div>
          </div>
        </section>
      </div>    
</body>
</html>

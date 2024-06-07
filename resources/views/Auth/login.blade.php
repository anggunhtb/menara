<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('FrontEnd/img/Rumah Makan.png') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <style>
    body {
      background-color: #bdbdbd;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-control {
      border-radius: 3px;
    }

    .btn-primary {
      width: 100%;
      margin-top: 20px;
    }

    p {
      text-align: center;
      margin-top: 20px;
    }

    img {
        margin-left: 60px;
    }

    .form-control:focus {
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Efek hover pada label */
    .form-group label:hover {
    color: #007bff; /* Ubah warna saat dihover */
    cursor: pointer; /* Ubah kursor menjadi pointer saat dihover */
    }

    /* Animasi saat gambar dihover */
    img:hover {
    transform: scale(1.1); /* Perbesar gambar saat dihover */
    transition: transform 0.3s ease; /* Animasi perubahan */
    }
  </style>
</head>
<body>
  @include('sweetalert::alert')
  <div class="container">
    <a href="/"><img src="{{ asset('FrontEnd/img/Rumah Makan.png') }}" alt="" width="250px"></a>
    <form action="{{ route('login') }}" method="POST">
        @csrf
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" required>

        @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <p class="mt-3">Belum punya akun? <a href="{{ route('register') }}">register</a></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

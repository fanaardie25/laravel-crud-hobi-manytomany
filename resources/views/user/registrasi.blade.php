<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">

            <!-- Register Form -->
            <div class="col-md-5">
                <h3 class="text-center mb-4">Register</h3>
                <form action="{{ route('register.post') }}" method="POST">
                    <!-- CSRF Token for Laravel -->
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"  placeholder="Masukan Nama mu">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"  placeholder="Masukan Email mu">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"  placeholder="Masukan Password mu">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Confirm your password">
                    </div> --}}
                    <button type="submit" class="btn btn-success w-100">Register</button>
                    <p class="text-center mt-3">
                        Sudah punya akun? <a href="{{ route('login') }}">Login disini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Script JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      @if (@session('success'))
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
        Toast.fire({
        icon: "success",
        title: "{{ session('success') }}"
        });
      @endif

      @if ($errors->any())
      @foreach ($errors->all() as $item)
          
      
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{ $item }}",
        });

        
      @endforeach
      @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

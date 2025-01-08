<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crud data siswa</title>
</head>
<body>
    <div class="container">
        <h2>Edit Siswa</h2>
    
        <form action="{{ route('siswa.update', $datasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Siswa</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $datasiswa->nama }}" required>
            </div>
    
            <div class="form-group">
                <label for="hobi">Pilih Hobi</label>
                <select name="hobis[]" id="hobi" class="form-control" multiple required>
                    @foreach($datahobi as $hobi)
                        <option value="{{ $hobi->id }}" 
                            {{ in_array($hobi->id, $datasiswa->hobi->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $hobi->hobi }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary mt-2">Update</button>

        </form>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
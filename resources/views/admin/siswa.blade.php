<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1>Data Siswa</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('siswa.create') }}">Tambah Siswa</a>

    <table class="bg-blue-400" border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Nama Pacar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $index => $siswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $siswa->name }}</td>
                <td>{{ $siswa->email }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->nama_pacar }}</td>
                <td>
                    <a href="{{ route('siswa.edit', $siswa->id) }}">Edit</a> |
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jam Tangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1rem;
        }
        main {
            flex-grow: 1;
            padding: 2rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <header>
        <h1>Jam Tangan</h1>
    </header>
    
    <main>
        <h2>Jam Tangan</h2>
          <a href="{{ url('produk/create') }}" 
       style="display: inline-block; padding: 8px 12px; background-color: blue; color: white; text-decoration: none; border-radius: 5px; margin-right: 5px;">
       Tambah
    </a>
          <a href="{{ url('/') }}" 
       style="display: inline-block; padding: 8px 12px; background-color: red; color: white; text-decoration: none; border-radius: 5px; margin-right: 5px;">
       Logout
    </a>
        <table>
            <thead>
                <tr>
                    <th>Jam</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($produk as $row) : ?>
                <tr>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['harga']; ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td><?= $row['deskripsi']; ?></td>
             <td><img src="{{ asset('img/' . $row['gambar']) }}" alt="{{ $row['nama'] }}" width="100" height="100"></td>
                   <td>
    <a href="/produk/{{ $row['id'] }}" 
       style="display: inline-block; padding: 8px 12px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px; margin-right: 5px;">
       Edit
    </a>

    <form action="{{ url('produk/' . $row['id']) }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" 
                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                style="padding: 8px 12px; background-color: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Delete
        </button>
    </form>
</td>

                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 My Styled Table Page. All rights reserved.</p>
    </footer>
</body>
</html>
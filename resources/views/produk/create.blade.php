<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Form Page</title>
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
            max-width: 600px;
            margin: 0 auto;
        }
        form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>My Styled Form Page</h1>
    </header>
    
    <main>
        <h2>Contact Us</h2>
        <form action="/produk" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="nama" required>

            <label for="email">harga:</label>
            <input type="text" id="harga" name="harga" required>

            <label for="email">Stok:</label>
            <input type="text" id="stok" name="stok" required>

            <label for="email">Deskripsi:</label>
            <input type="text" id="stok" name="deskripsi" required>

            <label for="email">Gambar:</label>
            <input type="file" id="stok" name="gambar" required>

            <input type="submit" value="Submit">
        </form>
    </main>

    <footer>
        <p>&copy; 2024 My Styled Form Page. All rights reserved.</p>
    </footer>
</body>
</html>
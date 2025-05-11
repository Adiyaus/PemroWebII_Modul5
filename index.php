<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan Online</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background:rgb(19, 5, 142);
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2e86de;
            color: white;
            padding: 5px;
            text-align: center;
        }
        main {
            margin: 50px auto;
            width: 80%;
            max-width: 600px;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        a.button {
            display: block;
            padding: 15px;
            background-color: #3498db;
            color: white;
            text-align: center;
            margin: 10px 0;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }
        a.button:hover {
            background-color:rgb(23, 72, 104);
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat Datang di Perpustakaan Online</h1>
    </header>
    <main>
        <h2>Menu</h2>
        <a href="Member.php" class="button">📋 Kelola Data Member</a>
        <a href="Buku.php" class="button">📚 Kelola Data Buku</a>
        <a href="Peminjaman.php" class="button">🔄 Kelola Data Peminjaman</a>
    </main>
</body>
</html>

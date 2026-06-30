<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Handicraft Products Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #18181b; }
        h1 { margin-bottom: 16px; font-size: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #d4d4d8; padding: 8px; text-align: left; vertical-align: top; }
        th { background: #f4f4f5; }
        img { width: 64px; height: 64px; object-fit: cover; }
    </style>
</head>
<body>
    <h1>Handicraft Products List</h1>
    <table>
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Bahan</th>
                <th>Harga</th>
                <th>Pengrajin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
                <tr>
                    <td>{{ $produk->id_produk }}</td>
                    <td>
                        @if ($produk->imagePublicPath() && file_exists($produk->imagePublicPath()))
                            <img src="{{ $produk->imagePublicPath() }}" alt="{{ $produk->nama_produk }}">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->bahan }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $produk->pengrajin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

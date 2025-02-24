<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Penilaian Karyawan</title>
    <style>
        h4 {
            margin: 0;
        }

        .w-full {
            width: 100%;
        }

        .w-half {
            width: 50%;
        }

        .margin-top {
            margin-top: 1.25rem;
        }

        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table.products {
            font-size: 0.875rem;
        }

        table.products tr {
            background-color: rgb(96 165 250);
        }

        table.products th {
            color: #ffffff;
            padding: 0.5rem;
        }

        table tr.items {
            background-color: rgb(241 245 249);
        }

        table tr.items td {
            padding-top: 0.5rem;
        }

        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <h2>PT Duta Grafika Indonesia</h2>
    <div class="margin-top">
        <p>Tanggal : {{ date('d M Y', strtotime($tanggal->tanggal)) }}</p>
        <table class="products">
            <tr>
                <th>No</th>
                <th>Karyawan</th>
                <th>Kehadiran</th>
                <th>Produksi</th>
                <th>Skor</th>
                <th>Status</th>
            </tr>
            @foreach ($laporan as $item)
                <tr class="items">

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->penilaian->karyawan->nama }}</td>
                    <td>{{ $item->penilaian->absensi }}</td>
                    <td>{{ $item->penilaian->produksi }}</td>
                    <td>{{ $item->skor }}</td>
                    <td>{{ $item->status_karyawan }}</td>
                </tr>
            @endforeach

        </table>
    </div>


</body>

</html>

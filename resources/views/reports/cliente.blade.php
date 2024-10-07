<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Cliente</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        hr {
            border: 1px solid #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2a36e;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
        }

        td {
            font-size: 14px;
            background-color: #fdfdfd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Sombra suave para las celdas */
        td {
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <h1>Listado de Clientes</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td style="background-color: #fce6c0">{{ $item['codigo'] }}</td>
                    <td>{{ $item['nombre'] }}</td>
                    <td>{{ $item['edad'] }}</td>
                    <td>{{ $item['categoria'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

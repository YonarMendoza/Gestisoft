@php
use Carbon\Carbon;
$fecha = Carbon::now('America/Bogota')->format('Y-m-d H:i:s A');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/aaa.ico')}}" type="image/x-icon">
    <title>Gestisoft</title>
    <style>
        .content-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 1.0em;
            min-width: 700px;
            align-items: center;
        }

        .content-table thead tr {
            background-color: #196F3D;
            color: white;
            text-align: center;
            font-weight: bold;
        }

        .content-table th,
        td {
            padding: 12px 15px;
            text-align: center;
        }

        .content-table tbody tr {
            border-bottom: 1px solid green;
        }
    </style>
</head>


<body>
    <img src="assets/aaa.jpg" style="width: 100px;height: 100px">
    <h1 style="margin-left: 210px;margin-top:-70px">Registro De Unidades</h1> <br>
    <span>Total De Unidades: {{ $unidad->count() }}
    <span style="margin-top: -30px;margin-left:230px">Fecha De Reporte: {{ $fecha}}</span>
    <table class="content-table">
        <thead>
            <tr>
                <th scope="col">N° Registros</th>
                <th scope="col">Nombre Unidad</th>
                <th scope="col">Total Animales</th>
            </tr>
        </thead>
        <tbody>
            @php
            $contador = 0; // Inicializar el contador de registros
            @endphp
            @foreach($unidades as $unidad)
            @php
            $contador++; // Incrementar el contador por cada registro
            @endphp
            <tr>
                <td>{{ $contador }}</td>
                <td>{{$unidad['Nom_unidad']}}</td>
                <td>{{$unidad['Total_animales']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
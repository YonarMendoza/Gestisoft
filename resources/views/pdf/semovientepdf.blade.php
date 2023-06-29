
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
            margin: 5px 0;
            font-size: 0.7em;
            min-width: 200px;
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
            padding: 3px;
            text-align: center;
        }

        .content-table tbody tr {
            border-bottom: 1px solid green;
        }
    </style>
</head>


<body>
    <img src="assets/aaa.jpg" style="width: 100px;height: 100px">
    <h1 style="margin-left: 210px;margin-top:-70px">Registro De Semovientes</h1> <br> <br>
    <h1 style="margin-left: 240px;margin-top:-70px; font-size: 25px;">{{$nombreUnidad}}</h1> 
    <span>Total De Semovientes: {{ count($data) }} </span>
    <span style="margin-top: -30px;margin-left:230px">Fecha De Reporte: {{ $fecha }}</span>
    <table class="content-table">
        <thead>
            <tr>
                <th scope="col">N° Registros</th>
                <th scope="col">Placa Inventario</th>
                <th scope="col">Nombre Unidad</th>
                <th scope="col">Nombre Semoviente</th>
                <th scope="col">Nombre Raza</th>
                <th scope="col">Tipo Semoviente</th>
                <th scope="col">Sexo Semoviente</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Peso Nacimiento</th>
                <th scope="col">Fecha Ingreso</th>
                <th scope="col">Tipo Ingreso</th>
            </tr>
        </thead>
        <tbody>
            @php
            $contador = 0; // Inicializar el contador de registros
            @endphp

            @foreach($data as $item)
            @php
            $contador++; // Incrementar el contador por cada registro
            @endphp
            <tr>
                <td>{{ $contador }}</td>
                <td>{{$item['Placa_inventario']}}</td>
                <td>{{$item['Nom_unidad']}}</td>
                <td>{{$item['Nom_semoviente']}}</td>
                <td>{{$item['Nom_raza']}}</td>
                <td>{{$item['Tipo_semoviente']}}</td>
                <td>{{$item['Sexo_semoviente']}}</td>
                <td>{{$item['Fech_nacimiento']}}</td>
                <td>{{$item['Peso_nacimiento']}}</td>
                <td>{{$item['Fech_ingreso']}}</td>
                <td>{{$item['Tipo_ingreso']}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
    
</body>

</html>
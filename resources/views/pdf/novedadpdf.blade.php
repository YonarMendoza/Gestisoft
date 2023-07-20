@php
use Carbon\Carbon;
$fecha = Carbon::now('America/Bogota')->format('Y-m-d h:i:s A');
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
            font-size: 0.9em;
            min-width: 950px;
            align-items: center;
            margin-left: -30px;
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
    <h1 style="margin-left: 310px;margin-top:-70px">Registro De Novedades</h1> <br>
    <span>Total De Novedades: {{ $Novedad->count() }}
        <span style="margin-top: -30px;margin-left:500px">Fecha De Reporte: {{ $fecha}}</span>
        <table class="content-table">
            <thead>
                <tr>
                    <th scope="col">N° Registros</th>
                    <th scope="col">Fecha Novedad</th>
                    <th scope="col">Nombre Novedad</th>
                    <th scope="col">Nombre Semoviente</th>
                    <th scope="col">Placa Inventario</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Responsable</th>
                </tr>
            </thead>
            <tbody>
                @php
                $contador = 0; // Inicializar el contador de registros
                @endphp

                @foreach($Novedad as $novedad)
                @php
                $contador++; // Incrementar el contador por cada registro
                @endphp
                <tr>
                    <td>{{ $contador }}</td>
                    <td>{{$novedad['Fech_novedad']}}</td>
                    <td>{{$novedad['Nom_novedad']}}</td>
                    <td>{{$novedad->semoviente['Nom_semoviente']}}</td>
                    <td>{{$novedad->semoviente['Placa_inventario']}}</td>
                    <td>{{$novedad['Descripcion']}}</td>
                    <td>{{$novedad->responsable['Nom_responsable']}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>

</body>

</html>
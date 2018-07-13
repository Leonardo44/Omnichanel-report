<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Top 10 Agentes por Cantidad de Tickets y Duración</title>   
    <link href="{{ public_path('css/colors.css') }}" rel="stylesheet">
    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet">
    <style>
        .PDF_header .logo img{
            width: 100%;
            height: 100%;
            margin-top: 0%;
        }
    </style>
</head>
    <body>
        <div class='PDF_header'> <!-- Encabezado -->
            <div class='logo'>
                <img src="{{ public_path('favicon.png') }}"/>
            </div>
            <div class='info'>
                <h4 class='title'>Top 10 Agentes</h4>
            </div>
        </div>
        <hr>
        <div class="content">
            <h3>{{ $data["account"] }}</h3>
            <table>
                <thead class="{{ env('PRIMARY_COLOR') }} {{ env('GRADE_PRIMARY_COLOR') }}">
                    <tr>
                        <th>Agente [username]</th>
                        <th>Cantidad de Tickets</th>
                        <th>Duración de Tickets</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["data"] as $value)
                        <tr>
                            <td colspan="3" class="{{ env('SECONDARY_COLOR') }} {{ env('GRADE_SECONDARY_COLOR') }}">Fecha: {{ $value["date"] }}</td>
                        </tr>
                        @foreach($value["agents"] as $agent)
                            <tr>
                                <td>{{ $agent["username"] }}</td>
                                <td>{{ $agent["cant"] }}</td>
                                <td>{{ $agent["duration"] }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
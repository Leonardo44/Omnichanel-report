<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cantidad de Tickets por Cliente</title>   
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
                <h4 class='title'>Cantidad de Tickets por Cliente</h4>
            </div>
        </div>
        <hr>
        <div class="content">
            <h3>{{ $data["account"] }}</h3>
            <table>
                <thead class="{{ env('PRIMARY_COLOR') }} {{ env('GRADE_PRIMARY_COLOR') }}">
                    <tr>
                        <th>Cliente [Interfaz]</th>
                        <th>Cantidad de Tickets</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["data"] as $value)
                        <tr>
                            <td colspan="2" class="{{ env('SECONDARY_COLOR') }} {{ env('GRADE_SECONDARY_COLOR') }}">Fecha: {{ $value["date"] }}</td>
                        </tr>
                        @foreach($value["clients"] as $client)
                            <tr>
                                <td>{{ $client["name"] }}</td>
                                <td>{{ $client["cant"] }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
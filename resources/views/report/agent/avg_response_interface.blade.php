<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Promedio de Tiempo de Respuesta por Interfaz</title>   
    <link href="{{ public_path('css/colors.css') }}" rel="stylesheet">
    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet">
</head>
    <body>
        <div class='PDF_header'> <!-- Encabezado -->
            <div class='logo'>
                <img src="{{ public_path('favicon.png') }}"/>
            </div>
            <div class='info'>
                <h4 class='title'>Promedio de Tiempo de Respuesta por Interfaz</h4>
            </div>
        </div>
        <hr>
        <div class="content">
            <h3>{{ $data["agent"] }}</h3>
            <table>
                <thead class="{{ env('PRIMARY_COLOR') }} {{ env('GRADE_PRIMARY_COLOR') }}">
                    <tr>
                        <th>Fecha</th>
                        @foreach($data["interfaces"] as $interface)
                            <th>{{ $interface }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["data"] as $value)
                        <tr>
                            <td>{{ $value["date"] }}</td>
                            @foreach($data["interfaces"] as $interface)
                                <td>{{ $value[$interface] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Documento</title>
</head>
<body>
    <h1>Registros de {{ $tipo_sacramento }}</h1>
    <table>
        <thead>
            <tr>
                <th>Folio</th>
                <th>Partida</th>
                <th>Tipo de Sacramento</th>
                <th>Parroquia</th>
                <th>Número de Libro</th>
                <th>Letra</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $registro)
            <tr>
                    <td>{{ $registro->numero_libro }}</td>
                    <td>{{ $registro->num_letra ?? 'N/A' }}</td>
                    <td>{{ $registro->folio }}</td>
                    <td>{{ $registro->partida }}</td>
                    <td>{{ $registro->tipo_sacramento }}</td>
                    <td>{{ $registro->parroquia->nombre ?? 'N/A'}}</td>
                    <td>{{ $registro->persona->nombre ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

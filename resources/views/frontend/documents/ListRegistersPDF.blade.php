<!DOCTYPE html>
<html>
<head>
    <title>Documento de Sacramentos</title>
</head>
<body>
    <h1>Documento de Sacramentos</h1>
    <table>
        <thead>
            <tr>
                <th>Persona</th>
                <th>Tipo</th>
                <th>Parroquia</th>
                <th>Número de Libro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sacramentos as $sacramento)
                <tr>
                    <td>{{ $sacramento->persona->nombre }}</td>
                    <td>{{ $sacramento->tipo }}</td>
                    <td>{{ $sacramento->parroquia->nombre }}</td>
                    <td>{{ $sacramento->libroSacramento->numero_libro }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Registros</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th.persona-columna, td.persona-columna {
            width: 40%; /* Ajusta este valor según necesites */
        }
        th.otras-columnas, td.otras-columnas {
            width: 10%; /* Ajusta este valor según necesites */
        }
    </style>
</head>
<body>
    <h1>Registros de {{ $tipo_sacramento }}</h1>
    <table>
        <thead>
            <tr>
                <th class="otras-columnas">Libro</th>
                <th class="otras-columnas">Letra</th>
                <th class="otras-columnas">Folio</th>
                <th class="otras-columnas">Partida</th>
                <th class="otras-columnas">Letra</th>
                <th class="persona-columna">Persona</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $registro)
                <tr>
                    <td class="otras-columnas">{{ $registro->numero_libro }}</td>
                    <td class="otras-columnas">{{ $registro->num_letra ?? '' }}</td>
                    <td class="otras-columnas">{{ $registro->folio }}</td>
                    <td class="otras-columnas">{{ $registro->partida }}</td>
                    <td class="otras-columnas">{{ $registro->letra_partida ?? '' }}</td>
                    <td class="persona-columna">{{ $registro->persona->nombre ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

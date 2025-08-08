<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Precificação - Lista</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/style.css">
</head>
<body class="container py-4 bg-light">

<header class="mb-4">
    <h1>Histórico de Precificações</h1>
    <a href="{{ route('precificacao.create') }}" class="btn btn-success mb-3">Criar nova precificação</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($resultados->isEmpty())
        <p>Nenhuma precificação cadastrada.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>SKU</th>
                    <th>Descrição</th>
                    <th>Custo MP (R$)</th>
                    <th>Despesas (%)</th>
                    <th>Impostos (%)</th>
                    <th>Comissão (%)</th>
                    <th>Frete (%)</th>
                    <th>Prazo (%)</th>
                    <th>Inadimplência (%)</th>
                    <th>VPC (%)</th>
                    <th>Lucro (%)</th>
                    <th>Valor Final (R$)</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resultados as $resultado)
                <tr>
                    <td>{{ $resultado->sku }}</td>
                    <td>{{ $resultado->description }}</td>
                    <td>{{ number_format($resultado->raw_material_cost, 2, ',', '.') }}</td>
                    <td>{{ number_format($resultado->expense, 2, ',', '.') }}</td>
                    <td>{{ number_format($resultado->taxes ?? 0, 2, ',', '.') }}</td>
                    <td>{{ number_format($resultado->commission ?? 0, 2, ',', '.') }}</td>
                    <td>{{ number_format($resultado->freight ?? 0, 2, ',', '.') }}</td>
                    <td>{{ number_format($resultado->term ?? 0, 2, ',', '.') }}</td>
                    <td>{{ number_format($resultado->default ?? 0, 2, ',', '.') }}</td>
                    <td>{{ number_format($resultado->vpc ?? 0, 2, ',', '.') }}</td>
                    <td>{{ number_format($resultado->profit, 2, ',', '.') }}</td>
                    <td class="fw-bold">R$ {{ number_format($resultado->final_value, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('precificacao.edit', $resultado->id) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('precificacao.delete', $resultado->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirma exclusão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</header>

</body>
</html>

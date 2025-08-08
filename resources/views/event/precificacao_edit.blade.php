<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Precificação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container py-4 bg-light">
    <h1>Editar Precificação</h1>

    <form action="{{ route('precificacao.update', $registro->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label for="sku" class="form-label fw-bold">SKU <span class="text-danger">*</span></label>
            <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku', $registro->sku) }}" required />
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label fw-bold">Descrição do produto <span class="text-danger">*</span></label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $registro->description) }}" required />
        </div>
        <div class="col-md-4">
            <label for="raw_material_cost" class="form-label fw-bold">Custo Matéria-Prima <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="raw_material_cost" id="raw_material_cost" class="form-control" value="{{ old('raw_material_cost', $registro->raw_material_cost) }}" required />
        </div>

        <div class="col-md-4">
            <label for="expense" class="form-label fw-bold">Despesas (%) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="expense" id="expense" class="form-control" value="{{ old('expense', $registro->expense) }}" required />
        </div>

        <div class="col-md-4">
            <label for="taxes" class="form-label fw-bold">Impostos (%)</label>
            <input type="number" step="0.01" name="taxes" id="taxes" class="form-control" value="{{ old('taxes', $registro->taxes) }}" />
        </div>

        <div class="col-md-4">
            <label for="commission" class="form-label">Comissão (%)</label>
            <input type="number" step="0.01" name="commission" id="commission" class="form-control" value="{{ old('commission', $registro->commission) }}" />
        </div>

        <div class="col-md-4">
            <label for="freight" class="form-label">Frete (%)</label>
            <input type="number" step="0.01" name="freight" id="freight" class="form-control" value="{{ old('freight', $registro->freight) }}" />
        </div>

        <div class="col-md-4">
            <label for="term" class="form-label">Prazo (1% a.m)</label>
            <input type="number" step="0.01" name="term" id="term" class="form-control" value="{{ old('term', $registro->term) }}" />
        </div>

        <div class="col-md-4">
            <label for="default" class="form-label">Inadimplência (%)</label>
            <input type="number" step="0.01" name="default" id="default" class="form-control" value="{{ old('default', $registro->default) }}" />
        </div>

        <div class="col-md-4">
            <label for="assistance" class="form-label">Assistência (%)</label>
            <input type="number" step="0.01" name="assistance" id="assistance" class="form-control" value="{{ old('assistance', $registro->assistance) }}" />
        </div>

        <div class="col-md-4">
            <label for="vpc" class="form-label">VPC (%)</label>
            <input type="number" step="0.01" name="vpc" id="vpc" class="form-control" value="{{ old('vpc', $registro->vpc) }}" />
        </div>

        <div class="col-md-4">
            <label for="profit" class="form-label fw-bold">Lucro (%)</label>
            <input type="number" step="0.01" name="profit" id="profit" class="form-control" value="{{ old('profit', $registro->profit) }}" required />
        </div>

        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary px-4">Atualizar</button>
            <a href="{{ route('precificacao.index') }}" class="btn btn-secondary px-4">Cancelar</a>
        </div>
    </form>
</body>
</html>

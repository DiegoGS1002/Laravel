<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Precificacao;

class PrecificacaoController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'sku' => 'required|string|max:10',
            'description' => 'required|string|max:100',
            'raw_material_cost' => 'required|numeric',
            'expense' => 'required|numeric',
            'taxes' => 'nullable|numeric',
            'commission' => 'nullable|numeric',
            'freight' => 'nullable|numeric',
            'term' => 'nullable|numeric',
            'default' => 'nullable|numeric',
            'assistance' => 'nullable|numeric',
            'vpc' => 'nullable|numeric',
            'profit' => 'required|numeric',
        ]);

        $raw_material_cost = $data['raw_material_cost'];
        $expense = $data['expense'];
        $taxes = $data['taxes'] ?? 0;
        $commission = $data['commission'] ?? 0;
        $freight = $data['freight'] ?? 0;
        $term = $data['term'] ?? 0;
        $default = $data['default'] ?? 0;
        $assistance = $data['assistance'] ?? 0;
        $vpc = $data['vpc'] ?? 0;
        $profit = $data['profit'];

        $price_multiplier = 1 / (1 - (
            ($taxes / 100) +
            ($commission / 100) +
            ($freight / 100) +
            ($term / 100) +
            ($default / 100) +
            ($assistance / 100) +
            ($vpc / 100)
        ));

        $product_cost = $raw_material_cost * (1 + ($expense / 100));
        $base_price = $product_cost * (1 + ($profit / 100));
        $final_value = $base_price * $price_multiplier;

        $real_profit_percent = (($final_value - $product_cost) / $product_cost) * 100;

        Precificacao::create([
            'sku' => $data['sku'],
            'description' => $data['description'],
            'raw_material_cost' => $raw_material_cost,
            'expense' => $expense,
            'taxes' => $taxes,
            'commission' => $commission,
            'freight' => $freight,
            'term' => $term,
            'default' => $default,
            'assistance' => $assistance,
            'vpc' => $vpc,
            'profit' => $real_profit_percent,
            'final_value' => $final_value,
        ]);

        return redirect()->route('precificacao.index')
                         ->with('success', 'Precificação salva com sucesso!');
    }

    // Mostrar formulário de edição
    public function edit($id)
    {
        $registro = Precificacao::findOrFail($id);
        return view('event.precificacao_edit', compact('registro'));
    }

    // Atualizar registro
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'sku' => 'required|string|max:10',
            'description' => 'required|string|max:100',
            'raw_material_cost' => 'required|numeric',
            'expense' => 'required|numeric',
            'taxes' => 'nullable|numeric',
            'commission' => 'nullable|numeric',
            'freight' => 'nullable|numeric',
            'term' => 'nullable|numeric',
            'default' => 'nullable|numeric',
            'assistance' => 'nullable|numeric',
            'vpc' => 'nullable|numeric',
            'profit' => 'required|numeric',
        ]);

        $registro = Precificacao::findOrFail($id);

        $raw_material_cost = $data['raw_material_cost'];
        $expense = $data['expense'];
        $taxes = $data['taxes'] ?? 0;
        $commission = $data['commission'] ?? 0;
        $freight = $data['freight'] ?? 0;
        $term = $data['term'] ?? 0;
        $default = $data['default'] ?? 0;
        $assistance = $data['assistance'] ?? 0;
        $vpc = $data['vpc'] ?? 0;
        $profit = $data['profit'];

        $price_multiplier = 1 / (1 - (
            ($taxes / 100) +
            ($commission / 100) +
            ($freight / 100) +
            ($term / 100) +
            ($default / 100) +
            ($assistance / 100) +
            ($vpc / 100)
        ));

        $product_cost = $raw_material_cost * (1 + ($expense / 100));
        $base_price = $product_cost * (1 + ($profit / 100));
        $final_value = $base_price * $price_multiplier;

        $real_profit_percent = ($final_value - $product_cost);

        $registro->update([
            'sku' => $data['sku'],
            'description' => $data['description'],
            'raw_material_cost' => $raw_material_cost,
            'expense' => $expense,
            'taxes' => $taxes,
            'commission' => $commission,
            'freight' => $freight,
            'term' => $term,
            'default' => $default,
            'assistance' => $assistance,
            'vpc' => $vpc,
            'profit' => $real_profit_percent,
            'final_value' => $final_value,
        ]);

        return redirect()->route('precificacao.index')
                         ->with('success', 'Precificação atualizada com sucesso!');
    }

    // Excluir registro
    public function destroy($id)
    {
        $precificacao = Precificacao::findOrFail($id);
        $precificacao->delete();

        return redirect()->route('precificacao.index')
                         ->with('success', 'Registro excluído com sucesso!');
    }
    public function index()
        {
            $resultados = Precificacao::all();  // traz todas precificações
            return view('event.precificacao_index', compact('resultados'));
        }

    public function create()
        {
            return view('event.precificacao_create');
        }
}


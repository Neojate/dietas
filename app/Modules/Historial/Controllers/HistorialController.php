<?php

namespace App\Modules\Historial\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Modules\Compras\Models\Buy;
use App\Http\Controllers\Controller;

class HistorialController extends Controller {

    public function index() {
        $cuentas = Buy::select([
                DB::raw('sum(cast(cost as decimal)) as cost'),
                DB::raw('DATE(created_at) as date')
            ])
            ->where('user_id', auth()->user()->id)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        foreach ($cuentas as $cuenta)
            $cuenta['date'] = Carbon::createFromFormat('Y-m-d', $cuenta['date'])->format('d/m/Y');

        return view('Historial::front_index', compact('cuentas'));
    }

}

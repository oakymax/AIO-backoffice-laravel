<?php

namespace App\Http\Controllers\Ord;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class ContractorsController extends Controller
{

    public function index(): Response
    {

        $contractors = DB::query()
            ->select(['id', 'name', 'inn'])
            ->from('ord_contractors')
            ->orderBy('id')
            ->get();

        return Inertia::render('ord/Contractors', [
            'contractors' => $contractors
        ]);
    }

}

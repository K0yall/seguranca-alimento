<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlimentoController extends Controller
{
    private function getFile()
    {
        return 'alimentos.json';
    }

    private function readAll()
    {
        if (!Storage::exists($this->getFile())) {
            Storage::put($this->getFile(), json_encode([]));
        }
        return json_decode(Storage::get($this->getFile()), true);
    }

    private function saveAll($data)
    {
        Storage::put($this->getFile(), json_encode($data, JSON_PRETTY_PRINT));
    }

    public function index()
    {
        $alimentos = $this->readAll();
        return view('alimentos.index', compact('alimentos'));
    }

    public function create()
    {
        return view('alimentos.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $alimentos = $this->readAll();

        $data['id'] = count($alimentos) + 1;
        $alimentos[] = $data;

        $this->saveAll($alimentos);

        return redirect()->route('alimentos.index')->with('ok', 'Alimento salvo!');
    }
}

<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Color;

class ColorController extends Controller
{

    public function index()
    {
        return view('color.index', ['colors' => Color::query()->paginate(5)]);
    }

    public function create()
    {
        return view('color.create');
    }

    public function store(StoreRequest $request)
    {
        $dataColor = $request->validated();
        Color::query()->firstOrCreate($dataColor);
        return redirect()->route('colors.index');
    }

    public function show(Color $color)
    {
        return view('color.show', ['color' => $color]);
    }

    public function edit(Color $color)
    {
        return view('color.edit', ['color' => $color]);
    }

    public function update(UpdateRequest $request, Color $color)
    {
        $color = $color->update($request->validated());
        return redirect()->route('colors.index');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        return view('animals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $data = $request->all();

        //Nested if
        if ($data['jumlah'] > 10) {
            if ($data['jumlah'] % 2 == 0) {
                $data['category'] = 'Banyak Genap';
            }else{
                $data['category'] = 'Banyak Ganjil';
            }
        } elseif ($data['jumlah'] > 5) {
            $data['category'] = 'Sedang';
        } else {
            $data['category'] = 'Sedikit';
        }

        //nested loop
        $pattern = "";
        for ($i = 1; $i <= $data['jumlah']; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                $pattern .= "*";
            }
            $pattern .= "\n";
        }
        $data['pattern'] = $pattern;

        Animal::create($data);

        return redirect()->route('animals.index')->with('success', 'Animal added successfully!');
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $data = $request->all();

        if ($data['jumlah'] > 10) {
            if ($data['jumlah'] % 2 == 0) {
                $data['category'] = 'Banyak Genap';
            }else{
                $data['category'] = 'Banyak Ganjil';
            }
        } elseif ($data['jumlah'] > 5) {
            $data['category'] = 'Sedang';
        } else {
            $data['category'] = 'Sedikit';
        }

        $pattern = "";
        for ($i = 1; $i <= $data['jumlah']; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                $pattern .= "*";
            }
            $pattern .= "\n";
        }
        $data['pattern'] = $pattern;

        $animal->update($data);

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully!');
    }

    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Animal deleted successfully!');
    }

}

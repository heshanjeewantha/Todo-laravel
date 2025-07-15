<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Show list of items
    public function index()
    {
        $items = Item::all();
        return view('pages.items.index', compact('items'));
    }

    // Show form to create an item
    public function create()
    {
        return view('pages.items.create');
    }

    // Store new item
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Item::create($request->only('name', 'description'));

        return redirect()->route('items.index')->with('success', 'Item created successfully');
    }

    // Show form to edit an item
    public function edit(Item $item)
    {
        return view('pages.items.edit', compact('item'));
    }

    // Update the item
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $item->update($request->only('name', 'description'));

        return redirect()->route('items.index')->with('success', 'Item updated successfully');
    }

    // Delete item
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }
}

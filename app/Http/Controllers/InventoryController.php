<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InventoryController extends Controller
{
    /**
     * Display a listing of the inventory items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get inventory items (excluding hidden placeholder items)
        $inventoryItems = DB::table('inventory')
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->get();

        // Get counts for stat cards
        $totalItems = DB::table('inventory')
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->count();

        $lowStockItems = DB::table('inventory')
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->whereRaw('quantity <= minimum_stock_level AND quantity > 0')
            ->count();

        $outOfStockItems = DB::table('inventory')
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->where('quantity', '<=', 0)
            ->count();

        // Get unique categories from inventory table
        $existingCategories = DB::table('inventory')
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        // Default categories that should always be available
        $defaultCategories = ['Instruments', 'Disposables', 'Medications', 'Cleaning Supplies', 'Office Supplies', 'Equipment', 'PPE'];
        
        // Combine existing and default categories, remove duplicates
        $allCategories = array_unique(array_merge($existingCategories, $defaultCategories));
        sort($allCategories); // Sort alphabetically

        return view('admin.inventory', compact(
            'inventoryItems',
            'totalItems',
            'lowStockItems',
            'outOfStockItems',
            'allCategories'
        ));
    }

    /**
     * Store a newly created inventory item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'minimum_stock_level' => 'required|integer|min:0',
            'expiry_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        // Check if an item with the same name and category already exists
        $existingItem = DB::table('inventory')
            ->where('item_name', $request->item_name)
            ->where('category', $request->category)
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->first();

        if ($existingItem) {
            // Calculate new quantity
            $newQuantity = $existingItem->quantity + $request->quantity;
            
            // Determine status based on quantity and minimum stock level
            $status = 'In Stock';
            if ($newQuantity <= 0) {
                $status = 'Out of Stock';
            } elseif ($newQuantity <= $request->minimum_stock_level) {
                $status = 'Low Stock';
            }
            
            // Add note about the addition
            $additionNote = Carbon::now()->format('Y-m-d H:i') .
                " - Added " . $request->quantity . " " . $request->unit;
            if ($request->notes) {
                $additionNote .= ". Notes: " . $request->notes;
            }
            $notes = $existingItem->notes ? $existingItem->notes . "\n" . $additionNote : $additionNote;
            
            // Update existing item
            DB::table('inventory')
                ->where('id', $existingItem->id)
                ->update([
                    'quantity' => $newQuantity,
                    'unit' => $request->unit,
                    'minimum_stock_level' => $request->minimum_stock_level,
                    'expiry_date' => $request->expiry_date,
                    'status' => $status,
                    'notes' => $notes,
                ]);
                
            return redirect()->route('admin.inventory')
                ->with('success', 'Inventory item updated successfully.');
        }

        // If no existing item, create a new one
        // Determine status based on quantity and minimum stock level
        $status = 'In Stock';
        if ($request->quantity <= 0) {
            $status = 'Out of Stock';
        } elseif ($request->quantity <= $request->minimum_stock_level) {
            $status = 'Low Stock';
        }

        // Create data array
        $data = [
            'item_name' => $request->item_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'minimum_stock_level' => $request->minimum_stock_level,
            'expiry_date' => $request->expiry_date,
            'status' => $status,
            'notes' => $request->notes,
        ];

        DB::table('inventory')->insert($data);

        return redirect()->route('admin.inventory')
            ->with('success', 'Inventory item created successfully.');
    }

    /**
     * Show the form for editing the specified inventory item.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::table('inventory')->where('id', $id)->first();
        
        if (!$item) {
            return response()->json(['error' => 'Item not found'], 404);
        }
        
        return response()->json(['item' => $item]);
    }

    /**
     * Update the specified inventory item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'minimum_stock_level' => 'required|integer|min:0',
            'expiry_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        // Get the current item to compare values
        $currentItem = DB::table('inventory')->where('id', $id)->first();
        
        if (!$currentItem) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Inventory item not found.');
        }

        // Determine status based on quantity and minimum stock level
        $status = 'In Stock';
        if ($request->quantity <= 0) {
            $status = 'Out of Stock';
        } elseif ($request->quantity <= $request->minimum_stock_level) {
            $status = 'Low Stock';
        }

        // Add note about quantity change if it's different
        $notes = $request->notes;
        if ($currentItem->quantity != $request->quantity) {
            $changeNote = Carbon::now()->format('Y-m-d H:i') .
                " - Quantity changed from " . $currentItem->quantity .
                " to " . $request->quantity;
            $notes = $notes ? $notes . "\n" . $changeNote : $changeNote;
        }

        // Update data array
        $data = [
            'item_name' => $request->item_name,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'minimum_stock_level' => $request->minimum_stock_level,
            'expiry_date' => $request->expiry_date,
            'status' => $status,
            'notes' => $notes,
        ];

        DB::table('inventory')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('admin.inventory')
            ->with('success', 'Inventory item updated successfully.');
    }

    /**
     * Process an order for a critical inventory item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderCriticalItem(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer|exists:inventory,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // Get the existing item
        $item = DB::table('inventory')->where('id', $request->item_id)->first();
        
        if (!$item) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Inventory item not found.');
        }

        // Calculate new quantity
        $newQuantity = $item->quantity + $request->quantity;
        
        // Determine new status based on quantity and minimum stock level
        $status = 'In Stock';
        if ($newQuantity <= 0) {
            $status = 'Out of Stock';
        } elseif ($newQuantity <= $item->minimum_stock_level) {
            $status = 'Low Stock';
        }

        // Add order note
        $orderNote = Carbon::now()->format('Y-m-d H:i') .
            " - Ordered " . $request->quantity . " " . $item->unit;
        if ($request->notes) {
            $orderNote .= ". Notes: " . $request->notes;
        }
        $notes = $item->notes ? $item->notes . "\n" . $orderNote : $orderNote;

        // Update the item
        DB::table('inventory')
            ->where('id', $request->item_id)
            ->update([
                'quantity' => $newQuantity,
                'status' => $status,
                'notes' => $notes
            ]);

        return redirect()->route('admin.inventory')
            ->with('success', 'Order placed successfully. Inventory updated.');
    }

    /**
     * Remove the specified inventory item from storage.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = DB::table('inventory')->where('id', $id)->delete();
        
        if (!$deleted) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Inventory item not found.');
        }
        
        return redirect()->route('admin.inventory')
            ->with('success', 'Inventory item deleted successfully.');
    }

    /**
     * Store a new category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Check if category already exists
        $exists = DB::table('inventory')
            ->where('category', $request->category_name)
            ->exists();
            
        if ($exists) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Category already exists.');
        }

        // Add the category to the system by creating a hidden placeholder item
        DB::table('inventory')->insert([
            'item_name' => 'Category Placeholder - Do Not Use',
            'category' => $request->category_name,
            'quantity' => 0,
            'unit' => 'N/A',
            'minimum_stock_level' => 0,
            'status' => 'Hidden',
            'notes' => 'This is a placeholder item to register the category. Do not use or delete directly.'
        ]);

        return redirect()->route('admin.inventory')
            ->with('success', 'Category added successfully.');
    }

    /**
     * Update a category name.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string  $category
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'original_category_name' => 'required|string|max:255',
        ]);

        // Decode the URL-encoded category name
        $category = urldecode($category);
        
        // Check if this is a default category
        $defaultCategories = ['Instruments', 'Disposables', 'Medications', 'Cleaning Supplies', 'Office Supplies', 'Equipment', 'PPE'];
        if (in_array($category, $defaultCategories)) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Default categories cannot be renamed.');
        }

        // Check if the new category name already exists
        if ($request->category_name !== $request->original_category_name) {
            $exists = DB::table('inventory')
                ->where('category', $request->category_name)
                ->exists();
                
            if ($exists) {
                return redirect()->route('admin.inventory')
                    ->with('error', 'A category with this name already exists.');
            }
        }

        // Update all items with this category
        DB::table('inventory')
            ->where('category', $category)
            ->update(['category' => $request->category_name]);

        return redirect()->route('admin.inventory')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove a category by deleting its placeholder item.
     *
     * @param string  $category
     * @return \Illuminate\Http\Response
     */
    public function destroyCategory($category)
    {
        // Check if this is a default category
        $defaultCategories = ['Instruments', 'Disposables', 'Medications', 'Cleaning Supplies', 'Office Supplies', 'Equipment', 'PPE'];
        if (in_array($category, $defaultCategories)) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Default categories cannot be deleted.');
        }

        // Check if category has items (excluding hidden placeholder items)
        $itemsCount = DB::table('inventory')
            ->where('category', $category)
            ->where(function($query) {
                $query->where('status', '!=', 'Hidden')
                    ->orWhereNull('status');
            })
            ->count();
            
        if ($itemsCount > 0) {
            return redirect()->route('admin.inventory')
                ->with('error', 'Cannot delete a category that contains items. Remove or reassign the items first.');
        }

        // Delete the placeholder item for this category
        DB::table('inventory')
            ->where('category', $category)
            ->where('status', 'Hidden')
            ->delete();

        return redirect()->route('admin.inventory')
            ->with('success', 'Category deleted successfully.');
    }
}
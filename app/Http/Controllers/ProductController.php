<?php
    
namespace App\Http\Controllers;
    
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
    
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);
          
        return view('products.index', compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {   
        Product::create($request->validated());
           
        return redirect()->route('products.index')
                         ->with('success', 'Report created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());
          
        return redirect()->route('products.index')
                        ->with('success','Report updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
           
        return redirect()->route('products.index')
                        ->with('success','Report deleted successfully');
    }
    /**
     * Show the form for creating a new resource.
     */
  
    /**
     * Search the products based on various criteria.
     */
    public function search(Request $request): View
{
    $query = Product::query();

    if ($request->filled('branch')) {
        $query->where('name', 'like', '%' . $request->branch . '%');
    }

    if ($request->filled('drug')) {
        $query->where('drug', 'like', '%' . $request->drug . '%');
    }

    if ($request->filled('response')) {
        $query->where('response', $request->response);
    }

    if ($request->filled('date_from')) {
        $query->whereDate('created_at', '>=', $request->date_from);
    }

    if ($request->filled('date_to')) {
        $query->whereDate('created_at', '<=', $request->date_to);
    }

    $products = $query->paginate(10);

    // Prepare the aggregated data for the table
    $drugData = $products->groupBy('drug')->map(function ($items, $drug) {
        $branches = [
            'Asokoro' => 0, 'Maitama' => 0, 'Garki' => 0, 'Gimbiya PX' => 0,
            'New Ademola' => 0, 'Old Ademola' => 0, 'Old Gwarinpa' => 0,
            'New Gwarinpa' => 0, 'Gwarina 3' => 0, 'Gana PX' => 0, 'Ferma' => 0
        ];

        foreach ($items as $item) {
            if (array_key_exists($item->name, $branches)) {
                $branches[$item->name]++;
            }
        }

        return array_merge(['drug' => $drug], $branches);
    });

    return view('products.search', compact('products', 'drugData'))->with('i', (request()->input('page', 1) - 1) * 10);
}


    
    
}
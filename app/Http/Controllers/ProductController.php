<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Product;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    private $title = 'Product';

    function list() {
        return view('product-list', [
            'title' => "{$this->title} : List",
            'products' => Product::orderBy('code')->get(),
        ]);
        $query = $this->search($search)->withCount('shops');
    }

    function show($productCode) {
        $product = Product
            ::where('code', $productCode)
            ->firstOrFail();
    
        return view('product-view', [
            'title' => "{$this->title} : View",
            'product' => $product,
        ]);
    }
    function createForm() {
        return view('product-create-form', [
        'title' => "{$this->title} : Create",
        ]);
        }
        
        function create(Request $request) {
        $product = Product::create($request->getParsedBody());
            $this->authorize('create', Product::class);
            
            try {
            return redirect()->route('product-list')
            ->with('status', "Product {$product->code} was created.")
            ;
            } catch(QueryException $excp) {
                return redirect()->back()->withInput()->withErrors([
                'error' => $excp->errorInfo[2],
                ]);
            }
            }
        
        return redirect()->route('product-list');
        }
        function show($productCode) {
            // We use method find() from SearchableController.
            $product = $this->find($productCode);
            
            return view('product-view', [
            'title' => "{$this->title} : View",
            'product' => $product,
            ]);
        }
        function updateForm($productCode) {
            $product = $this->find($productCode);
            
            return view('product-update-form', [
            'title' => "{$this->title} : Update",
            'product' => $product,
            ]);
            }
            function update(Request $request, $productCode) {
                $product = $this->find($productCode);
                $product->fill($request->getParsedBody());
                $product->save();
                
                return redirect()->route('product-view', [
                'product' => $product->code,
                ]);
                }
            }
            function delete($productCode) {
                $product = $this->find($productCode);
                $product->delete();
                
                return redirect()->route('product-list');
                }
                function prepareSearch($search) {
                    $search = parent::prepareSearch($search);
                    $search = array_merge([
                    'minPrice' => null,
                    'maxPrice' => null,
                    ], $search);
                    
                    return $search;
                    }
                    function filterByPrice($query, $minPrice, $maxPrice) {
                        if($minPrice !== null) {
                        $query->where('price', '>=', $minPrice);
                        }
                        
                        if($maxPrice !== null) {
                        $query->where('price', '<=', $maxPrice);
                        }
                        
                        return $query;
                        }
                        function filterBySearch($query, $search) {
                            $query = parent::filterBySearch($query, $search);
                            $query = $this->filterByPrice($query,
                            $search['minPrice'], $search['maxPrice']);
                            return $query;
                            }
                            function showShop(
                                Request $request,
                                ShopController $shopController,
                                $productCode
                                ) {
                                $product = $this->find($productCode);
                                $search = $shopController->prepareSearch($request->getQueryParams());
                                $query = $shopController->filterBySearch($product->shops(), $search);
                                
                                return view('product-view-shop', [
                                'title' => "{$this->title} {$product->code} : Shop"
                                ,
                                
                                'product' => $product,
                                'search' => $search,
                                'shops' => $query->paginate(5),
                                ]);
                                
                                }
                                function update(User $user) {
                                    return $user->isAdministrator();
                                    }
                                    function updateForm() {
                                        $this->authorize('update', Product::class);
                                        try {
                                            return redirect()->route('product-list')
                                            ->with('status', "Product {$product->code} was created.")
                                            ;
                                            } catch(QueryException $excp) {
                                                return redirect()->back()->withInput()->withErrors([
                                                'error' => $excp->errorInfo[2],
                                                ]);
                                            }
                                        }
                                        function update(Request $request) {
                                        $this->authorize('update', Product::class);
                                        try {
                                            return redirect()->route('product-list')
                                            ->with('status', "Product {$product->code} was created.")
                                            ;
                                            } catch(QueryException $excp) {
                                                return redirect()->back()->withInput()->withErrors([
                                                'error' => $excp->errorInfo[2],
                                                ]);
                                            }
                                        }
                                        function delete($productCode) {
                                            $product = Product::where('code', $productCode)->FirstOrFail();
                                            $this->authorize('delete', $product);
                                            try {
                                                return redirect()->route('product-list')
                                                ->with('status', "Product {$product->code} was created.")
                                                ;
                                                } catch(QueryException $excp) {
                                                    return redirect()->back()->withInput()->withErrors([
                                                    'error' => $excp->errorInfo[2],
                                                    ]);
                                                }
                                            }
                                    }
class ProductController extends SearchableController
{
    function getQuery() {
        return Product::orderBy('code');
        }
        
        function list(Request $request) {
        $search = $this->prepareSearch($request->getQueryParams());
        $query = $this->search($search);
        return view('product-list', [
        'title' => "{$this->title} : List",
        'search' => $search,
        'products' => $query->paginate(5),
        ]);
        }
}

<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function show($id)
    {
        return response()->json(Product::find($id));
    }

    public function store(Request $request)
    {
        $item = new Product();
        $item->type_id = $request->type_id;
        $item->date = $request->date;

        $item->save();
    }

    public function update(Request $request, $id)
    {
        $item = Product::find($id);
        $item->type_id = $request->type_id;
        $item->date = $request->date;

        $item->save();
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    /**Az adott termék típus (paraméter az elsődleges kulcs)-hoz
     *  tartozó összes termék adatait jelenítsd meg (fg+with) */

    public function termekTipOssz($type_id)
    {
        return Product::with('type')->where('type_id', '=', $type_id)->get();
    }

    /**Jelenítsd meg a
     *  bejelentkezett felhasználó kosara alapján azon terméktípusokat,
     *  amelyek neve “B” betűvel kezdődik; innentől DB:table. */

    public function bejelentkezettTermekTipus()
    {
        $user = Auth::user()->id;

        return DB::table('baskets as b')
            ->join('products as p', 'b.item_id', '=', 'p.item_id')
            ->join('product_types as pt', 'p.type_id', '=', 'pt.type_id')
            ->where('b.user_id', "=", $user)
            ->where('pt.name', 'like', 'B%')
            ->select('pt.name as termek_tipus_neve')
            ->distinct()
            ->get();
    }

    /**Tegyél egy terméket a bejelentkezett felhasználó kosarába (item_id paraméter) */

    public function termekHozzadas($item_id)
    {
        $user = Auth::user()->id;

        $ujKosar = new Basket();
        $ujKosar->user_id = $user;
        $ujKosar->item_id = $item_id;
        return $ujKosar->save();
    }
 
}

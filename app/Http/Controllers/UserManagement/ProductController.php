<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Http\Requests\UserManagement\ProductRequest;
use App\Models\UserManagement\Product;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Product::withTrashed();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('status', fn($row) => $row->deleted_at ? '<span class="badge bg-danger">Non Active</span>' : '<span class="badge bg-success">Active</span>')
            ->addColumn('action', fn($row) => view('user_management.product.action',compact('row')) )
            ->rawColumns(['status','action'])
            ->make();
        }
        return view('user_management.product.index');
    }

    public function store(ProductRequest $request){
        $user = Product::updateOrCreate(['id'  => $request->id], $request->validated());
        return response()->json([
            'status' => true,
            'message' => 'Data Added Successfully'
        ]);
    }

    public function edit($id)
    {
        $data = Product::find($id);
        return response()->json([
            'data'  => $data
        ]);

    }

    public function destroy($id)
    {
        $user = Product::withTrashed()->find($id);
        if($user->deleted_at)
        {
            $message = 'Restored';
            $user->restore();
        }else{
            $message = 'Deleted';
            $user->delete();
        }
        return response()->json([
            'status' => true,
            'message'=> $message,
        ]);
    }
}

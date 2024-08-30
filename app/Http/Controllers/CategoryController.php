<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryEgressRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriesE = DB::table('categories')->where('type', 'E')->get();
        $categoriesI = DB::table('categories')->where('type', 'I')->get();

        return view('category.index', compact('categoriesE', 'categoriesI'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        Category::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'icon' => $data['icon'],
        ]);

        return redirect()->route('categories');
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //$category->delete();
        //return redirect()->back();
        
        try {
            // Iniciar una transacción para asegurar la atomicidad
            DB::beginTransaction();
    
            // Verificar si la categoría tiene relaciones dependientes
            if (($category->incomes()->count() > 0) || ($category->incomes()->count() > 0)) {
                return redirect()->back()->withErrors(['error' => 'La categoría tiene productos asociados y no puede ser eliminada.']);
            }
    
            // Eliminar la categoría
            $category->delete();
    
            // Confirmar la transacción
            DB::commit();
    
            return redirect()->back()->with('success', 'Categoría eliminada exitosamente.');
        } catch (QueryException $e) {
            // Revertir la transacción en caso de error
            DB::rollBack();

            // Registrar el error para depuración
        Log::error('Error de consulta al eliminar la categoría: ' . $e->getMessage());
    
            // Manejar la excepción de integridad referencial
            return redirect()->back()->withErrors(['error' => 'No se puede eliminar la categoría debido a restricciones de integridad referencial.']);
        } 
        catch (\Exception $e) {
            DB::rollBack();

            // Registrar el error para depuración
        Log::error('Error de consulta al eliminar la categoría: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Ocurrió un error inesperado.']);
        }

    }
}

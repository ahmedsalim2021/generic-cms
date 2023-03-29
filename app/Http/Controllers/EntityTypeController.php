<?php

namespace App\Http\Controllers;

use App\Helpers\HttpHelper;
use App\Models\EntityType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class EntityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $entities = EntityType::with('entityAttributes')->paginate();

        return HttpHelper::apiResponse($entities, 'List Entities');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $entity = EntityType::create([
            'name' => $request->name
        ]);

        return HttpHelper::apiResponse($entity, 'new Entity added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(EntityType $entityType)
    {
        return HttpHelper::apiResponse($entityType->load('entityAttributes'), '');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  EntityType $entityType
     * @return JsonResponse
     */
    public function update(Request $request, EntityType $entityType)
    {
        $entityType->update([
            'name' => $request->name
         ]);

        return  HttpHelper::apiResponse($entityType, 'Entity updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EntityType  $entityType
     * @return JsonResponse
     */
    public function destroy(EntityType $entityType)
    {
        $entityType->delete();

        return HttpHelper::apiResponse(new \stdClass(), 'Entity Deleted');
    }
}

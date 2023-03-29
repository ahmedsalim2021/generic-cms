<?php

namespace App\Http\Controllers;

use App\Enum\AttributeDataTypeEnum;
use App\Helpers\HttpHelper;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Models\EntityType;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $attributes = Attribute::with('entityType')->paginate();

        return HttpHelper::apiResponse($attributes, 'List attributes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(AttributeRequest $request)
    {
        $attribute = Attribute::create($request->validated());

        return HttpHelper::apiResponse($attribute, 'New Attribute Stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(Attribute $attribute)
    {
        return HttpHelper::apiResponse($attribute->load('entityType'), 'Show Attribute Details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Attribute $attribute
     * @return JsonResponse
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $attribute->update($request->validated());

        return HttpHelper::apiResponse($attribute, 'Attribute Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Attribute $attribute
     * @return JsonResponse
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return HttpHelper::apiResponse($attribute, 'Attribute Deleted');
    }

    public function attributeDataType()
    {
        return HttpHelper::apiResponse(AttributeDataTypeEnum::datatypes(),
            'List Available DataTypes');
    }

    public function assignToEntity(Attribute $attribute, EntityType $entityType)
    {
        $attribute->update([
            'entity_type_id' => $entityType->id
        ]);

        return HttpHelper::apiResponse($attribute,
            $attribute->name.' Assigned to '.$entityType->name);
    }
}

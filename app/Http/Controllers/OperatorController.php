<?php

namespace App\Http\Controllers;

use App\Enum\RoleEnum;
use App\Helpers\HttpHelper;
use App\Http\Requests\StoreOperatorRequest;
use App\Http\Requests\UpdateOperatorRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $operators = User::where('role_id', RoleEnum::OPERATOR)->paginate();

        return HttpHelper::apiResponse($operators, 'List Operators');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(StoreOperatorRequest $request)
    {
        $operator = User::create([
            'name' => $request->username,
            'password' => bcrypt($request->password),
            'role_id' => RoleEnum::OPERATOR
        ]);

        return HttpHelper::apiResponse($operator, 'Store new Operator');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(User $operator)
    {
        return HttpHelper::apiResponse($operator, 'show operator details');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $operator
     * @return JsonResponse
     */
    public function update(UpdateOperatorRequest $request, User $operator)
    {
        $operator->update([
            'name' => $request->username
        ]);
        if ($request->password) {
            $operator->update([
                'password' => bcrypt($request->password)
            ]);
        }

        return HttpHelper::apiResponse($operator, 'Operator Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(User $operator)
    {
        $operator->delete();

        return HttpHelper::apiResponse(new \stdClass(), 'Operator deleted');
    }
}

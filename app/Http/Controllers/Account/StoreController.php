<?php

namespace App\Http\Controllers\Account;

use App\Repositories\AccountRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Account\StoreRequest;

class StoreController extends Controller
{

    use ValidatesRequests;

    public function __construct(protected readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $account = $this->accountRepository->create($data);

        return response()->json($account, 201);
    }
}

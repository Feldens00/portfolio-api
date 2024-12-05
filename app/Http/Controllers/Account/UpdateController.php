<?php

namespace App\Http\Controllers\Account;

use App\Repositories\AccountRepository;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\Account\UpdateRequest;

class UpdateController extends Controller
{
    use ValidatesRequests;

    public function __construct(protected readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(UpdateRequest $request, int $id): JsonResponse
    {
        $account = $this->accountRepository->findById($id);

        if (!$account) {
            return response()->json(['error' => 'Account not found'], 404);
        }

        $data = $request->validated();
        $this->accountRepository->update($account, $data);

        return response()->json($account);
    }
}

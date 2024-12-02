<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use Illuminate\Http\JsonResponse;

class ShowController extends Controller
{
    public function __construct(protected readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(int $id): JsonResponse
    {
        $account = $this->accountRepository->findById($id);

        if (!$account) {
            return response()->json(['error' => 'Account not found'], 404);
        }

        return response()->json($account);
    }
}

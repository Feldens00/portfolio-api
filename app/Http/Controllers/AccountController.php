<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use App\Http\Requests\Account\StoreRequest;
use App\Http\Requests\Account\UpdateRequest;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    protected $accountRepository;

    public function __construct(protected  readonly AccountRepository $repository)
    {

    }

    public function index(): JsonResponse
    {
        $accounts = $this->accountRepository->getAll();
        return response()->json($accounts);
    }

    public function show(int $id): JsonResponse
    {
        $account = $this->accountRepository->findById($id);

        if (!$account) {
            return response()->json(['error' => 'Account not found'], 404);
        }

        return response()->json($account);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        $account = $this->accountRepository->create($data);

        return response()->json($account, 201);
    }

    public function update(UpdateRequest $request, int $id): JsonResponse
    {
        $account = $this->accountRepository->findById($id);

        if (!$account) {
            return response()->json(['error' => 'Account not found'], 404);
        }

        $data = $request->validated();
        $this->accountRepository->update($account, $data);

        return response()->json($account);
    }

    public function destroy(int $id): JsonResponse
    {
        $account = $this->accountRepository->findById($id);

        if (!$account) {
            return response()->json(['error' => 'Account not found'], 404);
        }

        $this->accountRepository->delete($account);

        return response()->json(['message' => 'Account deleted successfully']);
    }
}

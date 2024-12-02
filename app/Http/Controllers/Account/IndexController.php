<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use Illuminate\Http\JsonResponse;

class IndexController extends Controller
{

    public function __construct(protected readonly AccountRepository $accountRepository)
    {

    }

    public function __invoke(): JsonResponse
    {
        $accounts = $this->accountRepository->getAll();
        return response()->json($accounts);
    }
}

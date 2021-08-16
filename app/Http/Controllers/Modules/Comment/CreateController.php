<?php

namespace App\Http\Controllers\Modules\Comment;

use App\Http\Requests\Comment\CreateRequest;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke(CreateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        dd($data);

        $isCreated = $this->service->createComment($data);

        if ($isCreated) {
            return back(201);
        }

        return back();
    }
}

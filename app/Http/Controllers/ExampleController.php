<?php

namespace App\Http\Controllers;

use App\Services\ExampleService;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    protected $exampleService;

    public function __construct(ExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    public function showGreeting(Request $request)
    {
        $name = $request->input('name', 'Invitado');
        $greeting = $this->exampleService->greet($name);

        return response()->json(['message' => $greeting]);
    }
}

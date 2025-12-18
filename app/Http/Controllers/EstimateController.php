<?php

namespace App\Http\Controllers;

use App\Models\CalculatorOption;
use App\Models\EstimateRequest;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    public function getOptions()
    {
        $options = CalculatorOption::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('type');

        return response()->json($options);
    }

    public function storeRequest(Request $request)
    {
        $validated = $request->validate([
            'property_type' => 'required|string',
            'square_feet' => 'required|numeric',
            'services' => 'required|array',
            'estimate_min' => 'required|numeric',
            'estimate_max' => 'required|numeric',
            'estimate_average' => 'required|numeric',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required|string|max:20',
        ]);

        $estimateRequest = EstimateRequest::create($validated);

        return response()->json([
            'message' => 'Estimate request submitted successfully',
            'data' => $estimateRequest
        ], 201);
    }
}

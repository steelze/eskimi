<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Http\Resources\CampaignResource;
use App\Models\Campaign;
use Illuminate\Http\JsonResponse;

class CampaignController extends Controller
{
    public function index(): JsonResponse
    {
        $campaigns = Campaign::latest()->get();
        return response()->json(CampaignResource::collection($campaigns));
    }

    public function store(CampaignRequest $request): JsonResponse
    {
        $paths = array_map(function($image) {
            return $image->store('campaigns', 'public');
        }, $request->images);


        $campaign = Campaign::create(array_merge($request->validated(), ['images' => $paths]));
        return response()->json($campaign);
    }

    public function show(Campaign $campaign): JsonResponse
    {
        return response()->json(new CampaignResource($campaign));
    }

    public function update(CampaignRequest $request, Campaign $campaign): JsonResponse
    {
        $paths = array_map(function($image) {
            return $image->store('campaigns', 'public');
        }, $request->images);

        $campaign->update(array_merge($request->validated(), ['images' => $paths]));
        return response()->json($campaign);
    }
}

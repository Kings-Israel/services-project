<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use App\Models\Service;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    use ApiResponseHelpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Add review to a service.
     *
     * @urlParam id The id of the service
     *
     * @bodyParam rating integer The service's rating
     * @bodyParam remarks string The service's remarks
     *
     * @response 200
     * @responseField data The saved review with the service
     */
    public function store(StoreReviewRequest $request, $id)
    {
        $service = Service::getByID($id);

        $service->reviews->create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'remarks' => $request->has('remarks') && ($request->remarks != '' || $request->remarks != null) ? $request->remarks : NULL,
        ]);

        return $request->wantsJson() ? $this->respondWithSuccess($service->load(['user', 'reviews'])) : view('', compact('service'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}

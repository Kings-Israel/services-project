<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use F9Web\ApiResponseHelpers;
use Illuminate\Support\Facades\Http;

/**
 * @group Services APIs
 */
class ServiceController extends Controller
{
    use ApiResponseHelpers;
    /**
     * Get all services.
     *
     * @response 200
     * @responseField content List of all services
     */
    public function index()
    {
        $services = Service::with('user', 'reviews')->get();

        return request()->wantsJson() ?
            $this->respondWithSuccess($services) :
            view('', compact('services'));
    }

    /**
     * Add a new service.
     * @authenticated
     *
     * @bodyParam title string required The title of the new service
     * @bodyParam description text The description of the new service
     * @bodyParam price string required The price of the new service
     * @bodyParam location_lat string required The latitude location of the new service
     * @bodyParam location_long string required The longitude location of the new service
     *
     * @response 201
     * @responseField data Details of the added service
     */
    public function store(StoreServiceRequest $request)
    {
        $service_location = Http::get('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$request->location_lat.','.$request->location_long.'&key=YOUR_API_KEY');

        $location = $service_location['results'][0]['formatted_address'];
        $service = Service::create([
            'title' => $request->title,
            'description' => $request->has('description') && $request->description != ''? $request->description : NULL,
            'price' => $request->price,
            'location' => $location,
            'location_lat' => $request->location_lat,
            'location_long' => $request->location_long,
            'user_id' => $request->user()->id,
        ]);

        return $request->wantsJson() ? $this->respondCreated($service) : view('', compact('service'));
    }

    /**
     * Show service details.
     *
     * @urlParam id The id of the service
     *
     * @response 200
     * @responseField data
     */
    public function show($id)
    {
        $service = Service::find($id);

        return request()->wantsJson() ? $this->respondeWithSuccess($service) : view('', compact('service'));
    }

    public function edit(Service $service)
    {
        // TODO: Return edit service view
    }

    /**
     * Update a service.
     *
     * @bodyParam title string required The title of the service
     * @bodyParam description string The description of the service
     * @bodyParam price string The price of the service
     * @bodyParam location_lat string The latitude location of the new service
     * @bodyParam location_long string The longitude location of the new service
     *
     * @urlParam id The id of the service
     *
     * @response 200
     * @responseField content The details of the updated service
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
    }

    /**
     * Delete a service.
     *
     * @urlParam id The id of the service
     *
     * @response 200
     * @responseField content The details of the deleted service
     */
    public function destroy($id)
    {
        $service = Service::with('reviews')->find($id);
    }
}

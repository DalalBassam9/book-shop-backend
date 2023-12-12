<?php

namespace App\Http\Controllers;

use App\Http\Resources\Website\AddressResource;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Get all Addresses.
     * @return JsonResponse
     */
    public function index()
    {
        $user = auth()->user()->userId;
        $addresses = Address::where('userId', $user)->get();
        return new AddressResource($addresses);
    }
    /**
     * Store a new Address record .
     * @param AddressRequest $request
     * @return JsonResponse
     */
    public function store(AddressRequest $request)
    {
        $user = auth()->user()->userId;
        $default = Address::where('userId', $user) === 0 ? true : false;

        $address = Address::create([
            'userId' => $user,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'cityId' =>  $request->cityId,
            'district' => $request->district,
            'phone' => $request->phone,
            'address' => $request->address,
            'default' => $default
        ]);

        return new AddressResource($address);
    }

    /**
     * Update Address record .
     *
     * @param AddressRequest $request
     * @param int|string  $addressId
     * @return JsonResponse
     */
    public function update(AddressRequest $request, $id)
    {
        $user = auth()->user()->userId;
        $address = Address::findOrFail($id);


        $address->update([
            'userId' => $user,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'cityId' =>  $request->cityId,
            'district' => $request->district,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);


        return new AddressResource($address);
    }

    public function setDefaultAddress($id)
    {
        $user = auth('api')->user()->userId;
        Address::where('userId', $user)->update(['default' => '0']);
        $address =  Address::where('userId', $user)->findOrFail($id);
        $address->update(['default' => '1']);

        return new AddressResource($address);
    }

    /**
     * Delete Address record .
     * @param int|string $addressId
     * @return JsonResponse
     */

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return response()->json(null, 204);
    }
}

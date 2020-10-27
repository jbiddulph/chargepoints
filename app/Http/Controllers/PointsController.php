<?php

namespace App\Http\Controllers;
use App\Http\Resources\PointsResource;
use App\Http\Resources\PointsResourceCollection;
use App\Models\Point;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    /**
     * @return PointsResourceCollection
     */
    public function index(): PointsResourceCollection {
        return new PointsResourceCollection(Point::inRandomOrder()->paginate(50));
    }

    /**
     * @param Point $point
     * @return PointsResource
     */
    public function show(Point $point): PointsResource {
        return new PointsResource($point);
    }

    /**
     * @param Request $request
     * @return PointsResource
     */
    public function store(Request $request) {
        $request->validate([
           'ChargeDeviceId'=>'required',
        ]);

        $point = Point::create($request->all());

        return new PointsResource($point);
    }

    public function update(Point $point, Request $request): PointsResource {

        //update our point
        $point->update($request->all());

        return new PointsResource($point);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Point::destroy($id);

    }
}

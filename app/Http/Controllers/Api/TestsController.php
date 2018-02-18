<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestsController extends Controller
{
    /**
     * @SWG\Get(
     *   path="/api/user",
     *   summary="",
     *   tags = {"users"},
     *   operationId="userTest",
     *    @SWG\Parameter(
     *    name="Authorization",
     *    description="Use the keyword 'Bearer' before the access-key. Example 'Bearer 0123456789_access-key-goes-here_987654321",
     *    type="string",
     *    required=true,
     *    in="header"
     *   ),
     *   @SWG\Response(response=200, description="successful operation"),
     * )
     *
     */
    public function userTest(Request $request)
    {
        return $request->user();
    }

    /**
     * @SWG\Get(
     *   path="/api/cmsct",
     *   summary="",
     *   tags = {"cmsct"},
     *   operationId="cmsctTest",
     *    @SWG\Parameter(
     *    name="Authorization",
     *    description="Use the keyword 'Bearer' before the access-key. Example 'Bearer 0123456789_access-key-goes-here_987654321",
     *    type="string",
     *    required=true,
     *    in="header"
     *   ),
     *   @SWG\Response(response=200, description="successful operation"),
     * )
     *
     */
    public function cmsctTest(Request $request)
    {
        return $request->user();
    }
}

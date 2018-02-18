<?php

namespace App\Http\Controllers\Api;

use App\CmsctUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\Client;

class LoginController extends Controller
{
    private $client;

    function __construct()
    {
        $this->client = Client::find(1);
    }

    /**
     * @SWG\Post(
     *   path="/api/login",
     *   summary="",
     *   tags = {"auth"},
     *   operationId="login",
     *    @SWG\Parameter(
     *   	name="params",
     *   	description="Parameters to pass (in body)",
     *   	@SWG\Schema(
     *   		type="object",
     *   		@SWG\Property(
     *   			property="email",
     *   			type="string"
     *   		),
     *   		@SWG\Property(
     *   			property="password",
     *   			type="string"
     *   		),
     *   	),
     *   	required=true,
     *   	in="body"
     *   ),
     *   @SWG\Response(response=200, description="successful operation")
     * )
     *
     */
    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client;

        $response = $http->post(url('/').'/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '*',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @SWG\Post(
     *   path="/api/loginCmsct",
     *   summary="",
     *   tags = {"auth"},
     *   operationId="loginCmsct",
     *    @SWG\Parameter(
     *   	name="params",
     *   	description="Parameters to pass (in body)",
     *   	@SWG\Schema(
     *   		type="object",
     *   		@SWG\Property(
     *   			property="email",
     *   			type="string"
     *   		),
     *   		@SWG\Property(
     *   			property="password",
     *   			type="string"
     *   		),
     *   	),
     *   	required=true,
     *   	in="body"
     *   ),
     *   @SWG\Response(response=200, description="successful operation")
     * )
     *
     */
    public function loginCmsct(Request $request)
    {
        $http = new \GuzzleHttp\Client;

        $response = $http->post(url('/').'/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '*',
                'provider' => 'cmsct_users'
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @SWG\Post(
     *   path="/api/registerCmsct",
     *   summary="",
     *   tags = {"auth"},
     *   operationId="registerCmsct",
     *    @SWG\Parameter(
     *   	name="params",
     *   	description="Parameters to pass (in body)",
     *   	@SWG\Schema(
     *   		type="object",
     *          @SWG\Property(
     *   			property="name",
     *   			type="string"
     *   		),
     *   		@SWG\Property(
     *   			property="email",
     *   			type="string"
     *   		),
     *   		@SWG\Property(
     *   			property="password",
     *   			type="string"
     *   		),
     *   	),
     *   	required=true,
     *   	in="body"
     *   ),
     *   @SWG\Response(response=200, description="successful operation")
     * )
     *
     */
    public function registerCmsct(Request $request)
    {
        return CmsctUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    /**
     * @SWG\Post(
     *   path="/api/register",
     *   summary="",
     *   tags = {"auth"},
     *   operationId="register",
     *    @SWG\Parameter(
     *   	name="params",
     *   	description="Parameters to pass (in body)",
     *   	@SWG\Schema(
     *   		type="object",
     *          @SWG\Property(
     *   			property="name",
     *   			type="string"
     *   		),
     *   		@SWG\Property(
     *   			property="email",
     *   			type="string"
     *   		),
     *   		@SWG\Property(
     *   			property="password",
     *   			type="string"
     *   		),
     *   	),
     *   	required=true,
     *   	in="body"
     *   ),
     *   @SWG\Response(response=200, description="successful operation")
     * )
     *
     */
    public function register(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}

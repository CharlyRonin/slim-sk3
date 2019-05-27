<?php namespace App\controller;


use App\Exceptions\RequestException;
use App\Classes\HttpUtils;
use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class UsersController extends BaseController
{
    /**
     * @param $request Request
     * @param $response Response
     * @param $params array
     * @return Response
     */
    public function getUsers($request,  $response, $params = []){
        $users = User::get();
        return $response->write($users);
    }
}
<?php namespace Bookshare\Http\Controllers\Api\v1;


// use Bookshare\Libraries\WebService;
// use Bookshare\Libraries\CustomErrorHandler;

use Bookshare\Http\Controllers\Controller;
use Bookshare\Http\Controllers\Api\WebservicebaseController;

use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;


// use Tymon\JWTAuth\JWTAuth;
// use Tymon\JWTAuth\Exceptions\TokenExpiredException;
// use Tymon\JWTAuth\Exceptions\TokenInvalidException;
// use Tymon\JWTAuth\Exceptions\JWTException;

use Lang;
use Config;
use Response;
use File;
use DB;
use Carbon;
use Validator;

class WebserviceController extends WebservicebaseController {

	private $WebService;
	private $jwtAuth;

	public function __construct() {
		// $this->WebService = new Webservice();
		// parent::__construct($jwtAuth);
	}

	public function create(){
		echo "<pre>";
		print_r("Test Function");
		echo "</pre>";
		exit;
		$post = Input::all();
		
	}

	public function show(){
		echo "<pre>";
		print_r("show Function");
		echo "</pre>";
		exit;
		
	}
}
<?php

namespace App\Http\Helpers;

class Constants{
public const RESPONSE_ERROR_MESSAGE = 'Error';
public const RESPONSE_SUCCESS_MESSAGE = 'Success';

//api authentication constants
public const INVALID_REQUEST_DATA = 506;
public const INTERNAL_SERVER_ERROR = 500;
public const SUCCESS_RESPONSE_CODE = 200;
public const UNAUTHORIZED_RESPONSE_CODE = 401;
public const ACCESS_FORBIDDEN_RESPONSE_CODE = 403;
public const VALIDATION_RESPONSE_CODE = 422;

public const PAGINATION_LENGTH=10;
}
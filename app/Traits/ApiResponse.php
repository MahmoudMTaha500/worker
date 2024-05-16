<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    protected function response($message,  $data = null, $error = null, $status = Response::HTTP_OK)
    {

        $array = [
            'message'           =>   $message,
            'success'           =>   in_array($status, $this->statuses()) ? true : false,
            'data'              =>   $data,
            'error_for_dev'     =>   $error,

        ];
        return response()->json($array, $status);
    }
    protected function statuses()
    {
        return [
            Response::HTTP_OK,
            Response::HTTP_CREATED,
            Response::HTTP_ACCEPTED,
            Response::HTTP_NO_CONTENT,
        ];
    }

    protected function notFoundResponse($meesage = 'Not Found', $code = Response::HTTP_NOT_FOUND)
    {
        return $this->response(
            $meesage,
            null,
            'Not Found',
            $code
        );
    }
}
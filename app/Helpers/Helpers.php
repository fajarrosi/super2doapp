<?php 

if (!function_exists('handleResponse')) {

    function handleResponse($httpStatus = 200, $message = 'success', $data = null)
    {
        $response = [
            'status' => $httpStatus == 200 ? "Success" : "Error",
            'message' => $message,
    		'data' => $data
        ];

        return response()->json($response,$httpStatus);
    }
}
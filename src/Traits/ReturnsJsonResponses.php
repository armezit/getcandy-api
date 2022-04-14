<?php

namespace Armezit\GetCandy\Api\Traits;

use Illuminate\Http\JsonResponse;

trait ReturnsJsonResponses
{
    protected int $statusCode = 200;

    /**
     * Gets the current status code.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Sets the status code for the getcandy-api::response.
     *
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode(int $statusCode): static
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Generates a Response with a 403 HTTP header and a given message.
     *
     * @param string|null $message
     * @return JsonResponse
     */
    public function errorForbidden(?string $message = null): JsonResponse
    {
        return $this->setStatusCode(403)->respondWithError(($message ?: trans('getcandy-api::response.error.forbidden')));
    }

    /**
     * Generates a response with a 410 HTTP header and a given message.
     *
     * @param string|null $message
     * @return JsonResponse
     */
    public function errorExpired(?string $message = null): JsonResponse
    {
        return $this->setStatusCode(410)->respondWithError(($message ?: trans('getcandy-api::response.error.expired')));
    }

    /**
     * Generates a Response with a 500 HTTP header and a given message.
     *
     * @param  string|null  $message
     * @return JsonResponse
     */
    public function errorInternalError(?string $message = null): JsonResponse
    {
        return $this->setStatusCode(500)->respondWithError(($message ?: trans('getcandy-api::response.error.internal')));
    }

    /**
     * Generates a Response with a 401 HTTP header and a given message.
     *
     * @param  string|null  $message
     * @return JsonResponse
     */
    public function errorUnauthorized(?string $message = null): JsonResponse
    {
        return $this->setStatusCode(401)->respondWithError(
            $message ?: trans('getcandy-api::response.error.unauthorized')
        );
    }

    /**
     * Generates a Response with a 400 HTTP header and a given message.
     *
     * @param  string|null  $message
     * @return JsonResponse
     */
    public function errorWrongArgs(?string $message = null): JsonResponse
    {
        return $this->setStatusCode(400)->respondWithError(
            $message ?: trans('getcandy-api::response.error.wrong_args')
        );
    }

    /**
     * Generates a Response with a 404 HTTP header and a given message.
     *
     * @param  string|null  $message
     * @return JsonResponse
     */
    public function errorNotFound(?string $message = null): JsonResponse
    {
        return $this->setStatusCode(404)->respondWithError(
            $message ?: trans('getcandy-api::response.error.not_found')
        );
    }

    public function errorUnprocessable($data): JsonResponse
    {
        return $this->setStatusCode(422)->respondWithError($data);
    }

    public function respondWithNoContent(): JsonResponse
    {
        return response()->json(null, 204);
    }

    public function respondWithSuccess($message = null): JsonResponse
    {
        return $this->respondWithArray([
            'success' => [
                'http_code' => $this->statusCode,
                'message' => $message,
            ],
        ]);
    }

    public function respondWithComplete($status = 201): JsonResponse
    {
        return $this->setStatusCode($status)->respondWithArray(['processed' => true]);
    }

    /**
     * Returns an error getcandy-api::response.
     *
     * @param  string|null  $message
     * @return JsonResponse
     */
    protected function respondWithError(?string $message = null): JsonResponse
    {
        if ($this->statusCode == 200) {
            trigger_error(trans('getcandy-api::response.error.200'));
        }

        return $this->respondWithArray([
            'error' => [
                'http_code' => $this->statusCode,
                'message' => $message,
            ],
        ]);
    }

    /**
     * Builds a response array.
     *
     * @param  array  $array - The array of data
     * @param  array  $headers - Any headers to attach to the response
     * @return JsonResponse
     */
    protected function respondWithArray(array $array, array $headers = []): JsonResponse
    {
        return response()->json($array, $this->statusCode)->withHeaders($headers);
    }
}

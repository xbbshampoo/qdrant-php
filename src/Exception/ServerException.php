<?php
/**
 * ServerException
 *
 * @since     Mar 2023
 * @author    Haydar KULEKCI <haydarkulekci@gmail.com>
 */

namespace Qdrant\Exception;

use Qdrant\Response;
use RuntimeException;

class ServerException extends RuntimeException
{
    /**
     * @var Response
     */
    protected $response;

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @param Response $response
     * @return ServerException
     */
    public function setResponse(Response $response): ServerException
    {
        $this->response = $response;

        return $this;
    }
}
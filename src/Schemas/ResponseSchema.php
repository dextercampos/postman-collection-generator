<?php
declare(strict_types=1);

namespace PostmanGenerator\Schemas;

use PostmanGenerator\Interfaces\ItemSchemaInterface;
use PostmanGenerator\Interfaces\PrePopulateInterface;

/**
 * @method null|string getResponseId()
 * @method null|\PostmanGenerator\Schemas\RequestSchema getOriginalRequest()
 * @method null|string|int getResponseTime()
 * @method \PostmanGenerator\Schemas\HeaderSchema[] getHeader()
 * @method mixed[] getBody()
 * @method null|string getStatus()
 * @method null|int getCode()
 * @method self setResponseTime($responseTime)
 * @method self setName(string $name)
 * @method self setHeader(array $headers)
 * @method self setBody(array $body)
 * @method self setStatus(string $status)
 * @method self setCode(int $code)
 * @method self setOriginalRequest(\PostmanGenerator\Schemas\RequestSchema $request)
 */
class ResponseSchema extends AbstractSchema implements PrePopulateInterface, ItemSchemaInterface
{
    private const ID_PREFIX = 'response_';

    /** @var string */
    public const PREVIEW_FORMAT = 'text';

    /** @var mixed[] */
    protected $body;

    /** @var int */
    protected $code;

    /** @var \PostmanGenerator\Schemas\HeaderSchema[] */
    protected $header = [];

    /** @var string */
    protected $name;

    /** @var \PostmanGenerator\Schemas\RequestSchema */
    protected $originalRequest;

    /** @var string */
    protected $responseId;

    /** @var mixed */
    protected $responseTime;

    /** @var string */
    protected $status;

    /**
     * Fill properties before mass assignment.
     *
     * @return void
     */
    public function beforeFill(): void
    {
        $this->responseId = $this->responseId ?? \uniqid(self::ID_PREFIX, true);
    }

    /**
     * Get schema name identifier.
     *
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Serialize object as array.
     *
     * @return mixed[]
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getResponseId(),
            'originalRequest' => $this->getOriginalRequest(),
            'responseTime' => $this->getResponseTime(),
            'header' => $this->getHeader(),
            'body' => $this->getBody(),
            'status' => $this->getStatus(),
            'code' => $this->getCode(),
            'name' => $this->getName(),
            '_postman_previewlanguage' => self::PREVIEW_FORMAT
        ];
    }
}

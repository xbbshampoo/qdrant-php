<?php
/**
 * RecommendRequest
 *
 * @since     Jun 2023
 * @author    Greg Priday <greg@siteorigin.com>
 */

namespace Qdrant\Models\Request;

use Qdrant\Models\Filter\Filter;
use Qdrant\Models\Traits\ProtectedPropertyAccessor;

class RecommendRequest
{
    use ProtectedPropertyAccessor;

    /**
     * @var mixed[]
     */
    protected $positive;

    /**
     * @var mixed[]
     */
    protected $negative = [];

    /**
     * @var Filter|null
     */
    protected $filter;

    /**
     * @var string|null
     */
    protected $using;

    /**
     * @var int|null
     */
    protected $limit;

    /**
     * @var int|null
     */
    protected $offset;

    /**
     * @var float|null
     */
    protected $scoreThreshold;

    public function __construct(array $positive, array $negative = [])
    {
        $this->positive = $positive;
        $this->negative = $negative;
    }

    /**
     * @return static
     */
    public function setFilter(Filter $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return static
     */
    public function setScoreThreshold(float $scoreThreshold)
    {
        $this->scoreThreshold = $scoreThreshold;

        return $this;
    }

    /**
     * @return static
     */
    public function setUsing(string $using)
    {
        $this->using = $using;

        return $this;
    }

    /**
     * @return static
     */
    public function setLimit(int $limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return static
     */
    public function setOffset(int $offset)
    {
        $this->offset = $offset;

        return $this;
    }

    public function toArray(): array
    {
        $body = [
            'positive' => $this->positive,
            'negative' => $this->negative,
        ];

        if ($this->filter !== null && $this->filter->toArray()) {
            $body['filter'] = $this->filter->toArray();
        }
        if ($this->scoreThreshold) {
            $body['score_threshold'] = $this->scoreThreshold;
        }
        if ($this->using) {
            $body['using'] = $this->using;
        }
        if ($this->limit) {
            $body['limit'] = $this->limit;
        }
        if ($this->offset) {
            $body['offset'] = $this->offset;
        }

        return $body;
    }
}
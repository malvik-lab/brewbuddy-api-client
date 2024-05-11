<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Options;

use MalvikLab\BrewBuddyClient\Interfaces\RequestOptionInterface;

class RequestOption implements RequestOptionInterface
{
    public const ORDER_ASC = 'asc';
    public const ORDER_DESC = 'desc';
    private ?string $id;
    private int $page;
    private int $limit;
    private ?string $sort;
    private ?string $order;

    /**
     * @var array<string, mixed>
     */
    private array $filters;

    /**
     *
     */
    public function __construct() {
        $this->id = null;
        $this->page = 1;
        $this->limit = 20;
        $this->sort = null;
        $this->order = null;
        $this->filters = [];
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id): RequestOption
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage(int $page): RequestOption
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit): RequestOption
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @param string $sort
     * @return $this
     */
    public function setSort(string $sort): RequestOption
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @param string $order
     * @return $this
     */
    public function setOrder(string $order): RequestOption
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function addFilterByFullTextSearch(mixed $value): RequestOption
    {
        $this->filters['q'] = $this->prepareValue($value);

        return $this;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function addFilterByExactMatch(string $field, mixed $value): RequestOption
    {
        $this->filters[$this->toSnakeCase($field)] = $this->prepareValue($value);

        return $this;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function addFilterByPartialMatch(string $field, mixed $value): RequestOption
    {
        $this->filters[sprintf('%s_like', $this->toSnakeCase($field))] = $this->prepareValue($value);

        return $this;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function addFilterByLessThanOrEqualValue(string $field, mixed $value): RequestOption
    {
        $this->filters[sprintf('%s_lte', $this->toSnakeCase($field))] = $this->prepareValue($value);

        return $this;
    }

    /**
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function addFilterByGreaterThanOrEqualValue(string $field, mixed $value): RequestOption
    {
        $this->filters[sprintf('%s_gte', $this->toSnakeCase($field))] = $this->prepareValue($value);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return string|null
     */
    public function getSort(): ?string
    {
        return $this->sort;
    }

    /**
     * @return string|null
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * @return array<string, mixed>
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    private function prepareValue(mixed $value): mixed
    {
        if ( is_bool($value) )
        {
            $value = $value ? 'true': 'false';
        }

        return $value;
    }

    /**
     * @param string $input
     * @return string
     */
    private function toSnakeCase(string $input): string
    {
        $output = preg_replace('/(?<!^)[A-Z]/', '_$0', $input);
        return strtolower($output);
    }
}
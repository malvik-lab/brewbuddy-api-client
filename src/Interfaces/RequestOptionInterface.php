<?php

namespace MalvikLab\BrewBuddyClient\Interfaces;

interface RequestOptionInterface
{
    /**
     * @param string $id
     * @return RequestOptionInterface
     */
    public function setId(string $id): RequestOptionInterface;

    /**
     * @param int $page
     * @return RequestOptionInterface
     */
    public function setPage(int $page): RequestOptionInterface;

    /**
     * @param int $limit
     * @return RequestOptionInterface
     */
    public function setLimit(int $limit): RequestOptionInterface;

    /**
     * @param string $sort
     * @return RequestOptionInterface
     */
    public function setSort(string $sort): RequestOptionInterface;

    /**
     * @param string $order
     * @return RequestOptionInterface
     */
    public function setOrder(string $order): RequestOptionInterface;

    /**
     * @param mixed $value
     * @return RequestOptionInterface
     */
    public function addFilterByFullTextSearch(mixed $value): RequestOptionInterface;

    /**
     * @param string $field
     * @param mixed $value
     * @return RequestOptionInterface
     */
    public function addFilterByExactMatch(string $field, mixed $value): RequestOptionInterface;

    /**
     * @param string $field
     * @param mixed $value
     * @return RequestOptionInterface
     */
    public function addFilterByPartialMatch(string $field, mixed $value): RequestOptionInterface;

    /**
     * @param string $field
     * @param mixed $value
     * @return RequestOptionInterface
     */
    public function addFilterByLessThanOrEqualValue(string $field, mixed $value): RequestOptionInterface;

    /**
     * @param string $field
     * @param mixed $value
     * @return RequestOptionInterface
     */
    public function addFilterByGreaterThanOrEqualValue(string $field, mixed $value): RequestOptionInterface;

    /**
     * @return string|null
     */
    public function getId(): ?string;

    /**
     * @return int
     */
    public function getPage(): int;

    /**
     * @return int
     */
    public function getLimit(): int;

    /**
     * @return string|null
     */
    public function getSort(): ?string;

    /**
     * @return string|null
     */
    public function getOrder(): ?string;

    /**
     * @return array<string, mixed>
     */
    public function getFilters(): array;
}
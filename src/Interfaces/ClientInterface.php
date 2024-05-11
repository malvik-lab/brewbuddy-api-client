<?php

namespace MalvikLab\BrewBuddyClient\Interfaces;

interface ClientInterface
{
    public function getLanguages(RequestOptionInterface $requestOption): DTOInterface;

    public function getCountries(RequestOptionInterface $requestOption): DTOInterface;

    public function getImages(RequestOptionInterface $requestOption): DTOInterface;

    public function getTypologies(RequestOptionInterface $requestOption): DTOInterface;

    public function getBreweries(RequestOptionInterface $requestOption): DTOInterface;

    public function getGlasses(RequestOptionInterface $requestOption): DTOInterface;

    public function getFermentationMethods(RequestOptionInterface $requestOption): DTOInterface;

    public function getFoams(RequestOptionInterface $requestOption): DTOInterface;

    public function getBeers(RequestOptionInterface $requestOption): DTOInterface;

    public function getLanguage(string $id): DTOInterface;

    public function getCountry(string $id): DTOInterface;

    public function getImage(string $id): DTOInterface;

    public function getTypology(string $id): DTOInterface;

    public function getBrewery(string $id): DTOInterface;

    public function getGlass(string $id): DTOInterface;

    public function getFermentationMethod(string $id): DTOInterface;

    public function getFoam(string $id): DTOInterface;

    public function getBeer(string $id): DTOInterface;
}
<?php


namespace App\Nasa\ApodBundle\Factory;


interface DtoFactoryInterface
{
    /**
     * Create new object from arguments
     *
     * @param array $args
     */
    public function create(array $args = []);
}
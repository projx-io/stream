<?php

namespace ProjxIO\Logic;

interface Stream
{
    /**
     * @return mixed
     */
    public function apply(array $args = []);

    /**
     * @return mixed
     */
    public function call();

    /**
     * @return Stream
     */
    public function equalTo();

    /**
     * @return Stream
     */
    public function map();

    /**
     * @return Stream
     */
    public function filter();

    /**
     * @return Stream
     */
    public function mapFilter();
}

<?php

namespace Harcourt\EloquentModelGenerator\Processor;

use Harcourt\EloquentModelGenerator\Config;
use Harcourt\EloquentModelGenerator\Model\EloquentModel;

/**
 * Interface ProcessorInterface
 * @package Harcourt\EloquentModelGenerator\Processor
 */
interface ProcessorInterface
{
    /**
     * @param EloquentModel $model
     * @param Config $config
     */
    public function process(EloquentModel $model, Config $config);

    /**
     * @return int
     */
    public function getPriority();
}

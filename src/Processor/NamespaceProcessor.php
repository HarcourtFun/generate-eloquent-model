<?php

namespace Harcourt\EloquentModelGenerator\Processor;

use Harcourt\CodeGenerator\Model\NamespaceModel;
use Harcourt\EloquentModelGenerator\Config;
use Harcourt\EloquentModelGenerator\Model\EloquentModel;

/**
 * Class NamespaceProcessor
 * @package Harcourt\EloquentModelGenerator\Processor
 */
class NamespaceProcessor implements ProcessorInterface
{
    /**
     * @inheritdoc
     */
    public function process(EloquentModel $model, Config $config)
    {
        $model->setNamespace(new NamespaceModel($config->get('namespace')));
    }

    /**
     * @inheritdoc
     */
    public function getPriority()
    {
        return 6;
    }
}

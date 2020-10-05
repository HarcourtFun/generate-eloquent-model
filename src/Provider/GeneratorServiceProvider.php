<?php

namespace Harcourt\EloquentModelGenerator\Provider;

use Illuminate\Support\ServiceProvider;
use Harcourt\EloquentModelGenerator\Command\GenerateModelCommand;
use Harcourt\EloquentModelGenerator\EloquentModelBuilder;
use Harcourt\EloquentModelGenerator\Processor\CustomPrimaryKeyProcessor;
use Harcourt\EloquentModelGenerator\Processor\CustomPropertyProcessor;
use Harcourt\EloquentModelGenerator\Processor\ExistenceCheckerProcessor;
use Harcourt\EloquentModelGenerator\Processor\FieldProcessor;
use Harcourt\EloquentModelGenerator\Processor\NamespaceProcessor;
use Harcourt\EloquentModelGenerator\Processor\RelationProcessor;
use Harcourt\EloquentModelGenerator\Processor\TableNameProcessor;

/**
 * Class GeneratorServiceProvider
 * @package Harcourt\EloquentModelGenerator\Provider
 */
class GeneratorServiceProvider extends ServiceProvider
{
    const PROCESSOR_TAG = 'eloquent_model_generator.processor';

    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->commands([
            GenerateModelCommand::class,
        ]);

        $this->app->tag([
            ExistenceCheckerProcessor::class,
            FieldProcessor::class,
            NamespaceProcessor::class,
            RelationProcessor::class,
            CustomPropertyProcessor::class,
            TableNameProcessor::class,
            CustomPrimaryKeyProcessor::class,
        ], self::PROCESSOR_TAG);

        $this->app->bind(EloquentModelBuilder::class, function ($app) {
            return new EloquentModelBuilder($app->tagged(self::PROCESSOR_TAG));
        });
    }
}
<?php

namespace bulldozer\cities\frontend;

use bulldozer\App;
use bulldozer\cities\frontend\services\CityService;
use bulldozer\cities\frontend\services\CityServiceInterface;

/**
 * Class Module
 * @package bulldozer\cities\frontend
 */
class Module extends \bulldozer\base\Module
{
    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

        $container = App::$container;

        $container->setSingleton(CityServiceInterface::class, CityService::class);
    }
}
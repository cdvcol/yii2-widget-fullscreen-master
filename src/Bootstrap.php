<?php

namespace Cacko\Yii2\Widgets\FullScreen;

use yii\base\BootstrapInterface;
use Yii;
use yii\web\AssetConverter;

class Bootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {

        Yii::$container->set(AssetConverter::class, ['commands' => ['scss' => ['css', 'pscss --sourcemap  {from} > {to}']]]);

    }
}

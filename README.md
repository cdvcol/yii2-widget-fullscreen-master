# yii2-widget-fullscreen

Silly and useless straightfoward way to wrap your junk html containeirs in yii2 with a fullscreen functionality

## Demo
* demo - https://yii.cacko.net/fullscreen/widget

## Install
```shell
composer install cacko/yii2-widget-fullscreen
```

## Usage

```php
use Cacko\Yii2\Widgets\FullScreen\widgets\FullScreenWidget;

echo FullScreenWidget::widget(['content' => Html::img('/start.webp')]);

```

there's bunch of defaults in `Cacko\Yii2\Widgets\FullScreen\components\Options`, as usual if you think they are crap, feel free to inject your own ideas, just keep in mind you will have to bother with the css styles too - good luck

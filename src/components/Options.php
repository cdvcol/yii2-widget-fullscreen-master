<?php

namespace Cacko\Yii2\Widgets\FullScreen\components;

use JsonSerializable;
use yii\base\Component;


class Options extends Component implements JsonSerializable
{
    public string $selectorToggle = '.fs-toggle__icon';

    public string $classToggle = 'fs-toggle__icon';

    public string $selectorFullScreen = '.fullscreen-target';

    public string $classFullScreen = 'fullscreen-target';

    public string $iconExpand = 'icon-fullscreen-resize-full';

    public string $iconCollapse = 'icon-fullscreen-resize-normal';

    public string $classOverflowScroll = 'fullscreen-scroll';

    public string $selectorOverflowScroll = '.fullscreen-scroll';

    public string $classWidget = 'fullscreen-widget';

    public string $selectorWidget = '.fullscreen-widget';

    const JS_OPTIONS = ['selectorToggle', 'selectorFullScreen', 'iconExpand', 'iconCollapse', 'classOverflowScroll'];

    public function jsonSerialize()
    {
        return array_reduce(static::JS_OPTIONS, fn ($res, $option) => array_merge($res, [$option => $this->{$option}]), []);
    }
}

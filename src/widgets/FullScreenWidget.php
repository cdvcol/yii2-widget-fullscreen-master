<?php

namespace Cacko\Yii2\Widgets\FullScreen\widgets;

use Cacko\Yii2\Widgets\FullScreen\components\Options;
use Cacko\Yii2\Widgets\FullScreen\FullScreenAsset;
use yii\base\Widget;
use yii\helpers\Html;

class FullScreenWidget extends Widget
{

    const TOP_RIGHT = 'top-right';
    const TOP_LEFT = 'top-left';
    const BOTTOM_RIGJT = 'bottom-right';
    const BOTTOM_LEFT = 'bottom-left';
    const CENTER_CENTER = 'center-center';

    public string $togglePosition = 'bottom-right';

    public string $content;

    protected Options $defaults;

    public function __construct(Options $defaults, $config = [])
    {
        $this->defaults = $defaults;
        parent::__construct($config);
    }

    public function run()
    {

        $defaults = $this->defaults;

        echo Html::beginTag('div', ['class' => ['fullscreen-widget', $this->togglePosition], 'id' => $this->id]);

        echo Html::tag('div',  $this->renderIcon()  . $this->content, ['class' => $defaults->classFullScreen]);

        echo Html::endTag('div');

        FullScreenAsset::registerWidget($this, $this->defaults);
    }

    protected function renderIcon()
    {
        $defaults = $this->defaults;
        return Html::tag('div', Html::tag('i', '', ['class' => $defaults->iconExpand]), ['class' => $defaults->classToggle]);
    }
}

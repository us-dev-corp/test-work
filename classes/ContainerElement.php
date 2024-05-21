<?php

use interfaces\ElementInterface;

/**
 * Класс элемента с типом "container"
 */
class ContainerElement extends AbstractElement implements ElementInterface
{

    /**
     * Получить HTML-контент элемента
     *
     * @return string
     */
    public function getHTMLContent(): string
    {
        return '<main ' . $this->getStylesForElement() . '>' . $this->getChildrenContent() . '</main>';
    }
}
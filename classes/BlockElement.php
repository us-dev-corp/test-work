<?php

use interfaces\ElementInterface;

/**
 * Класс элемента с типом "block"
 */
class BlockElement extends AbstractElement implements ElementInterface
{

    /**
     * Получить HTML-контент элемента
     *
     * @return string
     */
    public function getHTMLContent(): string
    {
        return '<div ' . $this->getStylesForElement() . '>' . $this->getChildrenContent() . '</div>';
    }
}
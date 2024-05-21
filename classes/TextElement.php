<?php

use interfaces\ElementInterface;

/**
 * Класс элемента с типом "text"
 */
class TextElement extends AbstractElement implements ElementInterface
{

    /**
     * Получить HTML-контент элемента
     *
     * @return string
     */
    public function getHTMLContent(): string
    {
        return '<span ' . $this->getStylesForElement() . '>' . $this->getPayload()['text'] . '</span>';
    }
}
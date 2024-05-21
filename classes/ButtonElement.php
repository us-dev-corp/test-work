<?php

use interfaces\ElementInterface;

/**
 * Класс элемента с типом "button"
 */
class ButtonElement extends AbstractElement implements ElementInterface
{

    private const DEFAULT_TEXT = 'Click Me';

    /**
     * Получить HTML-контент кнопки
     *
     * @return string
     */
    private function getPayloadContent(): string
    {
        $content = '';
        $style = $this->getStylesForElement();

        if (!empty($this->getPayload())) {
            $payload = $this->getPayload();
            $btnText = $payload['text'] ?? self::DEFAULT_TEXT;

            if (isset($payload['link'])) {
                switch ($payload['link']['type']) {
                    case 'url':
                        $content = '<a href="' .  $payload['link']['payload'] . '"><button ' . $style . '>' . $btnText . '</button></a>';
                        break;
                    case 'onclick':
                        $content = '<button ' . $style . ' onclick="' . $payload['link']['payload'] . '">' . $btnText . '</button>';
                        break;
                }
            } else {
                $content = '<button ' . $style . '>' . $btnText . '</button>';
            }
        }

        return $content;
    }

    /**
     * Получить HTML-контент элемента
     *
     * @return string
     */
    public function getHTMLContent(): string
    {
        return $this->getPayloadContent();
    }
}
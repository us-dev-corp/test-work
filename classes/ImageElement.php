<?php

use interfaces\ElementInterface;

/**
 * Класс элемента с типом "image"
 */
class ImageElement extends AbstractElement implements ElementInterface
{

    /**
     * Получить HTML-контент картинки
     *
     * @return string
     */
    private function getPayloadContent(): string
    {
        $content = '';
        $style = $this->getStylesForElement();

        if (!empty($this->getPayload())) {
            $payload = $this->getPayload();
            $attributes = $this->getImageAttributes($payload);

            if (isset($payload['link'])) {
                switch ($payload['link']['type']) {
                    case 'url':
                        $content = '<a href="' .  $payload['link']['payload'] . '"><img src="' . $payload['image']['url'] . '" ' . $attributes .' ' . $style . ' /></a>';
                        break;
                    case 'onclick':
                        $content = '<a onclick="' .  $payload['link']['payload'] . '"><img src="' . $payload['image']['url'] . '" ' . $attributes .' ' . $style . ' /></a>';
                        break;
                }
            } else {
                $content = '<img src="' . $payload['image']['url'] . '" ' . $attributes .' ' . $style . ' />';
            }
        }

        return $content;
    }

    /**
     * Получить атрибуты для изображения
     *
     * @param array $payload
     * @return string
     */
    private function getImageAttributes(array $payload): string
    {
        $attributes = $attributeStrings = [];

        if (isset($payload['image'])) {
            $attributes['id'] = $payload['image']['id'] ?? null;
            $attributes['width'] = $payload['image']['meta']['width'] ?? null;
            $attributes['height'] = $payload['image']['meta']['height'] ?? null;
        }

        foreach ($attributes as $key => $value) {
            if ($value) {
                $attributeStrings[] = "$key=\"$value\"";
            }
        }

        return implode(' ', $attributeStrings) ?? '';
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
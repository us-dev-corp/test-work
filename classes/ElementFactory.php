<?php

use interfaces\ElementInterface;

class ElementFactory
{
    /**
     * Набор элементов
     */
    const ELEMENTS = [
        'container' => ContainerElement::class,
        'block' => BlockElement::class,
        'text' => TextElement::class,
        'image' => ImageElement::class,
        'button' => ButtonElement::class,
    ];

    /**
     * Получить объект класса элемента
     *
     * @param string $type
     * @param array $payload
     * @param array $children
     * @param array $parameters
     * @return ElementInterface|null
     */
    public static function getInstance(string $type, array $payload = [], array $children = [], array $parameters = []): ?ElementInterface
    {
        try {
            $className = self::getClass($type);
            return new $className($type, $payload, $children, $parameters);
        } catch (Throwable $e) {
            echo $e->getMessage();
            return null;
        }
    }

    /**
     * Получить название класса элемента
     *
     * @param string $element
     * @return string
     * @throws Exception
     */
    private static function getClass(string $element): string
    {
        $resultClass = '';

        if (isset(self::ELEMENTS[$element])) {
            $resultClass = self::ELEMENTS[$element];
        } else {
            throw new Exception('Element not found');
        }

        return $resultClass;
    }
}
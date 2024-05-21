<?php

use interfaces\ElementInterface;

/**
 * Абстрактный класс элемента
 */
class AbstractElement implements ElementInterface
{

    protected string $type;
    protected mixed $payload;
    protected array $children;
    protected mixed $parameters;

    /**
     * AbstractElement constructor.
     *
     * @param string $type
     * @param mixed|null $payload
     * @param array $children
     * @param mixed|null $parameters
     */
    public function __construct(string $type, mixed $payload = null, array $children = [], mixed $parameters = null)
    {
        $this->type = $type;
        $this->payload = $payload;
        $this->children = $children;
        $this->parameters = $parameters;
    }

    /**
     * Получить тип элемента
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Получить контент элемента
     *
     * @return mixed
     */
    public function getPayload(): mixed
    {
        return $this->payload;
    }

    /**
     * Получить дочерние элементы
     *
     * @return mixed
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * Получить параметры элемента
     *
     * @return mixed
     */
    public function getParameters(): mixed
    {
        return $this->parameters;
    }

    /**
     * Получить HTML-контент элемента
     */
    public function getHTMLContent()
    {
        // TODO: Implement getHTMLContent() method.
    }

    /**
     * Получить контент дочерних блоков
     *
     * @return string
     */
    public function getChildrenContent(): string
    {
        $content = '';

        foreach ($this->getChildren() as $child) {
            $content .= ElementFactory::getInstance($child['type'], $child['payload'], $child['children'] ?? [], $child['parameters'])->getHTMLContent();
        }

        return $content;
    }

    /**
     * Получить стили для элемента
     *
     * @return string
     */
    public function getStylesForElement(): string
    {
        $parameters = $this->getParameters();

        if (empty($parameters)) {
            return '';
        }

        return StylesGenerator::getStyles($parameters);
    }
}
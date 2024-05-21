<?php

/**
 * Класс генерации стилей
 */
class StylesGenerator
{
    private static array $classes;
    private static array $styles;

    /**
     * Получить стили для элемента по параметрам
     *
     * @param array $parameters
     * @return string
     */
    public static function getStyles(array $parameters): string
    {
        self::$classes = self::$styles = [];

        $result = '';

        foreach ($parameters as $key => $value) {
            self::$key($value);
        }

        if (!empty(self::$classes)) {
            $result .= 'class="' . implode(' ', self::$classes) . '"';
        }
        if (!empty(self::$styles)) {
            $result .= ' style="' . implode(' ', self::$styles) . '"';
        }

        return $result;
    }

    /**
     * Размер шрифта
     *
     * @param mixed $value
     */
    public static function fontSize(mixed $value): void
    {
        self::$classes[] = 'font-size__' . $value;
    }

    /**
     * Расположение текста
     *
     * @param mixed $value
     */
    public static function textAlign(mixed $value): void
    {
        self::$classes[] = 'text-align__' . $value;
    }

    /**
     * Цвет текста
     *
     * @param mixed $value
     */
    public static function textColor(mixed $value): void
    {
        self::$styles[] = 'color: ' . $value . ';';
    }

    /**
     * Цвет фона
     *
     * @param mixed $value
     */
    public static function backgroundColor(mixed $value): void
    {
        self::$styles[] = 'background-color: ' . $value . ';';
    }

    /**
     * Зум
     *
     * @param mixed $value
     */
    public static function zoom(mixed $value): void
    {
        self::$styles[] = 'zoom: ' . intval($value) . ';';
    }

    /**
     * Размер кнопки
     *
     * @param mixed $value
     */
    public static function size(mixed $value): void
    {
        switch ($value) {
            case 'small':
                self::$styles[] = 'width: 150px; height: 30px;';
                break;
            case 'medium':
                self::$styles[] = 'width: 250px; height: 50px;';
                break;
            case 'large':
                self::$styles[] = 'width: 350px; height: 60px;';
                break;
        }
    }

    /**
     * Стиль кнопки
     *
     * @param mixed $value
     */
    public static function style(mixed $value): void
    {
        switch ($value) {
            case 'normal':
                self::$styles[] = 'border: 2px solid #000000;';
                break;
            case 'custom':
                self::$styles[] = 'border: 1px solid #000000; border-radius: 5px;';
                break;
        }
    }

    /**
     * Если запрашиваем стилизацию, которой нет - воспринимаем как название(ия) классов
     *
     * @param string $name
     * @param array $arguments
     */
    public static function __callStatic(string $name, array $arguments): void
    {
        self::$classes[] = implode(' ', $arguments);
    }
}
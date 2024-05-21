<?php

namespace interfaces;

/**
 * Interface ElementInterface
 */
interface ElementInterface
{
    public function __construct(string $type, mixed $payload = null, array $children = [], mixed $parameters = null);

    public function getType();

    public function getPayload();

    public function getChildren();

    public function getParameters();

    public function getHTMLContent();

    public function getChildrenContent();
}
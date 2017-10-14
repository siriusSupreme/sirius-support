<?php

namespace Sirius\Support\Contracts;

interface Htmlable
{
    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml();
}

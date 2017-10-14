<?php

namespace Sirius\Support\Contracts;

interface MessageProvider
{
    /**
     * Get the messages for the instance.
     *
     * @return \Sirius\Support\Contracts\MessageBag
     */
    public function getMessageBag();
}

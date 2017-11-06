<?php

if (! function_exists('etestify')) {

    /**
     * Arrange for a flash message.
     *
     * @param  string|null $message
     * @param  string $level
     * @return array
     */
    function etestify($message = null, $level = 'info')
    {
        if (!is_null($message)) {
            return [
                'message' => $message,
                'level' => $level,
                'etestify' => true
            ];
        }
        return [];
    }

}

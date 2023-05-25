<?php

namespace App\Service;

use PHPHtmlParser\Curl;
use PHPHtmlParser\CurlInterface;
use PHPHtmlParser\Exceptions\CurlException;

class CurlClient implements CurlInterface
{
    public function get(string $url, array $options): string
    {
        $ch = curl_init($url);
        if ($ch === false) {
            throw new CurlException('Curl Init return `false`.');
        }

        if ( ! ini_get('open_basedir')) {
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        }

        if (isset($options['curlHeaders'])) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $options['curlHeaders']);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36');
        curl_setopt($ch, CURLOPT_URL, $url);

        $content = curl_exec($ch);
        if ($content === false) {
            // there was a problem
            $error = curl_error($ch);
            throw new CurlException('Error retrieving "'.$url.'" ('.$error.')');
        } elseif ($content === true) {
            throw new CurlException('Unexpected return value of content set to true.');
        }

        return $content;
    }
}

<?php
/**
 * PHPCI - Continuous Integration for PHP
 *
 * @copyright    Copyright 2014, Block 8 Limited.
 * @license      https://github.com/Block8/PHPCI/blob/master/LICENSE.md
 * @link         https://www.phptesting.org/
 */

namespace PHPCI\Http;

/**
 * Overridden HTTP\Request object to fix bad handling of request paths in b8\Http\Request
 *
 * @author    Ronan Chilvers <ronan@d3r.com>
 * @copyright 2014 D3R Ltd
 * @license   http://d3r.com/license D3R Software Licence
 * @package   D3R
 */
class Request extends \b8\Http\Request
{

    /**
     * Copied from upstream dev
     *
     * @return string
     * @author Ronan Chilvers <ronan@d3r.com>
     */
    protected function getRequestPath()
    {
        $path = '';
        // Start out with the REQUEST_URI:
        if (!empty($_SERVER['REQUEST_URI'])) {
            $path = $_SERVER['REQUEST_URI'];
        }
        // This should fix things if we're not in the document root:
        if (realpath($_SERVER['DOCUMENT_ROOT']) != dirname($_SERVER['SCRIPT_FILENAME'])) {
            $basePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['SCRIPT_FILENAME']));
            $path = substr($path, strlen($basePath));
        }
        // Remove index.php from the URL if it is present:
        $path = str_replace(array('/index.php', 'index.php'), '', $path);
        // Also cut out the query string:
        $path = explode('?', $path);
        $path = array_shift($path);
        return $path;
    }
}

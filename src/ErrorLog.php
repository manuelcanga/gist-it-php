<?php

namespace gist_it_php;

class ErrorLog
{

    private function __construct()
    {
        \error_reporting(E_ALL);

        set_error_handler(function (...$args) {

            $this->listenErrors(...$args);
        });
        set_exception_handler(function (...$args) {

            $this->listenExceptions(...$args);
        });
    }

    public static function create()
    {

        static $errorlog;

        return $errorlog??new ErrorLog();
    }

    private function listenErrors(int $errno, string $errstr, string $errfile, int $errline)
    {

        $message = "[{$errno}]: {$errstr} in {$errfile}:$errline";

        throw new \Exception($message);
    }

    private function listenExceptions(\Exception $ex)
    {

        \error_log($ex->getMessage());
    }
}

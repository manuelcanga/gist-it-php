<?php

namespace gist_it_php;

/**
 * Class ErrorLog
 *
 * Manage errors from gist-it-php app and transform they in log messages
  */
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

    /**
     * Create a instance of ErrorLog
     *
     * @return ErrorLog
     */
    public static function create(): ErrorLog
    {
        static $errorlog;

        return $errorlog ?? new ErrorLog();
    }

    /**
     * Transform PHP errors to exceptions
     *
     * @param int    $errno
     * @param string $errstr
     * @param string $errfile
     * @param int    $errline
     *
     * @throws \Exception
     */
    private function listenErrors(int $errno, string $errstr, string $errfile, int $errline): void
    {
        $message = "[{$errno}]: {$errstr} in {$errfile}:$errline";

        throw new \Exception($message);
    }

    /**
     * Transform exceptions to error_log messages
     *
     * @param \Exception $ex
     */
    private function listenExceptions(\Exception $ex): void
    {
        \error_log($ex->getMessage());
    }
}

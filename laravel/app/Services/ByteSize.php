<?php

namespace App\Services;

class ByteSize{

    private int $base = 1024;
    private int $precision = 0;

    private array $suffixes = array (
        8 => ' YB',
        7 => ' ZB',
        6 => ' EB',
        5 => ' PB',
        4 => ' TB',
        3 => ' GB',
        2 => ' MB',
        1 => ' KB',
    );

    /**
     * Format input into a human-friendly string for display
     *
     *
     * @param  integer $bytes Integer or string representing the number
     *   of bytes.
     * @return string Returns a human-friendly formatted string.
     */
    public function format(int $bytes): string{
        $out = $bytes . ' B';

        foreach ($this->suffixes as $power => $suffix) {
            if (bccomp($calc = $this->divPow($bytes, $power), 1) >= 0) {
                $out = $this->formatNumber($calc, $suffix);
                break;
            }
        }

        return $out;
    }

     /**
     * Divide a dividend by result of power operation
     *
     * The return value will be a string representation of the result. This is
     * due to the BCMath library and so we can work with very large integers.
     *
     * @param  integer $dividend The dividend to use in the division
     *   operation.
     * @param  integer $base The base for the power operation.
     * @param  integer $power The power $base should be raised by.
     * @return string Returns the result of the operations.
     */
    protected function divPow(int $dividend, int $power): string
    {
        return bcdiv($dividend, bcpow($this->base, $power, 10), 10);
    }


    /**
     * Format a float value with given suffix
     *
     * @param  integer|float $float The number to format.
     * @param  string $suffix The suffix to attach.
     * @param  integer $precision The number of significant digits to include.
     * @return string Returns the formatted string.
     */
    protected function formatNumber(int|float $float, string $suffix)
    {
        return sprintf("%.{$this->precision}f%s", $float, $suffix);
    }

}
<?php namespace Halofina\Calculator;

class Calculator {

    const INFLATION         = 6;

    const FINANCE_PAY_END   = 0;
    const FINANCE_PAY_BEGIN = 1;

    /**
     * Returns the Future Value of a cash flow with constant payments and interest rate (annuities).
     *
     * @param   float   $rate   Interest rate per period
     * @param   int     $nper   Number of periods
     * @param   float   $pmt    Periodic payment (annuity)
     * @param   float   $pv     Present Value
     * @param   int     $type   Payment type: 0 = at the end of each period, 1 = at the beginning of each period
     * @return  float
     */
    public static function fv($rate = 0.0, $nper = 0, $pmt = 0.0, $pv = 0.0, $type = 0) {
        // Validate parameters
        if ($type != 0 && $type != 1) {
            return False;
        }

        // Calculate
        if ($rate != 0.0) {
            return -$pv * pow(1 + $rate, $nper) - $pmt * (1 + $rate * $type) * (pow(1 + $rate, $nper) - 1) / $rate;
        } else {
            return -$pv - $pmt * $nper;
        }
    }

    /**
     * Extracted from the PEAR package Math_Finance by Alejandro Pedraza
     * http://pear.php.net/package/Math_Finance
     *
     * Returns the Present Value of a cash flow with constant payments and interest rate (annuities)
     * Excel equivalent: PV
     *
     *   TVM functions solve for a term in the following formula:
     *   pv(1+r)^n + pmt(1+r.type)((1+r)^n - 1)/r) +fv = 0
     *
     *
     * @param float      $rate  Interest rate per period
     * @param int        $nper  Number of periods
     * @param float      $pmt   Periodic payment (annuity)
     * @param float      $fv    Future Value
     * @param int        $type  Payment type:
                        FINANCE_PAY_END (default):    at the end of each period
                        FINANCE_PAY_BEGIN:            at the beginning of each period
     * @return float
     * @static
     * @access public
     */
    public static function pv($rate, $nper, $pmt, $fv = 0.0, $type = 0) {
        if ($rate) {
            $pv = (-$pmt * (1 + $rate * $type) * ((pow(1 + $rate, $nper) - 1) / $rate) - $fv) / pow(1 + $rate, $nper);
        } else {
            $pv = -$fv - $pmt * $nper;
        }

        return $pv;
    }

    /**
     * Excel PMT Function
     *
     */
    public static function pmt($rate, $nper, $pv, $fv = 0, $type = 0){
        return $rate == 0 && $nper != 0 ? -($fv + $pv) / $nper : (-$fv - $pv * pow(1 + $rate, $nper)) /
            (1 + $rate * $type) /
            ((pow(1 + $rate, $nper) - 1) / $rate);
    }
}
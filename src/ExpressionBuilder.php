<?php

namespace MoiTran\PrestoQueryBuilder;


class ExpressionBuilder
{
    /**
     * Wraps column name in AVG function
     *
     * @param $col
     *
     * @return string
     */
    public function avg($col)
    {
        return sprintf('AVG(%s)', $col);
    }

    /**
     * Wraps column name in MAX function
     *
     * @param $col
     *
     * @return string
     */
    public function max($col)
    {
        return sprintf('MAX(%s)', $col);
    }

    /**
     * Wraps column name in MIN function
     *
     * @param $col
     *
     * @return string
     */
    public function min($col)
    {
        return sprintf('MIN(%s)', $col);
    }

    /**
     * Wraps column name in SUM function
     *
     * @param $col
     *
     * @return string
     */
    public function sum($col)
    {
        return sprintf('SUM(%s)', $col);
    }

    /**
     * @param $minVal
     * @param $maxVal
     *
     * @return string
     */
    public function between($minVal, $maxVal)
    {
        return 'BETWEEN {$minVal} AND {$maxVal}';
    }
}
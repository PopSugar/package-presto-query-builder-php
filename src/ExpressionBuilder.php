<?php

namespace MoiTran\PrestoQueryBuilder;


class ExpressionBuilder extends Base
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
        $minVal = $this->removeSpecialChars($minVal);
        $maxVal = $this->removeSpecialChars($maxVal);

        return "BETWEEN {$minVal} AND {$maxVal}";
    }

    /**
     * @param string $column
     * @param array  $filter
     *
     * @return string
     */
    public function arrays_overlap(string $column, array $filter)
    {

        $quotedFilter = sprintf("'%s'", implode("','", $filter));
        $quotedFilter = $this->removeSpecialChars($quotedFilter);

        return sprintf('array_overlap(%s, ARRAY [%s])', $column, $quotedFilter);
    }

    /**
     * @param string $column
     * @param string $filter
     *
     * @return string
     */
    public function contains(string $column, string $filter)
    {
        $filter = $this->removeSpecialChars($filter);
        return sprintf('contains(%s, %s)', $column, $filter);
    }

    /**
     * @param string $column
     *
     * @return string
     */
    public function flatten(string $column)
    {
        return sprintf('flatten(%s)', $column);
    }

    /**
     * @param string $column
     *
     * @return string
     */
    public function array_agg(string $column)
    {
        return sprintf('array_agg(%s)', $column);
    }

    /**
     * @param string $column
     *
     * @return string
     */
    public function array_distinct(string $column)
    {
        return sprintf('array_distinct(%s)', $column);
    }
}

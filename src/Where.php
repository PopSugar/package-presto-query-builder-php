<?php

namespace MoiTran\PrestoQueryBuilder;

use MoiTran\PrestoQueryBuilder\Exception\InvalidArgumentException;

/**
 * Trait Where
 * @package MoiTran\PrestoQueryBuilder
 */
trait Where
{
    /**
     * @param $column
     * @param $condition
     * @param $value
     * @param bool $isFirstWhere
     *
     * @return string
     * @throws InvalidArgumentException
     */
    public function getWhereAndStr($column, $condition = NULL, $value = NULL, $isFirstWhere = false)
    {
        $whereType = $isFirstWhere ? 'WHERE' : 'AND';

        return $this->where($column, $condition, $value, $whereType);
    }

    /**
     * @param $column
     * @param $condition
     * @param $value
     * @param bool $isFirstWhere
     *
     * @return string
     * @throws InvalidArgumentException
     */
    public function getWhereOrStr($column, $condition = NULL, $value = NULL, $isFirstWhere = false)
    {
        $whereType = $isFirstWhere ? 'WHERE' : 'OR';

        return $this->where($column, $condition, $value, $whereType);
    }

    /**
     * @param $column
     * @param $condition
     * @param $value
     * @param $whereType
     *
     * @return string
     * @throws InvalidArgumentException
     */
    private function where($column, $condition, $value, $whereType)
    {
        if (!is_string($column)) {
            throw new InvalidArgumentException('$column argument must be a string');
        }

        if (!$condition) {
            $whereStr = sprintf(" %s %s", $whereType, $column);

        } else {
            if (!is_string($condition)) {
                throw new InvalidArgumentException('$condition argument must be a string');
            }

            if (!(is_string($value) || is_array($value) || is_null($value) || is_numeric($value) || is_bool($value))) {
                throw new InvalidArgumentException('$value argument must be a string, a numeric, a boolean, or an array');
            }

            if (is_null($value)) {
                $valueStr = 'NULL';
            } elseif (is_int($value) || is_float($value) || is_bool($value)) {
                $valueStr = $value;
            } else {
                $valueStr = is_string($value) ? sprintf("'%s'", $value) : sprintf("('%s')", implode("','", $value));
            }
            $whereStr = sprintf(" %s %s %s %s", $whereType, $column, $condition, $valueStr);
        }

        return $whereStr;
    }
}

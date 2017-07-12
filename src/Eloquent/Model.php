<?php

namespace RonnieVisser\Database\Eloquent;

use Illuminate\Database\Eloquent\Model as BaseModel;
use RonnieVisser\Database\Query\Builder;

abstract class Model extends BaseModel
{
    /**
     * {@inheritdoc}
     *
     * @return Builder
     */
    protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();

        $grammar = $conn->getQueryGrammar();

        return new Builder($conn, $grammar, $conn->getPostProcessor());
    }
}

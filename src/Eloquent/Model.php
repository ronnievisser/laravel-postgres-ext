<?php

namespace RonnieVisser\Postgres\Eloquent;

use Illuminate\Database\Eloquent\Model as BaseModel;
use RonnieVisser\Postgres\Query\Builder;

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

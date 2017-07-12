<?php

namespace RonnieVisser\Postgres;

use Illuminate\Database\PostgresConnection as BasePostgresConnection;
use RonnieVisser\Postgres\Schema\PostgresBuilder;
use RonnieVisser\Postgres\Query\Grammars\PostgresGrammar as QueryGrammar;
use RonnieVisser\Postgres\Schema\Grammars\PostgresGrammar as SchemaGrammar;

class PostgresConnection extends BasePostgresConnection
{
    /**
     * {@inheritdoc}
     *
     * @return PostgresBuilder
     */
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }

        return new PostgresBuilder($this);
    }

    /**
     * {@inheritdoc}
     *
     * @return QueryGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new QueryGrammar);
    }

    /**
     * {@inheritdoc}
     *
     * @return SchemaGrammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new SchemaGrammar);
    }
}

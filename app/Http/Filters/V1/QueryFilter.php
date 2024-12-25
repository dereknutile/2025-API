<?php

namespace App\Http\Filters\V1;

use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected $builder;
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    protected function filter($arr) {
        foreach($arr as $key => $val){
            if(method_exists($this,$key)){
                $this->$key($val);
            }
        }
        return $this->builder;
    }

    public function apply(Builder $builder) {
        $this->builder = $builder;

        foreach($this->request->all() as $key => $val){
            if(method_exists($this,$key)){
                $this->$key($val);
            }
        }
        return $builder;
    }
}
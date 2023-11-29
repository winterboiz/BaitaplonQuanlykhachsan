<?php
namespace App\Khanhvuht\Facades;
use App\Khanhvuht\ToolFactory;
use Illuminate\Support\Facades\Facade;

class Tool extends Facade {
    protected static function getFacadeAccessor() {
        return ToolFactory::class;
    }
}
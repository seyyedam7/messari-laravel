<?php
namespace Seyyedam7\Messari;

use Illuminate\Support\Facades\Facade;

/**
 * Class MessariFacade
 * @method static \Seyyedam7\Messari\Api get(string $method, array $params = [])
 * @method static \Seyyedam7\Messari\Api getAllMarkets(array $params = [])
 * @method static \Seyyedam7\Messari\Api getAllAssets(array $params = [])
 * @method static \Seyyedam7\Messari\Api getProfileBySymbol(string $symbol, array $params = [])
 * @method static \Seyyedam7\Messari\Api getMetricsBySymbol(string $symbol, array $params = [])
 * @method static \Seyyedam7\Messari\Api getNews(array $params = [])
 * @method static \Seyyedam7\Messari\Api getNewsBySymbol(string $symbol, array $params = [])
 * @package Seyyedam7\Messari
 */
class MessariFacade extends Facade
{
    /**
     * Get the registered name of the component
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Seyyedam7\Messari\Api';
    }
}

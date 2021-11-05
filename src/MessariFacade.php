<?php
namespace Seyyedam7\Messari;

use Illuminate\Support\Facades\Facade;

/**
 * Class MessariFacade
 * @method static \Seyyedam7\Messari\Messari get(string $method, array $params = [])
 * @method static \Seyyedam7\Messari\Messari getAllMarkets(array $params = [])
 * @method static \Seyyedam7\Messari\Messari getAllAssets(array $params = [])
 * @method static \Seyyedam7\Messari\Messari getProfileBySymbol(string $symbol, array $params = [])
 * @method static \Seyyedam7\Messari\Messari getMetricsBySymbol(string $symbol, array $params = [])
 * @method static \Seyyedam7\Messari\Messari getNews(array $params = [])
 * @method static \Seyyedam7\Messari\Messari getNewsBySymbol(string $symbol, array $params = [])
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
        return 'Seyyedam7\Messari\Messari';
    }
}

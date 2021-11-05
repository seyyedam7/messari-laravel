<?php

namespace Seyyedam7\Messari;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;

class Messari {

    /**
     * @param string $url
     * @param array $params
     * @param string $type
     * @param string $version
     * @return array|boolean
     * @throws GuzzleException
     */
    protected static function _call($url, $params = [] , $version = '1', $type = 'GET')
    {
        $base_url = config('messari.base_url' , 'https://data.messari.io/api');
        $url = $base_url . '/v' . $version . $url;
        $url .= empty($params) ? '' : '?'.http_build_query($params);
        try {
            $http_client = new Client(['headers' => [
                'x-messari-api-key' => config('messari.api_key' , env('MESSARI_API_KEY')),
            ]]);

            $request = $http_client->request($type, $url);

            return json_decode($request->getBody()->getContents() , true);
        } catch(ClientException $e) {
            return json_decode($e->getResponse()->getBody(), true);
        } catch(ConnectException $e){
            return ['error_code' => $e->getCode(), 'error_message' => $e->getMessage()];
        }
    }

    /**
     * @param string $url API path
     *
     * @param array $params Get params
     * @param string $type
     * @param string $version
     * @return array|boolean
     * @throws GuzzleException
     */
    public static function get($url, $params = [] , $type = 'GET' , $version = '1')
    {
        return self::_call($url, $params , $version , $type);
    }

    /**
     * Get the list of all exchanges and pairs that Messari WebSocket-based market real-time market data API supports.
     *
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getAllMarkets($params = [])
    {
        return self::_call("/markets", $params , config('messari.end_points_versions.all_markets' , 1));
    }

    /**
     * Get the paginated list of all assets and their metrics and profiles.
     * use query parameters to filter list to those with metrics (quantitative) and profiles (qualitative)
     *
     * @param array $params Get params
     * ________________________
     * param name: with-metrics
     * required: false
     * description: existence of this query param filters assets to those with quantitative data
     * ________________________
     * param name: with-profiles
     * required: false
     * description: existence of this query param filters assets to those with qualitative data
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getAllAssets($params = [])
    {
        return self::_call("/assets", $params, config('messari.end_points_versions.all_assets' , 2));
    }

    /**
     * Get basic metadata for an asset.
     *
     * @param string $symbol
     *
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getAssetBySymbol($symbol , $params = [])
    {
        return self::_call("/assets/{$symbol}", $params, config('messari.end_points_versions.asset_by_symbol' , 1));
    }

    /**
     * Get fundamental information by asset symbol.
     *
     * @param string $symbol
     *
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getProfileBySymbol($symbol, $params = [])
    {
        return self::_call("/assets/{$symbol}/profile", $params, config('messari.end_points_versions.profile_by_symbol' , 2));
    }

    /**
     * Get quantitative metrics by asset symbol.
     *
     * @param string $symbol
     *
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getMetricsBySymbol($symbol, $params = [])
    {
        return self::_call("/assets/{$symbol}/metrics", $params, config('messari.end_points_versions.metrics_by_symbol' , 1));
    }

    /**
     * Get the latest market data for an asset. This data is also included in the metrics endpoint, but if all you need is market-data, use this.
     *
     * @param string $symbol
     *
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getMarketDataBySymbol($symbol, $params = [])
    {
        return self::_call("/assets/{$symbol}/metrics/market-data", $params, config('messari.end_points_versions.market_data_by_symbol' , 1));
    }

    /**
     * Lists all of the available timeseries metric IDs for assets.
     *
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getMarketTimeSeries($params = [])
    {
        return self::_call("/assets/metrics", $params, config('messari.end_points_versions.market_timeseries' , 1));
    }

    /**
     * Lists all of the available timeseries metric IDs for assets.
     *
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getTimeSeriesMetricIds($params = [])
    {
        return self::_call("/assets/metrics", $params, config('messari.end_points_versions.timeseries_metric_ids' , 1));
    }

    /**
     * Retrieve historical timeseries data for an asset.
     *
     * @param string $symbol
     * @param string $metric
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getAssetTimeSeries($symbol , $metric , $params = [])
    {
        return self::_call("/assets/{$symbol}/metrics/{$metric}/time-series", $params, config('messari.end_points_versions.asset_timeseries' , 1));
    }

    /**
     * Get the latest 50 curated articles of news and analysis for all assets.
     *
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getNews($params = [])
    {
        return self::_call("/news", $params, config('messari.end_points_versions.get_news' , 1));
    }

    /**
     * Get the latest 50 curated articles of news and analysis by asset symbol.
     *
     * @param string $symbol
     *
     * @param array $params Get params
     *
     * @return array|bool
     * @throws GuzzleException
     */
    public static function getNewsBySymbol($symbol, $params = [])
    {
        return self::_call("/news/{$symbol}", $params, config('messari.end_points_versions.get_news_by_symbol' , 1));
    }
}

<?php

return [

    /*
    |-------------------------------------------------------------------------------------------
    | Base URL - Messari have different endpoint.
    |-------------------------------------------------------------------------------------------
    |
    */
    'base_url' => env('Messari_URL', 'https://data.messari.io/api'),

    /*
    |-------------------------------------------------------------------------------------------
    | API Key - Messari have API key of account.
    |-------------------------------------------------------------------------------------------
    |
   */
    'api_key' => env('Messari_API_KEY'),

    /*
    |-------------------------------------------------------------------------------------------
    | End points versions - Messari have different endpoint versions.
    |-------------------------------------------------------------------------------------------
    |
    */
    'end_points_versions' => [
        'all_assets' => 2,
        'profile_by_symbol' => 2,
        'asset_by_symbol' => 1,
        'all_markets' => 1,
        'market_timeseries' => 1,
        'metrics_by_symbol' => 1,
        'market_data_by_symbol' => 1,
        'timeseries_metric_ids' => 1,
        'asset_timeseries' => 1,
        'get_news' => 1,
        'get_news_by_symbol' => 1,
    ],

];

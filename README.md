# DMarket API

Installation
------------

### With composer

Run this text in console to install this package:

```
composer require allyans3/dmarket-api
```

This package currently offers 4 API calls you can make to DMarket.


Creating new object
-------------------

```
$api = new DMarketApi();
```

Games ID's
----------

| Game            | Game ID |
| --------------- | ------- |
| CS:GO           | csgo    |
| DotA2           | dota2   |
| Team Fortress 2 | tf2     |
| Life Beyond     | lb      |
| DMarket         | dmarket |
| Misc            | misc    |

Usage
-----

### Market Items

```
$options = [
    'orderBy'     => 'best_deals', // ['price', 'best_deals', 'best_discount', 'updated']
    'orderDir'    => 'desc',       // ['asc', 'desc']
    'title'       => '',           // Field for search skins: 'AK-47 | The Empress'
    'priceFrom'   => 0,            // 0 if from -Inf to +Inf
    'priceTo'     => 0,            // 0 if from -Inf to +Inf
    'treeFilters' => '',
    'types'       => 'dmarket',    // ['dmarket', 'p2p']
    'cursor'      => '',
    'limit'       => 100,
    'currency'    => 'USD',
    'platform'    => 'browser',
    'isLoggedIn'  => true
];

$response = $api->getMarketItems('csgo', $options);
```

This will return a list of 100 items, you'll need to change the `offset` option to cycle through the complete list of item.

```
[
    "objects" => [
        0 => [
            "itemId" => "db4a6142-171f-50c9-8b3b-00c879af4dc4"
            "type" => "offer"
            "amount" => 1
            "classId" => "188530139:3868720722"
            "gameId" => "a8db"
            "gameType" => "steam"
            "inMarket" => true
            "lockStatus" => false
            "title" => "★ Sport Gloves | Amphibious (Minimal Wear)"
            "description" => "
                Exterior: Minimal Wear
                Synthetic fabrics make these athletic gloves durable and eye-catching. These synthetic blue and white gloves are quick drying and breathable. 
                "
            "image" => "https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DAQ1JmMR1osbaqPQJz7ODYfi9W9eOmm4mYmPnLNanekVRT5NB0tf7J_Jjwt1i9rBsofTqgIIKde1VsMAvV8we2w7q715e075SYynFi6ykqtymJmxWxgx8ZO-dxxavJKCSM1pg"
            "slug" => "sport-gloves-amphibious"
            "owner" => "fb3e7ee5-2b9d-4f9d-b6c1-8cde72912b69"
            "ownersBlockchainId" => "b5ba2c76ffdd3b882c97cd02ad04b8533e33bf1ddb34a8fa235d71b6c65abbfc"
            "ownerDetails" => [
                "id" => "fb3e7ee5-2b9d-4f9d-b6c1-8cde72912b69"
                "avatar" => "https://s3.amazonaws.com/dmarket-images-stage/3a043a13-6f4d-4d15-8257-be01a4bf4138.jpg"
                "wallet" => "b5ba2c76ffdd3b882c97cd02ad04b8533e33bf1ddb34a8fa235d71b6c65abbfc"
            ]
            "status" => "active"
            "discount" => 31
            "price" => [
                "DMC" => ""
                "USD" => "102051"
            ]
            "instantPrice" => [
                "DMC" => ""
                "USD" => ""
            ]
            "instantTargetId" => ""
            "suggestedPrice" => [
                "DMC" => ""
                "USD" => "149598"
            ]
            "recommendedPrice" => [
                "d3" => [
                    "DMC" => ""
                    "USD" => ""
                ]
                "d7" => [
                    "DMC" => ""
                    "USD" => ""
                ]
                "d7Plus" => [
                    "DMC" => ""
                    "USD" => ""
                ]
            ]
            "extra" => [
                "nameColor" => "8650ac"
                "backgroundColor" => "eb4b4b"
                "tradable" => true
                "offerId" => "9b77b0f2-0bc3-4674-9b97-003ae16c8403"
                "isNew" => true
                "gameId" => "a8db"
                "name" => "Sport Gloves | Amphibious"
                "categoryPath" => "misc/gloves"
                "viewAtSteam" => "https://steamcommunity.com/profiles/76561198329666062/inventory/#730_2_18978363707"
                "groupId" => "76561198329666062"
                "withdrawable" => true
                "linkId" => "b49484dd-a828-5345-95af-9ac834a0bf8d"
                "exterior" => "minimal wear"
                "quality" => "extraordinary"
                "category" => "★"
                "tradeLockDuration" => 0
                "itemType" => "gloves"
                "floatValue" => 0.14799861609936
                "inspectInGame" => "steam://rungame/730/76561202255233023/+csgo_econ_action_preview%20S76561198329666062A18978363707D17008270849101668858"
            ]
            "createdAt" => 1598971204
        },
        ...
    ]
]
```

### Last Sales

```
$options = [
    'title'    => 'AK-47 | The Empress (Field-Tested)',
    'currency' => 'USD'
];

$response = $api->getLastSales('csgo', $options);
```

You'll receive `LastSales` array of item last sales.

```
[
    "LastSales" => [
        0 => [
            "Date" => "1598974080"
            "Price" => [
                "Currency" => "USD"
                "Amount" => "2406"
            ]
        ],
        ...
    ]
]
```

### Sales History

```
$options = [
    'title'    => 'AK-47 | The Empress (Field-Tested)',
    'currency' => 'USD',
    'period'   => '7D'  // ['7D', '1M', '6M', '1Y']
];

$response = $api->getSalesHistory('csgo', $options);
```

You'll receive `Currency` field and `SalesHistory` array.

```
[
    "Currency" => "USD"
    "SalesHistory" => [
        "Prices" => [
            0 => "2576"
            1 => "2504"
            2 => "2573"
            3 => "2513"
            4 => "2507"
            5 => "2747"
            6 => "2523"
        ]
        "Items" => [
            0 => 5
            1 => 6
            2 => 7
            3 => 3
            4 => 9
            5 => 6
            6 => 8
        ]
        "Labels" => [
            0 => "1598400000"
            1 => "1598486400"
            2 => "1598572800"
            3 => "1598659200"
            4 => "1598745600"
            5 => "1598832000"
            6 => "1598918400"
        ]
    ]
]
```

### Games List

```
$response = $api->getGamesList();
```

You'll receive `total` field and `SalesHistory` array.


```
[
    "objects" => [
        0 => [
            "id" => "a8db"
            "slug" => "csgo-skins"
            "title" => "CS:GO"
            "type" => "steam"
            "logoImageUrl" => "https://s3.amazonaws.com/dmarket-images-stage/5938a31c-0be7-43ee-98ef-8698e47be5b8.jpg"
            "homeImageURL" => "https://s3.amazonaws.com/dmarket-images-stage/4f61189d-5c4b-4a5a-a5ba-37235a49a6d8.jpg"
            "images" => [
                "home" => "https://s3.amazonaws.com/dmarket-images-stage/4f61189d-5c4b-4a5a-a5ba-37235a49a6d8.jpg"
                "logo" => "https://s3.amazonaws.com/dmarket-images-stage/5938a31c-0be7-43ee-98ef-8698e47be5b8.jpg"
            ]
            "offersCount" => 0
            "isReleased" => true
            "authMethods" => []
            "authMethod" => ""
        ],
        ...
    ]
    "total" => 6
]
```

Proxy
-----
In release `v1.0` added a second optional `$proxy` parameter where you can pass cURL parameters as in the example:

```
$proxy = [
    CURLOPT_PROXY => '81.201.60.130:80',
    CURLOPT_PROXYTYPE => CURLPROXY_HTTP,
    CURLOPT_TIMEOUT => 9,
    CURLOPT_CONNECTTIMEOUT => 6,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36',
    ...
];

$response = $api->getMarketItems('csgo', $options, $proxy);
```
---
title: API Reference

language_tabs:
- bash
- javascript
- php
- python

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://api.xiaoyuan.com:8000/docs/collection.json)

<!-- END_INFO -->

#admins


<!-- START_bd02c278c12781fc073260f7086d7735 -->
## admin user login

> Example request:

```bash
curl -X POST \
    "http://api.xiaoyuan.com:8000/api/admins/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"fugit","password":"nostrum"}'

```

```javascript
const url = new URL(
    "http://api.xiaoyuan.com:8000/api/admins/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "fugit",
    "password": "nostrum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.xiaoyuan.com:8000/api/admins/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'fugit',
            'password' => 'nostrum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.xiaoyuan.com:8000/api/admins/login'
payload = {
    "name": "fugit",
    "password": "nostrum"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`POST /api/admins/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 用户名
        `password` | string |  required  | 密码
    
<!-- END_bd02c278c12781fc073260f7086d7735 -->

<!-- START_325c2a9b58dfb8e0b16b8e34aac5bb61 -->
## admin user regist

> Example request:

```bash
curl -X POST \
    "http://api.xiaoyuan.com:8000/api/admins/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"molestiae","password":"quia","passwrod_confirmation":"reiciendis"}'

```

```javascript
const url = new URL(
    "http://api.xiaoyuan.com:8000/api/admins/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "molestiae",
    "password": "quia",
    "passwrod_confirmation": "reiciendis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.xiaoyuan.com:8000/api/admins/add',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'molestiae',
            'password' => 'quia',
            'passwrod_confirmation' => 'reiciendis',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.xiaoyuan.com:8000/api/admins/add'
payload = {
    "name": "molestiae",
    "password": "quia",
    "passwrod_confirmation": "reiciendis"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`POST /api/admins/add`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 用户名
        `password` | string |  required  | 密码
        `passwrod_confirmation` | string |  required  | 确认密码
    
<!-- END_325c2a9b58dfb8e0b16b8e34aac5bb61 -->

<!-- START_5ff0fce2672dab8fdc2af433602d2de1 -->
## admin user logout

> Example request:

```bash
curl -X POST \
    "http://api.xiaoyuan.com:8000/api/admins/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.xiaoyuan.com:8000/api/admins/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.xiaoyuan.com:8000/api/admins/logout',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.xiaoyuan.com:8000/api/admins/logout'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST /api/admins/logout`


<!-- END_5ff0fce2672dab8fdc2af433602d2de1 -->

#users


<!-- START_3675d11a1f098bdce761872198e00cda -->
## user regist

> Example request:

```bash
curl -X POST \
    "http://api.xiaoyuan.com:8000/api/users/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"tempora","password":"voluptatem","passwrod_confirmation":"odio"}'

```

```javascript
const url = new URL(
    "http://api.xiaoyuan.com:8000/api/users/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "tempora",
    "password": "voluptatem",
    "passwrod_confirmation": "odio"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.xiaoyuan.com:8000/api/users/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'tempora',
            'password' => 'voluptatem',
            'passwrod_confirmation' => 'odio',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.xiaoyuan.com:8000/api/users/register'
payload = {
    "name": "tempora",
    "password": "voluptatem",
    "passwrod_confirmation": "odio"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`POST /api/users/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 用户名
        `password` | string |  required  | 密码
        `passwrod_confirmation` | string |  required  | 确认密码
    
<!-- END_3675d11a1f098bdce761872198e00cda -->

<!-- START_40f78369793b63e1e4be97209ef405c3 -->
## user login

> Example request:

```bash
curl -X POST \
    "http://api.xiaoyuan.com:8000/api/users/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"voluptatem","password":"quisquam"}'

```

```javascript
const url = new URL(
    "http://api.xiaoyuan.com:8000/api/users/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "voluptatem",
    "password": "quisquam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.xiaoyuan.com:8000/api/users/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'voluptatem',
            'password' => 'quisquam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.xiaoyuan.com:8000/api/users/login'
payload = {
    "name": "voluptatem",
    "password": "quisquam"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers, json=payload)
response.json()
```


> Example response (200):

```json
{
    "status": "success",
    "code": 200,
    "data": {
        "access_token": "vHuXHhe5sI",
        "token_type": "Bearer",
        "expires_in": 3600
    }
}
```

### HTTP Request
`POST /api/users/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 用户名
        `password` | string |  required  | 密码
    
<!-- END_40f78369793b63e1e4be97209ef405c3 -->

<!-- START_511eeadfce956cbeea74ce3763392dcd -->
## user list

> Example request:

```bash
curl -X GET \
    -G "http://api.xiaoyuan.com:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.xiaoyuan.com:8000/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.xiaoyuan.com:8000/api/users',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.xiaoyuan.com:8000/api/users'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
    "status": "success",
    "code": 200,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 6,
                "name": "dmlzjddd",
                "created_at": "2020-03-19 20:43:21",
                "updated_at": "2020-03-19 20:43:21"
            },
            {
                "id": 5,
                "name": "dmlzj44",
                "created_at": "2020-03-17 11:59:04",
                "updated_at": "2020-03-17 11:59:04"
            },
            {
                "id": 4,
                "name": "dmlzj444ttt",
                "created_at": "2020-03-17 11:58:02",
                "updated_at": "2020-03-17 11:58:02"
            },
            {
                "id": 3,
                "name": "dmlzj444",
                "created_at": "2020-03-16 13:49:30",
                "updated_at": "2020-03-16 13:49:30"
            },
            {
                "id": 2,
                "name": "test",
                "created_at": "2020-03-06 13:27:34",
                "updated_at": "2020-03-06 13:27:34"
            },
            {
                "id": 1,
                "name": "dmlzj",
                "created_at": "2020-03-06 13:26:47",
                "updated_at": "2020-03-17 20:52:44"
            }
        ],
        "first_page_url": "http:\/\/api.xiaoyuan.com\/api\/users?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/api.xiaoyuan.com\/api\/users?page=1",
        "next_page_url": null,
        "path": "http:\/\/api.xiaoyuan.com\/api\/users",
        "per_page": 15,
        "prev_page_url": null,
        "to": 6,
        "total": 6
    }
}
```

### HTTP Request
`GET /api/users`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `columns` |  optional  | string required 请求字段
    `order_by` |  optional  | string 排序条件
    `limit` |  optional  | int 限制条数
    `page` |  optional  | int 当前页数
    `include` |  optional  | string 关联表

<!-- END_511eeadfce956cbeea74ce3763392dcd -->

<!-- START_b1f8ce5c516b48f856fb396b04dfd494 -->
## user info

> Example request:

```bash
curl -X GET \
    -G "http://api.xiaoyuan.com:8000/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.xiaoyuan.com:8000/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.xiaoyuan.com:8000/api/users/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.xiaoyuan.com:8000/api/users/1'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (401):

```json
{
    "message": "Token not provided",
    "status_code": 401,
    "debug": {
        "line": 52,
        "file": "\/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/tymon\/jwt-auth\/src\/Http\/Middleware\/BaseMiddleware.php",
        "class": "Symfony\\Component\\HttpKernel\\Exception\\UnauthorizedHttpException",
        "trace": [
            "#0 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/app\/Http\/Middleware\/RefreshTokenMiddleware.php(26): Tymon\\JWTAuth\\Http\\Middleware\\BaseMiddleware->checkForToken()",
            "#1 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\RefreshTokenMiddleware->handle()",
            "#2 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/app\/Http\/Middleware\/UserGuardMiddleware.php(19): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#3 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): App\\Http\\Middleware\\UserGuardMiddleware->handle()",
            "#4 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/dingo\/api\/src\/Http\/Middleware\/PrepareController.php(45): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#5 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Dingo\\Api\\Http\\Middleware\\PrepareController->handle()",
            "#6 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#7 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(683): Illuminate\\Pipeline\\Pipeline->then()",
            "#8 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(658): Illuminate\\Routing\\Router->runRouteWithinStack()",
            "#9 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(624): Illuminate\\Routing\\Router->runRoute()",
            "#10 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(613): Illuminate\\Routing\\Router->dispatchToRoute()",
            "#11 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/dingo\/api\/src\/Routing\/Adapter\/Laravel.php(88): Illuminate\\Routing\\Router->dispatch()",
            "#12 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/dingo\/api\/src\/Routing\/Router.php(518): Dingo\\Api\\Routing\\Adapter\\Laravel->dispatch()",
            "#13 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/dingo\/api\/src\/Http\/Middleware\/Request.php(126): Dingo\\Api\\Routing\\Router->dispatch()",
            "#14 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(130): Dingo\\Api\\Http\\Middleware\\Request->Dingo\\Api\\Http\\Middleware\\{closure}()",
            "#15 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#16 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle()",
            "#17 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#18 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle()",
            "#19 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#20 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle()",
            "#21 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php(63): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#22 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode->handle()",
            "#23 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/fideloper\/proxy\/src\/TrustProxies.php(57): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#24 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Fideloper\\Proxy\\TrustProxies->handle()",
            "#25 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#26 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/dingo\/api\/src\/Http\/Middleware\/Request.php(127): Illuminate\\Pipeline\\Pipeline->then()",
            "#27 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/dingo\/api\/src\/Http\/Middleware\/Request.php(103): Dingo\\Api\\Http\\Middleware\\Request->sendRequestThroughRouter()",
            "#28 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(171): Dingo\\Api\\Http\\Middleware\\Request->handle()",
            "#29 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(105): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()",
            "#30 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(145): Illuminate\\Pipeline\\Pipeline->then()",
            "#31 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(110): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter()",
            "#32 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(307): Illuminate\\Foundation\\Http\\Kernel->handle()",
            "#33 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(289): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->callLaravelRoute()",
            "#34 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Strategies\/Responses\/ResponseCalls.php(47): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->makeApiCall()",
            "#35 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(172): Mpociot\\ApiDoc\\Extracting\\Strategies\\Responses\\ResponseCalls->__invoke()",
            "#36 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(121): Mpociot\\ApiDoc\\Extracting\\Generator->iterateThroughStrategies()",
            "#37 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Extracting\/Generator.php(84): Mpociot\\ApiDoc\\Extracting\\Generator->fetchResponses()",
            "#38 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(125): Mpociot\\ApiDoc\\Extracting\\Generator->processRoute()",
            "#39 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(69): Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->processRoutes()",
            "#40 [internal function]: Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->handle()",
            "#41 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array()",
            "#42 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Util.php(36): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()",
            "#43 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\Container\\Util::unwrapIfClosure()",
            "#44 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\Container\\BoundMethod::callBoundMethod()",
            "#45 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(590): Illuminate\\Container\\BoundMethod::call()",
            "#46 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(134): Illuminate\\Container\\Container->call()",
            "#47 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\Console\\Command->execute()",
            "#48 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(121): Symfony\\Component\\Console\\Command\\Command->run()",
            "#49 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/symfony\/console\/Application.php(1001): Illuminate\\Console\\Command->run()",
            "#50 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/symfony\/console\/Application.php(271): Symfony\\Component\\Console\\Application->doRunCommand()",
            "#51 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/symfony\/console\/Application.php(147): Symfony\\Component\\Console\\Application->doRun()",
            "#52 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(93): Symfony\\Component\\Console\\Application->run()",
            "#53 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(131): Illuminate\\Console\\Application->run()",
            "#54 \/home\/dmlzj\/www\/php\/xiaoyuan-api\/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle()",
            "#55 {main}"
        ]
    }
}
```

### HTTP Request
`GET /api/users/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | 用户id

<!-- END_b1f8ce5c516b48f856fb396b04dfd494 -->

<!-- START_09482c8a4f504960d8e8334afd7777c1 -->
## user logout

> Example request:

```bash
curl -X POST \
    "http://api.xiaoyuan.com:8000/api/users/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.xiaoyuan.com:8000/api/users/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.xiaoyuan.com:8000/api/users/logout',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.xiaoyuan.com:8000/api/users/logout'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('POST', url, headers=headers)
response.json()
```



### HTTP Request
`POST /api/users/logout`


<!-- END_09482c8a4f504960d8e8334afd7777c1 -->

<!-- START_a1145ee4137eee200fc33e5fafdeb415 -->
## user update

> Example request:

```bash
curl -X PATCH \
    "http://api.xiaoyuan.com:8000/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"rerum"}'

```

```javascript
const url = new URL(
    "http://api.xiaoyuan.com:8000/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "rerum"
}

fetch(url, {
    method: "PATCH",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->patch(
    'http://api.xiaoyuan.com:8000/api/users/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'name' => 'rerum',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://api.xiaoyuan.com:8000/api/users/1'
payload = {
    "name": "rerum"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}
response = requests.request('PATCH', url, headers=headers, json=payload)
response.json()
```



### HTTP Request
`PATCH /api/users/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 用户名
    
<!-- END_a1145ee4137eee200fc33e5fafdeb415 -->



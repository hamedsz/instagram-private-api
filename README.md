
# instagram-private-api
a library for instagram private web api

![logo](https://cloud.githubusercontent.com/assets/1809268/15931032/2792427e-2e56-11e6-831e-ffab238cc4a2.png)

# Install

From composer

```
composer require hamedsz/instagram-private-api
```
or clone , download it.

# Login to Instagram
```
use hamedsz\instagram_private_api\Instagram;

require_once 'vendor/autoload.php';

$instagram = Instagram::create("USERNAME" , "PASSWORD")
	->login();
```

# Examples

Follow by id
```
use hamedsz\instagram_private_api\Instagram;
use hamedsz\instagram_private_api\Requests\FriendShips\Follow;

require_once 'vendor/autoload.php';

$instagram = Instagram::create("USERNAME" , "PASSWORD")
	->login();
	
$follow = new Follow($instagram , USER_ID);
$followResponse = $follow->execute();

```

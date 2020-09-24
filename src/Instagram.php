<?php

namespace hamedsz\instagram_private_api;

use hamedsz\instagram_private_api\Consts\Data;
use hamedsz\instagram_private_api\Requests\Accont\Login;
use hamedsz\instagram_private_api\Requests\data\SharedData;
use hamedsz\instagram_private_api\Requests\Main\Main;
use hamedsz\instagram_private_api\Requests\Main\Main2;
use hamedsz\instagram_private_api\Requests\Request;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class Instagram
{
    private $_username;
    private $_password;
    private $_cookies;
    private $_csrf;

    public function __construct()
    {
        $this->_cookies = new \Requests_Cookie_Jar();
        $this->setCsrf();
    }

    public static function create($user, $pass)
    {
        $insta = new self();
        $insta->_username = $user;
        $insta->_password = $pass;
        return $insta;
    }

    public function sendRequest($request)
    {
        $url = "https://instagram.com" . $request->url;

        $headers = $request->headers;
        $headers = $this->includeCookies($headers);

        if ($request->setHeader)
            $headers = $this->includeHeaders($request->headers);

        if ($request->method == "GET") {
            $resp = \Requests::get($url, $headers, $request->form);
        } elseif ($request->method == "POST") {
            $resp = \Requests::post($url, $headers, $request->form);
        }

        $this->update($resp);

        return $resp;
    }

    public function login($twoFactor = null)
    {
        $rec = new Login($this);

        $resp = $this->sendRequest($rec);

        try {
            return $resp->body;
        }
        catch (\JsonException $e)
        {
            throw new \Exception("instagram login response is not valid");
        }
    }

    private function update($resp)
    {
        $this->_cookies = $resp->cookies;

        if ($this->_cookies->offsetExists("csrftoken"))
        {
            $this->_csrf = $this->_cookies->offsetGet("csrftoken")->value;
        }
    }

    public function getDefaultHeaders()
    {
        return [
            "accept-encoding" => 'gzip, deflate, br',
            "accept-language" => 'en-US,en;q=0.9',
            "content-type" => 'application/x-www-form-urlencoded',
            "origin" => 'https://www.instagram.com',
            "referer" => 'https://www.instagram.com/',
            "sec-fetch-dest" => 'empty',
            "sec-fetch-mode" => 'cors',
            "sec-fetch-site" => 'same-origin',
            "user-agent" => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36',
            "x-csrftoken" => $this->_csrf,
            "x-ig-app-id" => "936619743392459",
            "x-ig-www-claim" => "0",
            "x-instagram-ajax" => "ccf009398be5",
            "x-requested-with" => "XMLHttpRequest",
        ];
    }

    public static function getCookieHeader(\Requests_Cookie_Jar $cookieJar)
    {
        $arr = [];
        foreach ($cookieJar->getIterator() as $key => $value) {
            array_push($arr, $value->format_for_header());
        }

        $str = implode(";", $arr);

        return $str;
    }

    private function includeHeaders($headers)
    {
        $headers = array_merge($this->getDefaultHeaders(), $headers);
        return $headers;
    }

    private function includeCookies($headers)
    {
        $headers = array_merge($headers, [
            "cookie" => $this->getCookieHeader($this->_cookies)
        ]);

        return $headers;
    }

    public function setCsrf()
    {
        $req = new Main($this);
        $this->sendRequest($req);

        if (is_null($this->_csrf))
        {
            $req = new Main2($this);
            $this->sendRequest($req);
        }
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @return mixed
     */
    public function getCookies()
    {
        return $this->_cookies;
    }

    /**
     * @return mixed
     */
    public function getCsrf()
    {
        return $this->_csrf;
    }

}

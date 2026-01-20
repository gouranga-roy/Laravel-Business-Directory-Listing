<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

if (! function_exists('getAppUrl')) {
    function getAppUrl()
    {
        $protocol    = (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
        $hostname    = $_SERVER['HTTP_HOST'] ?? '127.0.0.1';
        $script_name = $_SERVER['SCRIPT_NAME'] ?? '/index.php';

        $app_url = $protocol . '://' . $hostname . $script_name;

        return str_replace('/index.php', '', $app_url);
    }
}

if (! function_exists('getAssetUrl')) {
    function getAssetUrl()
    {
        $app_url = getAppUrl();
        return file_exists('public') ? $app_url . '/public' : $app_url;
    }
}

if (! function_exists('uuid')) {
    function uuid()
    {
        return Str::uuid();
    }
}

if (! function_exists('me')) {
    function me()
    {
        return Auth::user();
    }
}

if (! function_exists('display')) {
    function display($val)
    {
        return $val ?? translate('N/A');
    }
}

if (! function_exists('allowedFileSize')) {
    function allowedFileSize()
    {
        return 2048;
    }
}

if (! function_exists('allowedFileExt')) {
    function allowedFileExt()
    {
        return 'jpg,jpeg,png';
    }
}

if (! function_exists('getRoleId')) {
    function getRoleId($roleName)
    {
        $role = Role::where('title', $roleName)->first();

        if (! $role) {
            throw new Exception('Role not found: ' . $roleName);
        }

        return $role->id;
    }
}

if (! function_exists('getImage')) {
    function getImage($path = null)
    {
        if (empty($path) || ! is_string($path)) {
            return asset('assets/global/images/default.png');
        }

        if ($path == 'user') {
            return asset('assets/global/images/avatar.jpg');
        }

        if (file_exists(public_path("storage/{$path}"))) {
            return asset('storage/' . $path);
        }

        return asset('assets/global/images/default.png');
    }
}

if (! function_exists('uploadImage')) {
    function uploadImage($file, $folder = 'upload')
    {
        // Create folder if not exits
        if (! file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0777, true);
        }

        // Image Name
        $name = time() . rand(11111, 99999) . '.' . $file->getClientOriginalExtension();

        // Move Image
        $file->move(public_path($folder), $name);

        // Return path
        return $folder . '/' . $name;
    }
}

if (! function_exists('remove_file')) {
    function remove_file($url = null)
    {
        $url       = public_path('storage/' . $url);
        $url       = str_replace('optimized/', '', $url);
        $url_arr   = explode('/', $url);
        $file_name = $url_arr[count($url_arr) - 1];

        if (is_file($url) && file_exists($url) && ! empty($file_name)) {
            unlink($url);

            $url = str_replace($file_name, 'optimized/' . $file_name, $url);
            if (is_file($url) && file_exists($url)) {
                unlink($url);
            }
        }
    }
}

if (! function_exists('ellipsis')) {
    function ellipsis($long_string, $max_character = 30)
    {
        $long_string  = strip_tags($long_string);
        $short_string = strlen($long_string) > $max_character ? mb_substr($long_string, 0, $max_character) . "..." : $long_string;
        return $short_string;
    }
}

if (! function_exists('path')) {
    function path($data)
    {
        return route('modal', $data);
    }
}

if (! function_exists('translate')) {
    function translate($data)
    {
        return $data;
    }
}

if (! function_exists('slugify')) {
    function slugify($phrase)
    {
        return Str::slug($phrase ?? '');
    }
}

if (! function_exists('goBack')) {
    function goBack($status, $message, $route = null)
    {
        $redirect = $route ? redirect($route) : redirect()->back();
        return $redirect->with($status, $message);
    }
}

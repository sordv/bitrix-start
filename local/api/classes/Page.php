<?php


namespace Legacy\API;

use Bitrix\Main\Loader;
use Legacy\General\Constants;
//use Legacy\IblockController\Documentation;
use Legacy\IblockController\Pages;
use Legacy\IblockController\Services;
use Legacy\IblockController\TestPages;

class Page
{
    public static function get($arRequest)
    {
        $code = $arRequest['code'];
        if(!$code) {
            throw new \Exception('Не передан код страницы');
        }

        switch ($code) {
            case 'test':
            case 'landing':
            case 'main':
            case 'contacts':
            case 'about':
            case 'delivery':
            case 'privacy-policy':
                return Pages::getPage($arRequest);

            case 'services':
                return $arRequest['pageCode'] ? Services::getById($arRequest) : Pages::getPage($arRequest);

            case 'for-business':
            case 'for-clients':
            case 'documentation':
                return Pages::getCompositePage($arRequest);

            default:
                throw new \Exception('Страница не найдена.');
        }
    }
}

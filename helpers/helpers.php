<?php
/**
 *  Хелпер вывода
 */

namespace Helpers;


/**
 * Функция выводит в контейнере <pre> структурированную информацию о параметре $data
 * @param $data
 */
function printArray($data)
{
    echo "<pre style='  color: orange;  background-color: #000;'>";
    print_r($data);
    echo "</pre>";
}

/**
 * Функция возращает значение из массива $array с ключом $key вида "key1.key2.***.value"
 * @param array $array
 * @param $key
 * @param null $default
 * @return array|mixed|null
 */
function array_get(array $array, $key, $default = null )
{
    //  Текущий уровень
    $currentLevel =& $array;
    //  Разбиваем $key по точке на массив
    $levels = explode('.', $key);

    // Ищем в массиве $levels ключ, совпадающий с ключом в массиве $currentLevel
    foreach ($levels as $key) {
        // Если такой ключ есть и $currentLevel[$key] является массивом
        if (array_key_exists($key, $currentLevel) && is_array($currentLevel[$key])) {
            // $currentLevel становится ссылкой на $currentLevel[$key]
            $currentLevel =& $currentLevel[$key];
        } else {
            // Иначе, возвращает значение $currentLevel[$key] или значение по дефолту
            return ((empty($currentLevel[$key])) ? $default : $currentLevel[$key]);
        }
    }
    // возвращает значение $currentLevel или значение по дефолту
    return ((empty($currentLevel)) ? $default : $currentLevel);
}

/**
 * Метод возвращает массив из элементов строки REQUEST_URI
 * @return array
 */
function parseRequestUri()
{
    return explode("/", trim($_SERVER['REQUEST_URI'],'/'));
}

/**
 * Функция возвращает дату в формате d.m.Y h:i из параметра $date
 * @param $date
 * @return string
 */
function getDateTime($date) : string {
    return date('d.m.Y H:i', strtotime($date));
}

/**
 * Функция возвращает дату в формате Y.m.d  h:i:s из параметра $date
 * @param $date
 * @return string
 */
function getDateTimeForDb($date) : string {
    return date('Y.m.d  H:i:s', strtotime($date));
}

/**
 * Функция возвращает текущую дату
 * @param string $format
 * @return string
 */
function getCurrentDate($format = 'Y-m-d H:i:s'): string {
    return date($format);
}

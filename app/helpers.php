<?php

//передаем класс получаем строку типа 'user,id' , что бы валидировать и не бояться смены названия таблицы у модели
function existByModel($class,$fieldName=null): string
{
    $entity = new $class;

    if (is_null($fieldName)){
        $fieldName = $entity->getKeyName();
    }

    return $entity->getTable().','.$fieldName;
}

//передаем класс получаем строку c с названием таблицы
function uniqueByModel($class): string
{
    $entity = new $class;

    return $entity->getTable();
}

//поиск в объектах в определенном имени поля
function search_in_array_objects($needleString,$array,$unicField='name')
{
    try {
        foreach ($array as $item){
            if (strtolower($item[$unicField]) === strtolower($needleString)){
                return $item['id'];
            }
        }
    }catch (ErrorException $e){
        dd($needleString,$array,$unicField);
    }

};

function only_or_except($only,$except,$needle){
    return
        (empty($only) && empty($except))
        ||
        (!empty($only) && in_array($needle,$only))
        ||
        (!empty($except) && !in_array($needle,$except));
}

if (!function_exists('app_path')) {
    /**
     * Get the path to the application folder.
     *
     * @param  string $path
     * @return string
     */
    function app_path($path = '')
    {
        return app('path') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

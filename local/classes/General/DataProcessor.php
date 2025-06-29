<?php


namespace Legacy\General;

class DataProcessor
{
    public static function processIBProperties($query, $arrays, $needElementInfo = false)
    {
        $result = [];

        $arrayPropsCodes = $arrays['arrayPropsCodes'] ?? [];
        $arrayPropsWithDescriptionCodes = $arrays['arrayPropsWithDescriptionCodes'] ?? [];
        $filePropsCodes = $arrays['filePropsCodes'] ?? [];
        $filesPropsCodes = $arrays['filesPropsCodes'] ?? [];
        $enumPropsCodes = $arrays['enumPropsCodes'] ?? [];
        $sprintEditorPropsCodes = $arrays['sprintEditorPropsCodes'] ?? [];

        $db = $query->exec();

        while ($res = $db->fetch()) {
            $id = $res['ID'];
            if ($needElementInfo && !$result[$id]['INFO']) {
                $result[$id]['INFO'] = [
                    'ID' => $res['ID'],
                    'NAME' => $res['NAME'],
                    'CODE' => $res['CODE'],
                ];
            }
            if (in_array($res['PROPERTY_CODE'], $arrayPropsCodes)){
                $result[$id][$res['PROPERTY_CODE']][] = $res['PROPERTY_VALUE'];
            }
            elseif (in_array($res['PROPERTY_CODE'], $arrayPropsWithDescriptionCodes)){
                $result[$id][$res['PROPERTY_CODE']][] = [
                    'value' => $res['PROPERTY_VALUE'],
                    'description'=> $res['PROPERTY_DESCRIPTION']
                ];
            }
            elseif (in_array($res['PROPERTY_CODE'], $filePropsCodes)) {
                $result[$id][$res['PROPERTY_CODE']] = getFilePath($res['PROPERTY_VALUE']);
            }
            elseif (in_array($res['PROPERTY_CODE'], $filesPropsCodes)) {
                $result[$id][$res['PROPERTY_CODE']][] = getFilePath($res['PROPERTY_VALUE']);
            }
            elseif (in_array($res['PROPERTY_CODE'], $enumPropsCodes)) {
                $result[$id][$res['PROPERTY_CODE']] = $res['ENUM_CODE'];
            }
            elseif (in_array($res['PROPERTY_CODE'], $sprintEditorPropsCodes)) {
                $result[$id][$res['PROPERTY_CODE']] = \Bitrix\Main\Web\Json::decode($res['PROPERTY_VALUE'])['blocks'];
            }
            else {
                $result[$id][$res['PROPERTY_CODE']] = $res['PROPERTY_VALUE'];
            }
        }

        return $result;
    }

    public static function sortResultByIDs($result, $ids, $is_object = false)
    {
        $newResult = [];

        if($is_object) {
            foreach ($ids as $id) {
                if ($result[$id]) {
                    $newResult[] = $result[$id];
                }
            }
        } else {
            foreach ($ids as $id) {
                $index = array_search($id, array_column($result, 'id'));

                if (is_numeric($index)) {
                    $newResult[] = $result[$index];
                }
            }
        }


        if(count($newResult) == 0) {
            $newResult = $result;
        }

        return $newResult;
    }
}

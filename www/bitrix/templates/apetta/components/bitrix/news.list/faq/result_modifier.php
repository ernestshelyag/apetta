<?php

$IBLOCK_ID = $arResult['ID'];
$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>$IBLOCK_ID, "CODE"=>"THEME"));
while($enum_fields = $property_enums->GetNext())
{
    $arResult['THEME'][$enum_fields['ID']] = $enum_fields;
}
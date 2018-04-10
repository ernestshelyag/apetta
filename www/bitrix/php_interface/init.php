<?php

include_once('include/CAgbisProfiler.php');

$agbis = new CAgbisProfiler();
if($_REQUEST['logout'] == "Y") $agbis->Logout();

//сбор дерева разделов
function tree_section($_ibclock_section_id,$section_id,$section_depth_level){
    $parent_id = '';
    $nav = CIBlockSection::GetNavChain(false, $_ibclock_section_id);
    while($arItem = $nav->Fetch()){
        $arProp['ID'] = $arItem['ID'];
        $arProp['DEPTH_LEVEL'] = $arItem['DEPTH_LEVEL'];
        $arParents [] = $arProp;
    }
    if(!empty($section_id)){
        $section_this['ID'] = $section_id;
        $section_this['DEPTH_LEVEL'] = $section_depth_level;
        $arParents[] = $section_this;
    }
    return $arParents;
}


function webImage($template, $src, $cache = 'Y'){
    $arImg = $GLOBALS['APPLICATION']->IncludeComponent(
        'webdebug:image',
        '.default',
        Array(
            'PROFILE' => $template,
            'RETURN' => 'ARRAY',
            'IMAGE' => $src,
            'CACHE_IMAGE' => $cache,
            'DISPLAY_ERRORS' => 'N'
        ),
        false,
        array('HIDE_ICONS'=>'Y')
    );
    $fullsrc = $_SERVER['DOCUMENT_ROOT'] . $src;
    if(((!isset($arImg['SIZE']) OR $arImg['SIZE'] == 0)) AND file_exists($fullsrc)) {
        $ext = explode('.', $arImg['FILE_NAME']);
        $ext = trim(strtolower($ext[count($ext)-1]));
        if($ext == 'gif') {
            $onlypath = explode('/', $fullsrc);
            unset($onlypath[count($onlypath)-1]);
            $onlypath = implode('/', $onlypath);
            if(!is_dir($onlypath)) {
                mkdir($onlypath, 755, true);
            }
            if(class_exists('Imagick')){
                $fullsrc_jpg = str_replace('.gif', '.jpg', $fullsrc);
                if(!file_exists($fullsrc_jpg)) {
                    $image = new Imagick($fullsrc);
                    $image->setImageFormat('jpeg');
                    $image->setImageCompressionQuality(100);
                    $image->writeimage($fullsrc_jpg);
                }
                if(file_exists($fullsrc_jpg)) {
                    $arImg = $GLOBALS['APPLICATION']->IncludeComponent(
                        'webdebug:image',
                        '.default',
                        Array(
                            'PROFILE' => $template,
                            'RETURN' => 'ARRAY',
                            'IMAGE' => str_replace($_SERVER['DOCUMENT_ROOT'], '', $fullsrc_jpg),
                            'CACHE_IMAGE' => 'Y',
                            'DISPLAY_ERRORS' => 'N'
                        ),
                        false,
                        array('HIDE_ICONS'=>'Y')
                    );
                }
            }
        }
    }
    return $arImg;
}

function chek_title_filter($key_filter){
    $title_filter = array('1'=>'Выберите','2'=>'Опции');
    if(array_key_exists($key_filter,$title_filter)){
        echo $title_filter[$key_filter];
    }else{
        echo 'Фильтр № '.$key_filter;
    }
}


function get_parent_section($iblock,$elem){
    $arSelect = Array("ID", "NAME","IBLOCK_SECTION_ID");
    $arFilter = Array("IBLOCK_ID"=>$iblock, "ID"=> $elem,"ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
    }
    return $arFields['IBLOCK_SECTION_ID'];
}

function last_parent($id_elem){
    //получаем родительский раздел
    $description = '';
    $result = '';

    $parent_section = get_parent_section(6,$id_elem);

    //получаем дерево разделов и забираем родителя всех родителей
    $nav_F = CIBlockSection::GetNavChain(false, $parent_section);
    while($arItem_F = $nav_F->Fetch()){
        $arSect_F[] = $arItem_F['ID'];
    }
//    echo "<pre>";print_r($arSect_F['0']);echo "</pre>";
//    echo "<pre>";print_r('__333__');echo "</pre>";
    $arSelect = Array("ID", "NAME","PROPERTY_SECTION_LINK","IBLOCK_SECTION_ID");
    $arFilter = Array("IBLOCK_ID"=>IntVal(7), "PROPERTY_SECTION_LINK"=> $arSect_F[0],"ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
//        echo "<pre>";print_r($arFields);echo "</pre>";
//        echo "<pre>";print_r("___");echo "</pre>";
        $result['NAME'] = $arFields['NAME'];
    }

    $nav= CIBlockSection::GetNavChain(false, $arFields['IBLOCK_SECTION_ID']);
    while($arItem = $nav->Fetch()){
        $description .= $arItem['NAME'].', ';
    }
    $description .= $arFields['NAME'].', ';
    $result['DESCRIPTION'] = substr($description, 0, -2);

    return $result;
}

//получение информации из технического иб
function get_info($prop){
    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_".$prop);
    $arFilter = Array("IBLOCK_ID"=>10, "ID"=>959,"ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        if(isset($arFields['PROPERTY_'.$prop.'_VALUE']['TEXT'])){
            $result = $arFields['~PROPERTY_'.$prop.'_VALUE']['TEXT'];
        }else{
            $result = $arFields['PROPERTY_'.$prop.'_VALUE'];
        }
        return $result;
    }
}
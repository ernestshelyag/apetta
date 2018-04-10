<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

if (CModule::IncludeModule('iblock')) ;

$intCount = CIBlockSection::GetCount(array('IBLOCK_ID' => 6, 'SECTION_ID' => $_REQUEST['SECTION_ID']));
echo $intCount;
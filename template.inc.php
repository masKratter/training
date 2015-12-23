<?php
/* -------------------------------------------------------------------------- *\
|* -[ training - Template ]------------------------------------------- *|
\* -------------------------------------------------------------------------- */
// include module information file
include("module.inc.php");
// include core api functions
include("../core/api.inc.php");
// load module api and language
api_loadModule();
// print header
$html->header(api_text("module-title"),$module_name);
 // get objects
 $address=api_moduleTemplate_address($_GET['idAddress']);
// build navigation menu
global $navigation;
$navigation=new str_navigation((api_baseName()=="training_list.php"?TRUE:FALSE));
// filters
if(api_baseName()=="training_list.php"){
 // sex
 $navigation->addFilter("multiselect","sex",api_text("filter-sex"),array("U"=>api_text("filter-undefined"),"M"=>api_text("filter-male"),"F"=>api_text("filter-female")));
 // if not filtered load default filters
 if($_GET['resetFilters']||($_GET['filtered']<>1 && $_SESSION['filters'][api_baseName()]['filtered']<>1)){
  //include("filters.inc.php");
 }
}
// list
$navigation->addTab(api_text("training-nav-list"),"training_list.php");
// operations
if($address->id){
 $navigation->addTab(api_text("training-nav-operations"),NULL,NULL,"active");
 $navigation->addSubTab(api_text("training-nav-edit"),"training_edit.php?idAddress=".$address->id,NULL,NULL,(api_checkPermission($module_name,"address_edit")?TRUE:FALSE));
 $navigation->addSubTab(api_text("training-nav-delete"),"submit.php?act=address_delete&idAddress=".$address->id,NULL,NULL,(api_checkPermission($module_name,"address_del")?TRUE:FALSE),"_self",api_text("training-nav-delete-confirm"));
 $navigation->addSubTab(api_text("training-nav-export"),"training_export.php?idAddress=".$address->id);
}else{
 // add new, with check permission
 $navigation->addTab(api_text("training-nav-add"),"training_edit.php",NULL,NULL,(api_checkPermission($module_name,"edit")?TRUE:FALSE));
}
// show navigation menu
$navigation->render();
// check permissions before displaying module
if($checkPermission==NULL){content();}else{if(api_checkPermission($module_name,$checkPermission,TRUE)){content();}}
// print footer
$html->footer();
?>
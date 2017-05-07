<?php
/* Smarty version 3.1.31, created on 2017-05-07 15:21:47
  from "/Users/bjhl/phalcon-projects/base/apps/modules/frontend/views/_layouts/header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_590ecb0b2894c9_94908207',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbbabac39a75cec6d2019d37fe533f15cdc8eba9' => 
    array (
      0 => '/Users/bjhl/phalcon-projects/base/apps/modules/frontend/views/_layouts/header.html',
      1 => 1482550154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../_includes/head.html' => 1,
    'file:../_includes/nav.html' => 1,
  ),
),false)) {
function content_590ecb0b2894c9_94908207 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-CN">
<?php $_smarty_tpl->_subTemplateRender("file:../_includes/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
<div class="container">
<?php $_smarty_tpl->_subTemplateRender("file:../_includes/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php }
}

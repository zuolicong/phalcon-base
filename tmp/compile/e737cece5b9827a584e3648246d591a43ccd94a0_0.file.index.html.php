<?php
/* Smarty version 3.1.31, created on 2017-05-07 15:21:47
  from "/Users/bjhl/phalcon-projects/base/apps/modules/frontend/views/index/index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_590ecb0b2742e0_25123837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e737cece5b9827a584e3648246d591a43ccd94a0' => 
    array (
      0 => '/Users/bjhl/phalcon-projects/base/apps/modules/frontend/views/index/index.html',
      1 => 1494140609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../_layouts/header.html' => 1,
    'file:../_layouts/footer.html' => 1,
  ),
),false)) {
function content_590ecb0b2742e0_25123837 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../_layouts/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">

    <div class="phalcon-base">
        <h1>Phalcon多模块基础架构</h1>
        <p class="lead">Use phalcon-base as a way to quickly start any new project.<br> Integrated with a lot of components, it's very convenient.</p>
    </div>

</div>
<?php $_smarty_tpl->_subTemplateRender("file:../_layouts/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

<?php /* Smarty version 2.6.19, created on 2008-09-14 00:25:08
         compiled from head.tpl */ ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>


	<meta name="author" content="Wink Hosting (www.winkhosting.com)">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php $_from = $this->_tpl_vars['styles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['style']):
?>
		<link rel="stylesheet" href="./includes/files/theme/css/<?php echo $this->_tpl_vars['style']; ?>
" type="text/css">
	<?php endforeach; endif; unset($_from); ?>
	
	<?php $_from = $this->_tpl_vars['scripts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['script']):
?>
		<script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['script']; ?>
"></script>
	<?php endforeach; endif; unset($_from); ?>
	
</head>
<body>
	<a style="cursor: pointer;" onclick="javascript:void(window.open('login.php?action=login','','width=540,height=200,scrollbars=yes'));" ;="">login</a>
</body>
</html>
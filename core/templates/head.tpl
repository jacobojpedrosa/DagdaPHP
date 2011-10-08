<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>


	<meta name="author" content="Wink Hosting (www.winkhosting.com)">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	{foreach from=$styles item=style}
		<link rel="stylesheet" href="./includes/files/theme/css/{$style}" type="text/css">
	{/foreach}
	
	{foreach from=$scripts item=script}
		<script language="javascript" type="text/javascript" src="{$script}"></script>
	{/foreach}
	
</head>
<body>
	<a style="cursor: pointer;" onclick="javascript:void(window.open('login.php?action=login','','width=540,height=200,scrollbars=yes'));" ;="">login</a>
</body>
</html>

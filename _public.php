<?php

$core->tpl->addValue('rang',array('tplRang','ajoutRang'));

class tplRang {
	
	public static function ajoutRang($attr) 
	{
		global $core;
		
		$retour = '$nb = 0;'.
		'$params = array();'.
		'$params[\'q_author\'] = $_ctx->comments->comment_author;'.
		'$res = "Passant";'.
		'try {'.
			'$nb = $core->blog->getComments($params, true)->f(0);'.
		'} catch (Exception $e) {'.
			'$core->error->add($e->getMessage());'.
		'}'.
		'if ($nb > 20) $res = "Actif";'.
		'if ($nb > 50) $res = "Habitu&eacute;";'.
		'if ($nb > 100) $res = "Ami";'.
		'if ($nb > 200) $res = "Ami de toujours";'.
		'if ($nb > 300) $res = "Fanatique";'.
		'if ($nb > 500) $res = "Incorrigible bavard";'.
		'if ($nb > 800) $res = "Toujours l&agrave;";'.
		'echo " (".$res.")";';

		return '<?php '.$retour.' ?>';
	}
}

?>
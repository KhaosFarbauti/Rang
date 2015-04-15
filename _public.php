<?php
#   Copyright 2015 Khaos Farbauti Ibn Oblivion
#
#   Licensed under the Apache License, Version 2.0 (the "License");
#   you may not use this file except in compliance with the License.
#   You may obtain a copy of the License at
#
#       http://www.apache.org/licenses/LICENSE-2.0
#
#   Unless required by applicable law or agreed to in writing, software
#   distributed under the License is distributed on an "AS IS" BASIS,
#   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
#   See the License for the specific language governing permissions and
#   limitations under the License.

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

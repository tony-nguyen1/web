<?php
class Security {
	private static $seed = 'seed';
	public static function hacher($texte_en_clair) {
		$texte_hache = hash('sha256', Security::$seed . $texte_en_clair);
		return $texte_hache;
	}
}

//$mot_passe_en_clair = 'apple';
//$mot_passe_hache = Security::hacher($mot_passe_en_clair);
//echo $mot_passe_hache;
//affiche '3a7bd3e2360a3d29eea436fcfb7e44c735d117c42d1c1835420b6b9942dd4f1b'
?>
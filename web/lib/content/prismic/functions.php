<?php
require_once dirname(dirname(dirname(__DIR__))) . "/vendor/autoload.php";

use Prismic\Api;
use Prismic\Predicates;

/**
 * Scan for Preview Cookie
 */
function getPreviewRef(){

	$cookieNames = [
		str_replace(['.', ' '], '_', Api::PREVIEW_COOKIE),
		Api::PREVIEW_COOKIE,
	];

	foreach($cookieNames as $cookieName){

		if(isset($_COOKIE[$cookieName])){
			return $_COOKIE[$cookieName];
		}
	}

	return null;
}

/**
 * Return all cache data as a clean object
 */
function returnAllContentAsObject($cache, $type = null){

	$obj = new stdClass();
	$dir = new FilesystemIterator($cache);

	foreach($dir as $fileinfo){
		
		$contents = json_decode(file_get_contents($fileinfo->getPath() . "/" . $fileinfo->getFilename()));

		if(!is_null($type) && $contents->type !== $type) continue;

		$obj->{$contents->uid} = $contents;
	}

	return $obj;
}

/**
 * Return all cache data as a clean array
 */
function returnAllContentAsArray($cache, $type = null, $sort = null, $direction = "desc"){

	$obj = array();
	$dir = new FilesystemIterator($cache);

	foreach($dir as $fileinfo){
		
		$contents = json_decode(file_get_contents($fileinfo->getPath() . "/" . $fileinfo->getFilename()));

		if(!is_null($type) && $contents->type !== $type) continue;

		array_push($obj, $contents);
	}

	if(!is_null($sort)){

		$sort = new sortContentObject($sort, $direction);
		$obj = $sort->sort($obj);
	}

	return $obj;
}

/**
 * Sort
 */
class sortContentObject {

	private $key;
	private $direction;

	public function __construct($key, $direction){
		$this->key = $key;
		$this->dir = $direction;
	}

	public function sortKeys($a, $b){

		switch ($this->key) {

			case "author":
			case "category":

				if($this->dir == "asc"){
					return strcmp($a->data->{$this->key}->slug, $b->data->{$this->key}->slug);
				} else {
					return strcmp($b->data->{$this->key}->slug, $a->data->{$this->key}->slug);
				}

				break;

			case "published_date":
			case "title":

				if($this->dir == "asc"){
					return strcmp($a->data->{$this->key}, $b->data->{$this->key});
				} else {
					return strcmp($b->data->{$this->key}, $a->data->{$this->key});
				}

				break;

			case "first_publication_date":
			default:

				if($this->dir == "asc"){
					return strcmp($a->{$this->key}, $b->{$this->key});
				} else {
					return strcmp($b->{$this->key}, $a->{$this->key});
				}

				break;
		}
	}

	public function sort($object){

		usort($object, array($this, "sortKeys"));
		/* --------------- *
		echo "<br><pre>";
		print_r($object);
		echo "</pre>";
		/* --------------- */

		return $object;
	}
}

/**
 * Return image
 */
function prismicReturnImage($url, $size = "1000", $quality = "70"){

	$ext = parse_url($url);
	$array = explode(".", $ext["path"]);
	$copy = array_slice($array, 0, -1);

	$lastKey = end($array);
	$path = implode(".", $copy);

	if (isset($ext["host"])) {
		$url = $ext["scheme"] . "://" . $ext["host"] . $path . "." . $lastKey . "?q=" . $quality . "&w=" . $size;
	} else {
		$url = "";
	}

	return $url;
}


function getByUID($uid, $type = null){

	global $prismic;

	/* --- Get Preview Cookie --- */
	$previewRef = getPreviewRef();

	/* --- Make Sure Cache Exists --- */
	$cache = FILE_CACHE . "prismic/";

	if(!file_exists($cache)) {
		mkdir($cache, 775);
		chmod($cache, 0775);
	}

	$filename = base64_encode($uid);

	/* --- Load through Preview --- */
	if($previewRef) {

		$api = $prismic->get_api();
		$ref = $previewRef ? $previewRef : $api->master()->getRef();
		$options = array(
			"ref" => $ref
		);

		if($type) {
			$document = $api->getByUID($type, $uid, $options);
		} else {

			if ($uid !== "site_settings" && $uid !== "home") {
				$uid = "single_" . str_replace("-", "_", $uid);
			}

			$document = $api->getSingle($uid);
		}

		return $document;
	}

	if(file_exists(FILE_CACHE . "documents.json")) {
		$reference = json_decode(file_get_contents(FILE_CACHE . "documents.json"));
	}

	/* --- No Reference? No Problem --- */
	if(!isset($reference)) {
		$prismicReference = new stdClass();
	} else {
		$prismicReference = $reference;
	}

	/* --- Check for cached file --- */
	if (!file_exists($cache . $filename)) {

		$api = $prismic->get_api();

		if($type) {
			$document = $api->getByUID($type, $uid);
		} else {

			if($uid !== "site_settings" && $uid !== "home") {
				$uid = "single_" . str_replace("-", "_", $uid);
			}

			$document = $api->getSingle($uid);
		}

		if(defined("ENABLE_CACHE") && ENABLE_CACHE === true && isset($document->uid)) {

			/* --- Write cache file --- */
			file_put_contents($cache . $filename, json_encode($document));
			chmod($cache . $filename, 0664);

			$uid = $document->uid;

			if (!isset($prismicReference->{$document->type}) || !is_array($prismicReference->{$document->type})) {
				$prismicReference->{$document->type} = array();
			}

			array_push($prismicReference->{$document->type}, base64_encode($document->uid));

			/* --- Write Reference --- */
			file_put_contents(FILE_CACHE . "documents.json", json_encode($prismicReference));
			chmod(FILE_CACHE . "documents.json", 0664);
		}

	} else {
		$document = json_decode(file_get_contents($cache . $filename));
	}

	return $document;
}

?>




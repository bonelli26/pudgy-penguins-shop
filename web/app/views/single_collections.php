<?php
$document = $PAGE["document"];
$data = $document->data;
global $CONTENT;
use Prismic\Dom\RichText;
/* ---------------
echo "<br><pre>";
print_r($document);
echo "</pre>";
/* --------------- */
?>

<div class="collection-hero">
	<h1><?php echo $data->collection_header[0]->text ?></h1>
	<p><?php echo $data->collection_intro_text[0]->text ?></p>
</div>

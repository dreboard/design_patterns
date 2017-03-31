<?php
$string = "<p>Text with markup</p>";
$decorator = new BoldText(new StripTagsText(new StringPrinter($string)));
$decorator->outputString();
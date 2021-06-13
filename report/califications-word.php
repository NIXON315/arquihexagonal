<?php
include_once "../core/autoload.php";
include_once "./core/Application/AlumnTeamManager.php";
include_once "./core/Application/TeamManager.php";
include_once "./core/Application/BlockManager.php";
include_once "./core/Application/CalificationManager.php";


require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();
$blocks = BlockManager::getBlockByTeamId($_GET["team_id"]);
$team =  TeamManager::getTeamById($_GET["team_id"]);
$alumns = AlumnTeamManager::getAlumnsByTeamId($_GET["team_id"]);

$section1 = $word->AddSection();
$section1->addText("CALIFICACIONES - ".strtoupper($team->name),array("size"=>22,"bold"=>true,"align"=>"right"));


$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("Nombre Completo");
foreach ($blocks as $block) {
$table1->addCell()->addText($block->name);
}
foreach($alumns as $al){
$alumn = $al->getAlumn();
$table1->addRow();
$table1->addCell(5000)->addText($alumn->name." ".$alumn->lastname);

foreach ($blocks as $block) {
$val = CalificationManager::getCalificationByBlockAndAlumn($block->id, $alumn->id);
$v = "";
if($val!=null){ $v = $val->val; }
$table1->addCell()->addText($v);
}

}

$word->addTableStyle('table1', $styleTable,$styleFirstRow);
/// datos bancarios
$section1->addText("");
$section1->addText("");
$section1->addText("");
$section1->addText("Generado por Asixcolar");

$filename = "califications-".time().".docx";
#$word->setReadDataOnly(true);
$word->save($filename,"Word2007");
//chmod($filename,0444);
header("Content-Disposition: attachment; filename='$filename'");
readfile($filename); // or echo file_get_contents($filename);
unlink($filename);  // remove temp file



?>
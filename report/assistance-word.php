<?php
include_once "../core/autoload.php";
include_once "./core/Application/AlumnTeamManager.php";
include_once "./core/Application/TeamManager.php";
include_once "./core/Application/AssistenceManager.php";


require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();

$team =  TeamManager::getTeamById($_GET["team_id"]);
$alumns = AlumnTeamManager::getAlumnsByTeamId($_GET["team_id"]);
$range= ((strtotime($_GET["finish_at"])-strtotime($_GET["start_at"]))+(24*60*60)) /(24*60*60);

$section1 = $word->AddSection();
$section1->addText("LISTA DE ASISTENCIA - ".strtoupper($team->name),array("size"=>22,"bold"=>true,"align"=>"right"));


$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("Nombre Completo");
for($i=0;$i<$range;$i++){ 
$table1->addCell()->addText(date("d-M",strtotime($_GET["start_at"])+($i*(24*60*60))));
}

foreach($alumns as $al){
$alumn = $al->getAlumn();
$table1->addRow();
$table1->addCell(3000)->addText($alumn->name." ".$alumn->lastname);
for($i=0;$i<$range;$i++){ 
	$date_at= date("Y-m-d",strtotime($_GET["start_at"])+($i*(24*60*60)));
	$asist = AssistanceManager::getAssistenceByTeamAndData($alumn->id,$_GET["team_id"],$date_at);
$v = "";
if($asist!=null){
						if($asist->kind_id==1){ $v="A"; }
						else if($asist->kind_id==2){ $v="F"; }
						else if($asist->kind_id==3){ $v="R"; }
						else if($asist->kind_id==4){ $v= "J"; }
						
					}
$table1->addCell()->addText($v);
}

}

$word->addTableStyle('table1', $styleTable,$styleFirstRow);
$section1->addText("");
$section1->addText("");
$section1->addText("");
$section1->addText("Generado por Asixcolar");
$filename = "team-".time().".docx";
$word->save($filename,"Word2007");
header("Content-Disposition: attachment; filename='$filename'");
readfile($filename);
unlink($filename);



?>
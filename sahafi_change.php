<?php
$id=$_GET['id'];
$lvl=intval($_GET['lvl']);
// if (!is_integer($lvl)) $lvl=0;

function generate($id=0,$lvl=0)
{
	include "connectioni.php";
	$query=mysqli_query($CON,"SELECT * FROM `cats` WHERE `db` = 'chap_parameters' AND `published` = 1 AND `ID` = '$id'");
	$row=mysqli_fetch_assoc($query);
	
	$id2=$id;
	while (is_numeric($row['title']))
	{
		$query2=mysqli_query($CON,"SELECT * FROM `cats` WHERE `ID` = '".$row['title']."'");
		$row2=mysqli_fetch_assoc($query2);
		$row['title']=$row2['title'];
		$row['featured']=$row2['featured'];
		// $row=$row2;
		$id=$id2=$row2['ID'];
	}
	
	$childCheckQuery=mysqli_query($CON,"SELECT * FROM `cats` WHERE `db` = 'chap_parameters' AND `published` = 1 AND `parentID` = '$id2' ORDER BY `sort` DESC");
	$childCheckCount=mysqli_num_rows($childCheckQuery);
	
	if ($childCheckCount>0)
	{
		if ($row['featured']==0)
		{
			echo '<p class="f-title" style="padding-right: '.($lvl*50).'px">'.$row['title'].':</p>';
			while ($childCheckRow=mysqli_fetch_assoc($childCheckQuery))
				generate($childCheckRow['ID'],$lvl+1);
		}
		else
		{
			echo '<div class="row" style="padding-right: '.($lvl*50).'px"><div class="col-lg-12"><div class="contact-form-group">';
			echo '<label for="parameter'.$id.'">'.$row['title'].'</label>';
			echo '<select class="form-input dropdown selectonload" name="parameter'.$id.'" id="parameter'.$id.'" data-lvl="'.($lvl+1).'" onchange="sahafi_change(this.value,'.$id.','.($lvl+1).')">';
			// echo '<option value="0">انتخاب کنید...</option>';
			while ($row2=mysqli_fetch_assoc($childCheckQuery))
				echo '<option value="'.$row2['ID'].'">'.$row2['title'].'</option>';
			echo '</select></div></div></div><div id="parameter'.$id.'_htmlholder" style="padding-right: '.($lvl*50).'px"></div>';
		}
	}
	else
	{
		$query2=mysqli_query($CON,"SELECT * FROM `cats_relations` as rels INNER JOIN `chap_parameters` as pars ON pars.`ID` = rels.`db_id` WHERE rels.`catID` = '".$id2."' AND pars.`published` = 1 ORDER BY pars.`featured` DESC, pars.`sort` DESC");
		$count=mysqli_num_rows($query2);
		
		$str_start='<div class="row" style="padding-right: '.($lvl*50).'px"><div class="col-lg-12"><div class="contact-form-group">';
		$str_start.='<label for="parameter'.$id.'">'.$row['title'].'</label>';
		$str_end="</select></div></div></div>";
		
		if ($count>0)
		{
			echo $str_start;
			echo '<select class="form-input dropdown" name="parameter'.$id.'" id="parameter'.$id.'" onchange="calculate()">';
			while ($row2=mysqli_fetch_assoc($query2))
				echo '<option value="'.$row2['ID'].'">'.$row2['title'].'</option>';
			echo $str_end;
		}
		else if ($row['featured']==0)
		{
			echo $str_start.'<input id="parameter'.$id.'" type="text" class="form-input" placeholder="اینجا وارد کنید...">'.$str_end;
		}
	}
}

if ($id!=0) generate($id,0);
?>
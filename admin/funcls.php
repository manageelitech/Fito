<?php
include_once 'connection.php';
include_once 'sendsms-get.php';
class Myclass
{
    var $connobj;
    var $conn;
    var $schExt;
    function __construct()
    {
        $this->connobj = new connClass();
        $this->conn = $this->connobj->conn;
        $this->schExt = $this->connobj->schExt;
    }

    function getData($id){
        $teammembers = array();
        $sponsorid1 = array();
        //$team = array('FITO2022', 'FITO2026', 'FITO2070', 'FITO2071', 'FITO2072', 'FITO2076');
        $down_qry1 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$id'");
        while ($down_res1 = mysqli_fetch_array($down_qry1)) {
            array_push($teammembers,$down_res1['id']);
            array_push($sponsorid1,$down_res1['id']);
        }

        $sponsorid2 = array();
        foreach ($sponsorid1 as $spons){
            $down_qry2 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res2 = mysqli_fetch_array($down_qry2)) {
                array_push($teammembers,$down_res2['id']);
                array_push($sponsorid2,$down_res2['id']);
            }
        }

        $sponsorid3 = array();
        foreach ($sponsorid2 as $spons){
            $down_qry3 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res3 = mysqli_fetch_array($down_qry3)) {
                array_push($teammembers,$down_res3['id']);
                array_push($sponsorid3,$down_res3['id']);
            }
        }

        $sponsorid4 = array();
        foreach ($sponsorid3 as $spons){
            $down_qry4 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res4 = mysqli_fetch_array($down_qry4)) {
                array_push($teammembers,$down_res4['id']);
                array_push($sponsorid4,$down_res4['id']);
            }
        }
        $sponsorid5 = array();
        foreach ($sponsorid4 as $spons){
            $down_qry5 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res5 = mysqli_fetch_array($down_qry5)) {
                array_push($teammembers,$down_res5['id']);
                array_push($sponsorid5,$down_res5['id']);
            }
        }

        $sponsorid6 = array();
        foreach ($sponsorid5 as $spons){
            $down_qry6 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res6 = mysqli_fetch_array($down_qry6)) {
                array_push($teammembers,$down_res6['id']);
                array_push($sponsorid6,$down_res6['id']);
            }
        }

        $sponsorid7 = array();
        foreach ($sponsorid6 as $spons){
            $down_qry7 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res7 = mysqli_fetch_array($down_qry7)) {
                array_push($teammembers,$down_res7['id']);
                array_push($sponsorid7,$down_res7['id']);
            }
        }

        return $teammembers;

    }

    function getTree($id){
        $teammembers = array();
        $sponsorid1 = array();
        //$team = array('FITO2022', 'FITO2026', 'FITO2070', 'FITO2071', 'FITO2072', 'FITO2076');
        $down_qry1 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$id'");
        while ($down_res1 = mysqli_fetch_array($down_qry1)) {
            array_push($teammembers,$down_res1['id']);
            array_push($sponsorid1,$down_res1['id']);
        }
        $table = '';
        $table .='
       <table class="table table-hover table-bordered table-responsive" style="font-weight: bold;text-align: center;">
       <tbody>';
        $table.= '<tr>
                  <th style="border: 2px solid black;" class="goldenbg">'.$id.'</th></tr>
                  <tr>';
        foreach ($sponsorid1 as $mem){
            $table .= '<th style="border: 2px solid black;">'.$mem.'</th>';
        }
        $table .='</tr>';


        $table .='</tbody></table>';

        $sponsorid2 = array();
        foreach ($sponsorid1 as $spons){
            $down_qry2 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res2 = mysqli_fetch_array($down_qry2)) {
                array_push($teammembers,$down_res2['id']);
                array_push($sponsorid2,$down_res2['id']);
            }
        }

        $sponsorid3 = array();
        foreach ($sponsorid2 as $spons){
            $down_qry3 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res3 = mysqli_fetch_array($down_qry3)) {
                array_push($teammembers,$down_res3['id']);
                array_push($sponsorid3,$down_res3['id']);
            }
        }

        $sponsorid4 = array();
        foreach ($sponsorid3 as $spons){
            $down_qry4 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res4 = mysqli_fetch_array($down_qry4)) {
                array_push($teammembers,$down_res4['id']);
                array_push($sponsorid4,$down_res4['id']);
            }
        }
        $sponsorid5 = array();
        foreach ($sponsorid4 as $spons){
            $down_qry5 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res5 = mysqli_fetch_array($down_qry5)) {
                array_push($teammembers,$down_res5['id']);
                array_push($sponsorid5,$down_res5['id']);
            }
        }

        $sponsorid6 = array();
        foreach ($sponsorid5 as $spons){
            $down_qry6 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res6 = mysqli_fetch_array($down_qry6)) {
                array_push($teammembers,$down_res6['id']);
                array_push($sponsorid6,$down_res6['id']);
            }
        }

        $sponsorid7 = array();
        foreach ($sponsorid6 as $spons){
            $down_qry7 = mysqli_query($this->conn,"select id from distributor_info where sponsor_id='$spons'");
            while ($down_res7 = mysqli_fetch_array($down_qry7)) {
                array_push($teammembers,$down_res7['id']);
                array_push($sponsorid7,$down_res7['id']);
            }
        }


        return $table;

    }

    function addNotice()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc=mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        else
        {
            echo json_encode(array("res"=> 2));
        }
        $date=date('Y-m-d H:i:s');

        $qry=mysqli_query($this->conn,"insert into latest_notice(title,description,date) values('$title','$desc',NOW())");
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function addHeaderBtnText()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        $date=date('Y-m-d H:i:s');
        $qrych=mysqli_query($this->conn,"select * from headerbtnText");
        if (mysqli_num_rows($qrych)>0)
        {
            $qry=mysqli_query($this->conn,"update headerbtnText set text='$title',date=NOW()");
        }
        else
        {
            $qry=mysqli_query($this->conn,"insert into headerbtnText(text,date) values('$title',NOW())");
        }
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function addHomeAbout()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc=mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        $date=date('Y-m-d H:i:s');

            $qry=mysqli_query($this->conn,"insert into homeabout(title,description,date) values('$title','$desc',NOW())");
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function viewHomeAbout(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="homeaboutlisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,title,description,date FROM homeabout order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['title'];
            $desc=$res['description'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deleteHomeAbout(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "homeaboutlist" => $table));
    }

    function deleteHomeAbout()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM homeabout WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function addaboutpage()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc=mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        $date=date('Y-m-d H:i:s');

        $qry=mysqli_query($this->conn,"insert into aboutuspage(title,description,date) values('$title','$desc',NOW())");
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function viewaboutpage(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="aboutpagelisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,title,description,date FROM aboutuspage order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['title'];
            $desc=$res['description'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deleteaboutpage(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "aboutpagelist" => $table));
    }

    function deleteaboutpage()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM aboutuspage WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function viewadmissionpage(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="admissionpagelisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,title,description,date FROM admissions order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['title'];
            $desc=$res['description'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deleteadmissionpage(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "admissionpagelist" => $table));
    }

    function adddmissionpage()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc=mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        $date=date('Y-m-d H:i:s');

        $qry=mysqli_query($this->conn,"insert into admissions(title,description,date) values('$title','$desc',NOW())");
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function deletedmissionpage()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM admissions WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function viewfacilitypage(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="facilitypagelisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,title,description,date FROM facility order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['title'];
            $desc=$res['description'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deletefacilitypage(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "facilitypagelist" => $table));
    }

    function addfacilitypage()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc=mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        $date=date('Y-m-d H:i:s');

        $qry=mysqli_query($this->conn,"insert into facility(title,description,date) values('$title','$desc',NOW())");
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function deletefacilitypage()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM facility WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function viewhospitalpage(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="hospitalpagelisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,title,description,date FROM hospital order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['title'];
            $desc=$res['description'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deletehospitalpage(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "hospitalpagelist" => $table));
    }

    function addhospitalpage()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc=mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        $date=date('Y-m-d H:i:s');

        $qry=mysqli_query($this->conn,"insert into hospital(title,description,date) values('$title','$desc',NOW())");
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function deletehospitalpage()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM hospital WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function viewaffiliationpage(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="affiliationpagelisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,title,description,date FROM affiliation order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['title'];
            $desc=$res['description'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deleteaffiliationpage(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "affiliationpagelist" => $table));
    }

    function addaffiliationpage()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc=mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        $date=date('Y-m-d H:i:s');

        $qry=mysqli_query($this->conn,"insert into affiliation(title,description,date) values('$title','$desc',NOW())");
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function deleteaffiliationpage()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM affiliation WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function viewcourses(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="courseslisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,title,description,date FROM courses order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['title'];
            $desc=$res['description'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deletecourses(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "courseslist" => $table));
    }

    function addcourses()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc=mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        $date=date('Y-m-d H:i:s');

        $qry=mysqli_query($this->conn,"insert into courses(title,description,date) values('$title','$desc',NOW())");
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function deletecourses()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM courses WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function viewfeedback(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="feedbacklisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,name,message,filename,date FROM studentfdbk order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['name'];
            $desc=$res['message'];
            $file=$res['filename'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deletefeedback(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>
                            <td class=""><img src="backend/feedback/'.$file.'"></td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "feedbacklist" => $table));
    }

    function deletefeedback()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM studentfdbk WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }
    function deleteNotice()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res=mysqli_query($this->conn,"SELECT filename FROM latest_notice WHERE id=".$postid);
        $row=mysqli_fetch_array($res);
        $res1=mysqli_query($this->conn,"DELETE FROM latest_notice WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;
            if ($row['filename']!='') {
                unlink('backend/notice/'.$row['filename']);
                unlink('backend/notice/thumb/'.$row['filename']);
            }
            else
            {
                return;
            }

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function deleteGallery()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res=mysqli_query($this->conn,"SELECT filename FROM gallery WHERE id=".$postid);
        $row=mysqli_fetch_array($res);
        $res1=mysqli_query($this->conn,"DELETE FROM gallery WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;
            if ($row['filename']!='') {
                unlink('backend/gallery/'.$row['filename']);
                unlink('backend/gallery/thumb/'.$row['filename']);
            }
            else
            {
                return;
            }

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function deleteSacnned()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res=mysqli_query($this->conn,"SELECT file FROM purchaseinvoice WHERE id=".$postid);
        $row=mysqli_fetch_array($res);
        $res1=mysqli_query($this->conn,"DELETE FROM purchaseinvoice WHERE slno=".$postid);
        if($res1>0)
        {
            echo 1;
            if ($row['file']!='') {
                unlink('backend/purchase/'.$row['file']);
                unlink('backend/purchase/thumb/'.$row['file']);
            }
            else
            {
                return;
            }

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function deletepageimg()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res=mysqli_query($this->conn,"SELECT filename FROM pageimg WHERE id=".$postid);
        $row=mysqli_fetch_array($res);
        $res1=mysqli_query($this->conn,"DELETE FROM pageimg WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;
            if ($row['filename']!='') {
                unlink('backend/pages/'.$row['filename']);
                unlink('backend/pages/thumb/'.$row['filename']);
            }
            else
            {
                return;
            }

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function deleteSlider()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res=mysqli_query($this->conn,"SELECT filename FROM slider WHERE id=".$postid);
        $row=mysqli_fetch_array($res);
        $res1=mysqli_query($this->conn,"DELETE FROM slider WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;
            if ($row['filename']!='') {
                unlink('backend/banner/'.$row['filename']);
                unlink('backend/banner/thumb/'.$row['filename']);
            }
            else
            {
                return;
            }

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function viewdownloads(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="downloadslisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,name,filename,date FROM downloads order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['name'];
            $file=$res['filename'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deletedownloads(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$posttime.'</td>
                            <td class=""><img src="backend/feedback/'.$file.'"></td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "downloadslist" => $table));
    }

    function deletedownloads()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM downloads WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function viewcareer(){
        $table='';
        $table.=  '<table  class="table table-bordered table-responsive table-striped table-hover table-condensed" id="careerlisttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';

        $qry=mysqli_query($this->conn,"SELECT id,title,description,date FROM career order by date desc");
        while($res=mysqli_fetch_array($qry))
        {
            $id=$res["id"];
            $title=$res['title'];
            $desc=$res['description'];
            $posttime=$res['date'];
            $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deletecareer(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>';

            $table.= '</tr>';
        }
        $table.='</tbody></table>';

        echo json_encode(array("res"=> 1, "careerlist" => $table));
    }

    function addcareer()
    {
        if(isset($_POST['title']) && !empty($_POST['title']))
        {
            $title=mysqli_real_escape_string($this->conn,$_POST['title']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc=mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        else
        {
            echo json_encode(array("res"=> 1));
        }
        $date=date('Y-m-d H:i:s');

        $qry=mysqli_query($this->conn,"insert into career(title,description,date) values('$title','$desc',NOW())");
        if($qry>0)
        {
            echo json_encode(array("res"=> 3));
        }
        else
        {
            echo json_encode(array("res"=> 4));
        }
    }

    function deletecareer()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM career WHERE id=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }
    function myprofile()
    {
        if(isset($_POST['uid']) && !empty($_POST['uid']))
        {
            $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        }
        else
        {
            echo 0;
            return;
        }
        $qry = mysqli_query($this->conn, "SELECT * FROM distributor_info where id='$uid'");
        while ($res = mysqli_fetch_array($qry)) {
            $id = $res['id'];
            $sponsor_id = $res['sponsor_id'];
            $dist_name = $res['dist_name'];
            $dist_mobile = $res['dist_mobile'];
            $dist_aadhar = $res['dist_aadhar'];
            $dist_pan = $res['dist_pan'];
            $dist_address = $res['dist_address'];
            $dist_email = $res['dist_email'];
            $sponsor_name = $res['sponsor_name'];
            $photo = $res['photo'];
            $bgroup = $res['bgroup'];
            $dist_accNo = $res['dist_accNo'];
            $dist_bank_name = $res['dist_bank_name'];
            $dist_bank_branch = $res['dist_bank_branch'];
            $dist_bank_ifsc = $res['dist_bank_ifsc'];
            $nominee_name = $res['nominee_name'];
            $nominee_mobile = $res['nominee_mobile'];
            $nominee_age = $res['nominee_age'];
            $nominee_relation = $res['nominee_relation'];

            echo json_encode(array("res" => 1, "id"=>$id, "sponsor_id"=>$sponsor_id,"dist_name"=>$dist_name, "dist_mobile"=>$dist_mobile, "dist_aadhar"=>$dist_aadhar,"dist_pan"=>$dist_pan, "dist_address"=>$dist_address, "dist_email"=>$dist_email, "sponsor_name"=>$sponsor_name, "photo"=>$photo, "bgroup"=>$bgroup,"dist_accNo"=>$dist_accNo,"dist_bank_name"=>$dist_bank_name,"dist_bank_branch"=>$dist_bank_branch,"dist_bank_ifsc"=>$dist_bank_ifsc,"nominee_name"=>$nominee_name,"nominee_mobile"=>$nominee_mobile,"nominee_age"=>$nominee_age,"nominee_relation"=>$nominee_relation));
        }
    }

    function deleteProduct()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res=mysqli_query($this->conn,"SELECT product_image FROM products WHERE slno=".$postid);
        $row=mysqli_fetch_array($res);
        $res1=mysqli_query($this->conn,"DELETE FROM products WHERE slno=".$postid);
        if($res1>0)
        {
            echo 1;
            if ($row['product_image']!='') {
                unlink('backend/products/'.$row['product_image']);
                unlink('backend/products/thumb/'.$row['product_image']);
            }
            else
            {
                return;
            }

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function getSponsorName()
    {
        if(isset($_POST['sponsor_id']) && !empty($_POST['sponsor_id']))
        {
            $sponsor_id = mysqli_real_escape_string($this->conn,$_POST['sponsor_id']);
        }
        else
        {
            echo 0;
            return;
        }
        $qry = mysqli_query($this->conn, "SELECT * FROM distributor_info where id='$sponsor_id'");
        if ($res = mysqli_fetch_array($qry)) {
            $sponsor_name = $res['dist_name'];
            echo json_encode(array("res" => 1, "sponsor_name"=>$sponsor_name));
        }
    }

    function changePassword()
    {
        if(isset($_POST['uname']) && !empty($_POST['uname']))
        {
            $uname = mysqli_real_escape_string($this->conn,$_POST['uname']);
        }
        if(isset($_POST['newpadd']) && !empty($_POST['newpadd']))
        {
            $newpadd = mysqli_real_escape_string($this->conn,$_POST['newpadd']);
        }
        $qry = mysqli_query($this->conn, "UPDATE userlogin set password='$newpadd' where username='$uname'");
        if ($qry) {
            echo json_encode(array("res" => 1, "msg"=>"success"));
        }
    }

    function regAuthentication()
    {

            $distPhone = mysqli_real_escape_string($this->conn,$_POST['distPhone']);
            $distEmail = mysqli_real_escape_string($this->conn,$_POST['distEmail']);
            $distAdhar = mysqli_real_escape_string($this->conn,$_POST['distAdhar']);
            $distPan = mysqli_real_escape_string($this->conn,$_POST['distPan']);
            $distpin = mysqli_real_escape_string($this->conn,$_POST['distpin']);

            $isPhone=0;
            $isEmail=0;
            $isAdhar=0;
            $isPan=0;
            $isPin=0;

        $qry_email = mysqli_query($this->conn, "SELECT dist_email FROM distributor_info where dist_email='$distEmail' and dist_email !=''");
        $email_rows = $qry_email->num_rows;
        if ($email_rows > 0){
            echo json_encode(array("res" => 0, "msg" => "This email already registered.."));
            return;
        }

        $qry_phone = mysqli_query($this->conn, "SELECT dist_mobile FROM distributor_info where dist_mobile='$distPhone'");
        $phone_rows = $qry_phone->num_rows;
        if ($phone_rows > 0){
            echo json_encode(array("res" => 0, "msg" => "This Phone No already registered.."));
            return;
        }

        $qry_adhar = mysqli_query($this->conn, "SELECT dist_aadhar FROM distributor_info where dist_aadhar='$distAdhar' and dist_aadhar !=''");
        $adhar_rows = $qry_adhar->num_rows;
        if ($adhar_rows > 0){
            echo json_encode(array("res" => 0, "msg" => "This Aadhar No already registered.."));
            return;
        }
        $qry_pan = mysqli_query($this->conn, "SELECT dist_pan FROM distributor_info where dist_pan='$distPan' and dist_pan !=''");
        $pan_rows = $qry_pan ->num_rows;
        if ($pan_rows > 0){
            echo json_encode(array("res" => 0, "msg" => "This PAN already registered.."));
            return;
        }

        $qry_pin = mysqli_query($this->conn, "SELECT activation_pin FROM distributor_info where activation_pin='$distpin'");
        $pin_rows = $qry_pin ->num_rows;
        if ($pin_rows > 0){
            echo json_encode(array("res" => 0, "msg" => "This Pin already registered.."));
            return;
        }
        $qry_pin1 = mysqli_query($this->conn, "SELECT * FROM `distributor_pin` where pin='$distpin'");
        $pin_rows1 = $qry_pin1 ->num_rows;
        if ($pin_rows1 == 0){
            echo json_encode(array("res" => 0, "msg" => "Please enter a valid pin"));
            return;
        }
        echo json_encode(array("res" => 1, "msg" => "Proceed"));
    }

    function deleteDistributor()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res=mysqli_query($this->conn,"SELECT photo FROM distributor_info WHERE id=".$postid);
        $row=mysqli_fetch_array($res);
        $res1=mysqli_query($this->conn,"DELETE FROM distributor_info WHERE slno=".$postid);
        if($res1>0)
        {
            echo 1;
            if ($row['photo']!='') {
                unlink('backend/distributor/'.$row['photo']);
                unlink('backend/distributor/thumb/'.$row['photo']);
            }
            else
            {
                return;
            }

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function getProductForUpdate()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid = mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $qry = mysqli_query($this->conn, "SELECT * FROM products where slno='$postid'");
        while ($res = mysqli_fetch_array($qry)) {
            $product_code = $res['product_code'];
            $product_name = $res['product_name'];
            $category = $res['category'];
            $subcategory = $res['sub_category'];
            $product_desc = $res['product_desc'];
            $hsncode = $res['hsncode'];
            $mrp = $res['mrp'];
            $dp = $res['dp'];
            $bv = $res['bv'];
            $bsper = $res['bsper'];
            $hsper = $res['hsper'];
            $gst = $res['gst'];
            $product_quantity = $res['product_quantity'];

//            $cat_qry = mysqli_query($this->conn,"select * from product_category where slno='$category'");
//            if ($cat_res = mysqli_fetch_array($cat_qry)){
//                $category = $cat_res['name'];
//            }
//            $subcat_qry = mysqli_query($this->conn,"select * from product_sub_category where slno='$subcategory'");
//            if ($subcat_res = mysqli_fetch_array($subcat_qry)){
//                $subcategory = $subcat_res['name'];
//            }

            echo json_encode(array("res" => 1, "product_code"=>$product_code,"product_name"=>$product_name, "category"=>$category, "subcategory"=>$subcategory, "product_desc"=>$product_desc,"hsncode"=>$hsncode, "mrp"=>$mrp, "dp"=>$dp, "bv"=>$bv, "bsper"=>$bsper, "hsper"=>$hsper,"gst"=>$gst,"product_quantity"=>$product_quantity));
        }
    }

    function updateProduct(){
        $desc = '';
        if(isset($_POST['id']) && !empty($_POST['id']))
        {
            $id = mysqli_real_escape_string($this->conn,$_POST['id']);
        }
        if(isset($_POST['cat']) && !empty($_POST['cat']))
        {
            $cat = mysqli_real_escape_string($this->conn,$_POST['cat']);
        }
        if(isset($_POST['desc']) && !empty($_POST['desc']))
        {
            $desc = mysqli_real_escape_string($this->conn,$_POST['desc']);
        }
        if(isset($_POST['hsn']) && !empty($_POST['hsn']))
        {
            $hsn = mysqli_real_escape_string($this->conn,$_POST['hsn']);
        }
        if(isset($_POST['mrp']) && !empty($_POST['mrp']))
        {
            $mrp = mysqli_real_escape_string($this->conn,$_POST['mrp']);
        }
        if(isset($_POST['dp']) && !empty($_POST['dp']))
        {
            $dp = mysqli_real_escape_string($this->conn,$_POST['dp']);
        }
        if(isset($_POST['bv']) && !empty($_POST['bv']))
        {
            $bv = mysqli_real_escape_string($this->conn,$_POST['bv']);
        }
        if(isset($_POST['gst']) && !empty($_POST['gst']))
        {
            $gst = mysqli_real_escape_string($this->conn,$_POST['gst']);
        }
        if(isset($_POST['qty']) && !empty($_POST['qty']))
        {
            $qty = mysqli_real_escape_string($this->conn,$_POST['qty']);
        }
        if(isset($_POST['name']) && !empty($_POST['name']))
        {
            $name = mysqli_real_escape_string($this->conn,$_POST['name']);
        }
        if(isset($_POST['pcode']) && !empty($_POST['pcode']))
        {
            $pcode = mysqli_real_escape_string($this->conn,$_POST['pcode']);
        }
        $qry = mysqli_query($this->conn,"UPDATE `products` SET `product_name`= '$name', `category`='$cat',`product_desc`= '$desc',`hsncode`='$hsn',`mrp`='$mrp',`dp`='$dp',`bv`='$bv',`gst`='$gst',`updateddate`=NOW(),`product_quantity`='$qty',`product_code`='$pcode',status=1 WHERE slno='$id'");
        if ($qry){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    function generatePIN(){
        if(isset($_POST['qty']) && !empty($_POST['qty']))
        {
            $qty = mysqli_real_escape_string($this->conn,$_POST['qty']);
        }
        $pin = '';
        for ($i=1;$i<=$qty;$i++){
            $pin = $this->generateRandomString(1).$random_digit=rand(0000,9999);

//            $rqry = mysqli_query($this->conn,"select pin from distributor_pin where pin='$pin'");
//            if ($rres = mysqli_fetch_array($rqry)){
//                $pin = $this->generateRandomString(1).$random_digit=rand(0000,9999);
//            }

            $allpin =$pin.$pin.',';

            $qry=mysqli_query($this->conn,"INSERT INTO `distributor_pin`(`userid`, `pin`, `status`) VALUES ('','$pin','Inactive')");
        }
        echo json_encode(array("res" => 1));
    }

    function validatePIN(){
        if(isset($_POST['pin']) && !empty($_POST['pin']))
        {
            $pin = mysqli_real_escape_string($this->conn,$_POST['pin']);
        }

            $rqry = mysqli_query($this->conn,"select pin from distributor_pin where pin='$pin' and status='Inactive'");
            if ($rres = mysqli_fetch_array($rqry)){
                echo json_encode(array("res" => 0));
            }
            else{
                echo json_encode(array("res" => 1));
            }
    }

    function getProduct(){
        $product = '';
        $pqry = mysqli_query($this->conn,"select * from products");
        while ($presult = mysqli_fetch_array($pqry)){
            $product = $product.'<div class="col-md-3 col-sm-6">
                                        <div class="card">
                                            <img src="backend/products/'.$presult['product_image'].'" alt="'.$presult['product_name'].'" style="width:100%;height: 300px;">
                                            <h3 style="color: #3dbf2b;font-size: 20px;letter-spacing: 1px;font-weight: lighter;font-family: initial;min-height: 45px;">'.$presult['product_name'].'</h3>
                                            <p class="price" style="font-family: initial;">MRP RS '.$presult['mrp'].' | <abbr title="After discount coupon
 price">ADCP</abbr> RS '.$presult['dp'].' </p>
                                            <p class="price" style="font-family: initial;"> BV '.$presult['bv'].' </p>
                                            
                                            <p class="price" style="font-family: initial;">
                                            <span onclick="decreaseCartQty('.$presult['slno'].');" style="float: left;font-size: 26px;color: #d55031;padding: 0 6px;width: 30%;"><i class="fa fa-minus-circle"></i></span>
                                            <span style="float: left;width: 40%;"><input onkeypress="return onlyNumberKey(event)" type="text" class="form-control" id="distributor-shopping-qty'.$presult['slno'].'" value="1" style="text-align: center;"></span>
                                            <span onclick="increaseCartQty('.$presult['slno'].');" style="font-size: 26px;color: #d55031;padding: 0 6px;width: 30%;"><i class="fa fa-plus-circle"></i></span>
                                            </p>
                                          <div class="linear-wipe"><h1 style="font-size: 18px;font-weight: bold;">Cashback : 50%</h1></div>
                                            <p><button type="button" onclick="addToCart('.$presult['slno'].');">Add to Cart</button></p>
                                        </div>
                                    </div>';
        }
        echo json_encode(array("res" => 1,'prod'=>$product));
    }

    function getProductByCat(){
        $subcat = '';
        $cat = '';
        if(isset($_POST['cat']) && !empty($_POST['cat']))
        {
            $cat = $_POST['cat'];
        }
        if(isset($_POST['subcat']) && !empty($_POST['subcat']))
        {
            $subcat = $_POST['subcat'];
        }
        $product = '';
        if ($cat == 'all'){
            $pqry = mysqli_query($this->conn,"select * from products");
        }else{
            if ($subcat != ""){
                $pqry = mysqli_query($this->conn,"select * from products where category='$cat' and sub_category='$subcat'");
            }
            else{
                $pqry = mysqli_query($this->conn,"select * from products where category='$cat'");
            }
        }
        while ($presult = mysqli_fetch_array($pqry)){
            $product = $product.'<div class="col-md-3 col-sm-6">
                                        <div class="card">
                                            <img src="backend/products/'.$presult['product_image'].'" alt="'.$presult['product_name'].'" style="width:100%;height: 300px;">
                                            <h3 style="color: #3dbf2b;font-size: 20px;letter-spacing: 1px;font-weight: lighter;font-family: initial;min-height: 45px;">'.$presult['product_name'].'</h3>
                                            <p class="price" style="font-family: initial;">MRP RS '.$presult['mrp'].' | <abbr title="After discount coupon
 price">ADCP</abbr> RS '.$presult['dp'].' </p>
                                            <p class="price" style="font-family: initial;"> BV '.$presult['bv'].' </p>
                                            
                                            <p class="price" style="font-family: initial;">
                                            <span onclick="decreaseCartQty('.$presult['slno'].');" style="float: left;font-size: 26px;color: #d55031;padding: 0 6px;width: 30%;"><i class="fa fa-minus-circle"></i></span>
                                            <span style="float: left;width: 40%;"><input onkeypress="return onlyNumberKey(event)" type="text" class="form-control" id="distributor-shopping-qty'.$presult['slno'].'" value="1" style="text-align: center;"></span>
                                            <span onclick="increaseCartQty('.$presult['slno'].');" style="font-size: 26px;color: #d55031;padding: 0 6px;width: 30%;"><i class="fa fa-plus-circle"></i></span>
                                            </p>
                                          <div class="linear-wipe"><h1 style="font-size: 18px;font-weight: bold;">Cashback : 50%</h1></div>
                                            <p><button type="button" onclick="addToCart('.$presult['slno'].');">Add to Cart</button></p>
                                        </div>
                                    </div>';
        }
        echo json_encode(array("res" => 1,'prod'=>$product));
    }

    function addToCart(){
        if(isset($_POST['pid']) && !empty($_POST['pid']))
        {
            $pid = $_POST['pid'];
        }
        if(isset($_POST['qty']) && !empty($_POST['qty']))
        {
            $qty = $_POST['qty'];
        }
        if(isset($_POST['uid']) && !empty($_POST['uid']))
        {
            $uid = $_POST['uid'];
        }

        if(isset($_POST['usertype']) && !empty($_POST['usertype']))
        {
            $usertype = $_POST['usertype'];
        }
        $cartCheck = mysqli_query($this->conn,"SELECT `product_code`,COUNT(*) as count FROM `cart` WHERE userid='$uid' and product_code='$pid' AND usertype='$usertype' and status='cart'");
        $cartCheck_result = mysqli_fetch_assoc($cartCheck);
        if ($cartCheck_result['count'] > 0){
            echo json_encode(array("res" => 2));
            return;
        }

        $qry = mysqli_query($this->conn,"INSERT INTO `cart`(`userid`,`product_code`, `quantity`, `status`, `usertype`) VALUES ('$uid','$pid','$qty','cart','$usertype')");

        if ($qry>0){
            echo json_encode(array("res" => 1));
        }
    }

    function bsAuthentication()
    {

        $mobile = mysqli_real_escape_string($this->conn,$_POST['mobile']);
        $email = mysqli_real_escape_string($this->conn,$_POST['email']);
        $aadhar = mysqli_real_escape_string($this->conn,$_POST['aadhar']);
        $pan = mysqli_real_escape_string($this->conn,$_POST['pan']);

        $isBSPhone=0;
        $isBSEmail=0;
        $isBSAdhar=0;
        $isBSPan=0;

        $qry_email = mysqli_query($this->conn, "SELECT email FROM bigshoppee_info where email='$email'");
        if ($res_email = mysqli_fetch_array($qry_email)) {
            if ($res_email['email'] != '')
            {
                $isBSEmail = 1;
            }
            else{
                $isBSEmail = 0;
            }
        }
        $qry_phone = mysqli_query($this->conn, "SELECT mobile_no FROM bigshoppee_info where mobile_no='$mobile'");
        if ($res_phone = mysqli_fetch_array($qry_phone)) {
            if ($res_phone['mobile_no'] != '')
            {
                $isBSPhone = 1;
            }
            else{
                $isBSPhone = 0;
            }
        }
        $qry_adhar = mysqli_query($this->conn, "SELECT aadhar FROM bigshoppee_info where aadhar='$aadhar'");
        if ($res_adhar = mysqli_fetch_array($qry_adhar)) {
            if ($res_adhar['aadhar'] != '')
            {
                $isBSAdhar = 1;
            }
            else{
                $isBSAdhar = 0;
            }
        }
        $qry_pan = mysqli_query($this->conn, "SELECT pan FROM bigshoppee_info where pan='$pan'");
        if ($res_pan = mysqli_fetch_array($qry_pan)) {
            if ($res_pan['pan'] != '')
            {
                $isBSPan = 1;
            }
            else{
                $isBSPan = 0;
            }
        }

        echo json_encode(array("res" => 1, "email"=>$isBSEmail,"phone"=>$isBSPhone,"aadhar"=>$isBSAdhar,"pan"=>$isBSPan));
    }

    function addBigShoppee(){
        $owner = mysqli_real_escape_string($this->conn,$_POST['owner']);
        $homeshop = mysqli_real_escape_string($this->conn,$_POST['homeshop']);
        $mobile = mysqli_real_escape_string($this->conn,$_POST['mobile']);
        $email = mysqli_real_escape_string($this->conn,$_POST['email']);
        $aadhar = mysqli_real_escape_string($this->conn,$_POST['aadhar']);
        $pan = mysqli_real_escape_string($this->conn,$_POST['pan']);
        $address = mysqli_real_escape_string($this->conn,$_POST['address']);
        $bank = mysqli_real_escape_string($this->conn,$_POST['bank']);
        $branch = mysqli_real_escape_string($this->conn,$_POST['branch']);
        $accNo = mysqli_real_escape_string($this->conn,$_POST['accNo']);
        $ifsc = mysqli_real_escape_string($this->conn,$_POST['ifsc']);

        $lastuid = '';
        $qry = mysqli_query($this->conn, "SELECT MAX(username) as username FROM `userlogin`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastuid = $res['username'];
        }

        $last = (int) filter_var($lastuid, FILTER_SANITIZE_NUMBER_INT);
        $username_digit = $last + 1;
        $username = 'BFITO'.$username_digit;

        mysqli_query($this->conn,"INSERT INTO `bigshoppee_info`(`username`, `owner_name`, `homeshop_name`, `mobile_no`, `email`, `aadhar`, `pan`, `address`, `bank_name`, `accNo`, `bank_branch`, `ifsc`, `date`) VALUES ('$username','$owner','$homeshop','$mobile','$email','$aadhar','$pan','$address','$bank','$accNo','$branch','$ifsc',NOW())");

        mysqli_query($this->conn,"insert into userlogin (`username`, `password`, `displayname`, `usertype`) values('$username','FITO999','$owner','bigshoppee')");

        echo json_encode(array("res" => 1, "det"=>"Registration Success <br> User ID : ".$username."<br> Password : FITO999 <br>"));

        // Sending email
        $subject = 'FITOHM Registration Details';
        $headers = "MIME-Version: 1.0" . "\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\n";

        $htmlContent = ' 
    <html> 
    <head> 
        <title></title> 
    </head> 
    <body> 
        <h1>Your login credential are as </h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Username :</th><td>'.$username.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Password :</th><td>FITO999</td> 
            </tr> 
        </table> 
    </body> 
    </html>';

// send email HTML
//        if(mail($email, $subject, $htmlContent, $headers)){
//            echo 'Your mail has been sent successfully.';
//        } else{
//            echo 'Unable to send email. Please try again.';
//        }


    }

    function deleteBigshoppee()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }

        $res1=mysqli_query($this->conn,"DELETE FROM bigshoppee_info WHERE slno=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
            echo 2;
        }
    }

    function getBigshoppeeForUpdate()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid = mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $qry = mysqli_query($this->conn, "SELECT * FROM bigshoppee_info where slno='$postid'");
        while ($res = mysqli_fetch_array($qry)) {
            $owner = $res["owner_name"];
            $username = $res["username"];
            $homeshop = $res["homeshop_name"];
            $mobile_no = $res["mobile_no"];
            $email = $res["email"];
            $aadhar = $res["aadhar"];
            $pan = $res["pan"];
            $address = $res["address"];
            $bank_name = $res["bank_name"];
            $accNo = $res["accNo"];
            $bank_branch = $res["bank_branch"];
            $ifsc = $res["ifsc"];
            $date = $res["date"];

            echo json_encode(array("res" => 1, "owner"=>$owner,"username"=>$username, "homeshop "=>$homeshop , "mobile_no"=>$mobile_no,"email"=>$email, "aadhar"=>$aadhar, "pan"=>$pan, "address"=>$address));
        }
    }

    function updateBigshoppee(){
        $homeshop = mysqli_real_escape_string($this->conn,$_POST['homeshop']);
        $mobile = mysqli_real_escape_string($this->conn,$_POST['mobile']);
        $address = mysqli_real_escape_string($this->conn,$_POST['address']);
        $username= mysqli_real_escape_string($this->conn,$_POST['username']);


        mysqli_query($this->conn,"update bigshoppee_info set homeshop_name='$homeshop', mobile_no='$mobile', address='$address' where username='$username'");


        echo json_encode(array("res" => 1,"qry"=>"update bigshoppee_info set homeshop_name='$homeshop', mobile_no='$mobile', address='$address' where username='$username'"));

    }

    function addHomeShoppee(){
        $owner = mysqli_real_escape_string($this->conn,$_POST['owner']);
        $homeshop = mysqli_real_escape_string($this->conn,$_POST['homeshop']);
        $mobile = mysqli_real_escape_string($this->conn,$_POST['mobile']);
        $email = mysqli_real_escape_string($this->conn,$_POST['email']);
        $aadhar = mysqli_real_escape_string($this->conn,$_POST['aadhar']);
        $pan = mysqli_real_escape_string($this->conn,$_POST['pan']);
        $address = mysqli_real_escape_string($this->conn,$_POST['address']);
        $bank = mysqli_real_escape_string($this->conn,$_POST['bank']);
        $branch = mysqli_real_escape_string($this->conn,$_POST['branch']);
        $accNo = mysqli_real_escape_string($this->conn,$_POST['accNo']);
        $ifsc = mysqli_real_escape_string($this->conn,$_POST['ifsc']);

        $lastuid = '';
        $qry = mysqli_query($this->conn, "SELECT MAX(username) as username FROM `userlogin`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastuid = $res['username'];
        }

        $last = (int) filter_var($lastuid, FILTER_SANITIZE_NUMBER_INT);
        $username_digit = $last + 1;
        $username = 'HFITO'.$username_digit;

        mysqli_query($this->conn,"INSERT INTO `homeshoppee_info`(`username`, `owner_name`, `homeshop_name`, `mobile_no`, `email`, `aadhar`, `pan`, `address`, `bank_name`, `accNo`, `bank_branch`, `ifsc`, `date`) VALUES ('$username','$owner','$homeshop','$mobile','$email','$aadhar','$pan','$address','$bank','$accNo','$branch','$ifsc',NOW())");

        mysqli_query($this->conn,"insert into userlogin (`username`, `password`, `displayname`, `usertype`) values('$username','FITO999','$owner','homeshoppee')");

        echo json_encode(array("res" => 1, "det"=>"Registration Success <br> User ID : ".$username."<br> Password : FITO999 <br>"));

        // Sending email
        $subject = 'FITOHM Registration Details';
        $headers = "MIME-Version: 1.0" . "\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\n";

        $htmlContent = ' 
    <html> 
    <head> 
        <title></title> 
    </head> 
    <body> 
        <h1>Your login credential are as </h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Username :</th><td>'.$username.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Password :</th><td>FITO999</td> 
            </tr> 
        </table> 
    </body> 
    </html>';

// send email HTML
//        if(mail($email, $subject, $htmlContent, $headers)){
//            echo 'Your mail has been sent successfully.';
//        } else{
//            echo 'Unable to send email. Please try again.';
//        }


    }

    function deleteHomeshoppee()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }

        $res1=mysqli_query($this->conn,"DELETE FROM homeshoppee_info WHERE slno=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
            echo 2;
        }
    }

    function getHomeshoppeeForUpdate()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid = mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $qry = mysqli_query($this->conn, "SELECT * FROM homeshoppee_info where slno='$postid'");
        while ($res = mysqli_fetch_array($qry)) {
            $owner = $res["owner_name"];
            $username = $res["username"];
            $homeshop = $res["homeshop_name"];
            $mobile_no = $res["mobile_no"];
            $email = $res["email"];
            $aadhar = $res["aadhar"];
            $pan = $res["pan"];
            $address = $res["address"];
            $bank_name = $res["bank_name"];
            $accNo = $res["accNo"];
            $bank_branch = $res["bank_branch"];
            $ifsc = $res["ifsc"];
            $date = $res["date"];
            $status = $res["status"];

            echo json_encode(array("res" => 1, "owner"=>$owner,"username"=>$username, "homeshop "=>$homeshop , "mobile_no"=>$mobile_no,"email"=>$email, "aadhar"=>$aadhar, "pan"=>$pan, "address"=>$address,"status"=>$status));
        }
    }

    function updateHomeshoppee(){
        $homeshop = mysqli_real_escape_string($this->conn,$_POST['homeshop']);
        $mobile = mysqli_real_escape_string($this->conn,$_POST['mobile']);
        $address = mysqli_real_escape_string($this->conn,$_POST['address']);
        $username= mysqli_real_escape_string($this->conn,$_POST['username']);


        mysqli_query($this->conn,"update homeshoppee_info set homeshop_name='$homeshop', mobile_no='$mobile', address='$address' where username='$username'");


        echo json_encode(array("res" => 1,"qry"=>"update homeshoppee_info set homeshop_name='$homeshop', mobile_no='$mobile', address='$address' where username='$username'"));

    }

    function updateHomeshoppeeStatus(){
        $postid = mysqli_real_escape_string($this->conn,$_POST['postid']);
        $selectedStatus = mysqli_real_escape_string($this->conn,$_POST['selectedStatus']);


        mysqli_query($this->conn,"update homeshoppee_info set status='$selectedStatus' where slno='$postid'");


        echo json_encode(array("res" => 1));

    }

    function distorder(){
        $orders = '';
        $date=date('Y-m-d H:i:s');
        $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        $usertype = mysqli_real_escape_string($this->conn,$_POST['usertype']);

        $ord_qry = mysqli_query($this->conn,"SELECT * FROM `cart` WHERE `userid`='$uid' and status='cart'");
         while ($ord_res = mysqli_fetch_array($ord_qry)){
             $code=$ord_res['product_code'];

             $prod_qry = mysqli_query($this->conn,"select mrp from products where slno='$code'");{
                 if ($prod_res = mysqli_fetch_array($prod_qry)){
                     $price=$prod_res['mrp'];
                 }
             }
             $quantity = $ord_res['quantity'];
             $subtotal = $price*$quantity;

            $orders = mysqli_query($this->conn,"INSERT INTO `orders`(`userid`, `product_code`, `quantity`, `usertype`, `date`, `price`) VALUES ('$uid','$code','$quantity','$usertype','$date','$price')");
         }
        if ($orders>0){
            mysqli_query($this->conn,"update cart set status='ordered' where userid='$uid'");
            echo json_encode(array("res" => 1));
        }

    }

    function distorderByHome(){
        $date=date('Y-m-d H:i:s');
        $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        $seller = mysqli_real_escape_string($this->conn,$_POST['seller']);

        $dist_mobile = '';
        $message = '';
        $totalprice ='';
        $totalmrp ='';
        $prodcount = 0;
        $distqry = mysqli_query($this->conn,"select dist_mobile from distributor_info where id='$uid'");
        if ($distres = mysqli_fetch_assoc($distqry)){
            $dist_mobile = $distres['dist_mobile'];
        }
//        echo $dist_mobile;
        $message .="Welcome to FITOHM, ";

        $bv = '';
        $pcode = '';
        $lastorderNo = '';
        $qry = mysqli_query($this->conn, "SELECT MAX(CAST(SUBSTRING(orderNo, 9) AS UNSIGNED)) as orderNo FROM `orders`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastorderNo = $res['orderNo'];
            if ($lastorderNo == ''){
                $orderNo = 'FITO00001';
            }
            else{
//                $last = (int) filter_var($lastorderNo, FILTER_SANITIZE_NUMBER_INT);
                $orderNo_digit = $lastorderNo + 1;
                $orderNo = 'FITO0000'.$orderNo_digit;
            }
        }
        $message .= " Your order No is ".$orderNo;

           $pqry = mysqli_query($this->conn,"SELECT product_code,quantity from orders where status='ordered' and userid='$uid'");
           while($pqryres = mysqli_fetch_array($pqry)){
               $pcode = $pqryres['product_code'];
               $qty= $pqryres['quantity'];

               $bqry = mysqli_query($this->conn,"SELECT bv,dp,mrp from products where slno='$pcode'");
               while($bqryres = mysqli_fetch_array($bqry)){
                   $bv = floatval($bv)+floatval($bqryres['bv'])*$pqryres['quantity'];
                   $price = floatval($bqryres['dp'])*floatval($pqryres['quantity']);
                   $mrp = floatval($bqryres['mrp'])*floatval($pqryres['quantity']);
                   $totalprice = floatval($totalprice)+floatval($price);
                   $totalmrp = floatval($totalmrp)+floatval($mrp);
                   $prodcount++;
//                   echo $bqryres['mrp'];
               }
           }
//           echo 'Total MRP : '.$totalmrp." Total DP : ".$totalprice;
//           return;
           $message .= ", you bought ".$prodcount." products of total amount Rs. ".$totalprice." and total BV is ".$bv;
        $bqry1 = mysqli_query($this->conn,"SELECT product_quantity,product_name,mrp,bv  from home_shoppee_products where slno='$pcode' and pcode='$seller'");
        if($bqryres1 = mysqli_fetch_array($bqry1)) {
            $rest_quantity = (int)$bqryres1['product_quantity'] - (int)$qty;


            if ($qty > $bqryres1['product_quantity']) {
                echo json_encode(array("res" => 2, "prodname" => $bqryres1['product_name'], "pqty" => $bqryres1['product_quantity']));
                return;
            } else {
                sendsms($dist_mobile,$message);
                mysqli_query($this->conn, "update home_shoppee_products set product_quantity='$rest_quantity' where slno='$pcode' and pcode='$seller'");

//           insert bp into distributor

                $bpchecks = mysqli_query($this->conn, "SELECT *,COUNT(*) as count FROM `distributor_bp` where userid='$uid'");
                if ($bpcheckress = mysqli_fetch_array($bpchecks)) {
//            echo $bpcheckress['count'];
                    if ($bpcheckress['count'] > 0) {
                        $cbps = floatval($bv) + floatval($bpcheckress['CBP']);
                        $tcbps = floatval($bv) + floatval($bpcheckress['TBP']);
                        //echo 'cbp :'+$cbps+' tcbp :'+$tcbps;
                        mysqli_query($this->conn, "UPDATE `distributor_bp` SET `CBP`='$cbps' WHERE userid='$uid'");
                    } else {
                        mysqli_query($this->conn, "INSERT INTO `distributor_bp`(`userid`,`CBP`) VALUES ('$uid','$bv')");
                    }

                }


//        calculation for dist tree
                $bv = floatval($bv) * 0.5;
                $level1 = (floatval($bv) * 40) / 100;
                $level2 = (floatval($bv) * 20) / 100;
                $level3 = (floatval($bv) * 10) / 100;

                $spon = '';
                $user = $uid;
                $sponlev = 1;
                for ($i = 1; $i <= 7; $i++) {
                    $lqry = mysqli_query($this->conn, "select sponsor_id from distributor_info where id='$user'");
                    if ($lqryres = mysqli_fetch_array($lqry)) {

                        if ($lqryres[0] != '') {
                            $user = $lqryres[0];
//                       $spon.$sponlev = $lqryres[0];
//                       echo 'level '.$sponlev.' = '.$user.'<br>';

                            $bpcheck = mysqli_query($this->conn, "SELECT *,COUNT(*) as count FROM `distributor_bp` where userid='$user'");
                            if ($bpcheckres = mysqli_fetch_array($bpcheck)) {
                                if ($bpcheckres['count'] > 0) {

                                    if ($sponlev == '1') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level1);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level1);
                                    } elseif ($sponlev == '2') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level2);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level2);
                                    } else {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level3);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level3);
                                    }

                                    mysqli_query($this->conn, "UPDATE `distributor_bp` SET `CGBP`='$cgbp' WHERE userid='$user'");
                                } else {
                                    if ($sponlev == '1') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level1);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level1);
                                    } elseif ($sponlev == '2') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level2);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level2);
                                    } else {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level3);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level3);
                                    }

                                    mysqli_query($this->conn, "INSERT INTO `distributor_bp`(`userid`,`CGBP`) VALUES ('$user','$cgbp')");
                                }
                            }
                        } else {
                            break;
                        }
                        $sponlev++;
                    }
                }
            }
            //           update order status
            mysqli_query($this->conn,"update orders set status='confirm',`bdate`='$date',orderNo='$orderNo',seller='$seller' where userid='$uid' and orderNo is null ");

            //update distributor wallet
            $updated_current =''; $updated_total = '';$discount = '';$cashback = '';
            $sponser_wallet = mysqli_query($this->conn,"select * from distributor_wallet where userid='$uid'");
            if ($sponser_wallet_res = mysqli_fetch_assoc($sponser_wallet)){
                $discount = floatval($totalmrp) - floatval($totalprice);
                $cashback = floatval($totalprice)/2;
                if ($discount > $cashback){
                    $difference = floatval($discount) - floatval($cashback);
                    $updated_current = floatval($sponser_wallet_res['wallet']) - floatval($difference);
                    $updated_total = floatval($sponser_wallet_res['total']) + floatval($cashback);
                }
                elseif ($cashback > $discount){
                    $difference = floatval($cashback) - floatval($discount);
                    $updated_current = floatval($sponser_wallet_res['wallet']) + floatval($difference);
                    $updated_total = floatval($sponser_wallet_res['total']) + floatval($cashback);
                }
                else{
                    $updated_current = floatval($sponser_wallet_res['wallet']);
                    $updated_total = floatval($sponser_wallet_res['total']);
                }
                mysqli_query($this->conn,"UPDATE `distributor_wallet` SET `wallet`='$updated_current',`total`='$updated_total' WHERE userid='$uid'");
            }
            else{
                $wallet =floatval($cashback)-floatval($discount);
                mysqli_query($this->conn,"insert into distributor_wallet (userid,`wallet`,total) values ('$uid','$wallet','$cashback')");
            }

            echo json_encode(array("res" => 1,"location"=>"stimulsoft/viewer.php?order=".$orderNo));
            return;
        }
        else{
            $pqry = mysqli_query($this->conn,"select product_name from products where slno='$pcode'");
            $pqryrow = mysqli_fetch_assoc($pqry);
            echo json_encode(array("res" => 3,'pname'=>$pqryrow['product_name']));
            return;
        }

    }

    function distorderByAdmin(){
        $date=date('Y-m-d H:i:s');
        $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        $seller = mysqli_real_escape_string($this->conn,$_POST['seller']);

        $dist_mobile = '';
        $message = '';
        $totalprice ='';
        $totalmrp ='';
        $prodcount = 0;
        $distqry = mysqli_query($this->conn,"select dist_mobile from distributor_info where id='$uid'");
        if ($distres = mysqli_fetch_assoc($distqry)){
            $dist_mobile = $distres['dist_mobile'];
        }
//        echo $dist_mobile;
        $message .="Welcome to FITOHM, ";

        $bv = '';
        $pcode = '';
        $lastorderNo = '';
        $qry = mysqli_query($this->conn, "SELECT MAX(CAST(SUBSTRING(orderNo, 9) AS UNSIGNED)) as orderNo FROM `orders`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastorderNo = $res['orderNo'];
            if ($lastorderNo == ''){
                $orderNo = 'FITO00001';
            }
            else{
//                $last = (int) filter_var($lastorderNo, FILTER_SANITIZE_NUMBER_INT);
                $orderNo_digit = $lastorderNo + 1;
                $orderNo = 'FITO0000'.$orderNo_digit;
            }
        }
        $message .= " Your order No is ".$orderNo;

        $pqry = mysqli_query($this->conn,"SELECT product_code,quantity from orders where status='ordered' and userid='$uid' and seller='$seller'");
        while($pqryres = mysqli_fetch_array($pqry)){
            $pcode = $pqryres['product_code'];
            $qty= $pqryres['quantity'];

            $bqry = mysqli_query($this->conn,"SELECT bv,dp,mrp from products where slno='$pcode'");
            while($bqryres = mysqli_fetch_array($bqry)){
                $bv = floatval($bv)+floatval($bqryres['bv'])*$pqryres['quantity'];
                $price = floatval($bqryres['dp'])*floatval($pqryres['quantity']);
                $mrp = floatval($bqryres['mrp'])*floatval($pqryres['quantity']);
                $totalprice = floatval($totalprice)+floatval($price);
                $totalmrp = floatval($totalmrp)+floatval($mrp);
                $prodcount++;
//                   echo $bqryres['mrp'];
            }
        }
//           echo 'Total MRP : '.$totalmrp." Total DP : ".$totalprice;
//           return;
        $message .= ", you bought ".$prodcount." products of total amount Rs. ".$totalprice." and total BV is ".$bv;
        $bqry1 = mysqli_query($this->conn,"SELECT product_quantity,product_name,mrp,bv  from products where slno='$pcode'");
        if($bqryres1 = mysqli_fetch_array($bqry1)) {
            $rest_quantity = (int)$bqryres1['product_quantity'] - (int)$qty;


            if ($qty > $bqryres1['product_quantity']) {
                echo json_encode(array("res" => 2, "prodname" => $bqryres1['product_name'], "pqty" => $bqryres1['product_quantity']));
                return;
            } else {
                sendsms($dist_mobile,$message);
                 mysqli_query($this->conn, "update products set product_quantity='$rest_quantity' where slno='$pcode'");

//           insert bp into distributor

                $bpchecks = mysqli_query($this->conn, "SELECT *,COUNT(*) as count FROM `distributor_bp` where userid='$uid'");
                if ($bpcheckress = mysqli_fetch_array($bpchecks)) {
//            echo $bpcheckress['count'];
                    if ($bpcheckress['count'] > 0) {
                        $cbps = floatval($bv) + floatval($bpcheckress['CBP']);
                        $tcbps = floatval($bv) + floatval($bpcheckress['TBP']);
                        //echo 'cbp :'+$cbps+' tcbp :'+$tcbps;
                        mysqli_query($this->conn, "UPDATE `distributor_bp` SET `CBP`='$cbps' WHERE userid='$uid'");
                    } else {
                        mysqli_query($this->conn, "INSERT INTO `distributor_bp`(`userid`,`CBP`) VALUES ('$uid','$bv')");
                    }

                }


//        calculation for dist tree
                $bv = floatval($bv) * 0.5;
                $level1 = (floatval($bv) * 40) / 100;
                $level2 = (floatval($bv) * 20) / 100;
                $level3 = (floatval($bv) * 10) / 100;

                $spon = '';
                $user = $uid;
                $sponlev = 1;
                for ($i = 1; $i <= 7; $i++) {
                    $lqry = mysqli_query($this->conn, "select sponsor_id from distributor_info where id='$user'");
                    if ($lqryres = mysqli_fetch_array($lqry)) {

                        if ($lqryres[0] != '') {
                            $user = $lqryres[0];
//                       $spon.$sponlev = $lqryres[0];
//                       echo 'level '.$sponlev.' = '.$user.'<br>';

                            $bpcheck = mysqli_query($this->conn, "SELECT *,COUNT(*) as count FROM `distributor_bp` where userid='$user'");
                            if ($bpcheckres = mysqli_fetch_array($bpcheck)) {
                                if ($bpcheckres['count'] > 0) {

                                    if ($sponlev == '1') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level1);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level1);
                                    } elseif ($sponlev == '2') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level2);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level2);
                                    } else {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level3);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level3);
                                    }

                                    mysqli_query($this->conn, "UPDATE `distributor_bp` SET `CGBP`='$cgbp' WHERE userid='$user'");
                                } else {
                                    if ($sponlev == '1') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level1);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level1);
                                    } elseif ($sponlev == '2') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level2);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level2);
                                    } else {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level3);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level3);
                                    }

                                    mysqli_query($this->conn, "INSERT INTO `distributor_bp`(`userid`,`CGBP`) VALUES ('$user','$cgbp')");
                                }
                            }
                        } else {
                            break;
                        }
                        $sponlev++;
                    }
                }
            }
            //           update order status
             mysqli_query($this->conn,"update orders set status='confirm',`bdate`='$date',orderNo='$orderNo',seller='$seller' where userid='$uid' and orderNo is null ");

            //update distributor wallet
            $updated_current =''; $updated_total = '';$discount = '';$cashback = '';
            $sponser_wallet = mysqli_query($this->conn,"select * from distributor_wallet where userid='$uid'");
            if ($sponser_wallet_res = mysqli_fetch_assoc($sponser_wallet)){
                $discount = floatval($totalmrp) - floatval($totalprice);
                $cashback = floatval($totalprice)/2;
                if ($discount > $cashback){
                    $difference = floatval($discount) - floatval($cashback);
                    $updated_current = floatval($sponser_wallet_res['wallet']) - floatval($difference);
                    $updated_total = floatval($sponser_wallet_res['total']) + floatval($cashback);
                }
                elseif ($cashback > $discount){
                    $difference = floatval($cashback) - floatval($discount);
                    $updated_current = floatval($sponser_wallet_res['wallet']) + floatval($difference);
                    $updated_total = floatval($sponser_wallet_res['total']) + floatval($cashback);
                }
                else{
                    $updated_current = floatval($sponser_wallet_res['wallet']);
                    $updated_total = floatval($sponser_wallet_res['total']);
                }
                mysqli_query($this->conn,"UPDATE `distributor_wallet` SET `wallet`='$updated_current',`total`='$updated_total' WHERE userid='$uid'");
            }
            else{
                $wallet =floatval($cashback)-floatval($discount);
                mysqli_query($this->conn,"insert into distributor_wallet (userid,`wallet`,total) values ('$uid','$wallet','$cashback')");
            }

            echo json_encode(array("res" => 1,"location"=>"stimulsoft/viewer.php?order=".$orderNo));
            return;
        }
        else{
            $pqry = mysqli_query($this->conn,"select product_name from products where slno='$pcode'");
            $pqryrow = mysqli_fetch_assoc($pqry);
            echo json_encode(array("res" => 3,'pname'=>$pqryrow['product_name']));
            return;
        }

    }

    function deleteCart()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM cart WHERE slno=".$postid);
        if($res1>0)
        {
            echo 1;
        }
        else
        {
            echo 2;
        }
    }

    function deleteOrder()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1=mysqli_query($this->conn,"DELETE FROM cart WHERE slno=".$postid);
        $res2=mysqli_query($this->conn,"DELETE FROM orders WHERE slno=".$postid);
        if($res1>0)
        {
            echo 1;
        }
        else
        {
            echo 2;
        }
    }

    function bigorderByAdmin(){
        $date=date('Y-m-d H:i:s');
        $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        $seller = mysqli_real_escape_string($this->conn,$_POST['seller']);

        $uidcheck = mysqli_query($this->conn,"select usertype from userlogin where username='$uid'");
        if ($uidcheck_res = mysqli_fetch_assoc($uidcheck)){
            $type = $uidcheck_res['usertype'];
            
            if($type == 'homeshoppee'){
                $home_mobile = '';
        $message = '';
        $totalprice = '';

        $bigqry = mysqli_query($this->conn,"select mobile_no from homeshoppee_info where username='$uid'");
        if ($bigres = mysqli_fetch_assoc($bigqry)){
            $home_mobile = $bigres['mobile_no'];
        }

        $qry = mysqli_query($this->conn, "SELECT MAX(CAST(SUBSTRING(orderNo, 9) AS UNSIGNED)) as orderNo FROM `orders`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastorderNo = $res['orderNo'];
            if ($lastorderNo == ''){
                $orderNo = 'FITO00001';
            }
            else{
//                $last = (int) filter_var($lastorderNo, FILTER_SANITIZE_NUMBER_INT);
                $orderNo_digit = $lastorderNo + 1;
                $orderNo = 'FITO0000'.$orderNo_digit;
            }
        }
        $message .="Welcome to FITOHM, Your order no is ".$orderNo;
        $bv = '';
        $totalbv = '';
        $prodcount =0;
        $pqry = mysqli_query($this->conn,"SELECT product_code,quantity from orders where status='ordered' and userid='$uid'");
        while($pqryres = mysqli_fetch_array($pqry)){
            $pcode = $pqryres['product_code'];
            $qty = $pqryres['quantity'];

            $bqry = mysqli_query($this->conn,"SELECT bv,dp from products where slno='$pcode'");
            while($bqryres = mysqli_fetch_array($bqry)){
                $bv = floatval($bqryres['bv'])*$pqryres['quantity'];
                $price = floatval($bqryres['dp'])*floatval($pqryres['quantity']);
//                   echo $bqryres['mrp'];
                $prodcount++;
            }
            $totalbv = floatval($totalbv)+floatval($bv);
            $totalprice = floatval($totalprice)+floatval($price);


            $bqry = mysqli_query($this->conn,"SELECT * from products where slno='$pcode'");
            while($bqryres = mysqli_fetch_array($bqry)){
                $pcode = $bqryres['slno'];
                $product_code = $bqryres['product_code'];
                $product_name = $bqryres['product_name'];
                $category = $bqryres['category'];
                $product_desc = $bqryres['product_desc'];
                $hsncode = $bqryres['hsncode'];
                $mrp = $bqryres['mrp'];
                $dp = $bqryres['dp'];
                $bv = $bqryres['bv'];
                $bsper = $bqryres['bsper'];
                $hsper = $bqryres['hsper'];
                $gst = $bqryres['gst'];
                $addeddate = $bqryres['addeddate'];
                $product_image = $bqryres['product_image'];
                $quantity = $bqryres['product_quantity'];
                $rest_quantity = (int)$bqryres['product_quantity']-(int)$qty;
                $inc_quantity = (int)$bqryres['product_quantity']+(int)$qty;


//                insert product for bigshoppee
                if ($qty > $bqryres['product_quantity']){
                    echo json_encode(array("res" => 2,"prodname"=>$product_name,"pqty"=>$quantity));
                    return;
                }
                else{
                    $bqry1 = mysqli_query($this->conn,"SELECT product_quantity from home_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)) {
                        $inc_quantity = (int)$bqryres1['product_quantity'] + (int)$qty;
                    }
                    $bqry1 = mysqli_query($this->conn,"SELECT slno from home_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)){
                        mysqli_query($this->conn,"update home_shoppee_products set product_quantity='$inc_quantity' where slno='$pcode' and pcode='$uid'");
                    }
                    else{
                        mysqli_query($this->conn,"INSERT INTO `home_shoppee_products`(`slno`,`pcode`, `product_code`, `product_name`, `category`, `product_desc`, `hsncode`, `mrp`, `dp`, `bv`, `bsper`, `hsper`, `gst`, `product_image`,`product_quantity`) VALUES ('$pcode','$uid','$product_code','$product_name','$category','$product_desc','$hsncode','$mrp','$dp','$bv','$bsper','$hsper','$gst','$product_image','$qty')");
                    }

//                update product quantity
                    mysqli_query($this->conn,"update products set product_quantity='$rest_quantity' where slno='$pcode'");

                }
                }


        }

        $message .= ", You bought ".$prodcount." products of total amount Rs. ".$totalprice." and total BV is ".$totalbv;
        //sendsms($home_mobile,$message);

        mysqli_query($this->conn,"update orders set status='confirm',`bdate`='$date',orderNo='$orderNo',seller='$seller' where userid='$uid' and orderNo is null ");

        echo json_encode(array("res" => 1,"location"=>"billg.php?order=".$orderNo));
                return;
            }
            else if($type == 'bigshoppee'){
                $big_mobile = '';
        $message = '';
        $totalprice = '';

        $bigqry = mysqli_query($this->conn,"select mobile_no from bigshoppee_info where username='$uid'");
        if ($bigres = mysqli_fetch_assoc($bigqry)){
            $big_mobile = $bigres['mobile_no'];
        }

        $qry = mysqli_query($this->conn, "SELECT MAX(CAST(SUBSTRING(orderNo, 9) AS UNSIGNED)) as orderNo FROM `orders`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastorderNo = $res['orderNo'];
            if ($lastorderNo == ''){
                $orderNo = 'FITO00001';
            }
            else{
//                $last = (int) filter_var($lastorderNo, FILTER_SANITIZE_NUMBER_INT);
                $orderNo_digit = $lastorderNo + 1;
                $orderNo = 'FITO0000'.$orderNo_digit;
            }
        }
        $message .="Welcome to FITOHM, Your order no is ".$orderNo;
        $bv = '';
        $totalbv = '';
        $prodcount =0;
        $pqry = mysqli_query($this->conn,"SELECT product_code,quantity from orders where status='ordered' and userid='$uid'");
        while($pqryres = mysqli_fetch_array($pqry)){
            $pcode = $pqryres['product_code'];
            $qty = $pqryres['quantity'];

            $bqry = mysqli_query($this->conn,"SELECT bv,dp from products where slno='$pcode'");
            while($bqryres = mysqli_fetch_array($bqry)){
                $bv = floatval($bqryres['bv'])*$pqryres['quantity'];
                $price = floatval($bqryres['dp'])*floatval($pqryres['quantity']);
//                   echo $bqryres['mrp'];
                $prodcount++;
            }
            $totalbv = floatval($totalbv)+floatval($bv);
            $totalprice = floatval($totalprice)+floatval($price);


            $bqry = mysqli_query($this->conn,"SELECT * from products where slno='$pcode'");
            while($bqryres = mysqli_fetch_array($bqry)){
                $pcode = $bqryres['slno'];
                $product_code = $bqryres['product_code'];
                $product_name = $bqryres['product_name'];
                $category = $bqryres['category'];
                $product_desc = $bqryres['product_desc'];
                $hsncode = $bqryres['hsncode'];
                $mrp = $bqryres['mrp'];
                $dp = $bqryres['dp'];
                $bv = $bqryres['bv'];
                $bsper = $bqryres['bsper'];
                $hsper = $bqryres['hsper'];
                $gst = $bqryres['gst'];
                $addeddate = $bqryres['addeddate'];
                $product_image = $bqryres['product_image'];
                $quantity = $bqryres['product_quantity'];
                $rest_quantity = (int)$bqryres['product_quantity']-(int)$qty;
                $inc_quantity = (int)$bqryres['product_quantity']+(int)$qty;


//                insert product for bigshoppee
                if ($qty > $bqryres['product_quantity']){
                    echo json_encode(array("res" => 2,"prodname"=>$product_name,"pqty"=>$quantity));
                    return;
                }
                else{
                    $bqry1 = mysqli_query($this->conn,"SELECT product_quantity from big_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)) {
                        $inc_quantity = (int)$bqryres1['product_quantity'] + (int)$qty;
                    }
                    $bqry1 = mysqli_query($this->conn,"SELECT slno from big_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)){
                        mysqli_query($this->conn,"update big_shoppee_products set product_quantity='$inc_quantity' where slno='$pcode' and pcode='$uid'");
                    }
                    else{
                        mysqli_query($this->conn,"INSERT INTO `big_shoppee_products`(`slno`,`pcode`, `product_code`, `product_name`, `category`, `product_desc`, `hsncode`, `mrp`, `dp`, `bv`, `bsper`, `hsper`, `gst`, `product_image`,`product_quantity`) VALUES ('$pcode','$uid','$product_code','$product_name','$category','$product_desc','$hsncode','$mrp','$dp','$bv','$bsper','$hsper','$gst','$product_image','$qty')");
                    }

//                update product quantity
                    mysqli_query($this->conn,"update products set product_quantity='$rest_quantity' where slno='$pcode'");

                }
                }


        }

        $message .= ", You bought ".$prodcount." products of total amount Rs. ".$totalprice." and total BV is ".$totalbv;
        sendsms($big_mobile,$message);

        mysqli_query($this->conn,"update orders set status='confirm',`bdate`='$date',orderNo='$orderNo',seller='$seller' where userid='$uid' and orderNo is null ");

        echo json_encode(array("res" => 1,"location"=>"billg.php?order=".$orderNo));
                return;
            }
            else{
                return;
            }
        }

        
    }

    function getBigProduct(){
        $product = '';
        $pqry = mysqli_query($this->conn,"select * from big_shoppee_products");
        while ($presult = mysqli_fetch_array($pqry)){
            $product = $product.'<div class="col-md-3 col-sm-6">
                                        <div class="card">
                                            <img src="backend/products/'.$presult['product_image'].'" alt="'.$presult['product_name'].'" style="width:100%">
                                            <h3 style="color: #3dbf2b;font-size: 20px;letter-spacing: 1px;font-weight: lighter;font-family: initial;min-height: 45px;">'.$presult['product_name'].'</h3>
                                            <p class="price" style="font-family: initial;">MRP RS '.$presult['mrp'].' | DP RS '.$presult['dp'].' </p>
                                            <p class="price" style="font-family: initial;"> BV '.$presult['bv'].' </p>
                                            
                                            <p class="price" style="font-family: initial;">
                                            <span onclick="decreaseCartQty('.$presult['slno'].');" style="float: left;font-size: 26px;color: #d55031;padding: 0 6px;width: 30%;"><i class="fa fa-minus-circle"></i></span>
                                            <span style="float: left;width: 40%;"><input onkeypress="return onlyNumberKey(event)" type="text" class="form-control" id="distributor-shopping-qty'.$presult['slno'].'" value="1" style="text-align: center;" disabled></span>
                                            <span onclick="increaseCartQty('.$presult['slno'].');" style="font-size: 26px;color: #d55031;padding: 0 6px;width: 30%;"><i class="fa fa-plus-circle"></i></span>
                                            </p>
                                          
                                            <p><button type="button" onclick="addToCart('.$presult['slno'].');">Add to Cart</button></p>
                                        </div>
                                    </div>';
        }
        echo json_encode(array("res" => 1,'prod'=>$product));
    }

    function HomeorderByBig(){
        $date=date('Y-m-d H:i:s');
        $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        $seller = mysqli_real_escape_string($this->conn,$_POST['seller']);

        $home_mobile = '';
        $message = '';
        $totalprice = '';

        $homeqry = mysqli_query($this->conn,"select mobile_no from homeshoppee_info where username='$uid'");
        if ($homeres = mysqli_fetch_assoc($homeqry)){
            $home_mobile = $homeres['mobile_no'];
        }

        $qry = mysqli_query($this->conn, "SELECT MAX(CAST(SUBSTRING(orderNo, 9) AS UNSIGNED)) as orderNo FROM `orders`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastorderNo = $res['orderNo'];
            if ($lastorderNo == ''){
                $orderNo = 'FITO00001';
            }
            else{
//                $last = (int) filter_var($lastorderNo, FILTER_SANITIZE_NUMBER_INT);
                $orderNo_digit = $lastorderNo + 1;
                $orderNo = 'FITO0000'.$orderNo_digit;
            }
        }
        $message .="Welcome to FITOHM, Your order no is ".$orderNo;
        $bv = '';
        $totalbv = '';
        $prodcount =0;
        $pqry = mysqli_query($this->conn,"SELECT product_code,quantity from orders where status='ordered' and userid='$uid' ans seller='$seller'");
        while($pqryres = mysqli_fetch_array($pqry)){
            $pcode = $pqryres['product_code'];
            $qty = $pqryres['quantity'];

            $bqry = mysqli_query($this->conn,"SELECT bv,dp from products where slno='$pcode'");
            while($bqryres = mysqli_fetch_array($bqry)){
                $bv = floatval($bqryres['bv'])*$pqryres['quantity'];
                $price = floatval($bqryres['dp'])*floatval($pqryres['quantity']);
//                   echo $bqryres['mrp'];
                $prodcount++;
            }
            $totalbv = floatval($totalbv)+floatval($bv);
            $totalprice = floatval($totalprice)+floatval($price);




            $bqry = mysqli_query($this->conn,"SELECT * from big_shoppee_products where slno='$pcode' and pcode='$seller'");
            if($bqryres = mysqli_fetch_array($bqry)){
                $pcode = $bqryres['slno'];
                $product_code = $bqryres['product_code'];
                $product_name = $bqryres['product_name'];
                $category = $bqryres['category'];
                $product_desc = $bqryres['product_desc'];
                $hsncode = $bqryres['hsncode'];
                $mrp = $bqryres['mrp'];
                $dp = $bqryres['dp'];
                $bv = $bqryres['bv'];
                $bsper = $bqryres['bsper'];
                $hsper = $bqryres['hsper'];
                $gst = $bqryres['gst'];
                $addeddate = $bqryres['addeddate'];
                $product_image = $bqryres['product_image'];
                $rest_quantity = (int)$bqryres['product_quantity'] - (int)$qty;



//                insert product for bigshoppee


                if ($qty > $bqryres['product_quantity']){
                    echo json_encode(array("res" => 2,"prodname"=>$product_name,"pqty"=>$bqryres['product_quantity']));
                    return;
                }
                else{
                    $bqry1 = mysqli_query($this->conn,"SELECT product_quantity from home_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)) {
                        $inc_quantity = (int)$bqryres1['product_quantity'] + (int)$qty;
                    }
                    $bqry1 = mysqli_query($this->conn,"SELECT slno from home_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)){
                        mysqli_query($this->conn,"update home_shoppee_products set product_quantity='$inc_quantity' where slno='$pcode' and pcode='$uid'");
                    }
                    else{
                        mysqli_query($this->conn,"INSERT INTO `home_shoppee_products`(`slno`,`pcode`, `product_code`, `product_name`, `category`, `product_desc`, `hsncode`, `mrp`, `dp`, `bv`, `bsper`, `hsper`, `gst`, `product_image`,`product_quantity`) VALUES ('$pcode','$uid','$product_code','$product_name','$category','$product_desc','$hsncode','$mrp','$dp','$bv','$bsper','$hsper','$gst','$product_image','$qty')");
                    }

//                update product quantity
                    mysqli_query($this->conn,"update big_shoppee_products set product_quantity='$rest_quantity' where slno='$pcode' and pcode='$seller'");
                }
                }
            else{
                $pqry = mysqli_query($this->conn,"select product_name from products where slno='$pcode'");
                $pqryrow = mysqli_fetch_assoc($pqry);
                echo json_encode(array("res" => 3,'pname'=>$pqryrow['product_name']));
                return;
            }
        }

        $message .= ", You bought ".$prodcount." products of total amount Rs. ".$totalprice." and total BV is ".$totalbv;
        sendsms($home_mobile,$message);
        mysqli_query($this->conn,"update orders set status='confirm',`bdate`='$date',orderNo='$orderNo',seller='$seller' where userid='$uid' and orderNo is null ");
        echo json_encode(array("res" => 1,"location"=>"billg.php?order=".$orderNo));
    }

    function generateRandomString($length) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function editDistProfile(){
//        if(isset($_POST['pin']) && !empty($_POST['pin']))
//        {
//            $pin = mysqli_real_escape_string($this->conn,$_POST['pin']);
//        }
        if(isset($_POST['uid']) && !empty($_POST['uid']))
        {
            $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        }

        $rqry = mysqli_query($this->conn,"select * from distributor_info where id='$uid'");
        if ($res = mysqli_fetch_array($rqry)){
            $id = $res['id'];
            $sponsor_id = $res['sponsor_id'];
            $dist_name = $res['dist_name'];
            $dist_mobile = $res['dist_mobile'];
            $dist_aadhar = $res['dist_aadhar'];
            $dist_pan = $res['dist_pan'];
            $dist_address = $res['dist_address'];
            $dist_email = $res['dist_email'];
            $sponsor_name = $res['sponsor_name'];
            $photo = $res['photo'];
            $bgroup = $res['bgroup'];
            $dist_accNo = $res['dist_accNo'];
            $dist_bank_name = $res['dist_bank_name'];
            $dist_bank_branch = $res['dist_bank_branch'];
            $dist_bank_ifsc = $res['dist_bank_ifsc'];
            $nominee_name = $res['nominee_name'];
            $nominee_mobile = $res['nominee_mobile'];
            $nominee_age = $res['nominee_age'];
            $nominee_relation = $res['nominee_relation'];

            echo json_encode(array("res" => 0, "id"=>$id, "sponsor_id"=>$sponsor_id,"dist_name"=>$dist_name, "dist_mobile"=>$dist_mobile, "dist_aadhar"=>$dist_aadhar,"dist_pan"=>$dist_pan, "dist_address"=>$dist_address, "dist_email"=>$dist_email, "sponsor_name"=>$sponsor_name, "photo"=>$photo, "bgroup"=>$bgroup,"dist_accNo"=>$dist_accNo,"dist_bank_name"=>$dist_bank_name,"dist_bank_branch"=>$dist_bank_branch,"dist_bank_ifsc"=>$dist_bank_ifsc,"nominee_name"=>$nominee_name,"nominee_mobile"=>$nominee_mobile,"nominee_age"=>$nominee_age,"nominee_relation"=>$nominee_relation));
        }
        else{
            echo json_encode(array("res" => 1,'qry'=>"select * from distributor_info where activation_pin='$pin' and id='$uid'"));
        }
    }

    function updateDistProfile(){
            $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
            $distPhone = mysqli_real_escape_string($this->conn,$_POST['distPhone']);
            $distEmail = mysqli_real_escape_string($this->conn,$_POST['distEmail']);
            $distAdhar = mysqli_real_escape_string($this->conn,$_POST['distAdhar']);
            $distPan = mysqli_real_escape_string($this->conn,$_POST['distPan']);
            $distName = mysqli_real_escape_string($this->conn,$_POST['distName']);
            $bgroup = mysqli_real_escape_string($this->conn,$_POST['bgroup']);
            $address = mysqli_real_escape_string($this->conn,$_POST['address']);
            $accNo = mysqli_real_escape_string($this->conn,$_POST['accNo']);
            $bname = mysqli_real_escape_string($this->conn,$_POST['bname']);
            $branch = mysqli_real_escape_string($this->conn,$_POST['branch']);
            $ifsc = mysqli_real_escape_string($this->conn,$_POST['ifsc']);
            $nomineeName = mysqli_real_escape_string($this->conn,$_POST['nomineeName']);
            $nomineeMobile = mysqli_real_escape_string($this->conn,$_POST['nomineeMobile']);
            $nomineeAge = mysqli_real_escape_string($this->conn,$_POST['nomineeAge']);
            $nomineeRelation = mysqli_real_escape_string($this->conn,$_POST['nomineeRelation']);

            mysqli_query($this->conn,"UPDATE `distributor_info` SET `dist_name`='$distName',`dist_mobile`='$distPhone',`dist_aadhar`='$distAdhar',`dist_pan`='$distPan',`dist_address`='$address',`dist_email`='$distEmail',`bgroup`='$bgroup',`dist_accNo`='$accNo',`dist_bank_name`='$bname',`dist_bank_branch`='$branch',`dist_bank_ifsc`='$ifsc',`nominee_name`='$nomineeName',`nominee_mobile`='$nomineeMobile',`nominee_age`='$nomineeAge',`nominee_relation`='$nomineeRelation' WHERE `id`='$uid'");

        mysqli_query($this->conn,"UPDATE `userlogin` SET `displayname`='$distName' WHERE `username`='$uid'");
    }

    function addToCartDistByHome(){
        if(isset($_POST['prod_code']) && !empty($_POST['prod_code']))
        {
            $prod_code = $_POST['prod_code'];
        }
        if(isset($_POST['dist_id']) && !empty($_POST['dist_id']))
        {
            $dist_id = $_POST['dist_id'];
        }
        if(isset($_POST['qty']) && !empty($_POST['qty']))
        {
            $qty = $_POST['qty'];
        }

        if(isset($_POST['seller']) && !empty($_POST['seller']))
        {
            $seller = $_POST['seller'];
        }

        //check distributor id
        $distcheck = mysqli_query($this->conn,"select * from distributor_info where id='$dist_id'");
        if ($distcheckres = mysqli_fetch_assoc($distcheck)){

        }
        else{
            echo json_encode(array("res" => 6));
            return;
        }

        //product is already added or not
        $ordcheck = mysqli_query($this->conn,"select * from orders where product_code=(select slno from products where product_code='$prod_code') and userid='$dist_id' and status='ordered' and seller='$seller'");
        if ($ordcheckres = mysqli_fetch_assoc($ordcheck)){
            echo json_encode(array("res" => 5));
            return;
        }
        //product code validation
        $prodqry = mysqli_query($this->conn,"select product_code,dp,slno from products where product_code='$prod_code'");
        if ($prodres = mysqli_fetch_assoc($prodqry)){
            $dp = $prodres['dp'];
            $slno = $prodres['slno'];
            //product availability in homeshoppee
            $homeprodqry = mysqli_query($this->conn,"select * from home_shoppee_products where product_code='$prod_code' and pcode='$seller'");
            if ($homeprodres = mysqli_fetch_assoc($homeprodqry)){
                $restqty = (int)$homeprodres['product_quantity']-(int)$qty;
                //product quantity avalability
                if ($homeprodres['product_quantity'] < $qty){
                    $hqty = $homeprodres['product_quantity'];
                    echo json_encode(array("res" => 4,"qty" => $hqty));
                }
                else{
                    //Add product now
                    $insertOrder = mysqli_query($this->conn,"INSERT INTO `orders`(`userid`, `product_code`, `quantity`, `usertype`, `date`, `price`, `status`, `seller`) VALUES ('$dist_id','$slno','$qty','dist',NOW(),'$dp','ordered','$seller')");
                    echo json_encode(array("res" => 1));
//                    if ($insertOrder){
//                        //update quantity
//                        mysqli_query($this->conn,"update home_shoppee_products set product_quantity='$restqty' where product_code='$prod_code'");
//                        echo json_encode(array("res" => 1));
//                    }
                }
            }
            else{
                echo json_encode(array("res" => 3, "qry" => "select * from home_shoppee_products where product_code='$prod_code' and pcode='$seller'"));
                return;
            }
        }
        else{
            echo json_encode(array("res" => 2));
            return;
        }
        //echo json_encode(array("res" => 1));
    }

    function getProductName(){
        $prodList = '';
        $id = 3;
        $prodqry = mysqli_query($this->conn,"select product_code,product_name from products");
        while ($prodres = mysqli_fetch_assoc($prodqry)){
            $id++;
            $prodList .='<option data-select2-id="'.$id.'" value="'.$prodres["product_code"].'">'.$prodres["product_name"].'</option>';
//            $prodList .='<option selected="selected" data-select2-id="'.$id.'">Alabama</option>';
        }
        echo json_encode(array("res" => 1,"prodlist" => $prodList));
    }

    function addcategory()
    {
        if(isset($_POST['catname']) && !empty($_POST['catname']))
        {
            $catname = mysqli_real_escape_string($this->conn,$_POST['catname']);
        }
        else
        {
            echo 0;
            return;
        }

        $res1 = mysqli_query($this->conn,"INSERT INTO `product_category`(name) VALUES ('$catname')");
        if($res1>0)
        {
            echo 1;

        }
        else
        {
            echo 2;
        }
    }

    function getcategory(){
        $category = '';
        $catqry = mysqli_query($this->conn,"select * from product_category ORDER BY slno ASC ");
        while ($catres = mysqli_fetch_assoc($catqry)){
            $category .='<option value="'.$catres["slno"].'">'.$catres["name"].'</option>';
        }
        echo json_encode(array("res" => 1,"catlist" => $category));
    }

    function addsubcategory()
    {
        if(isset($_POST['catname']) && !empty($_POST['catname']))
        {
            $catid = mysqli_real_escape_string($this->conn,$_POST['catname']);
        }
        else
        {
            echo 0;
            return;
        }
        if(isset($_POST['subcat']) && !empty($_POST['subcat']))
        {
            $subcat = mysqli_real_escape_string($this->conn,$_POST['subcat']);
        }
        else
        {
            echo 0;
            return;
        }

        $res1 = mysqli_query($this->conn,"INSERT INTO `product_sub_category`(catid,name) VALUES ('$catid','$subcat')");
        if($res1>0)
        {
            echo 1;

        }
        else
        {
            echo 2;
        }
    }

    function deleteCategory()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1 = mysqli_query($this->conn,"DELETE FROM product_category WHERE slno=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function deleteSubCategory()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $res1 = mysqli_query($this->conn,"DELETE FROM product_sub_category WHERE slno=".$postid);
        if($res1>0)
        {
            echo 1;

        }
        else
        {
//		echo "DELETE FROM category WHERE cname='".$category."'";
            echo 2;
        }
    }

    function getsubcategory(){
        if(isset($_POST['catname']) && !empty($_POST['catname']))
        {
            $catname = mysqli_real_escape_string($this->conn,$_POST['catname']);
        }
        else
        {
            echo "category value missing";
            return;
        }
        $category = '';
        $catqry = mysqli_query($this->conn,"select * from product_sub_category where catid='$catname'");
        while ($catres = mysqli_fetch_assoc($catqry)){
            $category .='<option value="'.$catres["slno"].'">'.$catres["name"].'</option>';
        }
        echo json_encode(array("res" => 1,"subcatlist" => $category));
    }

    function addToCartHomeByAdmin(){
        if(isset($_POST['prod_code']) && !empty($_POST['prod_code']))
        {
            $prod_code = $_POST['prod_code'];
        }
        if(isset($_POST['home_id']) && !empty($_POST['home_id']))
        {
            $home_id = $_POST['home_id'];
        }
        if(isset($_POST['qty']) && !empty($_POST['qty']))
        {
            $qty = $_POST['qty'];
        }

        if(isset($_POST['seller']) && !empty($_POST['seller']))
        {
            $seller = $_POST['seller'];
        }

        //check distributor id
        $distcheck = mysqli_query($this->conn,"select * from homeshoppee_info where username='$home_id'");
        if ($distcheckres = mysqli_fetch_assoc($distcheck)){

        }
        else{
            echo json_encode(array("res" => 6, 'qry' => "select * from homeshoppee_info where username='$home_id'"));
            return;
        }

        //product is already added or not
        $ordcheck = mysqli_query($this->conn,"select * from orders where product_code=(select slno from products where product_code='$prod_code') and userid='$home_id' and status='ordered' and seller='$seller'");
        if ($ordcheckres = mysqli_fetch_assoc($ordcheck)){
            echo json_encode(array("res" => 5));
            return;
        }
        //product code validation
        $prodqry = mysqli_query($this->conn,"select product_code,dp,slno from products where product_code='$prod_code'");
        if ($prodres = mysqli_fetch_assoc($prodqry)){
            $dp = $prodres['dp'];
            $slno = $prodres['slno'];
            //product availability in homeshoppee
            $homeprodqry = mysqli_query($this->conn,"select * from products where product_code='$prod_code'");
            if ($homeprodres = mysqli_fetch_assoc($homeprodqry)){
                $restqty = (int)$homeprodres['product_quantity']-(int)$qty;
                //product quantity avalability
                if ($homeprodres['product_quantity'] < $qty){
                    $hqty = $homeprodres['product_quantity'];
                    echo json_encode(array("res" => 4,"qty" => $hqty));
                }
                else{
                    //Add product now
                    $insertOrder = mysqli_query($this->conn,"INSERT INTO `orders`(`userid`, `product_code`, `quantity`, `usertype`, `date`, `price`, `status`, `seller`) VALUES ('$home_id','$slno','$qty','homeshoppee',NOW(),'$dp','ordered','$seller')");
                    echo json_encode(array("res" => 1));

                }
            }
            else{
                echo json_encode(array("res" => 3));
                return;
            }
        }
        else{
            echo json_encode(array("res" => 2));
            return;
        }
    }

    function addToCartDistByAdmin(){
        if(isset($_POST['prod_code']) && !empty($_POST['prod_code']))
        {
            $prod_code = $_POST['prod_code'];
        }
        if(isset($_POST['dist_id']) && !empty($_POST['dist_id']))
        {
            $dist_id = $_POST['dist_id'];
        }
        if(isset($_POST['qty']) && !empty($_POST['qty']))
        {
            $qty = $_POST['qty'];
        }

        if(isset($_POST['seller']) && !empty($_POST['seller']))
        {
            $seller = $_POST['seller'];
        }

        //check distributor id
        $distcheck = mysqli_query($this->conn,"select * from distributor_info where id='$dist_id'");
        if ($distcheckres = mysqli_fetch_assoc($distcheck)){

        }
        else{
            echo json_encode(array("res" => 6));
            return;
        }

        //product is already added or not
        $ordcheck = mysqli_query($this->conn,"select * from orders where product_code=(select slno from products where product_code='$prod_code') and userid='$dist_id' and status='ordered' and seller='$seller'");
        if ($ordcheckres = mysqli_fetch_assoc($ordcheck)){
            echo json_encode(array("res" => 5));
            return;
        }
        //product code validation
        $prodqry = mysqli_query($this->conn,"select product_code,dp,slno from products where product_code='$prod_code'");
        if ($prodres = mysqli_fetch_assoc($prodqry)){
            $dp = $prodres['dp'];
            $slno = $prodres['slno'];
            //product availability in homeshoppee
            $homeprodqry = mysqli_query($this->conn,"select * from products where product_code='$prod_code'");
            if ($homeprodres = mysqli_fetch_assoc($homeprodqry)){
                $restqty = (int)$homeprodres['product_quantity']-(int)$qty;
                //product quantity avalability
                if ($homeprodres['product_quantity'] < $qty){
                    $hqty = $homeprodres['product_quantity'];
                    echo json_encode(array("res" => 4,"qty" => $hqty));
                }
                else{
                    //Add product now
                    $insertOrder = mysqli_query($this->conn,"INSERT INTO `orders`(`userid`, `product_code`, `quantity`, `usertype`, `date`, `price`, `status`, `seller`) VALUES ('$dist_id','$slno','$qty','dist',NOW(),'$dp','ordered','$seller')");
                    echo json_encode(array("res" => 1));

                }
            }
            else{
                echo json_encode(array("res" => 3, "qry" => "select * from products where product_code='$prod_code'"));
                return;
            }
        }
        else{
            echo json_encode(array("res" => 2));
            return;
        }
    }

    function HomeorderByAdmin(){
        $date=date('Y-m-d H:i:s');
        $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        $seller = mysqli_real_escape_string($this->conn,$_POST['seller']);

        $home_mobile = '';
        $message = '';
        $totalprice = '';

        $homeqry = mysqli_query($this->conn,"select mobile_no from homeshoppee_info where username='$uid'");
        if ($homeres = mysqli_fetch_assoc($homeqry)){
            $home_mobile = $homeres['mobile_no'];
        }

        $qry = mysqli_query($this->conn, "SELECT MAX(CAST(SUBSTRING(orderNo, 9) AS UNSIGNED)) as orderNo FROM `orders`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastorderNo = $res['orderNo'];
            if ($lastorderNo == ''){
                $orderNo = 'FITO00001';
            }
            else{
//                $last = (int) filter_var($lastorderNo, FILTER_SANITIZE_NUMBER_INT);
                $orderNo_digit = $lastorderNo + 1;
                $orderNo = 'FITO0000'.$orderNo_digit;
            }
        }
        $message .="Welcome to FITOHM, Your order no is ".$orderNo;
        $bv = '';
        $totalbv = '';
        $prodcount =0;
        $pqry = mysqli_query($this->conn,"SELECT product_code,quantity from orders where status='ordered' and userid='$uid' ans seller='$seller'");
        while($pqryres = mysqli_fetch_array($pqry)){
            $pcode = $pqryres['product_code'];
            $qty = $pqryres['quantity'];

            $bqry = mysqli_query($this->conn,"SELECT bv,dp from products where slno='$pcode'");
            while($bqryres = mysqli_fetch_array($bqry)){
                $bv = floatval($bqryres['bv'])*$pqryres['quantity'];
                $price = floatval($bqryres['dp'])*floatval($pqryres['quantity']);
//                   echo $bqryres['mrp'];
                $prodcount++;
            }
            $totalbv = floatval($totalbv)+floatval($bv);
            $totalprice = floatval($totalprice)+floatval($price);




            $bqry = mysqli_query($this->conn,"SELECT * from products where slno='$pcode'");
            if($bqryres = mysqli_fetch_array($bqry)){
                $pcode = $bqryres['slno'];
                $product_code = $bqryres['product_code'];
                $product_name = $bqryres['product_name'];
                $category = $bqryres['category'];
                $product_desc = $bqryres['product_desc'];
                $hsncode = $bqryres['hsncode'];
                $mrp = $bqryres['mrp'];
                $dp = $bqryres['dp'];
                $bv = $bqryres['bv'];
                $bsper = $bqryres['bsper'];
                $hsper = $bqryres['hsper'];
                $gst = $bqryres['gst'];
                $addeddate = $bqryres['addeddate'];
                $product_image = $bqryres['product_image'];
                $rest_quantity = (int)$bqryres['product_quantity'] - (int)$qty;



//                insert product for bigshoppee


                if ($qty > $bqryres['product_quantity']){
                    echo json_encode(array("res" => 2,"prodname"=>$product_name,"pqty"=>$bqryres['product_quantity']));
                    return;
                }
                else{
                    $bqry1 = mysqli_query($this->conn,"SELECT product_quantity from home_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)) {
                        $inc_quantity = (int)$bqryres1['product_quantity'] + (int)$qty;
                    }
                    $bqry1 = mysqli_query($this->conn,"SELECT slno from home_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)){
                        mysqli_query($this->conn,"update home_shoppee_products set product_quantity='$inc_quantity' where slno='$pcode' and pcode='$uid'");
                    }
                    else{
                        mysqli_query($this->conn,"INSERT INTO `home_shoppee_products`(`slno`,`pcode`, `product_code`, `product_name`, `category`, `product_desc`, `hsncode`, `mrp`, `dp`, `bv`, `bsper`, `hsper`, `gst`, `product_image`,`product_quantity`) VALUES ('$pcode','$uid','$product_code','$product_name','$category','$product_desc','$hsncode','$mrp','$dp','$bv','$bsper','$hsper','$gst','$product_image','$qty')");
                    }

//                update product quantity
                    mysqli_query($this->conn,"update products set product_quantity='$rest_quantity' where slno='$pcode'");
                }
            }
            else{
                $pqry = mysqli_query($this->conn,"select product_name from products where slno='$pcode'");
                $pqryrow = mysqli_fetch_assoc($pqry);
                echo json_encode(array("res" => 3,'pname'=>$pqryrow['product_name']));
                return;
            }
        }

        $message .= ", You bought ".$prodcount." products of total amount Rs. ".$totalprice." and total BV is ".$totalbv;
        sendsms($home_mobile,$message);
        mysqli_query($this->conn,"update orders set status='confirm',`bdate`='$date',orderNo='$orderNo',seller='$seller' where userid='$uid' and orderNo is null ");
        echo json_encode(array("res" => 1,"location"=>"billg.php?order=".$orderNo));
    }

    function addToCartBigByAdmin(){
        if(isset($_POST['prod_code']) && !empty($_POST['prod_code']))
        {
            $prod_code = $_POST['prod_code'];
        }
        if(isset($_POST['big_id']) && !empty($_POST['big_id']))
        {
            $big_id = $_POST['big_id'];
        }
        if(isset($_POST['qty']) && !empty($_POST['qty']))
        {
            $qty = $_POST['qty'];
        }

        if(isset($_POST['seller']) && !empty($_POST['seller']))
        {
            $seller = $_POST['seller'];
        }

        //check bi shoppee id
        $distcheck = mysqli_query($this->conn,"select * from homeshoppee_info where username='$big_id'");
        if ($distcheckres = mysqli_fetch_assoc($distcheck)){

        }
//        else{
//            echo json_encode(array("res" => 6, 'qry' => "select * from bigshoppee_info where username='$big_id'"));
//            return;
//        }

        //product is already added or not
        $ordcheck = mysqli_query($this->conn,"select * from orders where product_code=(select slno from products where product_code='$prod_code') and userid='$big_id' and status='ordered' and seller='$seller'");
        if ($ordcheckres = mysqli_fetch_assoc($ordcheck)){
            echo json_encode(array("res" => 5));
            return;
        }
        //product code validation
        $prodqry = mysqli_query($this->conn,"select product_code,dp,slno from products where product_code='$prod_code'");
        if ($prodres = mysqli_fetch_assoc($prodqry)){
            $dp = $prodres['dp'];
            $slno = $prodres['slno'];
            //product availability in homeshoppee
            $homeprodqry = mysqli_query($this->conn,"select * from products where product_code='$prod_code'");
            if ($homeprodres = mysqli_fetch_assoc($homeprodqry)){
                $restqty = (int)$homeprodres['product_quantity']-(int)$qty;
                //product quantity avalability
                if ($homeprodres['product_quantity'] < $qty){
                    $hqty = $homeprodres['product_quantity'];
                    echo json_encode(array("res" => 4,"qty" => $hqty));
                }
                else{
                    //Add product now
                    $insertOrder = mysqli_query($this->conn,"INSERT INTO `orders`(`userid`, `product_code`, `quantity`, `usertype`, `date`, `price`, `status`, `seller`) VALUES ('$big_id','$slno','$qty','homeshoppee',NOW(),'$dp','ordered','$seller')");
                    echo json_encode(array("res" => 1));

                }
            }
            else{
                echo json_encode(array("res" => 3));
                return;
            }
        }
        else{
            echo json_encode(array("res" => 2));
            return;
        }
    }

    function BigorByAdmin(){
        $date=date('Y-m-d H:i:s');
        $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        $seller = mysqli_real_escape_string($this->conn,$_POST['seller']);

        $home_mobile = '';
        $message = '';
        $totalprice = '';

        $homeqry = mysqli_query($this->conn,"select mobile_no from homeshoppee_info where username='$uid'");
        if ($homeres = mysqli_fetch_assoc($homeqry)){
            $home_mobile = $homeres['mobile_no'];
        }

        $qry = mysqli_query($this->conn, "SELECT MAX(CAST(SUBSTRING(orderNo, 9) AS UNSIGNED)) as orderNo FROM `orders`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastorderNo = $res['orderNo'];
            if ($lastorderNo == ''){
                $orderNo = 'FITO00001';
            }
            else{
//                $last = (int) filter_var($lastorderNo, FILTER_SANITIZE_NUMBER_INT);
                $orderNo_digit = $lastorderNo + 1;
                $orderNo = 'FITO0000'.$orderNo_digit;
            }
        }
        $message .="Welcome to FITOHM, Your order no is ".$orderNo;
        $bv = '';
        $totalbv = '';
        $prodcount =0;
        $pqry = mysqli_query($this->conn,"SELECT product_code,quantity from orders where status='ordered' and userid='$uid' and seller='$seller'");
        while($pqryres = mysqli_fetch_array($pqry)){
            $pcode = $pqryres['product_code'];
            $qty = $pqryres['quantity'];

            $bqry = mysqli_query($this->conn,"SELECT bv,dp from products where slno='$pcode'");
            while($bqryres = mysqli_fetch_array($bqry)){
                $bv = floatval($bqryres['bv'])*$pqryres['quantity'];
                $price = floatval($bqryres['dp'])*floatval($pqryres['quantity']);
//                   echo $bqryres['mrp'];
                $prodcount++;
            }
            $totalbv = floatval($totalbv)+floatval($bv);
            $totalprice = floatval($totalprice)+floatval($price);




            $bqry = mysqli_query($this->conn,"SELECT * from products where slno='$pcode'");
            if($bqryres = mysqli_fetch_array($bqry)){
                $pcode = $bqryres['slno'];
                $product_code = $bqryres['product_code'];
                $product_name = $bqryres['product_name'];
                $category = $bqryres['category'];
                $product_desc = $bqryres['product_desc'];
                $hsncode = $bqryres['hsncode'];
                $mrp = $bqryres['mrp'];
                $dp = $bqryres['dp'];
                $bv = $bqryres['bv'];
                $bsper = $bqryres['bsper'];
                $hsper = $bqryres['hsper'];
                $gst = $bqryres['gst'];
                $addeddate = $bqryres['addeddate'];
                $product_image = $bqryres['product_image'];
                $rest_quantity = (int)$bqryres['product_quantity'] - (int)$qty;



//                insert product for bigshoppee


                if ($qty > $bqryres['product_quantity']){
                    echo json_encode(array("res" => 2,"prodname"=>$product_name,"pqty"=>$bqryres['product_quantity']));
                    return;
                }
                else{
                    $bqry1 = mysqli_query($this->conn,"SELECT product_quantity from big_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)) {
                        $inc_quantity = (int)$bqryres1['product_quantity'] + (int)$qty;
                    }
                    $bqry1 = mysqli_query($this->conn,"SELECT slno from big_shoppee_products where slno='$pcode' and pcode='$uid'");
                    if($bqryres1 = mysqli_fetch_array($bqry1)){
                        mysqli_query($this->conn,"update big_shoppee_products set product_quantity='$inc_quantity' where slno='$pcode' and pcode='$uid'");
                    }
                    else{
                        mysqli_query($this->conn,"INSERT INTO `big_shoppee_products`(`slno`,`pcode`, `product_code`, `product_name`, `category`, `product_desc`, `hsncode`, `mrp`, `dp`, `bv`, `bsper`, `hsper`, `gst`, `product_image`,`product_quantity`) VALUES ('$pcode','$uid','$product_code','$product_name','$category','$product_desc','$hsncode','$mrp','$dp','$bv','$bsper','$hsper','$gst','$product_image','$qty')");
                    }

//                update product quantity
                    mysqli_query($this->conn,"update products set product_quantity='$rest_quantity' where slno='$pcode'");
                }
            }
            else{
                $pqry = mysqli_query($this->conn,"select product_name from products where slno='$pcode'");
                $pqryrow = mysqli_fetch_assoc($pqry);
                echo json_encode(array("res" => 3,'pname'=>$pqryrow['product_name']));
                return;
            }
        }

        $message .= ", You bought ".$prodcount." products of total amount Rs. ".$totalprice." and total BV is ".$totalbv;
        sendsms($home_mobile,$message);
        mysqli_query($this->conn,"update orders set status='confirm',`bdate`='$date',orderNo='$orderNo',seller='$seller' where userid='$uid' and orderNo is null ");
        echo json_encode(array("res" => 1,"location"=>"billg.php?order=".$orderNo));
    }

    function addMonthlyOffers(){
        $month = mysqli_real_escape_string($this->conn,$_POST['month']);
        $desc = mysqli_real_escape_string($this->conn,$_POST['desc']);
        $qry = mysqli_query($this->conn, "INSERT INTO `monthly_offers`(`month`, `desccription`) VALUES ('$month','$desc')");
        if($qry){
            echo json_encode(array("res" => 1));
        }
        else{
            echo json_encode(array("res" => 2));
        }
    }
    function updateCategory(){
        $postid = mysqli_real_escape_string($this->conn,$_POST['postid']);
        $name = mysqli_real_escape_string($this->conn,$_POST['name']);

        //update category name
        $qry = mysqli_query($this->conn,"update product_category set name='$name' where slno='$postid'");
        if ($qry){
            echo 1;
        }
        else{
            echo 2;
        }
    }
    function updateSubCategory(){
        $postid = mysqli_real_escape_string($this->conn,$_POST['postid']);
        $name = mysqli_real_escape_string($this->conn,$_POST['name']);

        //update category name
        $qry = mysqli_query($this->conn,"update product_sub_category set name='$name' where slno='$postid'");
        if ($qry){
            echo 1;
        }
        else{
            echo 2;
        }
    }
    function getBigShoppeeName()
    {
        if(isset($_POST['user_id']) && !empty($_POST['user_id']))
        {
            $user_id = mysqli_real_escape_string($this->conn,$_POST['user_id']);
        }
        else
        {
            echo 0;
            return;
        }
        $qry = mysqli_query($this->conn, "SELECT * FROM bigshoppee_info where username='$user_id'");
        if ($res = mysqli_fetch_array($qry)) {
            $owner_name = $res['owner_name'];
            $address = $res['address'];
            echo json_encode(array("res" => 1, "name"=>$owner_name, "address"=>$address));
        }
        else{
            echo json_encode(array("res" => 2));
        }
    }
    function getHomeShoppeeName()
    {
        if(isset($_POST['user_id']) && !empty($_POST['user_id']))
        {
            $user_id = mysqli_real_escape_string($this->conn,$_POST['user_id']);
        }
        else
        {
            echo 0;
            return;
        }
        $qry = mysqli_query($this->conn, "SELECT * FROM homeshoppee_info where username='$user_id'");
        if ($res = mysqli_fetch_array($qry)) {
            $owner_name = $res['owner_name'];
            $address = $res['address'];
            echo json_encode(array("res" => 1, "name"=>$owner_name, "address"=>$address));
        }
        else{
            echo json_encode(array("res" => 2));
        }
    }

    function getHomeDistName()
    {
        if(isset($_POST['user_id']) && !empty($_POST['user_id']))
        {
            $user_id = mysqli_real_escape_string($this->conn,$_POST['user_id']);
        }
        else
        {
            echo 0;
            return;
        }
        $qry = mysqli_query($this->conn, "SELECT * FROM distributor_info where id='$user_id'");
        if ($res = mysqli_fetch_array($qry)) {
            $owner_name = $res['dist_name'];
            $address = $res['dist_address'];
            echo json_encode(array("res" => 1, "name"=>$owner_name, "address"=>$address));
        }
        else{
            echo json_encode(array("res" => 2));
        }
    }
    function getSubCatForCat(){
        if(isset($_POST['catid']) && !empty($_POST['catid']))
        {
            $catid = mysqli_real_escape_string($this->conn,$_POST['catid']);
        }
        else
        {
            echo 0;
            return;
        }
        $sub_category = '';
        $catqry = mysqli_query($this->conn,"select * from product_sub_category where catid='$catid' ORDER BY slno ASC ");
        while ($catres = mysqli_fetch_assoc($catqry)){
            $sub_category .='<option value="'.$catres["slno"].'">'.$catres["name"].'</option>';
        }
        echo json_encode(array("res" => 1,"subcatlist" => $sub_category));
    }
    function proceed_web_order(){
        if(isset($_POST['userid']) && !empty($_POST['userid']))
        {
            $userid = mysqli_real_escape_string($this->conn,$_POST['userid']);
        }
        else
        {
            echo 0;
            return;
        }
        $slno = 0;
        $subtotalprice = '';
        $web_orders = '';
        $cartItem = array();

        $web_orders .= '<table class="table table-bordered" style="text-align: center;"><thead>
<tr>
<th>SL No</th>
<th>Product Name</th>
<th>MRP</th>
<th>ADCP</th>
<th>BV</th>
<th>Quantity</th>
<th>Total Price</th>
</tr>
</thead><tbody>';
        $catqry = mysqli_query($this->conn,"select * from orders where userid='$userid' and status='ordered' and order_from='web'");
        while ($catres = mysqli_fetch_assoc($catqry)) {
            $product_code = $catres['product_code'];
            $qty = $catres['quantity'];
            $prod = $this->conn->query("select * from products where slno='$product_code'");
            while ($prod_res = $prod->fetch_assoc()) {
                $cartItem [] = $this->connobj->encryptIt($prod_res['slno']);
                $slno++;
                $prod_name = $prod_res['product_name'];
                $mrp = $prod_res['mrp'];
                $dp = $prod_res['dp'];
                $bv = $prod_res['bv'];
                $subtotalprice = floatval($dp) * floatval($qty);
                $web_orders .= '
              <tr>
              <td>' . $slno . '</td>
              <td>' . $prod_name . '</td>
              <td>' . $mrp . '</td>
              <td>' . $dp . '</td>
              <td>' . $bv . '</td>
              <td>' . $qty . '</td>
              <td>' . $subtotalprice . '</td>
</tr>
              ';
            }
        }
        //print_r($cartItem);
        $orderId = (implode(",", $cartItem));
        //return;
        $web_orders .='</tbody></table>';
        echo json_encode(array("res" => 1,"web_orders" => $web_orders, "orderId" => $orderId));
        return;
    }

    function distWeborderByAdmin(){
        $date=date('Y-m-d H:i:s');
        $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        $seller = mysqli_real_escape_string($this->conn,$_POST['seller']);

        $dist_mobile = '';
        $message = '';
        $totalprice ='';
        $totalmrp ='';
        $prodcount = 0;
        $distqry = mysqli_query($this->conn,"select dist_mobile from distributor_info where id='$uid'");
        if ($distres = mysqli_fetch_assoc($distqry)){
            $dist_mobile = $distres['dist_mobile'];
        }
//        echo $dist_mobile;
        $message .="Welcome to FITOHM, ";

        $bv = '';
        $pcode = '';
        $lastorderNo = '';
        $qry = mysqli_query($this->conn, "SELECT MAX(CAST(SUBSTRING(orderNo, 9) AS UNSIGNED)) as orderNo FROM `orders`");
        if ($res = mysqli_fetch_array($qry)) {
            $lastorderNo = $res['orderNo'];
            if ($lastorderNo == ''){
                $orderNo = 'FITO00001';
            }
            else{
//                $last = (int) filter_var($lastorderNo, FILTER_SANITIZE_NUMBER_INT);
                $orderNo_digit = $lastorderNo + 1;
                $orderNo = 'FITO0000'.$orderNo_digit;
            }
        }
        $message .= " Your order No is ".$orderNo;

        $pqry = mysqli_query($this->conn,"SELECT product_code,quantity from orders where status='ordered' and userid='$uid'");
        while($pqryres = mysqli_fetch_array($pqry)){
            $pcode = $pqryres['product_code'];
            $qty= $pqryres['quantity'];

            $bqry = mysqli_query($this->conn,"SELECT bv,dp,mrp from products where slno='$pcode'");
            while($bqryres = mysqli_fetch_array($bqry)){
                $bv = floatval($bv)+floatval($bqryres['bv'])*$pqryres['quantity'];
                $price = floatval($bqryres['dp'])*floatval($pqryres['quantity']);
                $mrp = floatval($bqryres['mrp'])*floatval($pqryres['quantity']);
                $totalprice = floatval($totalprice)+floatval($price);
                $totalmrp = floatval($totalmrp)+floatval($mrp);
                $prodcount++;
//                   echo $bqryres['mrp'];
            }
        }
//           echo 'Total MRP : '.$totalmrp." Total DP : ".$totalprice;
//           return;
        $message .= ", you bought ".$prodcount." products of total amount Rs. ".$totalprice." and total BV is ".$bv;
        $bqry1 = mysqli_query($this->conn,"SELECT product_quantity,product_name,mrp,bv  from products where slno='$pcode'");
        if($bqryres1 = mysqli_fetch_array($bqry1)) {
            $rest_quantity = (int)$bqryres1['product_quantity'] - (int)$qty;


            if ($qty > $bqryres1['product_quantity']) {
                echo json_encode(array("res" => 2, "prodname" => $bqryres1['product_name'], "pqty" => $bqryres1['product_quantity']));
                return;
            } else {
                sendsms($dist_mobile,$message);
                mysqli_query($this->conn, "update products set product_quantity='$rest_quantity' where slno='$pcode'");

//           insert bp into distributor

                $bpchecks = mysqli_query($this->conn, "SELECT *,COUNT(*) as count FROM `distributor_bp` where userid='$uid'");
                if ($bpcheckress = mysqli_fetch_array($bpchecks)) {
//            echo $bpcheckress['count'];
                    if ($bpcheckress['count'] > 0) {
                        $cbps = floatval($bv) + floatval($bpcheckress['CBP']);
                        $tcbps = floatval($bv) + floatval($bpcheckress['TBP']);
                        //echo 'cbp :'+$cbps+' tcbp :'+$tcbps;
                        mysqli_query($this->conn, "UPDATE `distributor_bp` SET `CBP`='$cbps' WHERE userid='$uid'");
                    } else {
                        mysqli_query($this->conn, "INSERT INTO `distributor_bp`(`userid`,`CBP`) VALUES ('$uid','$bv')");
                    }

                }


//        calculation for dist tree
                $bv = floatval($bv) * 0.5;
                $level1 = (floatval($bv) * 40) / 100;
                $level2 = (floatval($bv) * 20) / 100;
                $level3 = (floatval($bv) * 10) / 100;

                $spon = '';
                $user = $uid;
                $sponlev = 1;
                for ($i = 1; $i <= 7; $i++) {
                    $lqry = mysqli_query($this->conn, "select sponsor_id from distributor_info where id='$user'");
                    if ($lqryres = mysqli_fetch_array($lqry)) {

                        if ($lqryres[0] != '') {
                            $user = $lqryres[0];
//                       $spon.$sponlev = $lqryres[0];
//                       echo 'level '.$sponlev.' = '.$user.'<br>';

                            $bpcheck = mysqli_query($this->conn, "SELECT *,COUNT(*) as count FROM `distributor_bp` where userid='$user'");
                            if ($bpcheckres = mysqli_fetch_array($bpcheck)) {
                                if ($bpcheckres['count'] > 0) {

                                    if ($sponlev == '1') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level1);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level1);
                                    } elseif ($sponlev == '2') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level2);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level2);
                                    } else {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level3);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level3);
                                    }

                                    mysqli_query($this->conn, "UPDATE `distributor_bp` SET `CGBP`='$cgbp' WHERE userid='$user'");
                                } else {
                                    if ($sponlev == '1') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level1);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level1);
                                    } elseif ($sponlev == '2') {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level2);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level2);
                                    } else {
                                        $cgbp = floatval($bpcheckres['CGBP']) + floatval($level3);
                                        $tgbp = floatval($bpcheckres['TGBP']) + floatval($level3);
                                    }

                                    mysqli_query($this->conn, "INSERT INTO `distributor_bp`(`userid`,`CGBP`) VALUES ('$user','$cgbp')");
                                }
                            }
                        } else {
                            break;
                        }
                        $sponlev++;
                    }
                }
            }
            //           update order status
            mysqli_query($this->conn,"update orders set status='confirm',`bdate`='$date',orderNo='$orderNo',seller='$seller' where userid='$uid' and orderNo is null ");

            //update distributor wallet
            $updated_current =''; $updated_total = '';$discount = '';$cashback = '';
            $sponser_wallet = mysqli_query($this->conn,"select * from distributor_wallet where userid='$uid'");
            if ($sponser_wallet_res = mysqli_fetch_assoc($sponser_wallet)){
                $discount = floatval($totalmrp) - floatval($totalprice);
                $cashback = floatval($totalprice)/2;
                if ($discount > $cashback){
                    $difference = floatval($discount) - floatval($cashback);
                    $updated_current = floatval($sponser_wallet_res['wallet']) - floatval($difference);
                    $updated_total = floatval($sponser_wallet_res['total']) + floatval($cashback);
                }
                elseif ($cashback > $discount){
                    $difference = floatval($cashback) - floatval($discount);
                    $updated_current = floatval($sponser_wallet_res['wallet']) + floatval($difference);
                    $updated_total = floatval($sponser_wallet_res['total']) + floatval($cashback);
                }
                else{
                    $updated_current = floatval($sponser_wallet_res['wallet']);
                    $updated_total = floatval($sponser_wallet_res['total']);
                }
                mysqli_query($this->conn,"UPDATE `distributor_wallet` SET `wallet`='$updated_current',`total`='$updated_total' WHERE userid='$uid'");
            }
            else{
                $wallet =floatval($cashback)-floatval($discount);
                mysqli_query($this->conn,"insert into distributor_wallet (userid,`wallet`,total) values ('$uid','$wallet','$cashback')");
            }

            echo json_encode(array("res" => 1,"location"=>"stimulsoft/viewer.php?order=".$orderNo));
            return;
        }
        else{
            $pqry = mysqli_query($this->conn,"select product_name from products where slno='$pcode'");
            $pqryrow = mysqli_fetch_assoc($pqry);
            echo json_encode(array("res" => 3,'pname'=>$pqryrow['product_name']));
            return;
        }

    }

    function proceed_web_guest_order(){
        if(isset($_POST['userid']) && !empty($_POST['userid']))
        {
            $userid = mysqli_real_escape_string($this->conn,$_POST['userid']);
        }
        else
        {
            echo 0;
            return;
        }
        $slno = 0;
        $subtotalprice = '';
        $web_orders = '';
        $cartItem = array();

        $web_orders .= '<table class="table table-bordered" style="text-align: center;"><thead>
<tr>
<th>SL No</th>
<th>Product Name</th>
<th>MRP</th>
<th>ADCP</th>
<th>BV</th>
<th>Quantity</th>
<th>Total Price</th>
</tr>
</thead><tbody>';
        $catqry = mysqli_query($this->conn,"select * from guest_cart where phone='$userid' and status='ordered'");
        while ($catres = mysqli_fetch_assoc($catqry)) {
            $product_code = $catres['product_code'];
            $qty = $catres['quantity'];
            $prod = $this->conn->query("select * from products where slno='$product_code'");
            while ($prod_res = $prod->fetch_assoc()) {
                $cartItem [] = $this->connobj->encryptIt($prod_res['slno']);
                $slno++;
                $prod_name = $prod_res['product_name'];
                $mrp = $prod_res['mrp'];
                $dp = $prod_res['dp'];
                $bv = $prod_res['bv'];
                $subtotalprice = floatval($dp) * floatval($qty);
                $web_orders .= '
              <tr>
              <td>' . $slno . '</td>
              <td>' . $prod_name . '</td>
              <td>' . $mrp . '</td>
              <td>' . $dp . '</td>
              <td>' . $bv . '</td>
              <td>' . $qty . '</td>
              <td>' . $subtotalprice . '</td>
</tr>
              ';
            }
        }
        //print_r($cartItem);
        $orderId = (implode(",", $cartItem));
        //return;
        $web_orders .='</tbody></table>';
        echo json_encode(array("res" => 1,"web_orders" => $web_orders, "orderId" => $orderId));
        return;
    }

    function guestWeborderByAdmin(){
        $date=date('Y-m-d H:i:s');
        $uid = mysqli_real_escape_string($this->conn,$_POST['uid']);
        $update = $this->conn->query("update guest_cart set status = 'Confirmed' where phone = '$uid'");
        echo json_encode(array("res" => 1));
        return;
    }

    function addReferalBv(){
        $dist_id = mysqli_real_escape_string($this->conn,$_POST['dist_id']);
        $home_id = mysqli_real_escape_string($this->conn,$_POST['home_id']);
        $bv = mysqli_real_escape_string($this->conn,$_POST['bv']);
        $date = mysqli_real_escape_string($this->conn,$_POST['date']);

        //add to referal table
        $qry = mysqli_query($this->conn,"INSERT INTO `referal_bv`(`dist_id`, `homeshoppee_id`, `bv`, `date`) VALUES ('$dist_id','$home_id','$bv','$date')");
        if ($qry){
           //update bv of the distributor
            $dist_bv = $this->conn->query("Select CBP from distributor_bp where userid='$dist_id'");
            $rows = $dist_bv->num_rows;
            if ($rows > 0){
                $dist_res = $dist_bv->fetch_assoc();
                $cbp = $dist_res['CBP'];
                $updated_bp = floatval($cbp) + floatval($bv);
                $update = $this->conn->query("update distributor_bp set CBP = '$updated_bp' where userid='$dist_id'");
                if($update){
                    echo 1;
                }else{
                    echo 3;
                }
            }else{
                $insert = $this->conn->query("insert into distributor_bp (`userid`, `CBP`) VALUES ('$dist_id','$bv')");
                if($insert){
                    echo 1;
                }else{
                    echo 3;
                }
            }
        }
        else{
            echo 3;
        }
    }

    function deleteDistReferal()
    {
        if(isset($_POST['postid']) && !empty($_POST['postid']))
        {
            $postid=mysqli_real_escape_string($this->conn,$_POST['postid']);
        }
        else
        {
            echo 0;
            return;
        }
        $bv=mysqli_real_escape_string($this->conn,$_POST['bv']);
        //delete from referal_bv
        $delete = mysqli_query($this->conn,"DELETE FROM referal_bv WHERE slno=".$postid);
       if ($delete){
           //deduct from distributor_bv
           $dist = $this->conn->query("Select dist_id from referal_bv where slno ='$postid'");
           $dist_res = $dist->fetch_assoc();
           $dist_id = $dist_res['dist_id'];
           $cbp = $this->conn->query("select CBP from distributor_bp where userid='$dist_id'");
           $cbp_res = $cbp->fetch_assoc();
           $total_cbp = $cbp_res['CBP'];
           $updated_cbp = floatval($total_cbp) - floatval($bv);
           $update = $this->conn->query("update distributor_bp set CBP = '$updated_cbp' where userid='$dist_id'");
           if ($update){
               echo 1;
           }else{
               echo 2;
           }
       }else{
           echo 2;
       }


    }

}

?>
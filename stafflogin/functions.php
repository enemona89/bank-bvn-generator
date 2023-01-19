<?php
function hostel()
{
    include "connectionb.php";
    if (isset($_POST["uploadb"])) {
        if ($_FILES['file']['name']) {
            $has_title_row = true;
            $filename = explode(".", $_FILES['file']['name']);
            if ($filename[1] == 'csv') {
                $handle = fopen($_FILES['file']['tmp_name'], "r");
                while ($data = fgetcsv($handle)) {

                    $item1 = mysqli_real_escape_string($connect, $data[0]);
                    $item2 = mysqli_real_escape_string($connect, $data[1]);
                    $item3 = mysqli_real_escape_string($connect, $data[2]);
                    $item4 = mysqli_real_escape_string($connect, $data[3]);
                    $item5 = mysqli_real_escape_string($connect, $data[4]);
                    $item6 = mysqli_real_escape_string($connect, $data[5]);
                    $item7 = mysqli_real_escape_string($connect, $data[6]);
                    $sql = "INSERT into hostels(hn,hostelname,hosteltype,room,bedno,spacetype,status)values('$item1','$item2','$item3','$item4','$item5','$item6','$item7')";
                    mysqli_query($connect, $sql);

                }
                fclose($handle);
                $sql1 = "DELETE FROM hostels WHERE hn='0'";
                mysqli_query($connect, $sql1);
                echo "<script>window.alert('Hostel List Uploaded Successfully!');</script>";

            } else {
                echo "<script>window.alert('Upload was not Successful, Try Again');</script>";
            }
        }
    }
}

//End of function hostel upload
function schlfee()
{
    include "connectionb.php";
    if (isset($_POST["uploadb"])) {
        if ($_FILES['file']['name']) {
            $has_title_row = true;
            $filename = explode(".", $_FILES['file']['name']);
            if ($filename[1] == 'csv') {
                $handle = fopen($_FILES['file']['tmp_name'], "r");
                while ($data = fgetcsv($handle)) {

                    $item1 = mysqli_real_escape_string($connect, $data[0]);
                    $item2 = mysqli_real_escape_string($connect, $data[1]);
                    $item3 = mysqli_real_escape_string($connect, $data[2]);
                    $item4 = mysqli_real_escape_string($connect, $data[3]);
                    $item5 = mysqli_real_escape_string($connect, $data[4]);
                    $item6 = mysqli_real_escape_string($connect, $data[5]);
                    $item7 = mysqli_real_escape_string($connect, $data[6]);
                    $item8 = mysqli_real_escape_string($connect, $data[7]);
                    $item9 = mysqli_real_escape_string($connect, $data[8]);
                    $sql = "INSERT into schoolfee(matno,surname,midname,firstname,gender,session,level,faculty,department)values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9')";
                    mysqli_query($connect, $sql);

                }
                fclose($handle);
                $sql1 = "DELETE FROM schoolfee WHERE matno='matno'";
                mysqli_query($connect, $sql1);
                echo "<script>window.alert('School Fee List Uploaded Successfully!');</script>";

            } else {
                echo "<script>window.alert('Upload was not Successful, Try Again');</script>";
            }
        }
    }
}

//End of function hostel upload

function matfee()
{
    include "connectionb.php";
    if (isset($_POST["uploadb"])) {
        if ($_FILES['file']['name']) {
            $has_title_row = true;
            $filename = explode(".", $_FILES['file']['name']);
            if ($filename[1] == 'csv') {
                $handle = fopen($_FILES['file']['tmp_name'], "r");
                while ($data = fgetcsv($handle)) {

                    $item1 = mysqli_real_escape_string($connect, $data[0]);
                    $item2 = mysqli_real_escape_string($connect, $data[1]);
                    $item3 = mysqli_real_escape_string($connect, $data[2]);
                    $item4 = mysqli_real_escape_string($connect, $data[3]);
                    $item5 = mysqli_real_escape_string($connect, $data[4]);
                    $item6 = mysqli_real_escape_string($connect, $data[5]);
                    $item7 = mysqli_real_escape_string($connect, $data[6]);
                    $item8 = mysqli_real_escape_string($connect, $data[7]);
                    $item9 = mysqli_real_escape_string($connect, $data[8]);
                    $sql = "INSERT into matfee(matno,surname,midname,firstname,gender,session,level,faculty,department)values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9')";
                    mysqli_query($connect, $sql);

                }
                fclose($handle);
                $sql1 = "DELETE FROM matfee WHERE matno='matno'";
                mysqli_query($connect, $sql1);
                echo "<script>window.alert('Matriculation Fee Uploaded Successfully!');</script>";

            } else {
                echo "<script>window.alert('Upload was not Successful, Try Again');</script>";
            }
        }
    }
}

//End of function hostel upload

function deptment()
{

    include "connection.php";
    $sel = "SELECT department FROM departments";
    $qry = $con->query($sel) or die($con->error . __LINE__);
    $fetch = $qry->fetch_assoc();
    do {
        $dept = $fetch["department"];
        echo "<option>" . $dept . "</option>";
    } while ($fetch = $qry->fetch_assoc());
}
//End of Department selection

function hostelname()
{

    include "connection.php";
    $sel = "SELECT hostel FROM hostelname";
    $qry = $con->query($sel) or die($con->error . __LINE__);
    $fetch = $qry->fetch_assoc();
    do {
        $hostel = $fetch["hostel"];
        echo "<option>" . $hostel . "</option>";
    } while ($fetch = $qry->fetch_assoc());
}
//End of Department selection

function hostelprice()
{
    $hn = $_POST["hn"];
    $st = $_POST["st"];
    $pr = $_POST["pr"];

    include "connection.php";
    $c = "SELECT hostelname,spacetype,price FROM hostelprice WHERE hostelname='$hn' AND spacetype='$st'";
    $cq = $con->query($c) or die($con->error . __LINE__);
    $cr = $cq->num_rows;
    if ($cr > 0) {
        $sel = "UPDATE hostelprice SET hostelname='$hn',spacetype='$st',price='$pr'";
        $qry = $con->query($sel) or die($con->error . __LINE__);
        if ($qry) {
            echo "<script>window.alert('Price Updated Successfully')</script>";
        }
        exit();
    } else {
        $sel = "INSERT IGNORE INTO hostelprice SET hostelname='$hn',spacetype='$st',price='$pr'";
        $qry = $con->query($sel) or die($con->error . __LINE__);
        if ($qry) {
            echo "<script>window.alert('Price Created Successfully')</script>";
        }
        exit();
    }
}
//End of Department selection

//Level Selection function
function level()
{

    include "connection.php";
    $sel = "SELECT level FROM level";
    $qry = $con->query($sel) or die($con->error . __LINE__);
    $fetch = $qry->fetch_assoc();
    do {
        $lvl = $fetch["level"];
        echo "<option>" . $lvl . "</option>";
    } while ($fetch = $qry->fetch_assoc());

}

//Session Selection function
function session()
{

    include "connection.php";
    $sel = "SELECT `session` FROM `session`";
    $qry = $con->query($sel) or die($con->error . __LINE__);
    $fetch = $qry->fetch_assoc();
    do {
        $ses = $fetch["session"];
        echo "<option>" . $ses . "</option>";
    } while ($fetch = $qry->fetch_assoc());

}

//Save Profile function
function userprofile()
{
    include "connection.php";
    $fn = $_POST["fn"];
    $un = $_POST["un"];
    $phn = $_POST["phn"];
    $utype = $_POST["utype"];
    $pas = $_POST["pas"];
    $pas = sha1($pas);
    $uid = rand(100000, 600000);

    $sel = "INSERT INTO user SET fullname='$fn',username='$un',userid='$uid',password='$pas',usertype='$utype',phone='$phn'";
    $qry = $con->query($sel) or die($con->error . __LINE__);
    if ($qry) {
        echo "<script>window.alert('Profile Created Successfully'+':'+'\\n ' +'Your Id ='+$uid+'\\n'+'Keep it Safe!');</script>";
    }
}

function login()
{

    require_once "connection.php";

    if (isset($_POST['lgin'])) {
        $un = htmlspecialchars($_POST['un']);
        $pas = $_POST["pas"];
        $pas = sha1($pas);
        $uid = $_POST["sid"];

        //query_set
        $q1 = "SELECT fullname,username,userid,password,usertype FROM `user` WHERE `username`='$un' AND `password`='$pas' AND userid='$uid' LIMIT 1";
        $q1c = $con->query($q1) or die($con->error . _LINE_);
        $row1 = $q1c->fetch_assoc();
        if (!$row1) {?>
    <script type="text/javascript">
        alert('Sorry, Your Username or Password May be Wrong. Try Again!');
        </script>
    <?php
} else {
            $funame = $row1["fullname"];
            $u = $row1["username"];
            $pas = $row1["password"];
            $userid = $row1["userid"];
            $usertype = $row1["usertype"];
            //echo $funame."<br>";
            //echo $u;
            //die();
            $_SESSION["fullname"] = $funame;
            $_SESSION["username"] = $u;
            $_SESSION["password"] = $pas;
            $_SESSION["userid"] = $userid;
            $_SESSION["usertype"] = $usertype;
            if ($_SESSION["usertype"] == "1") {
                echo "<script>window.location='sa'</script>";
            } elseif ($_SESSION["usertype"] == "2") {

                echo "<script>window.location='ha'</script>";
            } else {
                echo "<script>window.alert('Your Details Seems to be Wrong!');</script>";
            }
        }}
}

function callhosteladmin()
{

    include "connection.php";
    $sel = "SELECT username FROM user";
    $qry = $con->query($sel) or die($con->error . __LINE__);
    $fetch = $qry->fetch_assoc();
    do {
        $fun = $fetch["username"];
        echo "<option>" . $fun . "</option>";
    } while ($fetch = $qry->fetch_assoc());

}

//Session hostel admin removal end of function

function removeadmin()
{
    $dname = $_POST["dname"];
    include "connection.php";
    $sel = "DELETE FROM user WHERE username='$dname'";
    $qry = $con->query($sel) or die($con->error . __LINE__);

    if ($qry) {
        echo "<script>window.alert('Hostel Admin Removed!');</script>";
        echo "<script>window.location='rd'</script>";

    }
    die();
}
//Allocation Functions
function allo() //alo = allocate

{
    session_start();
    if (isset($_POST["alocate"])) {
        //require_once("functions.php");
        //allo();
        $un = $_POST["un"];
        $lvl = $_POST["lvl"];
        $ses = $_POST["ses"];
        $hn = $_POST["hn"];
        $st = $_POST["st"];
        $hn = strtoupper($hn);
        $un = strtoupper($un);

        include "connection.php";
        $_SESSION["matno"]=$un;

        // Check if a student has gotton allocation already
        $cn = "select manto from allocation where manto='".$un."'";
        $cnq = $con->query($cn) or die($con->erorr . __LINE__);
        $cnr = mysqli_num_rows($cnq);
        if ($cnr > 0) {
            echo "<script>window.location='cf';</script>";
            die();
        } 
        else 
        {

            $sel = "select matno,surname,midname,firstname,gender,session,level,faculty,department FROM schoolfee WHERE matno='".$un."'";
            $qry = $con->query($sel) or die($con->error . __LINE__);
            $nr = mysqli_num_rows($qry);
            if ($nr < 1) 
            {
                echo "<script>window.alert('You Cannot Proceed.\\n Reason: Sorry, No School Fee Details Found!');</script>";
                echo "<script>window.location='spage';</script>";
                die();
            }

            if ($nr > 0) {
                $row = $qry->fetch_assoc();
                $matno = $row["matno"];
                $surname = $row["surname"];
                $midname = $row["midname"];
                $firstname = $row["firstname"];
                $gender = $row["gender"];
                $session = $row["session"];
                $level = $row["level"];
                $faculty = $row["faculty"];
                $department = $row["department"];

                $qq = "SELECT matno,hostelname,h_id from temp WHERE matno='".$matno."'";
                $qq2 = $con->query($qq) or die($con->error . __LINE__);
                $fm = $qq2->fetch_assoc();
                $m = $fm["matno"];
                $id = $fm["h_id"];

                $qq = "UPDATE hostels set status1='' WHERE hn='".$id."' and status!='allocated'";
                $qq2 = $con->query($qq) or die($con->error . __LINE__);

                $qq = "DELETE FROM temp WHERE matno='".$matno."'";
                $qq2 = $con->query($qq) or die($con->error . __LINE__);

                if ($level == "100") {
                    //I check if matriculation fee is payed by the concerned student
                    $sell = "select matno,surname,midname,firstname,gender,session,level,faculty,department FROM matfee WHERE matno='".$un."'";
                    $qryy = $con->query($sell) or die($con->error . __LINE__);
                    $nrr = mysqli_num_rows($qryy);
                    if ($nrr < 1) {

                        echo "<script>window.alert('You Cannot Proceed.\\n Reason: No Matriculation Fee Details Found!');</script>";
                        echo "<script>window.location='spage';</script>";
                        die();
                    } elseif ($nrr > 0) 
                    {
                        //I check if hostel for the related gender is still available for allocation

                        $qq = "select hn,hostelname,hosteltype,room,bedno,status FROM hostels WHERE hosteltype='$gender' and status1!='pending' and status!='allocated' and hostelname='$hn' and spacetype='$st' order by rand() limit 1";
                        $qq2 = $con->query($qq) or die($con->error . __LINE__);
                        $qr = mysqli_num_rows($qq2);

                        if ($qr > 0) {
                            //Collect hostel details
                            $fh = $qq2->fetch_assoc();
                            $hn = $fh["hn"];
                            $hostelname = $fh["hostelname"];
                            $hosteltype = $fh["hosteltype"];
                            $room = $fh["room"];
                            $bedno = $fh["bedno"];

                            //set a temporal lock on the selected hosted until the end of transaction

                            $qq = "UPDATE hostels set status1='pending' WHERE hn='".$hn."' limit 1";
                            $qq2 = $con->query($qq) or die($con->error . __LINE__);

                            $qq = "INSERT IGNORE INTO temp set matno='$matno',hostelname='".$hostelname."',h_id='".$hn."'";
                            $qq2 = $con->query($qq) or die($con->error . __LINE__);

                            //Create session to hold hostel name and ID
                            $_SESSION["hn"] = $hn;

                            $_SESSION["hostelname"] = $hostelname;

                            $_SESSION["matno"] = $matno;
                            $_SESSION["surname"] = $surname;
                            $_SESSION["midname"] = $midname;
                            $_SESSION["firstname"] = $firstname;
                            $_SESSION["gender"] = $gender;
                            $_SESSION["session"] = $session;
                            $_SESSION["level"] = $level;
                            $_SESSION["faculty"] = $faculty;
                            $_SESSION["department"] = $department;

                            //Get price and do a floor math to denote how much a student is to pay
                            $p1 = "SELECT hostelname,spacetype,price FROM hostelprice where spacetype='".$st."' and hostelname='".$hostelname."' limit 1";
                            $p1q = $con->query($p1) or die($con->error . __LINE__);
                            $pf = $p1q->fetch_assoc();
                            $price = $pf["price"];
                            $pprice = ((1.5 / 100) * $price) + 100 + 100;

                            $_SESSION["price"] = $price;
                            $_SESSION["pprice"] = $pprice;

                            $cn = "select manto from allocation where manto='".$matno."'";
                            $cnq = $con->query($cn) or die($con->erorr . __LINE__);
                            $cnr = mysqli_num_rows($cnq);
                            if ($cnr < 1) {
                                echo "
                            <script>
                            var ans = false;
                            var amount= $price;
                            if( ans = confirm('You are to Pay' + ' ' + 'N'+ amount+' '+'Naira\\nFor Your Choice of Space\\nClick Ok to Proceed\\nOr Click Cancel To Stop The Process.')) {
                                this.location += '?answer=' + ans;
                                window.location='transact';
                            }
                            else
                            {
                                window.location='ust';
                            }

                            </script>";

                            } elseif ($cnr > 0) {
                                echo "<script>window.location='cf';</script>";
                                exit();
                            }

                        } elseif ($qr < 1) {

                            echo "<script>window.alert('You Cannot Proceed With Payment.\\n Reason: No Space Available Anymore, Thanks.');</script>";

                            echo "<script>window.location='dest';</script>";
                        }

                    }

                } 
                //for students in 200 to 400 level
                elseif ($level != "100" and $level == "200" || $level == "300" || $level == "400" || $level =="500") 
                {
                    //I check if hostel for the related gender is still available for allocation

                    $qq = "select hn,hostelname,hosteltype,room,bedno,status FROM hostels WHERE hosteltype='$gender' and status1!='pending' and status!='allocated' and hostelname='$hn' and spacetype='$st' order by rand() limit 1";
                    $qq2 = $con->query($qq) or die($con->error . __LINE__);
                    $qr = mysqli_num_rows($qq2);

                    if ($qr > 0) {
                        //Collect hostel details
                        $fh = $qq2->fetch_assoc();
                        $hn = $fh["hn"];
                        $hostelname = $fh["hostelname"];
                        $hosteltype = $fh["hosteltype"];
                        $room = $fh["room"];
                        $bedno = $fh["bedno"];

                        //set a temporal lock on the selected hosted until the end of transaction

                        $qq = "UPDATE hostels set status1='pending' WHERE hn='$hn' limit 1";
                        $qq2 = $con->query($qq) or die($con->error . __LINE__);
                        $tt= date("Y-m-d H:i:s");

                        $qq = "INSERT IGNORE INTO temp set matno='$matno',hostelname='$hostelname',h_id='$hn', timess='$tt'";
                        $qq2 = $con->query($qq) or die($con->error . __LINE__);

                        //Create session to hold hostel name and ID
                        $_SESSION["hn"] = $hn;

                        $_SESSION["hostelname"] = $hostelname;

                        $_SESSION["matno"] = $matno;
                        $_SESSION["surname"] = $surname;
                        $_SESSION["midname"] = $midname;
                        $_SESSION["firstname"] = $firstname;
                        $_SESSION["gender"] = $gender;
                        $_SESSION["session"] = $session;
                        $_SESSION["level"] = $level;
                        $_SESSION["faculty"] = $faculty;
                        $_SESSION["department"] = $department;

                        //Get price and do a floor math to denote how much a student is to pay
                        $p1 = "SELECT hostelname,spacetype,price FROM hostelprice where spacetype='$st' and hostelname='$hostelname' limit 1";
                        $p1q = $con->query($p1) or die($con->error . __LINE__);
                        $pf = $p1q->fetch_assoc();
                        $price = $pf["price"];
                        $pprice = ((1.5 / 100) * $price) + 100 + 100;

                        $_SESSION["price"] = $price;
                        $_SESSION["pprice"] = $pprice;

                        $cn = "select manto from allocation where manto='$matno'";
                        $cnq = $con->query($cn) or die($con->erorr . __LINE__);
                        $cnr = mysqli_num_rows($cnq);
                        if ($cnr < 1) {
                            echo "
                        <script>
                        var ans = false;
                        var amount= $price;
                        if( ans = confirm('You are to Pay' + ' ' + 'N'+ amount+' '+'Naira\\nFor Your Choice of Space\\nClick Ok to Proceed\\nOr Click Cancel To Stop The Process.')) {
                            this.location += '?answer=' + ans;
                            window.location='transact';
                        }
                        else
                        {
                            window.location='ust';
                        }

                        </script>";

                        } elseif ($cnr > 0) {
                            echo "<script>window.location='cf';</script>";
                            exit();
                        }

                    } elseif ($qr < 1) {

                        echo "<script>window.alert('You Cannot Proceed With Payment.\\n Reason: No Space Available Anymore, Thanks.');</script>";

                        echo "<script>window.location='dest';</script>";
                    }

                }

            }
            die();
        }
    }
}

function save101()
{
    require_once "connection.php";
    $l01 = $_POST["01"];
    $l02 = $_POST["02"];
    $l03 = $_POST["03"];
    $l04 = $_POST["04"];
    $l05 = $_POST["05"];
    echo $l01;

    $cn = "insert into priority set level100='$l01',level200='$l02',level300='$l03',level400='$l04',level500='$l05'";
    $cnq = $con->query($cn) or die($con->erorr . __LINE__);
    if (!$cnq) {
        echo "<script>window.alert('Sorry, Operation was Not successful');</script>";
        exit();
    } else {
        echo "<script>window.alert('Allocation Priorities Set Successful');</script>";
        exit();
    }
}
//Here I reset Allocation to Default. That means no space has being allocated yet
function resetal()
{
    include "connection.php";
    $r = "UPDATE hostels set status=''";
    $rq = $con->query($r) or die($con->error . __LINE__);

    $dal = "DELETE FROM allocation";
    $dalq = $con->query($dal) or die($con->error . __LINE__);

    $dal2 = "DELETE FROM hostelpayment";
    $dal2q = $con->query($dal2) or die($con->error . __LINE__);

    if ($rq) {
        if ($dalq) {
            if ($dal2q) {
                echo "<script>window.alert('Reset Command Executed Successfully');</script>";
            } else {
                echo "<script>window.alert('Sorry, There Was a Problem. Try Again...');</script>";
            }
        }
    }

}
?>

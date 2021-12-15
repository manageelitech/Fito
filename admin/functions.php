<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
include_once('funcls.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$obj = new Myclass();
if(isset($_POST['fid']) && !empty($_POST['fid']))
	{
		$fid=mysqli_real_escape_string($conn,$_POST['fid']);
	}
	else
	{
		return;
	}

switch ($fid)
{

	case 5://AddNotice
	{
        $obj->addNotice();
        break;
	}
	case 6://Userdetails
	{
		$obj->addHeaderBtnText();
		break;
	}
	case 7://UpdateProfile
	{
        $obj->addHomeAbout();
		break;	
	}
	case 8://UpdateProfile
	{

		$obj->viewHomeAbout();
		break;
	}
	case 9://UpdateProfile
	{
        $obj->deleteHomeAbout();
		break;
	}
    case 10://UpdateProfile
    {
        $obj->addaboutpage();
        break;
    }
    case 11://UpdateProfile
    {

        $obj->viewaboutpage();
        break;
    }
    case 12://UpdateProfile
    {
        $obj->deleteaboutpage();
        break;
    }
    case 13://UpdateProfile
    {

        $obj->viewadmissionpage();
        break;
    }
    case 14://UpdateProfile
    {
        $obj->adddmissionpage();
        break;
    }
    case 15://UpdateProfile
    {
        $obj->deletedmissionpage();
        break;
    }
    case 16://UpdateProfile
    {

        $obj->viewfacilitypage();
        break;
    }
    case 17://UpdateProfile
    {
        $obj->addfacilitypage();
        break;
    }
    case 18://UpdateProfile
    {
        $obj->deletefacilitypage();
        break;
    }
    case 19://UpdateProfile
    {
        $obj->viewhospitalpage();
        break;
    }
    case 20://UpdateProfile
    {
        $obj->addhospitalpage();
        break;
    }
    case 21://UpdateProfile
    {
        $obj->deletehospitalpage();
        break;
    }
    case 22://UpdateProfile
    {
        $obj->viewaffiliationpage();
        break;
    }
    case 23://UpdateProfile
    {
        $obj->addaffiliationpage();
        break;
    }
    case 24://UpdateProfile
    {
        $obj->deleteaffiliationpage();
        break;
    }
    case 25://UpdateProfile
    {
        $obj->viewcourses();
        break;
    }
    case 26://UpdateProfile
    {
        $obj->addcourses();
        break;
    }
    case 27://UpdateProfile
    {
        $obj->deletecourses();
        break;
    }
    case 28://UpdateProfile
    {
        $obj->viewfeedback();
        break;
    }

    case 29://UpdateProfile
    {
        $obj->deletefeedback();
        break;
    }
    case 32://Deleteach
    {
        $obj->deleteNotice();
        break;
    }
    case 33://Deleteach
    {
        $obj->deleteGallery();
        break;
    }
    case 34://Deleteach
    {
        $obj->deleteSlider();
        break;
    }
    case 35://UpdateProfile
    {
        $obj->viewdownloads();
        break;
    }
    case 36://UpdateProfile
    {
        $obj->deletedownloads();
        break;
    }
    case 37://Deleteach
    {
        $obj->deletepageimg();
        break;
    }
    case 38://Deleteach
    {
        $obj->viewcareer();
        break;
    }
    case 39://UpdateProfile
    {
        $obj->addcareer();
        break;
    }
    case 40://UpdateProfile
    {
        $obj->deletecareer();
        break;
    }
    case 41:
    {
        $obj->myprofile();
        break;
    }
    case 42:
    {
        $obj->deleteProduct();
        break;
    }
    case 43:
    {
        $obj->getSponsorName();
        break;
    }
    case 44:
    {
        $obj->changePassword();
        break;
    }
    case 45:
    {
        $obj->regAuthentication();
        break;
    }
    case 46:
    {
        $obj->deleteDistributor();
        break;
    }
    case 47:
    {
        $obj->getProductForUpdate();
        break;
    }
    case 48:
    {
        $obj->updateProduct();
        break;
    }
    case 49:
    {
        $obj->generatePIN();
        break;
    }
    case 50:
    {
        $obj->validatePIN();
        break;
    }
    case 51:
    {
        $obj->getProduct();
        break;
    }
    case 52:
    {
        $obj->getProductByCat();
        break;
    }
    case 53:
    {
        $obj->addToCart();
        break;
    }
    case 54:
    {
        $obj->bsAuthentication();
        break;
    }
    case 55:
    {
        $obj->addBigShoppee();
        break;
    }
    case 56:
    {
        $obj->deleteBigshoppee();
        break;
    }
    case 57:
    {
        $obj->getBigshoppeeForUpdate();
        break;
    }
    case 58:
    {
        $obj->updateBigshoppee();
        break;
    }
    case 59:
    {
        $obj->addHomeShoppee();
        break;
    }
    case 60:
    {
        $obj->deleteHomeshoppee();
        break;
    }
    case 61:
    {
        $obj->getHomeshoppeeForUpdate();
        break;
    }
    case 62:
    {
        $obj->updateHomeshoppee();
        break;
    }
    case 63:
    {
        $obj->updateHomeshoppeeStatus();
        break;
    }
    case 64:
    {
        $obj->distorder();
        break;
    }
    case 65:
    {
        $obj->distorderByHome();
        break;
    }
    case 66:
    {
        $obj->deleteCart();
        break;
    }
    case 67:
    {
        $obj->bigorderByAdmin();
        break;
    }
    case 68:
    {
        $obj->getBigProduct();
        break;
    }
    case 69:
    {
        $obj->HomeorderByBig();
        break;
    }
    case 70:
    {
        $obj->deleteSacnned();
        break;
    }
    case 71:
    {
        $obj->editDistProfile();
        break;
    }
    case 72:
    {
        $obj->updateDistProfile();
        break;
    }
    case 73:
    {
        $obj->deleteOrder();
        break;
    }
    case 74:
    {
        $obj->addToCartDistByHome();
        break;
    }
    case 75:
    {
        $obj->getProductName();
        break;
    }
    case 76:
    {
        $obj->addcategory();
        break;
    }
    case 77:
    {
        $obj->getcategory();
        break;
    }
    case 78:
    {
        $obj->addsubcategory();
        break;
    }
    case 79:
    {
        $obj->deleteCategory();
        break;
    }
    case 80:
    {
        $obj->deleteSubCategory();
        break;
    }
    case 81:
    {
        $obj->getsubcategory();
        break;
    }
    case 82:
    {
        $obj->addToCartHomeByAdmin();
        break;
    }
    case 83:
    {
        $obj->HomeorderByAdmin();
        break;
    }
    case 84:
    {
        $obj->addToCartBigByAdmin();
        break;
    }
    case 85:
    {
        $obj->BigorByAdmin();
        break;
    }
    case 86:
        {
            $obj->addMonthlyOffers();
            break;
        }
    case 87:
    {
        $obj->updateCategory();
        break;
    }
    case 88:
    {
        $obj->updateSubCategory();
        break;
    }
    case 89:
    {
        $obj->getBigShoppeeName();
        break;
    }
    case 90:
    {
        $obj->getHomeShoppeeName();
        break;
    }
    case 91:
    {
        $obj->getHomeDistName();
        break;
    }
    case 92:
    {
        $obj->addToCartDistByAdmin();
        break;
    }
    case 93:
    {
        $obj->distorderByAdmin();
        break;
    }
    case 94:
    {
        $obj->getSubCatForCat();
        break;
    }
    case 95:
    {
        $obj->proceed_web_order();
        break;
    }
    case 96:
    {
        $obj->distWeborderByAdmin();
        break;
    }
    case 97:
    {
        $obj->proceed_web_guest_order();
        break;
    }
    case 98:
    {
        $obj->guestWeborderByAdmin();
        break;
    }
    case 99:
    {
        $obj->addReferalBv();
        break;
    }
    case 100:
    {
        $obj->deleteDistReferal();
        break;
    }
}





?>
<?php
 
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
	

	// Setup New Cuisine & Update Cuisine
	
   public function storeCuisine($RestaurantCuisineName,$RestaurantCuisineImg,$RestaurantCuisineThumbImg,$HomeDisplay) {
        $sql = mysql_query("SELECT * from tbl_cuisine WHERE  RestaurantCuisineName ='$RestaurantCuisineName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO tbl_cuisine(RestaurantCuisineName, RestaurantCuisineImg,RestaurantCuisineThumbImg,HomeDisplay,status,created_date) VALUES(N'$RestaurantCuisineName', '$RestaurantCuisineImg','$RestaurantCuisineThumbImg','$HomeDisplay', '0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateCuisine($RestaurantCuisineName,$RestaurantCuisineImg,$RestaurantCuisineThumbImg,$HomeDisplay,$id) {
       $result = mysql_query("Update tbl_cuisine set RestaurantCuisineName='$RestaurantCuisineName' ,HomeDisplay='$HomeDisplay', RestaurantCuisineImg='$RestaurantCuisineImg' ,RestaurantCuisineThumbImg='$RestaurantCuisineThumbImg' where id='$id'");
	   
	   
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	


 public function storeFacilities($restaurant_FacilitiesName,$restaurant_FacilitiesIcon) {
        $sql = mysql_query("SELECT * from tbl_facilities WHERE  restaurant_FacilitiesName ='$restaurant_FacilitiesName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO tbl_facilities(restaurant_FacilitiesName,restaurant_FacilitiesIcon,status,created_date) VALUES(N'$restaurant_FacilitiesName', '$restaurant_FacilitiesIcon', '0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateFacilities($RestaurantCuisineName,$RestaurantCuisineImg,$id) {
       $result = mysql_query("Update tbl_facilities set restaurant_FacilitiesName='$restaurant_FacilitiesName' , restaurant_FacilitiesIcon='$restaurant_FacilitiesIcon'  where id='$id'");
	   
	   
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }	
	
	
	
	
	
	public function storeRestaurantGallery($restaurant_id,$restaurant_gallery_image) {
       
		$result = mysql_query("INSERT INTO tbl_restaurantGallery(restaurant_id, restaurant_gallery_image,status,created_date) VALUES('$restaurant_id', '$restaurant_gallery_image', '0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 
		
    }
	 public function storeUpdateRestaurantGallery($restaurant_id,$restaurant_gallery_image,$id) {
       $result = mysql_query("Update tbl_restaurantGallery set restaurant_id='$restaurant_id' , restaurant_gallery_image='$restaurant_gallery_image'  where id='$id'");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	
	
	
	
	

 public function storeServiceTYpe($tablename,$fieldname,$value) {
        $sql = mysql_query("SELECT * from ".$tablename." WHERE  ".$fieldname." ='$value'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO ".$tablename."(".$fieldname.",status,created_date) VALUES(N'$value','0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateServiceTYpe($tablename,$fieldname,$value,$id) {
       $result = mysql_query("Update ".$tablename." set ".$fieldname."=N'$value' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	


public function storeAddState($countryID,$stateName) {
        $sql = mysql_query("SELECT * from tbl_state WHERE  stateName ='$stateName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO tbl_state(countryID,stateName,status,created_date) VALUES('$countryID',N'$stateName','0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateState($countryID,$stateName,$id) {
       $result = mysql_query("Update tbl_state set countryID='$countryID',stateName=N'$stateName' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	



public function storeAddCity($countryID,$stateID,$cityName) {
        $sql = mysql_query("SELECT * from tbl_city WHERE  cityName =N'$cityName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO tbl_city(countryID,stateID,cityName,status,created_date) VALUES('$countryID','$stateID',N'$cityName','0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateCity($countryID,$stateID,$cityName,$id) {
       $result = mysql_query("Update tbl_city set countryID='$countryID',stateID='$stateID',cityName=N'$cityName' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
		



public function storeAddResMenuCategory($restaurantMenuID,$restaurantMenuName,$restaurant_state,$restaurant_city,$restaurantMenuNameDescription,$menuPosition) {
        $sql = mysql_query("SELECT * from tbl_restMenuCategory WHERE  restaurantMenuID ='$restaurantMenuID' and restaurantMenuName =N'$restaurantMenuName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		
		$result = mysql_query("INSERT INTO tbl_restMenuCategory(restaurantMenuID,restaurantMenuName,restaurant_state,restaurant_city,restaurantMenuNameDescription,status,menuPosition,created_date) VALUES('$restaurantMenuID',N'$restaurantMenuName',N'$restaurant_state',N'$restaurant_city',N'$restaurantMenuNameDescription','0','$menuPosition', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateResMenuCategory($restaurantMenuID,$restaurantMenuName,$restaurant_state,$restaurant_city,$restaurantMenuNameDescription,$menuPosition,$id) {
	 /*$sql = mysql_query("SELECT * from tbl_restMenuCategory WHERE  restaurantMenuID ='$restaurantMenuID' and menuPosition ='$menuPosition'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{*/
		$result = mysql_query("Update tbl_restMenuCategory set restaurantMenuID='$restaurantMenuID',restaurantMenuName=N'$restaurantMenuName',restaurant_state=N'$restaurant_state',restaurant_city=N'$restaurant_city',restaurantMenuNameDescription=N'$restaurantMenuNameDescription', menuPosition='$menuPosition' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
			}
        /*}
		 return $result;
		}
		else
		{
		return FALSE;
		}*/
    }





public function storeAddResPizzaMenuItem($RestaurantPizzaID,$RestaurantCategoryID,$RestaurantCategoryName,$RestaurantCuisineName,$RestaurantMenuType,$RestaurantMenuSpicy,$RestaurantMenuPopular,$RestaurantPizzaItemName,$RestaurantPizzaItemPrice,$ResPizzaSmallSize,$ResPizzaSmallSizePrice,$ResPizzaSmallSizeExtra,$ResPizzaSmallSizeExtraPrice,$ResPizzaDescription,$ResPizzaImg,$ResPizzaImgThumb,$ExtraAddons,$ResPizzaExtraMaterials,$ResPizzaExtraMaterialsPrice) {
        $sql = mysql_query("SELECT * from tbl_restaurantMenuItem WHERE  RestaurantCategoryID='$RestaurantCategoryID' and  RestaurantPizzaID ='$RestaurantPizzaID' and RestaurantPizzaItemName =N'$RestaurantPizzaItemName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		
		
		$result = mysql_query("INSERT INTO tbl_restaurantMenuItem(RestaurantPizzaID,RestaurantCategoryID,RestaurantCategoryName,RestaurantCuisineName,RestaurantMenuType,RestaurantMenuSpicy,RestaurantMenuPopular,RestaurantPizzaItemName,RestaurantPizzaItemPrice,ResPizzaSmallSize,ResPizzaSmallSizePrice,ResPizzaSmallSizeExtra,ResPizzaSmallSizeExtraPrice,ResPizzaDescription,ResPizzaImg,ResPizzaImgThumb,ExtraAddons,ResPizzaExtraMaterials,ResPizzaExtraMaterialsPrice,status,created_date,menutype) VALUES('$RestaurantPizzaID','$RestaurantCategoryID',N'$RestaurantCategoryName',N'$RestaurantCuisineName','$RestaurantMenuType','$RestaurantMenuSpicy','$RestaurantMenuPopular',N'$RestaurantPizzaItemName','$RestaurantPizzaItemPrice','$ResPizzaSmallSize','$ResPizzaSmallSizePrice','$ResPizzaSmallSizeExtra','$ResPizzaSmallSizeExtraPrice',N'$ResPizzaDescription','$ResPizzaImg','$ResPizzaImgThumb',N'$ExtraAddons',N'$ResPizzaExtraMaterials','$ResPizzaExtraMaterialsPrice','0', NOW(),'1')");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdatePizzaResMenuItem($RestaurantPizzaID,$RestaurantCategoryID,$RestaurantCategoryName,$RestaurantCuisineName,$RestaurantMenuType,$RestaurantMenuSpicy,$RestaurantMenuPopular,$RestaurantPizzaItemName,$RestaurantPizzaItemPrice,$ResPizzaSmallSize,$ResPizzaSmallSizePrice,$ResPizzaSmallSizeExtra,$ResPizzaSmallSizeExtraPrice,$ResPizzaDescription,$ResPizzaImg,$ResPizzaImgThumb,$ExtraAddons,$ResPizzaExtraMaterials,$ResPizzaExtraMaterialsPrice,$id) {
       $result = mysql_query("Update tbl_restaurantMenuItem set RestaurantPizzaID='$RestaurantPizzaID',RestaurantCategoryID='$RestaurantCategoryID',RestaurantCategoryName=N'$RestaurantCategoryName',RestaurantCuisineName=N'$RestaurantCuisineName',RestaurantMenuType='$RestaurantMenuType',RestaurantMenuSpicy='$RestaurantMenuSpicy',RestaurantMenuPopular='$RestaurantMenuPopular',RestaurantPizzaItemName=N'$RestaurantPizzaItemName',RestaurantPizzaItemPrice='$RestaurantPizzaItemPrice',ResPizzaSmallSize=N'$ResPizzaSmallSize',ResPizzaSmallSizePrice=N'$ResPizzaSmallSizePrice',ResPizzaSmallSizeExtra=N'$ResPizzaSmallSizeExtra',ResPizzaSmallSizeExtraPrice='$ResPizzaSmallSizeExtraPrice',ResPizzaDescription=N'$ResPizzaDescription',ResPizzaImg='$ResPizzaImg',ResPizzaImgThumb='$ResPizzaImgThumb',ExtraAddons='$ExtraAddons',ResPizzaExtraMaterials='$ResPizzaExtraMaterials',ResPizzaExtraMaterialsPrice='$ResPizzaExtraMaterialsPrice' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }




public function storeAddReNormalMenuItem($RestaurantPizzaID,$RestaurantCategoryID,$RestaurantCategoryName,$RestaurantCuisineName,$RestaurantMenuType,$RestaurantMenuSpicy,$RestaurantMenuPopular,$RestaurantPizzaItemName,$RestaurantPizzaItemPrice,$ResPizzaExtra,$ResPizzaExtraPrice,$ResPizzaDescription,$ResPizzaImg,$ResPizzaImgThumb,$ExtraAddons,$ResPizzaExtraMaterials,$ResPizzaExtraMaterialsPrice) {
        $sql = mysql_query("SELECT * from tbl_restaurantMenuItem WHERE RestaurantCategoryID='$RestaurantCategoryID' and RestaurantPizzaID ='$RestaurantPizzaID' and RestaurantPizzaItemName =N'$RestaurantPizzaItemName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		
	
		$result = mysql_query("INSERT INTO tbl_restaurantMenuItem(RestaurantPizzaID,RestaurantCategoryID,RestaurantCategoryName,RestaurantCuisineName,RestaurantMenuType,RestaurantMenuSpicy,RestaurantMenuPopular,RestaurantPizzaItemName,RestaurantPizzaItemPrice,ResPizzaExtra,ResPizzaExtraPrice,ResPizzaDescription,ResPizzaImg,ResPizzaImgThumb,ExtraAddons,ResPizzaExtraMaterials,ResPizzaExtraMaterialsPrice,status,created_date,menutype) VALUES('$RestaurantPizzaID','$RestaurantCategoryID',N'$RestaurantCategoryName',N'$RestaurantCuisineName','$RestaurantMenuType','$RestaurantMenuSpicy','$RestaurantMenuPopular',N'$RestaurantPizzaItemName','$RestaurantPizzaItemPrice','$ResPizzaExtra','$ResPizzaExtraPrice',N'$ResPizzaDescription','$ResPizzaImg','$ResPizzaImgThumb',N'$ExtraAddons',N'$ResPizzaExtraMaterials','$ResPizzaExtraMaterialsPrice','0', NOW(),'0')");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	
	
	 public function storeUpdateNormalResMenuItem($RestaurantPizzaID,$RestaurantCategoryID,$RestaurantCategoryName,$RestaurantCuisineName,$RestaurantMenuType,$RestaurantMenuSpicy,$RestaurantMenuPopular,$RestaurantPizzaItemName,$RestaurantPizzaItemPrice,$ResPizzaExtra,$ResPizzaExtraPrice,$ResPizzaDescription,$ResPizzaImg,$ResPizzaImgThumb,$ExtraAddons,$ResPizzaExtraMaterials,$ResPizzaExtraMaterialsPrice,$id) {
      
$result = mysql_query("Update tbl_restaurantMenuItem set RestaurantPizzaID='$RestaurantPizzaID',RestaurantCategoryID='$RestaurantCategoryID',RestaurantCategoryName=N'$RestaurantCategoryName',RestaurantCuisineName=N'$RestaurantCuisineName',RestaurantMenuType='$RestaurantMenuType',RestaurantMenuSpicy='$RestaurantMenuSpicy',RestaurantMenuPopular='$RestaurantMenuPopular',RestaurantPizzaItemName=N'$RestaurantPizzaItemName',RestaurantPizzaItemPrice='$RestaurantPizzaItemPrice',ResPizzaExtra=N'$ResPizzaExtra',ResPizzaExtraPrice='$ResPizzaExtraPrice',ResPizzaDescription=N'$ResPizzaDescription',ResPizzaImg='$ResPizzaImg',ResPizzaImgThumb='$ResPizzaImgThumb',ExtraAddons='$ExtraAddons',ResPizzaExtraMaterials='$ResPizzaExtraMaterials',ResPizzaExtraMaterialsPrice='$ResPizzaExtraMaterialsPrice' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }






public function storeAddResCoupon($RestauranCouponId,$RestauranCouponName,$RestauranCouponNo,$RestauranCouponType,$RestauranCouponPrice) {
        $sql = mysql_query("SELECT * from tbl_restaurantCoupon WHERE  RestauranCouponId ='$RestauranCouponId' and RestauranCouponName =N'$RestauranCouponName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO tbl_restaurantCoupon(RestauranCouponId,RestauranCouponName,RestauranCouponNo,RestauranCouponType,RestauranCouponPrice,status,created_date) VALUES('$RestauranCouponId',N'$RestauranCouponName','$RestauranCouponNo','$RestauranCouponType','$RestauranCouponPrice','0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateResCoupon($RestauranCouponId,$RestauranCouponName,$RestauranCouponNo,$RestauranCouponType,$RestauranCouponPrice,$id) {
       $result = mysql_query("Update tbl_restaurantCoupon set RestauranCouponId='$RestauranCouponId',RestauranCouponName=N'$RestauranCouponName',RestauranCouponNo='$RestauranCouponNo',RestauranCouponType='$RestauranCouponType',RestauranCouponPrice='$RestauranCouponPrice' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }










	 public function storeUpdateContent($tablename,$fieldname,$value,$fieldname1,$value1,$fieldname2,$value2,$fieldname3,$value3,$id) {
       $result = mysql_query("Update ".$tablename." set ".$fieldname."=N'".mysql_real_escape_string($value)."',".$fieldname1."=N'".mysql_real_escape_string($value1)."',".$fieldname2."=N'".mysql_real_escape_string($value2)."',".$fieldname3."=N'".mysql_real_escape_string($value3)."' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
		
		

public function storeAddFaq($faq_question,$faq_answer,$ViewPostion) {
        $sql = mysql_query("SELECT * from tbl_FAQ WHERE  faq_question =N'$faq_question'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO tbl_FAQ(faq_question,faq_answer,ViewPostion,status,created_date) VALUES(N'".mysql_real_escape_string($faq_question)."',N'".mysql_real_escape_string($faq_answer)."','$ViewPostion','0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateFaq($faq_question,$faq_answer,$ViewPostion,$id) {
       $result = mysql_query("Update tbl_FAQ set faq_question=N'".mysql_real_escape_string($faq_question)."',faq_answer=N'".mysql_real_escape_string($faq_answer)."' ,ViewPostion='$ViewPostion' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }				
	
	

public function storeUpdateEmailSetting($supportemail,$registrationemail,$contactusemail,$orderemail,$invoiceemail,$bookingemail,$id) {
       $result = mysql_query("Update tbl_EmailSetting set supportemail='$supportemail',registrationemail='$registrationemail',contactusemail='$contactusemail',orderemail='$orderemail',bookingemail='$bookingemail',invoiceemail='$invoiceemail' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }				
		

public function storeUpdateIconSetting($CuisineIconThumbSW,$CuisineIconThumbSH,$CuisineIconThumbLW,$CuisineIconThumbLH,$MenuIconThumbSW,$MenuIconThumbSH,$MenuIconThumbLW,$MenuIconThumbLH,$RestLogoThumbSW,$RestLogoThumbSH,$RestLogoThumbLW,$RestLogoThumbLH,$FacilitiesThumbSW,$FacilitiesThumbSH,$PaymentThumbW,$PaymentThumbH,$SocialIconThumbW,$SocialIconThumbH,$AdminloginId,$id) {
       $result = mysql_query("Update tbl_IconSetting set CuisineIconThumbSW='$CuisineIconThumbSW',CuisineIconThumbSH='$CuisineIconThumbSH',CuisineIconThumbLW='$CuisineIconThumbLW',CuisineIconThumbLH='$CuisineIconThumbLH',MenuIconThumbSW='$MenuIconThumbSW',MenuIconThumbSH='$MenuIconThumbSH',MenuIconThumbLW='$MenuIconThumbLW',MenuIconThumbLH='$MenuIconThumbLH',RestLogoThumbSW='$RestLogoThumbSW',RestLogoThumbSH='$RestLogoThumbSH',RestLogoThumbLW='$RestLogoThumbLW',RestLogoThumbLH='$RestLogoThumbLH',FacilitiesThumbSW='$FacilitiesThumbSW',FacilitiesThumbSH='$FacilitiesThumbSH',PaymentThumbW='$PaymentThumbW',PaymentThumbH='$PaymentThumbH',SocialIconThumbW='$SocialIconThumbW',SocialIconThumbH='$SocialIconThumbH',AdminloginId='$AdminloginId' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }				
	
	
public function storeUpdateOrderSetting
($RestOrderStatusAccepted,$RestOrderStatusTransit,$RestOrderStatusDelivered,$RestOrderStatusComplete,$RestOrderStatusCancled,$id) {
       $result = mysql_query("Update tbl_OrderSetting set RestOrderStatusAccepted='$RestOrderStatusAccepted',RestOrderStatusTransit='$RestOrderStatusTransit',RestOrderStatusDelivered='$RestOrderStatusDelivered',RestOrderStatusComplete='$RestOrderStatusComplete',RestOrderStatusCancled='$RestOrderStatusCancled' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }				
		
		


public function storeRestaurantOffer($restaurant_id,$RestaurantoffrType,$RestaurantOfferPrice,$RestaurantOfferStartPrice,$OrderDiscountshow,$RestaurantOfferStartDate,$RestaurantOfferEndDate,$RestaurantOfferDescription,$restaurant_discount_mon_selected,$restaurant_discount_mon_open_hr,$restaurant_discount_mon_open_min,$restaurant_discount_mon_open_am,$restaurant_discount_mon_close_hr,$restaurant_discount_mon_close_min,$restaurant_discount_mon_open_pm,$restaurant_discount_tue_selected,$restaurant_discount_tue_open_hr,$restaurant_discount_tue_open_min,$restaurant_discount_tue_open_am,$restaurant_discount_tue_close_hr,$restaurant_discount_tue_close_min,$restaurant_discount_tue_open_pm,$restaurant_discount_wed_selected,$restaurant_discount_wed_open_hr,$restaurant_discount_wed_open_min,$restaurant_discount_wed_open_am,$restaurant_discount_wed_close_hr,$restaurant_discount_wed_close_min,$restaurant_discount_wed_open_pm,$restaurant_discount_thu_selected,$restaurant_discount_thu_open_hr,$restaurant_discount_thu_open_min,$restaurant_discount_thu_open_am,$restaurant_discount_thu_close_hr,$restaurant_discount_thu_close_min,$restaurant_discount_thu_open_pm,$restaurant_discount_fri_selected,$restaurant_discount_fri_open_hr,$restaurant_discount_fri_open_min,$restaurant_discount_fri_open_am,$restaurant_discount_fri_close_hr,$restaurant_discount_fri_close_min,$restaurant_discount_fri_open_pm,$restaurant_discount_sat_selected,$restaurant_discount_sat_open_hr,$restaurant_discount_sat_open_min,$restaurant_discount_sat_open_am,$restaurant_discount_sat_close_hr,$restaurant_discount_sat_close_min,$restaurant_discount_sat_open_pm,$restaurant_discount_sun_selected,$restaurant_discount_sun_open_hr,$restaurant_discount_sun_open_min,$restaurant_discount_sun_open_am,$restaurant_discount_sun_close_hr,$restaurant_discount_sun_close_min,$restaurant_discount_sun_open_pm,$OrderDiscountType,$restaurant_discount_timeinterval_open_hr, $restaurant_discount_timeinterval_open_min,$restaurant_discount_timeinterval_open_am,$restaurant_discount_timeinterval_close_hr,$restaurant_discount_timeinterval_close_min,$restaurant_discount_timeinterval_open_pm,$OrderDiscountmenuCategory,$restaurant_state,$restaurant_city,$topDiscount) {
       $result = mysql_query("INSERT INTO `tbl_restaurantOffer` (`id`, `restaurant_id`, `RestaurantoffrType`, `RestaurantOfferPrice`, `RestaurantOfferStartPrice`, `OrderDiscountshow`, `RestaurantOfferStartDate`, `RestaurantOfferEndDate`, `RestaurantOfferDescription`, `restaurant_discount_mon_selected`, `restaurant_discount_mon_open_hr`, `restaurant_discount_mon_open_min`, `restaurant_discount_mon_open_am`, `restaurant_discount_mon_close_hr`, `restaurant_discount_mon_close_min`, `restaurant_discount_mon_open_pm`, `restaurant_discount_tue_selected`, `restaurant_discount_tue_open_hr`, `restaurant_discount_tue_open_min`, `restaurant_discount_tue_open_am`, `restaurant_discount_tue_close_hr`, `restaurant_discount_tue_close_min`, `restaurant_discount_tue_open_pm`, `restaurant_discount_wed_selected`, `restaurant_discount_wed_open_hr`, `restaurant_discount_wed_open_min`, `restaurant_discount_wed_open_am`, `restaurant_discount_wed_close_hr`, `restaurant_discount_wed_close_min`, `restaurant_discount_wed_open_pm`, `restaurant_discount_thu_selected`, `restaurant_discount_thu_open_hr`, `restaurant_discount_thu_open_min`, `restaurant_discount_thu_open_am`, `restaurant_discount_thu_close_hr`, `restaurant_discount_thu_close_min`, `restaurant_discount_thu_open_pm`, `restaurant_discount_fri_selected`, `restaurant_discount_fri_open_hr`, `restaurant_discount_fri_open_min`, `restaurant_discount_fri_open_am`, `restaurant_discount_fri_close_hr`, `restaurant_discount_fri_close_min`, `restaurant_discount_fri_open_pm`, `restaurant_discount_sat_selected`, `restaurant_discount_sat_open_hr`, `restaurant_discount_sat_open_min`, `restaurant_discount_sat_open_am`, `restaurant_discount_sat_close_hr`, `restaurant_discount_sat_close_min`, `restaurant_discount_sat_open_pm`, `restaurant_discount_sun_selected`, `restaurant_discount_sun_open_hr`, `restaurant_discount_sun_open_min`, `restaurant_discount_sun_open_am`, `restaurant_discount_sun_close_hr`, `restaurant_discount_sun_close_min`, `restaurant_discount_sun_open_pm`, `OrderDiscountType`, `restaurant_discount_timeinterval_open_hr`, `restaurant_discount_timeinterval_open_min`, `restaurant_discount_timeinterval_open_am`, `restaurant_discount_timeinterval_close_hr`, `restaurant_discount_timeinterval_close_min`, `restaurant_discount_timeinterval_open_pm`, `OrderDiscountmenuCategory`, `restaurant_state`, `restaurant_city`,`topDiscount`, `status`, `created_date`) VALUES (NULL, '$restaurant_id', '$RestaurantoffrType', '$RestaurantOfferPrice', '$RestaurantOfferStartPrice', '$OrderDiscountshow', '$RestaurantOfferStartDate', '$RestaurantOfferEndDate', N'$RestaurantOfferDescription', '$restaurant_discount_mon_selected', '$restaurant_discount_mon_open_hr', '$restaurant_discount_mon_open_min', '$restaurant_discount_mon_open_am', '$restaurant_discount_mon_close_hr', '$restaurant_discount_mon_close_min', '$restaurant_discount_mon_open_pm', '$restaurant_discount_tue_selected', '$restaurant_discount_tue_open_hr', '$restaurant_discount_tue_open_min', '$restaurant_discount_tue_open_am', '$restaurant_discount_tue_close_hr', '$restaurant_discount_tue_close_min', '$restaurant_discount_tue_open_pm', '$restaurant_discount_wed_selected', '$restaurant_discount_wed_open_hr', '$restaurant_discount_wed_open_min', '$restaurant_discount_wed_open_am', '$restaurant_discount_wed_close_hr', '$restaurant_discount_wed_close_min', '$restaurant_discount_wed_open_pm', '$restaurant_discount_thu_selected', '$restaurant_discount_thu_open_hr', '$restaurant_discount_thu_open_min', '$restaurant_discount_thu_open_am', '$restaurant_discount_thu_close_hr', '$restaurant_discount_thu_close_min', '$restaurant_discount_thu_open_pm', '$restaurant_discount_fri_selected', '$restaurant_discount_fri_open_hr', '$restaurant_discount_fri_open_min', '$restaurant_discount_fri_open_am', '$restaurant_discount_fri_close_hr', '$restaurant_discount_fri_close_min', '$restaurant_discount_fri_open_pm', '$restaurant_discount_sat_selected', '$restaurant_discount_sat_open_hr', '$restaurant_discount_sat_open_min', '$restaurant_discount_sat_open_am', '$restaurant_discount_sat_close_hr', '$restaurant_discount_sat_close_min', '$restaurant_discount_sat_open_pm', '$restaurant_discount_sun_selected', '$restaurant_discount_sun_open_hr', '$restaurant_discount_sun_open_min', '$restaurant_discount_sun_open_am', '$restaurant_discount_sun_close_hr', '$restaurant_discount_sun_close_min', '$restaurant_discount_sun_open_pm', '$OrderDiscountType', '$restaurant_discount_timeinterval_open_hr', '$restaurant_discount_timeinterval_open_min', '$restaurant_discount_timeinterval_open_am', '$restaurant_discount_timeinterval_close_hr', '$restaurant_discount_timeinterval_close_min', '$restaurant_discount_timeinterval_open_pm', N'$OrderDiscountmenuCategory', '$restaurant_state', N'$restaurant_city', '$topDiscount','0', NOW())");
	
	
	
	   
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		
    }
public function storeUpdateRestaurantOffer($restaurant_id,$RestaurantoffrType,$RestaurantOfferPrice,$RestaurantOfferStartPrice,$OrderDiscountshow,$RestaurantOfferStartDate,$RestaurantOfferEndDate,$RestaurantOfferDescription,$restaurant_discount_mon_selected,$restaurant_discount_mon_open_hr,$restaurant_discount_mon_open_min,$restaurant_discount_mon_open_am,$restaurant_discount_mon_close_hr,$restaurant_discount_mon_close_min,$restaurant_discount_mon_open_pm,$restaurant_discount_tue_selected,$restaurant_discount_tue_open_hr,$restaurant_discount_tue_open_min,$restaurant_discount_tue_open_am,$restaurant_discount_tue_close_hr,$restaurant_discount_tue_close_min,$restaurant_discount_tue_open_pm,$restaurant_discount_wed_selected,$restaurant_discount_wed_open_hr,$restaurant_discount_wed_open_min,$restaurant_discount_wed_open_am,$restaurant_discount_wed_close_hr,$restaurant_discount_wed_close_min,$restaurant_discount_wed_open_pm,$restaurant_discount_thu_selected,$restaurant_discount_thu_open_hr,$restaurant_discount_thu_open_min,$restaurant_discount_thu_open_am,$restaurant_discount_thu_close_hr,$restaurant_discount_thu_close_min,$restaurant_discount_thu_open_pm,$restaurant_discount_fri_selected,$restaurant_discount_fri_open_hr,$restaurant_discount_fri_open_min,$restaurant_discount_fri_open_am,$restaurant_discount_fri_close_hr,$restaurant_discount_fri_close_min,$restaurant_discount_fri_open_pm,$restaurant_discount_sat_selected,$restaurant_discount_sat_open_hr,$restaurant_discount_sat_open_min,$restaurant_discount_sat_open_am,$restaurant_discount_sat_close_hr,$restaurant_discount_sat_close_min,$restaurant_discount_sat_open_pm,$restaurant_discount_sun_selected,$restaurant_discount_sun_open_hr,$restaurant_discount_sun_open_min,$restaurant_discount_sun_open_am,$restaurant_discount_sun_close_hr,$restaurant_discount_sun_close_min,$restaurant_discount_sun_open_pm,$OrderDiscountType,$restaurant_discount_timeinterval_open_hr, $restaurant_discount_timeinterval_open_min,$restaurant_discount_timeinterval_open_am,$restaurant_discount_timeinterval_close_hr,$restaurant_discount_timeinterval_close_min,$restaurant_discount_timeinterval_open_pm,$OrderDiscountmenuCategory,$restaurant_state,$restaurant_city,$topDiscount,$id) {
       $result = mysql_query("Update tbl_restaurantOffer set restaurant_id='$restaurant_id' ,RestaurantoffrType='$RestaurantoffrType', RestaurantOfferPrice='$RestaurantOfferPrice',RestaurantOfferStartPrice='$RestaurantOfferStartPrice',OrderDiscountshow='$OrderDiscountshow',RestaurantOfferStartDate='$RestaurantOfferStartDate',RestaurantOfferEndDate='$RestaurantOfferEndDate',RestaurantOfferDescription=N'$RestaurantOfferDescription',restaurant_discount_mon_selected='$restaurant_discount_mon_selected',restaurant_discount_mon_open_hr='$restaurant_discount_mon_open_hr',restaurant_discount_mon_open_min='$restaurant_discount_mon_open_min',restaurant_discount_mon_open_am='$restaurant_discount_mon_open_am',restaurant_discount_mon_close_hr='$restaurant_discount_mon_close_hr',restaurant_discount_mon_close_min='$restaurant_discount_mon_close_min',restaurant_discount_mon_open_pm='$restaurant_discount_mon_open_pm' ,restaurant_discount_tue_selected='$restaurant_discount_tue_selected',restaurant_discount_tue_open_hr='$restaurant_discount_tue_open_hr',restaurant_discount_tue_open_min='$restaurant_discount_tue_open_min',restaurant_discount_tue_open_am='$restaurant_discount_tue_open_am',restaurant_discount_tue_close_hr='$restaurant_discount_tue_close_hr',restaurant_discount_tue_close_min='$restaurant_discount_tue_close_min',restaurant_discount_tue_open_pm='$restaurant_discount_tue_open_pm' ,  	 restaurant_discount_wed_selected='$restaurant_discount_wed_selected',restaurant_discount_wed_open_hr='$restaurant_discount_wed_open_hr',restaurant_discount_wed_open_min='$restaurant_discount_wed_open_min',restaurant_discount_wed_open_am='$restaurant_discount_wed_open_am',restaurant_discount_wed_close_hr='$restaurant_discount_wed_close_hr',restaurant_discount_wed_close_min='$restaurant_discount_wed_close_min',restaurant_discount_wed_open_pm='$restaurant_discount_wed_open_pm' , 
restaurant_discount_thu_selected='$restaurant_discount_thu_selected',restaurant_discount_thu_open_hr='$restaurant_discount_thu_open_hr',restaurant_discount_thu_open_min='$restaurant_discount_thu_open_min',restaurant_discount_thu_open_am='$restaurant_discount_thu_open_am',restaurant_discount_thu_close_hr='$restaurant_discount_thu_close_hr',restaurant_discount_thu_close_min='$restaurant_discount_thu_close_min',restaurant_discount_thu_open_pm='$restaurant_discount_thu_open_pm' ,
restaurant_discount_fri_selected='$restaurant_discount_fri_selected',restaurant_discount_fri_open_hr='$restaurant_discount_fri_open_hr',restaurant_discount_fri_open_min='$restaurant_discount_fri_open_min',restaurant_discount_fri_open_am='$restaurant_discount_fri_open_am',restaurant_discount_fri_close_hr='$restaurant_discount_fri_close_hr',restaurant_discount_fri_close_min='$restaurant_discount_fri_close_min',restaurant_discount_fri_open_pm='$restaurant_discount_fri_open_pm' ,
restaurant_discount_sat_selected='$restaurant_discount_sat_selected',restaurant_discount_sat_open_hr='$restaurant_discount_sat_open_hr',restaurant_discount_sat_open_min='$restaurant_discount_sat_open_min',restaurant_discount_sat_open_am='$restaurant_discount_sat_open_am',restaurant_discount_sat_close_hr='$restaurant_discount_sat_close_hr',restaurant_discount_sat_close_min='$restaurant_discount_sat_close_min',restaurant_discount_sat_open_pm='$restaurant_discount_sat_open_pm' ,	restaurant_discount_sun_selected='$restaurant_discount_sun_selected',restaurant_discount_sun_open_hr='$restaurant_discount_sun_open_hr',restaurant_discount_sun_open_min='$restaurant_discount_sun_open_min',restaurant_discount_sun_open_am='$restaurant_discount_sun_open_am',restaurant_discount_sun_close_hr='$restaurant_discount_sun_close_hr',restaurant_discount_sun_close_min='$restaurant_discount_sun_close_min',restaurant_discount_sun_open_pm='$restaurant_discount_sun_open_pm' ,OrderDiscountType='$OrderDiscountType',restaurant_discount_timeinterval_open_hr='$restaurant_discount_timeinterval_open_hr'  ,restaurant_discount_timeinterval_open_min='$restaurant_discount_timeinterval_open_min'  ,restaurant_discount_timeinterval_open_am='$restaurant_discount_timeinterval_open_am'  ,restaurant_discount_timeinterval_close_hr='$restaurant_discount_timeinterval_close_hr'  ,restaurant_discount_timeinterval_close_min='$restaurant_discount_timeinterval_close_min' ,restaurant_discount_timeinterval_open_pm='$restaurant_discount_timeinterval_open_pm'  ,OrderDiscountmenuCategory=N'$OrderDiscountmenuCategory',restaurant_state='$restaurant_state',restaurant_city=N'$restaurant_city' ,topDiscount='$topDiscount'  where id='$id'");
	   
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	




public function storePaySocialSetting($tablename,$fieldname,$value,$fieldname1,$value1) {
        $sql = mysql_query("SELECT * from ".$tablename." WHERE  ".$fieldname." ='$value'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO ".$tablename."($fieldname,$fieldname1,status,created_date) VALUES(N'$value', '$value1', '0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdatePaySocialSetting($tablename,$fieldname,$value,$fieldname1,$value1,$id) {
       $result = mysql_query("Update ".$tablename." set ".$fieldname."=N'$value' ,".$fieldname1."=N'$value1' where id='$id'");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }	







public function storeUpdateSiteSetting($website_name,$website_logo,$website_favicon,$website_callUsNo,$website_UserPerRecord,$website_AdminPerRecord,$website_OwnerPerRecord,$website_HeaderText,$website_SocialMedia,$website_AdminName,$website_AdminEmail,$website_ContactEmail,$website_ContactPhone,$website_TimeZone,$website_Currency,$website_CurrencySymbole,$website_ServiceTaxNo,$website_ServiceTaxPercentage,$website_OfflineStatus,$website_OfflineNote,$website_Country,$website_State,$website_City,$website_Zipcode,$website_Address,$website_MetaTitle,$website_MetaKeyword,$website_MetaDescription,$Authorize_net_Login_Key,$Authorize_net_Transaction_Key,$loyalityPoint,$Adminlogin_id,$twitersociallink,$facebooksociallink,$flickrsociallink,$linksociallink,$id) {
       $result = mysql_query("Update tbl_siteSetting set website_name=N'$website_name',website_logo='$website_logo',website_favicon='$website_favicon',website_callUsNo='$website_callUsNo',website_UserPerRecord='$website_UserPerRecord',website_AdminPerRecord='$website_AdminPerRecord',website_OwnerPerRecord='$website_OwnerPerRecord',website_HeaderText=N'$website_HeaderText',website_SocialMedia='$website_SocialMedia',website_AdminName=N'$website_AdminName',website_AdminEmail='$website_AdminEmail',website_ContactEmail='$website_ContactEmail',website_ContactPhone='$website_ContactPhone',website_TimeZone='$website_TimeZone',website_Currency='$website_Currency',website_CurrencySymbole='$website_CurrencySymbole',website_ServiceTaxNo='$website_ServiceTaxNo',website_ServiceTaxPercentage='$website_ServiceTaxPercentage',website_OfflineStatus='$website_OfflineStatus',website_OfflineNote=N'$website_OfflineNote',website_Country=N'$website_Country',website_State=N'$website_State',website_City=N'$website_City',website_Zipcode='$website_Zipcode',website_Address=N'$website_Address',website_MetaTitle='$website_MetaTitle',website_MetaKeyword='$website_MetaKeyword',website_MetaDescription='$website_MetaDescription',loyalityPoint='$loyalityPoint',Authorize_net_Transaction_Key='$Authorize_net_Transaction_Key',Authorize_net_Login_Key='$Authorize_net_Login_Key',Adminlogin_id='$Adminlogin_id',twitersociallink_1='$twitersociallink',facebooksociallink='$facebooksociallink',flickrsociallink='$flickrsociallink',linksociallink='$linksociallink',updated_date=NOW() where id='$id'");
	   
	   
	   
	   
	   
	   
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }		







public function storeRestaurantEvent($RestaurantEventID,$RestaurantEventName,$RestaurantEventStartDate,$RestaurantEventStartTime,$RestaurantEventEndDate,$RestaurantEventEndTime,$RestaurantEventAddress,$RestaurantEventDescription,$RestaurantEventImg,$RestaurantEventImgThumb) {
       $sql = mysql_query("SELECT * from tbl_restaurantEvent WHERE  RestaurantEventName ='$RestaurantEventName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
	   $result = mysql_query("INSERT INTO tbl_restaurantEvent(RestaurantEventID,RestaurantEventName,RestaurantEventStartDate,RestaurantEventStartTime,RestaurantEventEndDate,RestaurantEventEndTime,RestaurantEventAddress,RestaurantEventDescription,RestaurantEventImg,RestaurantEventImgThumb,status,created_date) VALUES('$RestaurantEventID',N'$RestaurantEventName','$RestaurantEventStartDate','$RestaurantEventStartTime','$RestaurantEventEndDate','$RestaurantEventEndTime',N'$RestaurantEventAddress','$RestaurantEventDescription','$RestaurantEventImg','$RestaurantEventImgThumb','0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		}
	else
		{
		return FALSE;
		}	
		
    }
public function storeUpdateRestaurantEvent($RestaurantEventID,$RestaurantEventName,$RestaurantEventStartDate,$RestaurantEventStartTime,$RestaurantEventEndDate,$RestaurantEventEndTime,$RestaurantEventAddress,$RestaurantEventDescription,$RestaurantEventImg,$RestaurantEventImgThumb,$id) {
       $result = mysql_query("Update tbl_restaurantEvent set RestaurantEventID='$RestaurantEventID' ,RestaurantEventName=N'$RestaurantEventName',RestaurantEventStartDate='$RestaurantEventStartDate',RestaurantEventStartTime='$RestaurantEventStartTime',RestaurantEventEndDate='$RestaurantEventEndDate',RestaurantEventEndTime='$RestaurantEventEndTime',RestaurantEventAddress=N'$RestaurantEventAddress',RestaurantEventDescription=N'$RestaurantEventDescription',RestaurantEventImg='$RestaurantEventImg',RestaurantEventImgThumb='$RestaurantEventImgThumb' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	

public function storeAddPostcodeArea($countryID,$stateID,$cityName,$postcode,$delivery_areaName,$delivery_charge,$minimum_order,$shipping_charge,$postcodelatitude1,$postcodelongitude1) {
       $result = mysql_query("INSERT INTO tbl_PostcodeArea(countryID,stateID,cityName,postcode,delivery_areaName,delivery_charge,minimum_order,shipping_charge,postcodelatitude,postcodelongitude) VALUES('$countryID','$stateID',N'$cityName','$postcode',N'$delivery_areaName','$delivery_charge','$minimum_order','$shipping_charge','$postcodelatitude1','$postcodelongitude1')");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		
    }
	
	
	 public function storeUpdatePostcodeArea($countryID,$stateID,$cityName,$postcode,$delivery_areaName,$delivery_charge,$minimum_order,$shipping_charge,$postcodelatitude1,$postcodelongitude1,$id) {
       
	 
	   $result = mysql_query("Update tbl_PostcodeArea set countryID='$countryID',stateID='$stateID',cityName=N'$cityName',postcode='$postcode',delivery_areaName=N'$delivery_areaName',delivery_charge='$delivery_charge',minimum_order='$minimum_order',shipping_charge='$shipping_charge',postcodelatitude='$postcodelatitude' ,postcodelongitude='$postcodelongitude'  where id='$id'");
	   
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }






public function storeAddResDeliveryArea($restaurant_insertID,$countryID,$restaurantState,$restaurantCity,$restaurant_postcode,$restaurant_delivery_area,$restaurant_delivery_charge,$restaurant_minimum_order,$restaurant_shipping_charge,$restaurant_postcodelatitude,$restaurant_postcodelongitude) {
      	  
	   $result = mysql_query("INSERT INTO tbl_restaurantDeliveryArea(restaurant_id,restaurant_country,restaurant_state,restaurant_city,restaurant_postcode,restaurant_delivery_area,restaurant_delivery_charge,restaurant_minimum_order,restaurant_shipping_charge,restaurant_postcodelatitude,restaurant_postcodelongitude) VALUES('$restaurant_insertID','$countryID','$restaurantState',N'$restaurantCity','$restaurant_postcode',N'$restaurant_delivery_area','$restaurant_delivery_charge','$restaurant_minimum_order','$restaurant_shipping_charge','$restaurant_postcodelatitude','$restaurant_postcodelongitude')");
	   
	   
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		
    }
	
	
	 public function storeUpdateResDeliveryArea($restaurant_id,$countryID,$stateID,$cityName,$postcode,$delivery_areaName,$delivery_charge,$minimum_order,$shipping_charge,$restaurant_postcodelatitude,$restaurant_postcodelongitude,$id) {
       
	 
	   $result = mysql_query("Update tbl_restaurantDeliveryArea set restaurant_id='$restaurant_id', restaurant_country='$countryID',restaurant_state='$stateID',restaurant_city=N'$cityName',restaurant_postcode='$postcode',restaurant_delivery_area=N'$delivery_areaName',restaurant_delivery_charge='$delivery_charge',restaurant_minimum_order='$minimum_order',restaurant_shipping_charge='$shipping_charge',restaurant_postcodelatitude='$restaurant_postcodelatitude',restaurant_postcodelongitude='$restaurant_postcodelongitude' where delivery_id='$id'");
	   
	   
	   
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }






//Start Restaurant Daily Deals+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

public function storeRestaurantDeals($RestaurantDealsId,$RestaurantDealsName,$RestaurantDealsStartDate,$RestaurantDealsStartTime,$RestaurantDealsEndDate,$RestaurantDealsEndTime,$RestaurantDealsAddress,$RestaurantDealsDescription,$RestaurantDealsImage,$RestaurantDealsImageThumb) {
       $sql = mysql_query("SELECT * from tbl_restaurantDeals WHERE  RestaurantDealsName =N'$RestaurantDealsName' and RestaurantDealsId='$RestaurantDealsId'");
	   
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		
	   $result = mysql_query("INSERT INTO tbl_restaurantDeals(RestaurantDealsId,RestaurantDealsName,RestaurantDealsStartDate	,RestaurantDealsStartTime,RestaurantDealsEndDate,RestaurantDealsEndTime,RestaurantDealsAddress,RestaurantDealsDescription,RestaurantDealsImage,RestaurantDealsImageThumb,status,created_date) VALUES('$RestaurantDealsId',N'$RestaurantDealsName','$RestaurantDealsStartDate','$RestaurantDealsStartTime','$RestaurantDealsEndDate','$RestaurantDealsEndTime',N'$RestaurantDealsAddress',N'$RestaurantDealsDescription','$RestaurantDealsImage','$RestaurantDealsImageThumb','0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		}
	else
		{
		return FALSE;
		}	
		
    }
public function storeUpdateRestaurantDeals($RestaurantDealsId,$RestaurantDealsName,$RestaurantDealsStartDate,$RestaurantDealsStartTime,$RestaurantDealsEndDate,$RestaurantDealsEndTime,$RestaurantDealsAddress,$RestaurantDealsDescription,$RestaurantDealsImage,$RestaurantDealsImageThumb,$id) {
       $result = mysql_query("Update tbl_restaurantDeals set RestaurantDealsId='$RestaurantDealsId' ,RestaurantDealsName=N'$RestaurantDealsName',RestaurantDealsStartDate='$RestaurantDealsStartDate',RestaurantDealsStartTime='$RestaurantDealsStartTime',RestaurantDealsEndDate='$RestaurantDealsEndDate',RestaurantDealsEndTime='$RestaurantDealsEndTime',RestaurantDealsAddress=N'$RestaurantDealsAddress',RestaurantDealsDescription=N'$RestaurantDealsDescription',RestaurantDealsImage='$RestaurantDealsImage',RestaurantDealsImageThumb='$RestaurantDealsImageThumb' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	


// End Restaurant Daily Deals+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




///+++++++++++++++++++++++++++++++++ Add New Restaurant ++ Bank Detail ++ Restaurant Owner ++++++++++++++++++++++++++++++++++++++++++++++

public function storeAddRestaurantOwner($restaurant_id,$restaurant_OwnerFirstName,$restaurant_OwnerLastName,$restaurant_OwnerLoginId,$restaurant_OwnerLoginPassword,$restaurant_OwnerLoginDOB,$restaurant_OwnerAnniversaryDate) {

$result = mysql_query("INSERT INTO tbl_restaurantOwner(restaurant_id,restaurant_OwnerFirstName,restaurant_OwnerLastName,restaurant_OwnerLoginId,restaurant_OwnerLoginPassword,restaurant_OwnerLoginDOB,restaurant_OwnerAnniversaryDate,status,created_date) VALUES('$restaurant_id',N'$restaurant_OwnerFirstName',N'$restaurant_OwnerLastName','$restaurant_OwnerLoginId','$restaurant_OwnerLoginPassword','$restaurant_OwnerLoginDOB','$restaurant_OwnerAnniversaryDate','0', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	
	
	
	
	
	
	public function storeAddRestaurantAdmin($restaurant_AdminFirstName,$restaurant_AdminLastName,$restaurant_AdminLoginId,$AdminEmail,$restaurant_AdminLoginPassword,$restaurant_AdminDOB,$restaurant_AdminAnniversaryDate) {
 $sql = mysql_query("SELECT * from tbl_login WHERE  AdminName ='$AdminName'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
$result = mysql_query("INSERT INTO tbl_login(restaurant_AdminFirstName,restaurant_AdminLastName,AdminName,AdminEmail,AdminPassword,restaurant_AdminLoginDOB,restaurant_AdminAnniversaryDate,status,created_date,login_type) VALUES(N'$restaurant_AdminFirstName',N'$restaurant_AdminLastName','$restaurant_AdminLoginId','$AdminEmail','$restaurant_AdminLoginPassword','$restaurant_AdminDOB','$restaurant_AdminAnniversaryDate','1', NOW(),'1')");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		}
	else
		{
		return FALSE;
		}
    }
	
	 public function storeUpdateRestaurantAdmin($restaurant_AdminFirstName,$restaurant_AdminLastName,$restaurant_AdminLoginId,$AdminEmail,$restaurant_AdminLoginPassword,$restaurant_AdminDOB,$restaurant_AdminAnniversaryDate,$id) {
	 
	 
       $result = mysql_query("Update tbl_login set restaurant_AdminFirstName=N'$restaurant_AdminFirstName',restaurant_AdminLastName=N'$restaurant_AdminLastName',AdminName=N'$restaurant_AdminLoginId',AdminEmail='$AdminEmail',AdminPassword='$restaurant_AdminLoginPassword',restaurant_AdminLoginDOB='$restaurant_AdminDOB',restaurant_AdminAnniversaryDate='$restaurant_AdminAnniversaryDate' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	
	
	public function Adminchange_password($old_pass,$new_pass,$AdminName,$id)
{
	$query = "SELECT * FROM `tbl_login`  WHERE AdminPassword='".$old_pass."' AND id='".$id."'";
    $result = mysql_query($query)or die(mysql_error());
    $num_row = mysql_num_rows($result);
    if($num_row==1) {
		$result1=mysql_query("UPDATE  `tbl_login` SET  `AdminPassword` = '".$new_pass."' ,`AdminName` = '".$AdminName."' WHERE  `id` ='".$id."'");
       return $result1;
    }
	else
	{
		return FALSE;
	}
	
}

	
	
	
	
	
	
	
	public function storeAddRestaurantOwner2($restaurant_id,$restaurant_OwnerFirstName,$restaurant_OwnerLastName,$restaurant_OwnerLoginId,$restaurant_OwnerLoginPassword,$restaurant_OwnerLoginDOB,$restaurant_OwnerAnniversaryDate,$restaurant_OwnerLoginAddress,$restaurant_OwnerLoginEmail,$restaurant_OwnerLoginMobile) {

 $sql = mysql_query("SELECT * from tbl_restaurantOwner WHERE  restaurant_id ='$restaurant_id' and restaurant_OwnerLoginId ='$restaurant_OwnerLoginId'");

        $no_rows = mysql_num_rows($sql);

		if ($no_rows == 0) 

		{

		

$result = mysql_query("INSERT INTO tbl_restaurantOwner(restaurant_id,restaurant_OwnerFirstName,restaurant_OwnerLastName,restaurant_OwnerLoginId,restaurant_OwnerLoginPassword,restaurant_OwnerLoginDOB,restaurant_OwnerAnniversaryDate,restaurant_OwnerLoginAddress,restaurant_OwnerLoginEmail,restaurant_OwnerLoginMobile,status,created_date) VALUES('$restaurant_id',N'$restaurant_OwnerFirstName',N'$restaurant_OwnerLastName','$restaurant_OwnerLoginId','$restaurant_OwnerLoginPassword','$restaurant_OwnerLoginDOB','$restaurant_OwnerAnniversaryDate',N'$restaurant_OwnerLoginAddress','$restaurant_OwnerLoginEmail','$restaurant_OwnerLoginMobile','0', NOW())");

        // check for successful store

        if ($result) {

           return $result;

        } else {

            return false;

        }

		}

	else

		{

		return FALSE;

		}

    }

	

	 public function storeUpdateRestaurantOwner2($restaurant_id,$restaurant_OwnerFirstName,$restaurant_OwnerLastName,$restaurant_OwnerLoginId,$restaurant_OwnerLoginPassword,$restaurant_OwnerLoginDOB,$restaurant_OwnerAnniversaryDate,$restaurant_OwnerLoginAddress,$restaurant_OwnerLoginEmail,$restaurant_OwnerLoginMobile) {

	 

	 

       $result = mysql_query("Update tbl_restaurantOwner set restaurant_id='$restaurant_id',restaurant_OwnerFirstName=N'$restaurant_OwnerFirstName',restaurant_OwnerLastName=N'$restaurant_OwnerLastName',restaurant_OwnerLoginId='$restaurant_OwnerLoginId',restaurant_OwnerLoginPassword='$restaurant_OwnerLoginPassword',restaurant_OwnerLoginDOB='$restaurant_OwnerLoginDOB',restaurant_OwnerAnniversaryDate='$restaurant_OwnerAnniversaryDate',restaurant_OwnerLoginAddress=N'$restaurant_OwnerLoginAddress',restaurant_OwnerLoginEmail='$restaurant_OwnerLoginEmail',restaurant_OwnerLoginMobile='$restaurant_OwnerLoginMobile' where restaurant_id='$restaurant_id'");

        if ($result) {

           return $result;

        } else {

            return false;

        }

    }

	
	 public function storeUpdateRestaurantOwner($restaurant_id,$restaurant_OwnerFirstName,$restaurant_OwnerLastName,$restaurant_OwnerLoginId,$restaurant_OwnerLoginPassword,$restaurant_OwnerLoginDOB,$restaurant_OwnerAnniversaryDate,$id) {
	 
	 
       $result = mysql_query("Update tbl_restaurantOwner set restaurant_id='$restaurant_id',restaurant_OwnerFirstName=N'$restaurant_OwnerFirstName',restaurant_OwnerLastName=N'$restaurant_OwnerLastName',restaurant_OwnerLoginId='$restaurant_OwnerLoginId',restaurant_OwnerLoginPassword='$restaurant_OwnerLoginPassword',restaurant_OwnerLoginDOB='$restaurant_OwnerLoginDOB',restaurant_OwnerAnniversaryDate='$restaurant_OwnerAnniversaryDate' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }



public function storeUpdateOenerSetting
($restUpdatePermission,$MenuCatUpdatePermission,$FoodItemUpdatePermission,$DeliveryAreaUpdatePermission,$TimeTableUpdatePermission,$EmpUpdatePermission,$DeliveryBoyUpdatePermission,$GalleryUpdatePermission,$OfferUpdatePermission,$EventUpdatePermission,$DealsUpdatePermission,$OrderReportUpdatePermission,$id) {
       $result = mysql_query("Update tbl_ownerSetting set restUpdatePermission='$restUpdatePermission',MenuCatUpdatePermission='$MenuCatUpdatePermission',FoodItemUpdatePermission='$FoodItemUpdatePermission',DeliveryAreaUpdatePermission='$DeliveryAreaUpdatePermission',TimeTableUpdatePermission='$TimeTableUpdatePermission',EmpUpdatePermission='$EmpUpdatePermission',DeliveryBoyUpdatePermission='$DeliveryBoyUpdatePermission',GalleryUpdatePermission='$GalleryUpdatePermission' ,OfferUpdatePermission='$OfferUpdatePermission',EventUpdatePermission='$EventUpdatePermission',DealsUpdatePermission='$DealsUpdatePermission',OrderReportUpdatePermission='$OrderReportUpdatePermission' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }	


public function storeAddRestaurantBank($restaurant_BankACName,$restaurant_BankACType,$restaurant_BankName,$restaurant_BankACNo,$restaurant_BankNEFTCode,$restaurant_BankSwiftCode,$restaurant_BankAddress,$restaurant_id) {
	
		$result = mysql_query("INSERT INTO tbl_restaurantBank(restaurant_BankACName,restaurant_BankACType,restaurant_BankName,restaurant_BankACNo,restaurant_BankNEFTCode,restaurant_BankSwiftCode,restaurant_BankAddress,restaurant_id) VALUES(N'$restaurant_BankACName',N'$restaurant_BankACType',N'$restaurant_BankName','$restaurant_BankACNo','$restaurant_BankNEFTCode','$restaurant_BankSwiftCode','$restaurant_BankAddress','$restaurant_id')");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	
	 public function storeUpdateRestaurantBank($restaurant_BankACName,$restaurant_BankACType,$restaurant_BankName,$restaurant_BankACNo,$restaurant_BankNEFTCode,$restaurant_BankSwiftCode,$restaurant_BankAddress,$restaurant_id) {
       $result = mysql_query("Update tbl_restaurantBank set restaurant_BankACName=N'$restaurant_BankACName',restaurant_BankACType=N'$restaurant_BankACType',restaurant_BankName=N'$restaurant_BankName',restaurant_BankACNo='$restaurant_BankACNo',restaurant_BankNEFTCode='$restaurant_BankNEFTCode',restaurant_BankSwiftCode='$restaurant_BankSwiftCode',restaurant_BankAddress'='$restaurant_BankAddress',restaurant_id='$restaurant_id' where restaurant_id='$restaurant_id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }




public function storeAddRestaurantSEO($restaurant_id,$restaurant_MetaTitle,$restaurant_MetaKeyword,$restaurant_MetaDescription) {
		$result = mysql_query("INSERT INTO tbl_restaurantSEO(restaurant_id,restaurant_MetaTitle,restaurant_MetaKeyword,restaurant_MetaDescription) VALUES('$restaurant_id',N'$restaurant_MetaTitle',N'$restaurant_MetaKeyword',N'$restaurant_MetaDescription')");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	
	 public function storeUpdateRestaurantSEO($restaurant_id,$restaurant_MetaTitle,$restaurant_MetaKeyword,$restaurant_MetaDescription,$id) {
       $result = mysql_query("Update tbl_restaurantSEO set restaurant_id='$restaurant_id',restaurant_MetaTitle=N'$restaurant_MetaTitle',restaurant_MetaKeyword=N'$restaurant_MetaKeyword',restaurant_MetaDescription=N'$restaurant_MetaDescription' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	
 public function storeUpdateRestaurantSEO2($restaurant_id,$restaurant_MetaTitle,$restaurant_MetaKeyword,$restaurant_MetaDescription) {
       $result = mysql_query("Update tbl_restaurantSEO set restaurant_id='$restaurant_id',restaurant_MetaTitle=N'$restaurant_MetaTitle',restaurant_MetaKeyword=N'$restaurant_MetaKeyword',restaurant_MetaDescription=N'$restaurant_MetaDescription' where restaurant_id='$restaurant_id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }	




public function storeAddRestaurant($restaurant_type,$restaurant_service,$restaurant_name,$restaurant_phone,$restaurant_website,$restaurant_fax,$restaurant_cuisine,$restaurant_facilities,$restaurant_contact_name,$restaurant_contact_phone,$restaurant_contact_mobile,$restaurant_contact_email,$restaurant_social_media,$restaurant_sms_mobile,$restaurant_default_min_order,$restaurant_saleTaxNo,$restaurant_saleTaxDate,$restaurant_saleTaxPercentage,$restaurant_payment_method,$restaurant_credit_card_fess,$restaurant_cloud_printer_email,$restaurant_cloud_printer_password,$restaurant_commission,$restaurant_invoiceTimePeriod,$restaurant_Listing_date,$restaurant_Listing_Category,$restaurant_address,$restaurant_description,$restaurant_deliveryDistance,$restaurant_FaxGateway,$restaurant_InvoiceEmail,$restaurant_OrderEmail,$restaurant_BookingEmail,$restaurant_FeedbackEmail,$restaurant_Logo,$restaurant_Market_bannerImg,$restaurant_Video,$restaurant_FaviconImg,$restaurant_LatitudePoint,$restaurant_LongitudePoint,$restaurantCity,$restaurantState,$terms_condtion,$restaurant_avarage_deliveryTime,$restaurant_avarage_deliveryCost,$preOrdersupport,$BookaTableOrdersupport,$offerType,$convenience_fee,$loyality_setting,$loyality_limit) {
		
$result = mysql_query("INSERT INTO tbl_restaurantAdd(restaurant_type,restaurant_service,restaurant_name,restaurant_phone,restaurant_website,restaurant_fax,restaurant_cuisine,restaurant_facilities,restaurant_contact_name,restaurant_contact_phone,restaurant_contact_mobile,restaurant_contact_email,restaurant_social_media,restaurant_sms_mobile,restaurant_default_min_order,restaurant_saleTaxNo,restaurant_saleTaxDate,restaurant_saleTaxPercentage,restaurant_payment_method,restaurant_credit_card_fess,restaurant_cloud_printer_email,restaurant_cloud_printer_password,restaurant_commission,restaurant_invoiceTimePeriod,restaurant_Listing_date,restaurant_Listing_Category,restaurant_address,restaurant_description,restaurant_deliveryDistance,restaurant_FaxGateway,restaurant_InvoiceEmail,restaurant_OrderEmail,restaurant_BookingEmail,restaurant_FeedbackEmail,restaurant_Logo,restaurant_Market_bannerImg,restaurant_Video,restaurant_FaviconImg,restaurant_LatitudePoint,restaurant_LongitudePoint,status,created_date,restaurantCity,restaurantState,terms_condtion,restaurant_avarage_deliveryTime,restaurant_avarage_deliveryCost,preOrdersupport,BookaTableOrdersupport,offerType,convenience_fee,loyality_setting,loyality_limit) 

VALUES(N'$restaurant_type',N'$restaurant_service',N'$restaurant_name','$restaurant_phone','$restaurant_website','$restaurant_fax',N'$restaurant_cuisine',N'$restaurant_facilities',N'$restaurant_contact_name','$restaurant_contact_phone','$restaurant_contact_mobile','$restaurant_contact_email','$restaurant_social_media','$restaurant_sms_mobile','$restaurant_default_min_order','$restaurant_saleTaxNo','$restaurant_saleTaxDate','$restaurant_saleTaxPercentage','$restaurant_payment_method','$restaurant_credit_card_fess','$restaurant_cloud_printer_email','$restaurant_cloud_printer_password','$restaurant_commission','$restaurant_invoiceTimePeriod','$restaurant_Listing_date','$restaurant_Listing_Category',N'$restaurant_address',N'$restaurant_description','$restaurant_deliveryDistance','$restaurant_FaxGateway','$restaurant_InvoiceEmail','$restaurant_OrderEmail','$restaurant_BookingEmail','$restaurant_FeedbackEmail','$restaurant_Logo','$restaurant_Market_bannerImg','$restaurant_Video','$restaurant_FaviconImg','$restaurant_LatitudePoint','$restaurant_LongitudePoint','0', NOW(),N'$restaurantCity','$restaurantState',N'$terms_condtion','$restaurant_avarage_deliveryTime','$restaurant_avarage_deliveryCost','$preOrdersupport','$BookaTableOrdersupport','$offerType','$convenience_fee','$loyality_setting','$loyality_limit')");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	
	 public function storeUpdateRestaurant($restaurant_type,$restaurant_service,$restaurant_name,$restaurant_phone,$restaurant_website,$restaurant_fax,$restaurant_cuisine,$restaurant_facilities,$restaurant_contact_name,$restaurant_contact_phone,$restaurant_contact_mobile,$restaurant_contact_email,$restaurant_social_media,$restaurant_sms_mobile,$restaurant_default_min_order,$restaurant_saleTaxNo,$restaurant_saleTaxDate,$restaurant_saleTaxPercentage,$restaurant_payment_method,$restaurant_credit_card_fess,$restaurant_cloud_printer_email,$restaurant_cloud_printer_password,$restaurant_commission,$restaurant_invoiceTimePeriod,$restaurant_Listing_date,$restaurant_Listing_Category,$restaurant_address,$restaurant_description,$restaurant_deliveryDistance,$restaurant_FaxGateway,$restaurant_InvoiceEmail,$restaurant_OrderEmail,$restaurant_BookingEmail,$restaurant_FeedbackEmail,$restaurant_Logo,$restaurant_Market_bannerImg,$restaurant_Video,$restaurant_FaviconImg,$restaurant_LatitudePoint,$restaurant_LongitudePoint,$restaurantCity,$restaurantState,$terms_condtion,$restaurant_avarage_deliveryTime,$restaurant_avarage_deliveryCost,$preOrdersupport,$BookaTableOrdersupport,$offerType,$convenience_fee,$loyality_setting,$loyality_limit,$id) {
	 
$result = mysql_query("Update tbl_restaurantAdd set restaurant_type=N'$restaurant_type',restaurant_service=N'$restaurant_service',restaurant_name=N'$restaurant_name',restaurant_phone='$restaurant_phone',restaurant_website='$restaurant_website',restaurant_fax='$restaurant_fax',restaurant_cuisine=N'$restaurant_cuisine',restaurant_facilities='$restaurant_facilities',restaurant_contact_name=N'$restaurant_contact_name',restaurant_contact_phone='$restaurant_contact_phone',restaurant_contact_mobile='$restaurant_contact_mobile',restaurant_contact_email='$restaurant_contact_email',restaurant_social_media='$restaurant_social_media',restaurant_sms_mobile='$restaurant_sms_mobile',restaurant_default_min_order='$restaurant_default_min_order',restaurant_saleTaxNo='$restaurant_saleTaxNo',restaurant_saleTaxDate='$restaurant_saleTaxDate',restaurant_saleTaxPercentage='$restaurant_saleTaxPercentage',restaurant_payment_method='$restaurant_payment_method',restaurant_credit_card_fess='$restaurant_credit_card_fess',restaurant_cloud_printer_email='$restaurant_cloud_printer_email',restaurant_cloud_printer_password='$restaurant_cloud_printer_password',restaurant_commission='$restaurant_commission',restaurant_invoiceTimePeriod='$restaurant_invoiceTimePeriod',restaurant_Listing_date='$restaurant_Listing_date',restaurant_Listing_Category='$restaurant_Listing_Category',restaurant_address=N'$restaurant_address',restaurant_description=N'$restaurant_description',restaurant_deliveryDistance='$restaurant_deliveryDistance',restaurant_FaxGateway='$restaurant_FaxGateway',restaurant_InvoiceEmail='$restaurant_InvoiceEmail',restaurant_OrderEmail='$restaurant_OrderEmail',restaurant_BookingEmail='$restaurant_BookingEmail',restaurant_FeedbackEmail='$restaurant_FeedbackEmail',restaurant_Logo='$restaurant_Logo',restaurant_Market_bannerImg='$restaurant_Market_bannerImg',restaurant_Video='$restaurant_Video',restaurant_FaviconImg='$restaurant_FaviconImg',restaurant_LatitudePoint='$restaurant_LatitudePoint',restaurant_LongitudePoint='$restaurant_LongitudePoint',restaurantCity=N'$restaurantCity',restaurantState='$restaurantState',terms_condtion=N'$terms_condtion' ,restaurant_avarage_deliveryTime='$restaurant_avarage_deliveryTime',restaurant_avarage_deliveryCost='$restaurant_avarage_deliveryCost',preOrdersupport='$preOrdersupport',BookaTableOrdersupport='$BookaTableOrdersupport',offerType='$offerType',convenience_fee='$convenience_fee',loyality_setting='$loyality_setting',loyality_limit='$loyality_limit' where id='$id'");


        if ($result) {
           return $result;
        } else {
            return false;
        }
    }

///++++++++++++++++++++++++++++++++++++++++++++++++++++++++ End Here +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 



///++++++++++++++++++++++++++++++++++++++++++++++++++ User Registration ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

public function storeAddResUser($fname,$lname,$countryID,$stateID,$cityName,$zipcode,$gender,$landmark,$user_phone,$address,$user_email,$user_pass,$assign_loyalty,$loyalty_type) {
        $sql = mysql_query("SELECT * from tbl_user WHERE  user_email ='$user_email' ");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO tbl_user(fname,lname,countryID,state_name,city_name,zipcode,gender,landmark,user_phone,address,user_email,user_pass,assign_loyalty,loyalty_type,status,ip,input_date) VALUES(N'$fname',N'$lname','$countryID','$stateID',N'$cityName','$zipcode','$gender',N'$landmark','$user_phone',N'$address','$user_email','$user_pass','$assign_loyalty','$loyalty_type','0','".$_SERVER['REMOTE_ADDR']."', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateResUser($fname,$lname,$countryID,$stateID,$cityName,$zipcode,$gender,$landmark,$user_phone,$address,$user_email,$user_pass,$assign_loyalty,$loyalty_type,$id) {
       $result = mysql_query("Update tbl_user set fname=N'$fname',lname=N'$lname',user_email='$user_email',user_pass='$user_pass',countryID='$countryID',state_name='$stateID',city_name=N'$cityName',zipcode='$zipcode',gender='$gender' ,landmark='$landmark',user_phone='$user_phone',address=N'$address' ,assign_loyalty='$assign_loyalty',loyalty_type='$loyalty_type' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }


///+++++++++++++++++++++++++++++++++++++++++++++++++ End Here +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++







///++++++++++++++++++++++++++++++++++++++++++++++++++ Delivery Boy Registration ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

public function storeAddResDeliveryBoy($DeliveryBoyRestaurantID,$DeliveryBoyName,$DeliveryBoyCountry,$DeliveryBoyState,$DeliveryBoyCity,$DeliveryBoyEmailID,$DeliveryBoyMobileNo,$DeliveryBoyArea,$DeliveryBoyDOB,$DeliveryBoyAnniversaryDate,$DeliveryBoyPhoto,$DeliveryBoyIDProof,$DeliveryBoyResidenceNo,$DeliveryBoyAddress) {
        $sql = mysql_query("SELECT * from tbl_resDeliveryBoy WHERE  DeliveryBoyRestaurantID ='$DeliveryBoyRestaurantID' and DeliveryBoyEmailID ='$DeliveryBoyEmailID' ");
		
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
		$result = mysql_query("INSERT INTO tbl_resDeliveryBoy(DeliveryBoyRestaurantID,DeliveryBoyName,DeliveryBoyCountry,DeliveryBoyState,DeliveryBoyCity,DeliveryBoyEmailID,DeliveryBoyMobileNo,DeliveryBoyArea,DeliveryBoyDOB,DeliveryBoyAnniversaryDate,DeliveryBoyPhoto,DeliveryBoyIDProof,DeliveryBoyResidenceNo,DeliveryBoyAddress,status,created_ip,created_date) VALUES('$DeliveryBoyRestaurantID',N'$DeliveryBoyName','$DeliveryBoyCountry','$DeliveryBoyState','$DeliveryBoyCity','$DeliveryBoyEmailID','$DeliveryBoyMobileNo','$DeliveryBoyArea','$DeliveryBoyDOB','$DeliveryBoyAnniversaryDate','$DeliveryBoyPhoto','$DeliveryBoyIDProof','$DeliveryBoyResidenceNo',N'$DeliveryBoyAddress','0','".$_SERVER['REMOTE_ADDR']."', NOW())");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateResDeliveryBoy($DeliveryBoyRestaurantID,$DeliveryBoyName,$DeliveryBoyCountry,$DeliveryBoyState,$DeliveryBoyCity,$DeliveryBoyEmailID,$DeliveryBoyMobileNo,$DeliveryBoyArea,$DeliveryBoyDOB,$DeliveryBoyAnniversaryDate,$DeliveryBoyPhoto,$DeliveryBoyIDProof,$DeliveryBoyResidenceNo,$DeliveryBoyAddress,$id) {
       $result = mysql_query("Update tbl_resDeliveryBoy set DeliveryBoyRestaurantID='$DeliveryBoyRestaurantID',DeliveryBoyName=N'$DeliveryBoyName',DeliveryBoyCountry='$DeliveryBoyCountry',DeliveryBoyState='$DeliveryBoyState' ,DeliveryBoyCity='$DeliveryBoyCity',DeliveryBoyEmailID='$DeliveryBoyEmailID',DeliveryBoyMobileNo='$DeliveryBoyMobileNo',DeliveryBoyArea='$DeliveryBoyArea',DeliveryBoyDOB='$DeliveryBoyDOB',DeliveryBoyAnniversaryDate='$DeliveryBoyAnniversaryDate',DeliveryBoyPhoto='$DeliveryBoyPhoto',DeliveryBoyIDProof='$DeliveryBoyIDProof',DeliveryBoyResidenceNo='$DeliveryBoyResidenceNo' ,DeliveryBoyAddress='$DeliveryBoyAddress' where id='$id'");
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }


///+++++++++++++++++++++++++++++++++++++++++++++++++ End Here +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	
	



///++++++++++++++++++++++++++++++++++++++++++++++++++ Employyee Registration ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

public function storeAddResEmployee($ResEmployeeID,$EmployeeName,$EmployeeDesignation,$EmployeeCountry,$EmployeeRegion,$EmployeeCity,$EmployeeEmailID,$EmployeeMobileNo,$EmployeeDOB,$EmployeeAnniversary,$EmployeePhoto,$EmployeeIDProof,$EmployeeResidenceNo,$EmployeeBranchName,$EmployeeAddress,$EmployeeDepartment) {
        $sql = mysql_query("SELECT * from tbl_RestaurantEmp WHERE  ResEmployeeID ='$ResEmployeeID' and EmployeeEmailID ='$EmployeeEmailID' ");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
	
		$result = mysql_query("INSERT INTO tbl_RestaurantEmp(ResEmployeeID,EmployeeName,EmployeeDesignation,EmployeeCountry,EmployeeRegion,EmployeeEmailID,EmployeeMobileNo,EmployeeDOB,EmployeeAnniversary,EmployeePhoto,EmployeeIDProof,EmployeeResidenceNo,EmployeeBranchName,EmployeeAddress,EmployeeDepartment,status,created_ip,created_date,ipblock) 
VALUES('$ResEmployeeID',N'$EmployeeName',N'$EmployeeDesignation','$EmployeeCountry','$EmployeeRegion','$EmployeeEmailID','$EmployeeMobileNo','$EmployeeDOB','$EmployeeAnniversary','$EmployeePhoto','$EmployeeIDProof','$EmployeeResidenceNo',N'$EmployeeBranchName',N'$EmployeeAddress',N'$EmployeeDepartment','0','".$_SERVER['REMOTE_ADDR']."', NOW(),'0')");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
		 return $result;
		}
		else
		{
		return FALSE;
		}
    }
	
	
	 public function storeUpdateEmployee($ResEmployeeID,$EmployeeName,$EmployeeDesignation,$EmployeeCountry,$EmployeeRegion,$EmployeeCity,$EmployeeEmailID,$EmployeeMobileNo,$EmployeeDOB,$EmployeeAnniversary,$EmployeePhoto,$EmployeeIDProof,$EmployeeResidenceNo,$EmployeeBranchName,$EmployeeAddress,$EmployeeDepartment,$id) {
	 
	
       $result = mysql_query("Update tbl_RestaurantEmp set ResEmployeeID='$ResEmployeeID',EmployeeName=N'$EmployeeName',EmployeeDesignation='$EmployeeDesignation',EmployeeCountry='$EmployeeCountry' ,EmployeeRegion='$EmployeeRegion',EmployeeCity='$EmployeeCity',EmployeeEmailID='$EmployeeEmailID',EmployeeMobileNo='$EmployeeMobileNo',EmployeeDOB='$EmployeeDOB',EmployeeAnniversary='$EmployeeAnniversary',EmployeePhoto='$EmployeePhoto',EmployeeIDProof='$EmployeeIDProof',EmployeeResidenceNo='$EmployeeResidenceNo' ,EmployeeBranchName='$EmployeeBranchName',EmployeeAddress='$EmployeeAddress',EmployeeDepartment='$EmployeeDepartment' where id='$id'");
	   
	   
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }


///+++++++++++++++++++++++++++++++++++++++++++++++++ End Here +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	
	
	

///++++++++++++++++++++++++++++++++++++++++++ Restaurant Timing update ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


 public function storeUpdateRestaurantTimimg($tablename,$restaurant_id,$restaurant_alcohol_mon_selected,$restaurant_alcohol_mon_open_hr,$restaurant_alcohol_mon_open_min,$restaurant_alcohol_mon_open_am,$restaurant_alcohol_mon_close_hr,$restaurant_alcohol_mon_close_min,$restaurant_alcohol_mon_open_pm,$restaurant_alcohol_tue_selected,$restaurant_alcohol_tue_open_hr,$restaurant_alcohol_tue_open_min,$restaurant_alcohol_tue_open_am,$restaurant_alcohol_tue_close_hr,$restaurant_alcohol_tue_close_min,$restaurant_alcohol_tue_open_pm,$restaurant_alcohol_wed_selected,$restaurant_alcohol_wed_open_hr,$restaurant_alcohol_wed_open_min,$restaurant_alcohol_wed_open_am,
$restaurant_alcohol_wed_close_hr,$restaurant_alcohol_wed_close_min,$restaurant_alcohol_wed_open_pm,$restaurant_alcohol_thu_selected,$restaurant_alcohol_thu_open_hr,$restaurant_alcohol_thu_open_min,$restaurant_alcohol_thu_open_am,$restaurant_alcohol_thu_close_hr,$restaurant_alcohol_thu_close_min,$restaurant_alcohol_thu_open_pm,
$restaurant_alcohol_fri_selected,$restaurant_alcohol_fri_open_hr,$restaurant_alcohol_fri_open_min,$restaurant_alcohol_fri_open_am,$restaurant_alcohol_fri_close_hr,
$restaurant_alcohol_fri_close_min,$restaurant_alcohol_fri_open_pm,$restaurant_alcohol_sat_selected,$restaurant_alcohol_sat_open_hr,$restaurant_alcohol_sat_open_min,$restaurant_alcohol_sat_open_am,$restaurant_alcohol_sat_close_hr,$restaurant_alcohol_sat_close_min,$restaurant_alcohol_sat_open_pm,$restaurant_alcohol_sun_selected,$restaurant_alcohol_sun_open_hr,$restaurant_alcohol_sun_open_min,$restaurant_alcohol_sun_open_am,$restaurant_alcohol_sun_close_hr,$restaurant_alcohol_sun_close_min,$restaurant_alcohol_sun_open_pm,
$restaurant_alcohol_mon_selected1,$restaurant_alcohol_mon_open_hr1,$restaurant_alcohol_mon_open_min1,$restaurant_alcohol_mon_open_am1,$restaurant_alcohol_mon_close_hr1,$restaurant_alcohol_mon_close_min1,$restaurant_alcohol_mon_open_pm1,$restaurant_alcohol_tue_selected1,$restaurant_alcohol_tue_open_hr1,$restaurant_alcohol_tue_open_min1,$restaurant_alcohol_tue_open_am1,$restaurant_alcohol_tue_close_hr1,$restaurant_alcohol_tue_close_min1,$restaurant_alcohol_tue_open_pm1,$restaurant_alcohol_wed_selected1,$restaurant_alcohol_wed_open_hr1,$restaurant_alcohol_wed_open_min1,$restaurant_alcohol_wed_open_am1,
$restaurant_alcohol_wed_close_hr1,$restaurant_alcohol_wed_close_min1,$restaurant_alcohol_wed_open_pm1,$restaurant_alcohol_thu_selected1,$restaurant_alcohol_thu_open_hr1,$restaurant_alcohol_thu_open_min1,$restaurant_alcohol_thu_open_am1,$restaurant_alcohol_thu_close_hr1,$restaurant_alcohol_thu_close_min1,$restaurant_alcohol_thu_open_pm1,
$restaurant_alcohol_fri_selected1,$restaurant_alcohol_fri_open_hr1,$restaurant_alcohol_fri_open_min1,$restaurant_alcohol_fri_open_am1,$restaurant_alcohol_fri_close_hr1,
$restaurant_alcohol_fri_close_min1,$restaurant_alcohol_fri_open_pm1,$restaurant_alcohol_sat_selected1,$restaurant_alcohol_sat_open_hr1,$restaurant_alcohol_sat_open_min1,$restaurant_alcohol_sat_open_am1,$restaurant_alcohol_sat_close_hr1,$restaurant_alcohol_sat_close_min1,$restaurant_alcohol_sat_open_pm1,$restaurant_alcohol_sun_selected1,$restaurant_alcohol_sun_open_hr1,$restaurant_alcohol_sun_open_min1,$restaurant_alcohol_sun_open_am1,$restaurant_alcohol_sun_close_hr1,$restaurant_alcohol_sun_close_min1,$restaurant_alcohol_sun_open_pm1,$id) {
$result = mysql_query("UPDATE ".$tablename." SET `restaurant_id` = '$restaurant_id', ".$restaurant_alcohol_mon_selected."='$restaurant_alcohol_mon_selected1', ".$restaurant_alcohol_mon_open_hr." = '$restaurant_alcohol_mon_open_hr1', ".$restaurant_alcohol_mon_open_min." = '$restaurant_alcohol_mon_open_min1', ".$restaurant_alcohol_mon_open_am." = '$restaurant_alcohol_mon_open_am1', ".$restaurant_alcohol_mon_close_hr." = '$restaurant_alcohol_mon_close_hr1', ".$restaurant_alcohol_mon_close_min." = '$restaurant_alcohol_mon_close_min1', ".$restaurant_alcohol_mon_open_pm." = '$restaurant_alcohol_mon_open_pm1', ".$restaurant_alcohol_tue_selected." = '$restaurant_alcohol_tue_selected1', ".$restaurant_alcohol_tue_open_hr." = '$restaurant_alcohol_tue_open_hr1',".$restaurant_alcohol_tue_open_min." = '$restaurant_alcohol_tue_open_min1', ".$restaurant_alcohol_tue_open_am." = '$restaurant_alcohol_tue_open_am1', ".$restaurant_alcohol_tue_close_hr." = '$restaurant_alcohol_tue_close_hr1', ".$restaurant_alcohol_tue_close_min." = '$restaurant_alcohol_tue_close_min1', ".$restaurant_alcohol_tue_open_pm." = '$restaurant_alcohol_tue_open_pm1', ".$restaurant_alcohol_wed_selected." = '$restaurant_alcohol_wed_selected1', ".$restaurant_alcohol_wed_open_hr." = '$restaurant_alcohol_wed_open_hr1', ".$restaurant_alcohol_wed_open_min." = '$restaurant_alcohol_wed_open_min1', ".$restaurant_alcohol_wed_open_am." = '$restaurant_alcohol_wed_open_am1', ".$restaurant_alcohol_wed_close_hr." = '$restaurant_alcohol_wed_close_hr1', ".$restaurant_alcohol_wed_close_min." = '$restaurant_alcohol_wed_close_min1', ".$restaurant_alcohol_wed_open_pm." = '$restaurant_alcohol_wed_open_pm1', ".$restaurant_alcohol_thu_selected." = '$restaurant_alcohol_thu_selected1', ".$restaurant_alcohol_thu_open_hr." = '$restaurant_alcohol_thu_open_hr1', ".$restaurant_alcohol_thu_open_min." = '$restaurant_alcohol_thu_open_min1', ".$restaurant_alcohol_thu_open_am." = '$restaurant_alcohol_thu_open_am1', ".$restaurant_alcohol_thu_close_hr." = '$restaurant_alcohol_thu_close_hr1', ".$restaurant_alcohol_thu_close_min." = '$restaurant_alcohol_thu_close_min1', ".$restaurant_alcohol_thu_open_pm." = '$restaurant_alcohol_thu_open_pm1', ".$restaurant_alcohol_fri_selected." = '$restaurant_alcohol_fri_selected1', ".$restaurant_alcohol_fri_open_hr." = '$restaurant_alcohol_fri_open_hr1', ".$restaurant_alcohol_fri_open_min." = '$restaurant_alcohol_fri_open_min1', ".$restaurant_alcohol_fri_open_am." = '$restaurant_alcohol_fri_open_am1', ".$restaurant_alcohol_fri_close_hr." = '$restaurant_alcohol_fri_close_hr1', ".$restaurant_alcohol_fri_close_min." = '$restaurant_alcohol_fri_close_min1', ".$restaurant_alcohol_fri_open_pm." = '$restaurant_alcohol_fri_open_pm1', ".$restaurant_alcohol_sat_selected." = '$restaurant_alcohol_sat_selected1', ".$restaurant_alcohol_sat_open_hr." = '$restaurant_alcohol_sat_open_hr1', ".$restaurant_alcohol_sat_open_min." = '$restaurant_alcohol_sat_open_min1', ".$restaurant_alcohol_sat_open_am." = '$restaurant_alcohol_sat_open_am1', ".$restaurant_alcohol_sat_close_hr." = '$restaurant_alcohol_sat_close_hr1', ".$restaurant_alcohol_sat_close_min." = '$restaurant_alcohol_sat_close_min1', ".$restaurant_alcohol_sat_open_pm." = '$restaurant_alcohol_sat_open_pm1', ".$restaurant_alcohol_sun_selected." = '$restaurant_alcohol_sun_selected1', ".$restaurant_alcohol_sun_open_hr." = '$restaurant_alcohol_sun_open_hr1', ".$restaurant_alcohol_sun_open_min." = '$restaurant_alcohol_sun_open_min1', ".$restaurant_alcohol_sun_open_am." = '$restaurant_alcohol_sun_open_am1', ".$restaurant_alcohol_sun_close_hr." = '$restaurant_alcohol_sun_close_hr1', ".$restaurant_alcohol_sun_close_min." = '$restaurant_alcohol_sun_close_min1', ".$restaurant_alcohol_sun_open_pm." = '$restaurant_alcohol_sun_open_pm1' WHERE restaurant_id = '$restaurant_id'");
	   
	   
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }



public function storeAddCommericalBanner($BannerByCategory,$BannerByService,$BannerByCuisine,$BannerByMenuCategory,$BannerByCountry,$BannerByState,$BannerByCity,$BannerByArea,$BannerTimeLimit,$BannerTimeExpire,$BannerPosition,$ResBannerNameID,$bannerType,$BannerImg,$BannerCode,$BannerUrl,$BannerWidth,$BannerHeight,$HomeDisplay,$CurrentDate,$bannerPage) {

$result = mysql_query("INSERT INTO tbl_comercialBanner(BannerByCategory,BannerByService,BannerByCuisine,BannerByMenuCategory,BannerByCountry,BannerByState,BannerByCity,BannerByArea,BannerTimeLimit,BannerExpireDate,BannerPosition,ResBannerNameID,bannerType,BannerImg,BannerCode,BannerUrl,BannerWidth,BannerHeight,HomeDisplay,created_date,bannerPage) VALUES(N'$BannerByCategory',N'$BannerByService',N'$BannerByCuisine',N'$BannerByMenuCategory',N'$BannerByCountry','$BannerByState',N'$BannerByCity',N'$BannerByArea','$BannerTimeLimit','$BannerTimeExpire','$BannerPosition','$ResBannerNameID','$bannerType','$BannerImg','".htmlentities($BannerCode)."','$BannerUrl','$BannerWidth','$BannerHeight','$HomeDisplay','$CurrentDate','$bannerPage')");
        // check for successful store
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }
	
	
public function storeUpdateCommericalBanner($BannerByCategory,$BannerByService,$BannerByCuisine,$BannerByMenuCategory,$BannerByCountry,$BannerByState,$BannerByCity,$BannerByArea,$BannerTimeLimit,$BannerTimeExpire,$BannerPosition,$ResBannerNameID,$bannerType,$BannerImg,$BannerCode,$BannerUrl,$BannerWidth,$BannerHeight,$HomeDisplay,$CurrentDate,$bannerPage,$id) {
	 
$result = mysql_query("Update tbl_comercialBanner set BannerByCategory=N'$BannerByCategory',BannerByService=N'$BannerByService',BannerByCuisine=N'$BannerByCuisine',BannerByMenuCategory=N'$BannerByMenuCategory',BannerByCountry=N'$BannerByCountry',BannerByState='$BannerByState',BannerByCity=N'$BannerByCity',BannerByArea=N'$BannerByArea',BannerTimeLimit='$BannerTimeLimit',BannerExpireDate='$BannerTimeExpire', BannerPosition='$BannerPosition',ResBannerNameID='$ResBannerNameID',bannerType=N'$bannerType',BannerImg='$BannerImg',BannerCode='".htmlentities($BannerCode)."',BannerUrl='$BannerUrl',BannerWidth='$BannerWidth',BannerHeight='$BannerHeight',HomeDisplay='$HomeDisplay',created_date='$CurrentDate' ,bannerPage='$bannerPage' where id='$id'");
	   
	   
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }



public function ChangeAdminPassword($AdminEmail,$new_password,$id) {
	 
$result = mysql_query("Update tbl_login set AdminName=N'$AdminEmail',AdminPassword='$new_password' where id='$id'");
	   
	   
        if ($result) {
           return $result;
        } else {
            return false;
        }
    }







///++++++++++++++++++++++++++++++++++++++++++++ End Here ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++	










	
	
	
	
public function DeleteTableRow($tablename,$field,$id)
{
	$url1="delete from ".$tablename." where ".$field."='$id'";
	$url2=mysql_query($url1);
	  if ($url2) {
           return $url2;
        } else {
            return false;
        }
}	
	
	
public function ActivateDeactiveRow($tablename,$field,$value,$id)
{
	$url1="update ".$tablename." set  ".$field."='$value' where id='$id'";
	$url2=mysql_query($url1);
	  if ($url2) {
           return $url2;
        } else {
            return false;
        }
}	
		
	
	// End Cuisine
	
public function showtabledata($table_name,$field,$id)
{
	$url1="select * from ".$table_name." where ".$field."='$id'";
	$url2=mysql_query($url1);
	return $url2;
	
}

public function showtable($table_name,$fieldname,$type)
{
	$url1="select * from ".$table_name." order by ".$fieldname." ".$type."";
	$url2=mysql_query($url1);
	return $url2;
	
}

public function showtabledatass($table_name,$field,$id)
{
	$url1="select * from ".$table_name." where ".$field."='$id' order by id desc limit 10";
	$url2=mysql_query($url1);
	return $url2;
	
}

public function updatedfaq($faq_question,$faq_answer,$id) 
{
		$today = date("F j, Y");
        $result = mysql_query("UPDATE  `tbl_faq` SET  `faq_question` ='".$faq_question."',`faq_answer` ='".$faq_answer."',`input_date` = '$today' WHERE `id` ='$id'") or die(mysql_error());
        return $result;
		
}


public function updatetable($table_name,$description) 
{
		$today = date("F j, Y");
	    $result = mysql_query("UPDATE  ".$table_name." SET  `content` ='".$description."' WHERE  `id` =0") or die(mysql_error());
        return $result;
}	


public function addfaq($faq_question,$faq_answer) 
{
		$today = date("F j, Y");
		$sql = mysql_query("SELECT * from tbl_faq WHERE  faq_question = '$faq_question'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
        $result = mysql_query("INSERT INTO `tbl_faq` (`id`, `faq_question`, `faq_answer`, `input_date`, `status`) VALUES (NULL, '".$faq_question."', '".$faq_answer."', '$today', '0');") or die(mysql_error());
        return $result;
		}
		else
		{
		return FALSE;
		}
		
    }
	
public function showdata($table_name,$id)
{
	$url1="select * from ".$table_name." where id='$id'";
	$url2=mysql_query($url1);
	return $url2;
	
}


public function showall($table_name,$id)
{
	$url1="select * from ".$table_name." where id='$id'";
	$url2=mysql_query($url1);
return $no_rows = mysql_num_rows($url2);

	
}

public function showdatamail($table_name,$field,$id)
{
	$url1="SELECT * FROM  ".$table_name." where  ".$field." ='$id' ";
	$url2=mysql_query($url1);
return $url2;
	
}

public function showalltable($table_name)
{
	$url1="select * from ".$table_name."";
	$url2=mysql_query($url1);
     return $url2;
	
}

public function showallcity($table_name,$sort)
{
	 $url1="select * from ".$table_name." order by ".$sort." asc";
	$url2=mysql_query($url1);
     return $url2;
	
}	





 
   
    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {
 
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
 
    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {
 
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
        return $hash;
    }
 
}
 
?>
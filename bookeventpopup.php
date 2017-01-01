<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Eventt</title>
<link href="css/group_order.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="cartwrapper">
  <div class="cartheader">
    <h2>Book Event</h2>
  </div>
  <div class="cartcontainer">
<?php /*?>  <p>You can book your event easily by sending us a message using the form below.  Please include all the necessary information about the event and our manager will get back to you within 24 business hours.</p>
<?php */?>    <div class="form">
    
      <form action="restaurant.php?restaurants=<?php echo trim(urldecode($_GET['restaurants']));?>" target="_parent" method="post">
       <input type="hidden" id="restaurant_id" name="restaurant_id" value="<?php echo $resID[0];?>" />
        <table width="100%">
          <tr>
            <td><label  class="name" for="" id="">Name</label></td>
          </tr>
          <tr>
            <td><input type="text" name="EventName" id="EventName" placeholder="" class="textbox" required /></td>
          </tr>
          <tr>
          <tr>
            <td><label  class="name" for="" id="">Email</label></td>
          </tr>
          <tr>
            <td><input type="email" name="EventEmail" id="EventEmail" placeholder="" class="textbox" required /></td>
          </tr>
           <tr>
            <td><label  class="name" for="" id="">Contact No.</label></td>
          </tr>
          <tr>
            <td><input type="text" name="EventContactNo" id="EventContactNo" placeholder="" class="textbox" required /></td>
          </tr>
          <tr>
            <td><label  class="name" for="" id="">Special Instructions</label></td>
          </tr>
          <tr>
            <td><textarea name="EventMessage" id="EventMessage" cols="55" rows="5"  required></textarea>
            </td>
          </tr>
          <tr>
            <td><input type="submit" name="" value="Submit" class="submit_btn" />
              <a href="restaurant.php?restaurants=<?php echo trim(urldecode($_GET['restaurants']));?>" target="_parent" class="submit_btn" style="cursor:pointer; display:inline; text-decoration:none;">
           Cancel
              </a></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div class="clear"></div>
</div>
</body>
</html>


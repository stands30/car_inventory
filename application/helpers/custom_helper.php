<?php 

  function mysqlDateFormat($value='')
  {
     
         if($value != '')
         {
            $date = str_replace('/','-',$value);
            $mysql_date = date('Y-m-d',strtotime($value));
         }
         else
         {
           $mysql_date = $value;
         
         }
         return $mysql_date;
  }
  function DateDisplay($value='')
  {
   
         if($value != '')
         {
           $date = date('d-M-Y',strtotime($value));
         }
         else
         {
           $date = $value;
         
         }
         return $date;
  }
  function DateTimeDisplay($value='')
  {
   
         if($value != '')
         {
           $date = date('d-M-Y h:i:s A',strtotime($value));
         }
         else
         {
           $date = $value;
         
         }
         return $date;
  }
 ?>
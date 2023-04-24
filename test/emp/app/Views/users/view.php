<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>

<?php  
$users= array( "emp1"=> 

array(
    
    "id"=>1,
    'firstname'=>"Peter",
    'lastname'=>"Ben",
    'slug'=>"abc",
    "email"=>"abc@gmail.com",
    'mobile'=>"0773838",
    'role'=>"admin",
    'status'=>"0"


),
"emp2"=> 
array(
    
    "id"=>1,
    'firstname'=>"Peter",
    'lastname'=>"Ben",
    'slug'=>"abc",
    "email"=>"abc@gmail.com",
    'mobile'=>"0773838",
    'role'=>"admin",
    'status'=>"0"
)

);

?>


<table class="table table-hover" >
<form>
<input class="btn btn-primary" type="button" value="add User">
</form>
   <thead class="thead-dark">

  <tr>
      <th> ID# </th>
      <th> First Name </th>
      <th> Last Name </th>
      <th> E-mail </th>
      <th> Contact No </th>
      <th> Role </th>

      <th>Status </th>
      <th colspan=2> Action </th>

  </tr>
</thead>
<tbody>

<?php foreach($users as $user){ ?>
<tr>
  <td><a class=" btn btn-primary " href="/user_profile_view/<?=esc($user['slug'],'url');?>">  <?= $user['id']?></a></td>
  <td> <a class=" " href="/user_profile_view/<?=esc($user['slug'],'url');?>"> <?= $user['firstname']?></a> </td>
  <td> <?= $user['lastname']?>  </td>

  <td> <?= $user['email']?>  </td>
  <td> <?= $user['mobile']?>  </td>
  <td> <?= $user['role']?>  </td>
  <td> <?= $user['status']?> </td>
  <td> Edit  </td>
 <td> Delete </td>



<?php  if ($user['status']==0){

   ?>

  <td>
    <a class="  " type="submit" href="/activate_user/<?=$user['id'];?>"><img class="userstatus" src="<?php echo base_url('img/inactive_user.png');?>"></a>


  </td>

<?php  }
  else
  { ?>
    <td>
    <a class="  " href="/deactivate_user/<?=$user['id'];?>"><img class="userstatus" src="<?php echo base_url('img/active_user.png');?>" ></a>


    <form>
      </td>
  <?php }?>

</tr>



<?php } ?>
  </tbody>
</table>
</div>

<?= $this->endSection() ?>
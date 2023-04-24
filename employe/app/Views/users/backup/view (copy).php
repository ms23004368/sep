
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
,
"emp3"=> 
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
<section>
</section>
<div class="card">
  <div class="card-body">
<div class="input-group rounded">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Users</a></li>
 
  </ol>
</nav>

  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
<div class="card">
  <div class="card-body">
     <form>
<a class="btn btn-primary" type="button" value="add User" align="right"> Add User <i class="fa fa-plus" aria-hidden="true"></i> </a>
</form> 
  </div>
</div>
<div class="card">
  <div class="card-body">
<table class="table table-striped table-sm" >

   <thead class="thead-dark table-dark">

  <tr>
 

      <th> # </th>
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
  <td><a class=" " href="/user_profile_view/<?=esc($user['slug'],'url');?>">  <?= $user['id']?></a></td>
  <td> <a class=" " href="/user_profile_view/<?=esc($user['slug'],'url');?>"> <?= $user['firstname']?></a> </td>
  <td> <?= $user['lastname']?>  </td>

  <td> <?= $user['email']?>  </td>
  <td> <?= $user['mobile']?>  </td>
  <td> <?= $user['role']?>  </td>
  <td> 
  <?php  if ($user['status']==0){ ?>

 <a class="  " type="submit" href="/activate_user/<?=$user['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
 <?php  }
  else
  { ?>
 <a class="  " href="/deactivate_user/<?=$user['id'];?>"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>

  
<?php }?>  
 



</td>
  <td><i class="fa fa-cog" aria-hidden="true" style="color:red;"></i></td>
  <td> <i class="fa fa-trash" aria-hidden="true"></i></td>


</tr>



<?php } ?>
  </tbody>
</table>
</div>

<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
</div>
</div>


<?= $this->endSection() ?>

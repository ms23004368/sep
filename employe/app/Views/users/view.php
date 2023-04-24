<?= $this->extend('home/dashboard') ?>
<?= $this->Section('content') ?>
<?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
<div class="col-12 col-sm-12  pb-3 bg-white form-wrapper ">


<!-- Search Bar --> 
<div class="">
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<small> you can filter users by typing any word in the table </small>
</div>


<div>
	<br>
<!-- Button trigger modal -->
<a class="btn btn-primary"  href="/create_user">
  Create User
</a>

</div>

</br>
<?php if ($users) :?>
 <table class="table table-bordered table-striped">
<thead class="thead-light">
<tr>
      <th> ID# </th>
      <th> First Name </th>
      <th>  Last Name</th>
      <th> E-mail </th>

      <th> User Role </th>
      <th> User Name </th>
      <th> Status </th>
      <th> Profile </th>
      <th> Action </th>

</tr>
</thead>
<tbody id="myTable">
<?php foreach($users as $user){ ?>
<tr>
  <td> <?= $user['id']?>  </td>
  <td> <?=$user['firstname']?>  </td>
  <td> <?=$user['lastname']?>  </td>
  <td> <?=$user['email']?>  </td>

  <td> <?=$user['role']?>  </td>
  <td> <?=$user['username']?>  </td>

  <?php  if ($user['active']!=0){

     ?>

    <td>
      <a class="  " type="submit" href="/activate_user/<?=$user['id'];?>"><i class="fa-solid fa-eye-slash"></i></a></a>
     

    </td>

  <?php  }
    else
    { ?>
      <td>
      <a class="  " href="/deactivate_user/<?=$user['id'];?>"><i class="fa-solid fa-eye"></i></a>
    

    </td>

    <?php } ?>
    <?php  if ($user['status']==0){ ?>
    <td> <a href="/admin/users/profile/create/<?=$user['id'];?>" data-toggle="tooltip" data-placement="top" title="view more about users">Add</a> </td>
    <?php } else { ?>
    <td> <a href="/user/profile/view/<?=$user['id'];?>" data-toggle="tooltip" data-placement="top" title="view more about users">View</a> </td>
    <?php }?>
<td> <a href="/edit_user/<?=$user['id'];?>" data-toggle="tooltip" data-placement="top" title="view more about users"><i class="fas fa-edit"></i>Edit</a> </td>

</tr>
<?php } ?>
</tbody>
</table>
<?php else:?>
<p> There are no courses Available for apply  </p>
<?php endif;?>
</div>



<?= $pager->makeLinks(2, 1, 100, 'front_full') ?>

<?= $this->endSection() ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style >
  .banner{
    width: 100%;``
  }
  .xyz{
    background-color:  black;
  }
  .productc{
    margin-top: 50px;
    margin-bottom: 50px;
  }
  .card{
    text-align: center;
    -webkit-box-shadow: 2px 2px 2px 2px #B6AABF;
box-shadow: 2px 2px 2px 2px #B6AABF;

  }
  .card img{
    width: 100%;
  }
</style>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#" >Vegetable shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>

    </ul>

    <ul class="navbar-nav ml-auto">
      <?php $cid=$this->session->userdata("c_id");
      if($cid!=""){
        $cimg=$this->session->userdata("c_pic");
        $cname=$this->session->userdata("c_name");
       ?>
      <li class="nav-item">
        <a class="nav-link" href="#" >Welcome <img style="width: 30px; border-radius: 360px;"  src="<?php echo base_url(); ?>upload_pic/<?php echo $cimg ?>"> <?php echo $cname; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>log" >Log Out</a>
      </li>

    <?php } else{ ?>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#sup">Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#lg">Sign In</a>
      </li>
    <?php } ?>  
    </ul>
  </div>  
</nav>

<img src="<?php echo base_url();?>images/banner.jpg" class="banner">

<div class="container productc">
  <div class="row">
    <div class="col-3 pt-5">
      <div >
        <ul class="list-group ">
          <?php foreach($category as $c){ ?>
          <li class="list-group-item"><a href="<?php echo base_url(); ?>category/<?php echo $c->id; ?>"><?php echo $c->name; ?></a></li>

         
        <?php } ?>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="row">
      <?php 
        foreach($product as $p){
      ?>
        <div class="col-md-4">
          <div class="card" >
            <img class="card-img-top"  src="<?php echo base_url(); ?>upload_pic/<?php echo $p->pimg; ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $p->pname; ?></h5>
              <p class="card-text"><?php echo $p->pprice; ?></p>
              <button class="btn btn-primary">Add to Cart</button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    </div>
  </div>
</div>



<div class="modal" id="sup">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sign Up</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>customer" method="post">
        <p>Name</p>
        <p><input type="text" name="name" class="form-control"></p>
        <p>Email</p>
        <p><input type="email" name="email" class="form-control"></p>
        <p>Address</p>
        <p><textarea name="address" class="form-control"></textarea></p>
        <p>Password</p>
        <p><input type="password" name="password" class="form-control"></p>
        <p>Confirm password</p>
        <p><input type="password" name="cpassword" class="form-control"></p>
        <p><input type="submit" name="save" value="Save"></p>
        </form>
      </div>


    </div>
  </div>
</div>



<div class="modal" id="lg">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sign In</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url(); ?>clc" method="post">
       
        <p>Email</p>
        <p><input type="email" name="email" class="form-control"></p>
        
        <p>Password</p>
        <p><input type="password" name="password" class="form-control"></p>
        
        <p><input type="submit" name="save" value="Save"></p>
        </form>
      </div>


    </div>
  </div>
</div>
</body>
</html>


